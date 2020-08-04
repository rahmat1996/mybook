<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Book extends CI_Controller
{

	// return default data.
	public $data = [
		'page_title' => 'Book',
		'menu_active' => 'book'
	];

	public function __construct()
	{
		parent::__construct();

		if (!$this->ion_auth->is_admin()) {
			redirect('auth/login');
		}

		$this->load->model('book_model');
		$this->load->library('form_validation');
		$this->load->library('upload');
		$this->load->library('image_lib');
		$this->load->helper('form');
	}

	public function index()
	{
		$this->load->view('book/book_data', $this->data);
	}

	// return all data to load with json format.
	public function data()
	{
		echo json_encode($this->book_model->get_data());
	}

	// add book.
	public function add()
	{
		$rules = [
			[
				'field' => 'book_title',
				'label' => 'Book Title',
				'rules' => 'trim|required'
			],
			[
				'field' => 'book_year',
				'label' => 'Book Year',
				'rules' => 'trim|exact_length[4]|numeric'
			]
		];

		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run()) {

			$insert = $this->book_model->insert_data();

			if ($insert['has_inserted']) {

				$id = $insert['id'];

				$dir = 'directory/' . $id;

				// Make directory for upload file image and pdf
				@mkdir($dir);

				// check if image file is uploaded or not
				if (isset($_FILES['book_image']) && is_uploaded_file($_FILES['book_image']['tmp_name'])) {

					$image = $this->upload_image($dir, $id, 'book_image');

					if (is_array($image)) {

						$path_filename_jpg = $image['file_path'] . $image['raw_name'] . '.jpg';

						if ($image['file_type'] !== 'image/jpeg') {
							$this->image_to_jpg($image['full_path'], $path_filename_jpg, $image['file_type']);
						}

						if ($image['image_width'] > 1024) {
							$this->image_resize($path_filename_jpg, 1024);
						}

						$this->image_resize($path_filename_jpg, 150, TRUE);
					} else {

						$this->book_model->delete_data($id); // delete data from db.
						@rmdir($dir); // remove directory
						$this->session->set_flashdata('notif', 'error');
						$this->session->set_flashdata('notif_msg', $image);
						redirect('book/add');
					}
				} else {
					$this->book_model->delete_data($id); // delete data from db
					@rmdir($dir); // remove directory
					$this->session->set_flashdata('notif', 'error');
					$this->session->set_flashdata('notif_msg', 'Image cannot be null');
					redirect('book/add');
				}

				// check if book file (pdf) is uploaded or not.
				if (isset($_FILES['book_file']) && is_uploaded_file($_FILES['book_file']['tmp_name'])) {

					$pdf = $this->upload_pdf($dir, $id, 'book_file');

					if (is_array($pdf)) {
						$this->session->set_flashdata('notif', 'success');
						$this->session->set_flashdata('notif_msg', 'Data has saved!');
					} else {
						$this->book_model->delete_data($id); // remove data from db
						@unlink($path_filename_jpg); // remove image file 
						@unlink($image['file_path'] . $image['raw_name'] . '_thumb.jpg'); // remove thumb image
						@rmdir($dir); // remove directory
						$this->session->set_flashdata('notif', 'error');
						$this->session->set_flashdata('notif_msg', $this->upload->display_errors());
						redirect('book/add');
					}
				} else {
					$this->book_model->delete_data($id); // delete data from db
					@unlink($path_filename_jpg); // remove file image
					@unlink($image['file_path'] . $image['raw_name'] . '_thumb.jpg'); // remove thumb image
					@rmdir($dir); // remove directory
					$this->session->set_flashdata('notif', 'error');
					$this->session->set_flashdata('notif_msg', 'File cannot be null');
					redirect('book/add');
				}
			}

			// redirect after finish insert data to db and file image and book successfuly uploaded.
			redirect('book/add');
		}

		$this->data['languages'] = $this->book_model->data_languages();

		$this->data['categories'] = $this->book_model->data_categories();

		$this->data['authors'] = $this->book_model->data_authors();

		$this->load->view('book/book_form_add', $this->data);
	}

	// update book.
	public function edit($id = null)
	{
		if (!isset($id)) {
			redirect('book');
		}

		$rules = [
			[
				'field' => 'book_title',
				'label' => 'Book Title',
				'rules' => 'trim|required'
			],
			[
				'field' => 'book_year',
				'label' => 'Book Year',
				'rules' => 'trim|exact_length[4]|numeric'
			]
		];

		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run()) {

			$update = $this->book_model->update_data();

			if ($update) {

				$id = $this->input->post('book_id');

				$dir = 'directory/' . $id;

				// Change file image with overwrite.
				if (isset($_FILES['book_image']) && is_uploaded_file($_FILES['book_image']['tmp_name'])) {

					$image = $this->upload_image($dir, $id, 'book_image', TRUE);

					if (is_array($image)) {

						$path_filename_jpg = $image['file_path'] . $image['raw_name'] . '.jpg';

						if ($image['file_type'] !== 'image/jpeg') {
							$this->image_to_jpg($image['full_path'], $path_filename_jpg, $image['file_type'], 100, TRUE);
						}

						if ($image['image_width'] > 1024) {
							$this->image_resize($path_filename_jpg, 1024);
						}

						$this->image_resize($path_filename_jpg, 150, TRUE);
					} else {
						$this->session->set_flashdata('notif', 'error');
						$this->session->set_flashdata('notif_msg', $this->upload->display_errors());
						redirect('book');
					}
				}

				// Change file pdf with overwrite.
				if (isset($_FILES['book_file']) && is_uploaded_file($_FILES['book_file']['tmp_name'])) {

					$pdf = $this->upload_pdf($dir, $id, 'book_file', TRUE);

					if (!is_array($pdf)) {
						$this->session->set_flashdata('notif', 'error');
						$this->session->set_flashdata('notif_msg', $this->upload->display_errors());
						redirect('book');
					}
				}

				$this->session->set_flashdata('notif', 'success');
				$this->session->set_flashdata('notif_msg', 'Data has updated!');
			} else {
				$this->session->set_flashdata('notif', 'error');
				$this->session->set_flashdata('notif_msg', 'Data has not updated!');
			}
			redirect('book');
		}

		$this->data['book'] = $this->book_model->getdata_by_id($id);

		if (!$this->data['book']) {
			show_404();
		}

		$this->data['languages'] = $this->book_model->data_languages();

		$this->data['categories'] = $this->book_model->data_categories();

		$this->data['authors'] = $this->book_model->data_authors();

		$this->load->view('book/book_form_edit', $this->data);
	}

	// delete book.
	public function delete($id = null)
	{
		if (!isset($id)) {
			redirect('book');
		}

		$delete = $this->book_model->delete_data($id);

		if ($delete) {
			@unlink("./directory/{$id}/{$id}.jpg"); // remove image book
			@unlink("./directory/{$id}/{$id}_thumb.jpg"); // remove thumb image
			@unlink("./directory/{$id}/{$id}.pdf"); // remove file book
			@rmdir("./directory/{$id}"); // remove directory
			$this->session->set_flashdata('notif', 'success');
			$this->session->set_flashdata('notif_msg', 'Data has deleted!');
		} else {
			$this->session->set_flashdata('notif', 'error');
			$this->session->set_flashdata('notif_msg', 'Data has not deleted!');
		}

		redirect('book');
	}

	// return detail a book with json.
	public function detail($id = null)
	{
		if (!isset($id)) {
			echo "";
		} else {
			echo json_encode($this->book_model->getdata_by_id($id));
		}
	}

	// function convert image like png,gif and webp to jpg format.
	public function image_to_jpg($from, $to, $mime, $quality = 100, $overwrite = TRUE)
	{
		if ($mime === 'image/png') {
			imagejpeg(
				imagecreatefrompng($from),
				$to,
				$quality
			);
		} elseif ($mime === 'image/gif') {
			imagejpeg(
				imagecreatefromgif($from),
				$to,
				$quality
			);
		} elseif ($mime === 'image/webp') {
			imagejpeg(
				imagecreatefromwebp($from),
				$to,
				$quality
			);
		}

		if ($overwrite) {
			@unlink($from);
		}

		return TRUE;
	}

	// function to resize image.
	public function image_resize($path, $width, $thumbnail = FALSE)
	{
		$config['image_library'] = 'gd2';
		$config['source_image'] = $path;
		$config['maintain_ration'] = TRUE;
		$config['width'] = $width;
		$config['quality'] = 100;
		$config['create_thumb'] = $thumbnail;

		$this->image_lib->initialize($config);

		return $this->image_lib->resize();
	}

	// function to upload pdf file.
	public function upload_pdf($dir, $filename, $file_pdf, $overwrite = FALSE)
	{
		$config['upload_path'] = "./{$dir}";
		$config['allowed_types'] = 'pdf';
		$config['file_name'] = $filename;
		$config['file_ext_tolower'] = TRUE;
		$config['overwrite'] = $overwrite;

		$this->upload->initialize($config);

		$upload = $this->upload->do_upload($file_pdf);

		if ($upload) {
			return $this->upload->data();
		} else {
			return $this->upload->display_errors();
		}
	}

	// function to upload image file.
	public function upload_image($dir, $filename, $file_image, $overwrite = FALSE)
	{
		$config['upload_path'] = "./{$dir}";
		$config['allowed_types'] = 'gif|jpg|png|webp';
		$config['file_name'] = $filename;
		$config['file_ext_tolower'] = TRUE;
		$config['overwrite'] = $overwrite;

		$this->upload->initialize($config);

		$upload = $this->upload->do_upload($file_image);

		if ($upload) {
			return $this->upload->data();
		} else {
			return $this->upload->display_errors();
		}
	}
}

/* End of file Book.php */
