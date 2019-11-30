<?php

/**
 * Created by PhpStorm.
 * User: Randi
 * Date: 10/7/2019
 * Time: 8:50 PM
 */
defined('BASEPATH') or exit('No direct script access allowed');

class Employee_m extends CI_Model
{
    private $empTb = 'employee';

    public function LoadJobCategoriesAndDesignationsFormM()
    {
        $query = $this->db->get('jobcateogory');
        if ($query) {
            return $query->result();
        } else {
            return false;
        }
    }
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
            'image' => $this->input->post('nicNo') . '_' . $_FILES['empImage']['name'],
            'dateJoinedDate' => $this->input->post('joinDate'),
            'varDescription' => $this->input->post('description'),
            'jobCateogory_intJobCategoryID' => $this->input->post('designation')
        );
        $query = $this->db->get_where($this->empTb, array('varEmpNIC' => $data['varEmpNIC']));
        if ($query->num_rows() > 0) {
            return false;
        } else {
            $this->db->insert($this->empTb, $data);
            return true;
        }
    }
    public function getAllEmpolyeesFromM()
    {
        // $query = $this->db->get('employee');
        $query = $this->db->get_where($this->empTb, array('empIsActive' => '1'));
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
    public function deleteEmployeeM()
    {
        $empId = $this->input->post('empID');
        $data = array(
            'empIsActive' => 0
        );
        $this->db->where('intEmpID', $empId);
        $query = $this->db->update($this->empTb, $data);
        return true;
    }
    public function selectUserForUpdate($empID)
    {
        $this->db->where('intEmpID', $empID);
        $query = $this->db->get($this->empTb);
        if ($query->num_rows() > 0) {
            return $row = $query->row_array();
        } else return false;
    }
    public function updateEmpM($updateWithoutImage){
        $empID = $this->input->post('empID');
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
            'image' => $this->input->post('nicNo') . '_' . $_FILES['empImage']['name'],
            'dateJoinedDate' => $this->input->post('joinDate'),
            'varDescription' => $this->input->post('description'),
            'jobCateogory_intJobCategoryID' => $this->input->post('designation')
        );
        if ($updateWithoutImage) {
            // echo 'without image';
            unset($data['image']);
            // print_r($data);
        }
        // else{
        // echo 'with image';
        // print_r($data);
        // }
        $this->db->where('intEmpID', $empID);
        $this->db->update($this->empTb, $data);
        if ($this->db->affected_rows()>0) {
            return true;
        }
        else{
            return false;
        }

        // echo "</br>";
        // unset($data['image']);
        // print_r($data);
    }
}
