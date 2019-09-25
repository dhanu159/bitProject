<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin_con extends CI_Controller {

	public function addJobCategories()
	{
		// $this->load->view('partials/header');
		// $this->load->view('addJobCategories_view');
		// $this->load->view('partials/footer');

		$this->load->view('partials/header');
		$this->load->view('addJobCategories_view');
		$this->load->view('partials/footer');
	}
	public function saveJobCategories(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('jobType','Job Type','required|min_length[4]|max_length[100]|callback_Alpha_Spaces');
		if ($this->form_validation->run()==false){
			$this->load->model('admin_model'); 
			$data["fetch_data"] = $this->admin_model->fetch_data();
			$this->load->view('partials/header');
			$this->load->view('addJobCategories_view', $data);
			$this->load->view('partials/footer');
		}
		else{
			$this->load->model('admin_model');
			$response = $this->admin_model->insertJobType();
			if ($response) {
				$this->session->set_flashdata('msg','Data entered sucessfully');
				// redirect('admin_con/viewJobCategories');
				redirect('admin_con/addJobCategories');
			}
		}
	}
	public function Alpha_Spaces($str){
		if (!preg_match("/^([a-zA-Z ])+$/i", $str)) {
			$this->form_validation->set_message('Alpha_Spaces','The Job Type field can only contain letters');
			return false;
		}
		else{
			return true;
		}
	}
	public function viewJobCategories()
	{
		$this->load->model('admin_model'); 
		$data["fetch_data"] = $this->admin_model->fetch_data();

		$this->load->view('partials/header');
		$this->load->view('addJobCategories_view', $data);
		$this->load->view('partials/footer');
	}
	public function deleteJobType($id){
		$this->load->model('admin_model');
		$response = $this->admin_model->deleteJobType($id);
		if ($response) {
			$this->session->set_flashdata('msg','Record Deleted Successfully');
			redirect('admin_con/viewJobCategories');
		}
	}
	public function Update($id,$name){
		echo $id.$name;
	}
}

