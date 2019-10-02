<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_c extends CI_Controller {

    function __construct()
    {
        parent:: __construct();
        $this->load->model('Admin_m','a');
    }
	public function index()
	{

		$this->load->view('partials/header');
		$this->load->view('Admin_v');
		$this->load->view('partials/footer');
	}
	public function saveJobTypes(){
        $result = $this->a->saveJobTypes();
        echo json_encode($result);
    }
    public function viewAllJobTypes(){
        $result = $this->a->viewAllJobTypes();
        echo json_encode($result);
    }
}

