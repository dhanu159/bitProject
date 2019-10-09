<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 10/1/2019
 * Time: 8:04 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class ManageJobTypes_m extends CI_Model
{
    private $jobCategory_Table = 'jobcateogory';

    public function saveJobTypes()
    {
        $result = array(
            'msg' => '',
            'status' => false
        );
        $data = array(
            'varJobCategoryName' => $this->input->post('jobCategoryName'),
            'varDesignation' => $this->input->post('designation')
        );
        $varJobCategoryName = $data['varJobCategoryName'];
        $varDesignation = $data['varDesignation'];
        $query = $this->db->query("SELECT * FROM $this->jobCategory_Table WHERE varJobCategoryName ='$varJobCategoryName' AND varDesignation = '$varDesignation'");
        if ($query->num_rows() < 1) {
            $this->db->insert($this->jobCategory_Table, $data);
            if ($this->db->affected_rows() > 0) {
                $result['msg'] = 'Record added successfully';
                $result['status'] = true;
            } else {
                $result['msg'] = 'Failed to save record sql error';
            }
        } else {
            $result['msg'] = 'Job Category and Designation Already Added';
        }
        return $result;
    }

    public function viewAllJobTypes(){

        $query =  $this->db->get($this->jobCategory_Table);
        if ($query->num_rows()>0){
            return $query->result();
        }
        else{
            return false;
        }
    }
}