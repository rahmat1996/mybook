<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public $data = [
        'tab_title' => 'Dashboard',
        'page_title' => 'Dashboard',
        'menu_active' => 'dashboard'
    ];

    public function __construct() {
        parent::__construct();

        if (!$this->ion_auth->is_admin()) {
            //show_404();
        }
        
        $this->load->model('dashboard_model');
        
    }

    public function index() {
        $this->load->view('dashboard/dashboard', $this->data);
    }

    public function test() {
        var_dump($this->dashboard_model->getLastDateBook());
    }

}

/* End of file Dashboard.php */
