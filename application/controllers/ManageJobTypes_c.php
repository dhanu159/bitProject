<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ManageJobTypes_c extends CI_Controller {

    function __construct()
    {
        parent:: __construct();
        $this->load->model('ManageJobTypes_m','m');
    }
	public function index()
	{

		$this->load->view('partials/header');
		$this->load->view('ManageJobTypes_v');
		$this->load->view('partials/footer');
	}
	public function saveJobTypes(){
        $result = $this->m->saveJobTypes();
        echo json_encode($result);
    }
    public function viewAllJobTypes(){
        $result = $this->m->viewAllJobTypes();
        echo json_encode($result);
    }
}

