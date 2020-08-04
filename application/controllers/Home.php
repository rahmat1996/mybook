<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

	private $per_page = 12;

	public function __construct()
	{
		parent::__construct();
		$this->load->model('home_model');
		$this->load->helper('download');
		$this->load->library('pagination');
	}

	public function index()
	{
		$this->load->view('home/home');
	}

	public function page()
	{
		// check total data if used search or not.
		if (empty($this->input->get('search')) || is_null($this->input->get('search'))) {
			$total_data = $this->home_model->count_all();
		} else {
			$total_data = $this->home_model->count_all($this->input->get('search'));
		}

		// pagination config and initialise.
		$config['base_url'] = base_url() . 'home/page/';
		$config['total_rows'] = $total_data;
		$config['per_page'] = $this->per_page;
		$config['display_pages'] = FALSE;
		$config['use_page_numbers'] = FALSE;
		$config['first_link'] = FALSE; // FALSE because use scroll infinite to show page.
		$config['last_link'] = FALSE; // FALSE because use scroll infinite to show page.
		$config['prev_link'] = FALSE; // FALSE because use scroll infinite to show page.
		$config['reuse_query_string'] = TRUE;
		$config['attributes'] = array('class' => 'next');
		$this->pagination->initialize($config);

		$from = $this->uri->segment(3);

		// check get data if used search or not.
		if (empty($this->input->get('search')) || is_null($this->input->get('search'))) {
			$data['books'] = $this->home_model->get_data($this->per_page, $from);
		} else {
			$data['books'] = $this->home_model->get_data($this->per_page, $from, $this->input->get('search'));
		}

		$this->load->view('home/page', $data);
	}

	public function download($id)
	{
		$data = $this->home_model->get_by_id($id);
		$dir = 'directory';
		$path = file_get_contents(base_url() . $dir . '/' . $data->book_id . '/' . $data->book_file);
		force_download($data->book_title . '.pdf', $path);
	}

	public function about(){
		$this->load->view('home/about');
	}

}
