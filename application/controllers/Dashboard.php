<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public $data = [
		'tab_title' => 'Dashboard',
		'page_title' => 'Dashboard',
		'menu_active' => 'dashboard'
	];

	public function __construct()
	{
		parent::__construct();

		if(!$this->ion_auth->is_admin()){
			show_404();
		}

	}

	public function index()
	{
		$this->load->view('dashboard/dashboard',$this->data);
	}

}

/* End of file Dashboard.php */
