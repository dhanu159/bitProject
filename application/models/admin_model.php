<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin_model extends CI_Model {

	
	function insertJobType()
	{
		$data=array(
		
			'varJobCategoryName'=> $this->input->post('jobType',TRUE)
			);
		return $this->db->insert('jobcateogory',$data);
		// $this->load->view('addEmployee_view');
	}
	function fetch_data(){
		$query = $this->db->get("jobcateogory");
		return $query;

	}
	function deleteJobType($recordId){
		return $this->db->delete('jobcateogory',array('intJobCategoryID'=>$recordId));
		// echo $recordId;
	}

}

/* End of file admin_model.php */
/* Location: ./application/models/admin_model.php */