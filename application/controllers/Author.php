<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Author extends CI_Controller
{

	// return default array data.
	public $data = [
		'page_title' => 'Author',
		'menu_active' => 'author'
	];

	public function __construct()
	{
		parent::__construct();

		if (!$this->ion_auth->is_admin()) {
			redirect('auth/login');
		}

		$this->load->model('author_model');
		$this->load->library('form_validation');
		$this->load->helper('form');
	}

	public function index()
	{
		$this->load->view('author/author_data', $this->data);
	}

	// return all data to load with format json.
	public function data()
	{
		echo json_encode($this->author_model->get_data());
	}

	// add a author
	public function add()
	{
		$rules = [
			[
				'field' => 'author',
				'label' => 'Author',
				'rules' => 'trim|required'
			]
		];

		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run()) {
			$insert = $this->author_model->insert_data();
			if ($insert) {
				$this->session->set_flashdata('notif', 'success');
				$this->session->set_flashdata('notif_msg', 'Data has saved!');
			} else {
				$this->session->set_flashdata('notif', 'error');
				$this->session->set_flashdata('notif_msg', 'Data has not saved!');
			}
			redirect('author/add');
		}

		$this->load->view('author/author_form_add', $this->data);
	}

	// edit a author.
	public function edit($id = null)
	{
		if (!isset($id)) {
			redirect('author');
		}

		$rules = [
			[
				'field' => 'author',
				'label' => 'Author',
				'rules' => 'trim|required'
			]
		];

		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run()) {
			$update = $this->author_model->update_data();
			if ($update) {
				$this->session->set_flashdata('notif', 'success');
				$this->session->set_flashdata('notif_msg', 'Data has updated!');
			} else {
				$this->session->set_flashdata('notif', 'error');
				$this->session->set_flashdata('notif_msg', 'Data has not updated!');
			}
			redirect('author');
		}

		$this->data['author'] = $this->author_model->getdata_by_id($id);

		if (!$this->data['author']) {
			show_404();
		}

		$this->load->view('author/author_form_edit', $this->data);
	}

	// delete author.
	public function delete($id = null)
	{
		if (!isset($id)) {
			redirect('author');
		}

		$delete = $this->author_model->delete_data($id);

		if ($delete) {
			$this->session->set_flashdata('notif', 'success');
			$this->session->set_flashdata('notif_msg', 'Data has deleted!');
		} else {
			$this->session->set_flashdata('notif', 'error');
			$this->session->set_flashdata('notif_msg', 'Data has not deleted!');
		}

		redirect('author');
	}
}

/* End of file Author.php */
