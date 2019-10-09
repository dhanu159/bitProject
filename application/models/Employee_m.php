<?php
/**
 * Created by PhpStorm.
 * User: Randi
 * Date: 10/7/2019
 * Time: 8:50 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee_m extends CI_Model
{
    private $empTb = 'employee';
    public function saveEmployee_m()
    {
        $data = array(
            'varEmpFname' => $this->input->post('fName'),
            'varEmpMname' => $this->input->post('mName'),
            'varEmpLname' => $this->input->post('lName'),
            'varEmpNIC' => $this->input->post('nicNo'),
            'varDrivingLisenceNo' => $this->input->post('drivingLicenseNo'),
            'varEmpAddL1' => $this->input->post('addL1'),
            'varEmpAddL2' => $this->input->post('addL2'),
            'varEmpAddL3' => $this->input->post('addL3'),
            'varEmpContactNoM' => $this->input->post('contactNumberM'),
            'varEmpContactNoH' => $this->input->post('contactNumberH'),
            'gender' => $this->input->post('gender'),
            'image' => $this->input->post('empImage'),
            'dateJoinedDate' => $this->input->post('joinDate'),
            'varDescription' => $this->input->post('description'),
            'jobCateogory_intJobCategoryID' => '1'
        );
        $query = $this->db->get_where($this->empTb, array('varEmpNIC' => $data['varEmpNIC']));
        if ($query->num_rows() > 0){
            return false;
        }
        else{
            return true;
        }
    }
}