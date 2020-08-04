<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Category extends CI_Controller
{
	// return default array data.
	public $data = [
		'page_title' => 'Category',
		'menu_active' => 'category'
	];

	public function __construct()
	{
		parent::__construct();

		if (!$this->ion_auth->is_admin()) {
			redirect('auth/login');
		}

		$this->load->model('category_model');
		$this->load->library('form_validation');
		$this->load->helper('form');
	}

	public function index()
	{
		$this->load->view('category/category_data', $this->data);
	}

	// return all data to load with json format.
	public function data()
	{
		echo json_encode($this->category_model->get_data());
	}

	// add category
	public function add()
	{
		$rules = [
			[
				'field' => 'category_id',
				'label' => 'Category ID',
				'rules' => 'trim|required|exact_length[3]|numeric|is_unique[category.category_id]'
			],
			[
				'field' => 'category_name',
				'label' => 'Category Name',
				'rules' => 'trim|required'
			]
		];

		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run()) {
			$insert = $this->category_model->insert_data();
			if ($insert) {
				$this->session->set_flashdata('notif', 'success');
				$this->session->set_flashdata('notif_msg', 'Data has saved!');
			} else {
				$this->session->set_flashdata('notif', 'error');
				$this->session->set_flashdata('notif_msg', 'Data has not saved!');
			}
			redirect('category/add');
		}

		$this->load->view('category/category_form_add', $this->data);
	}

	// edit category.
	public function edit($id = null)
	{
		if (!isset($id)) {
			redirect('category');
		}

		$rules = [
			[
				'field' => 'category_name',
				'label' => 'Category',
				'rules' => 'trim|required'
			]
		];

		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run()) {
			$update = $this->category_model->update_data();
			if ($update) {
				$this->session->set_flashdata('notif', 'success');
				$this->session->set_flashdata('notif_msg', 'Data has updated!');
			} else {
				$this->session->set_flashdata('notif', 'error');
				$this->session->set_flashdata('notif_msg', 'Data has not updated!');
			}
			redirect('category');
		}

		$this->data['category'] = $this->category_model->getdata_by_id($id);

		if (!$this->data['category']) {
			show_404();
		}

		$this->load->view('category/category_form_edit', $this->data);
	}

	// delete category.
	public function delete($id = null)
	{
		if (!isset($id)) {
			redirect('category');
		}

		$delete = $this->category_model->delete_data($id);

		if ($delete) {
			$this->session->set_flashdata('notif', 'success');
			$this->session->set_flashdata('notif_msg', 'Data has deleted!');
		} else {
			$this->session->set_flashdata('notif', 'error');
			$this->session->set_flashdata('notif_msg', 'Data has not deleted!');
		}

		redirect('category');
	}
}

/* End of file Category.php */
