<?php
/**
 * Created by PhpStorm.
 * User: Randi
 * Date: 11/27/2019
 * Time: 7:52 AM
 */
class Supplier_model extends CI_Model {
    public function addSupplierDetails (){
        $data = array(
            'varVName' => $this->input->post('sName'),
            'varAddLine1' => $this->input->post('addLine1'),
            'varAddLine2' => $this->input->post('addLine2'),
            'varAddLine3' => $this->input->post('addLine3'),
            'varContactNo' => $this->input->post('contactNo'),
            'varEmaiAdd' => $this->input->post('email'),
            'varDescription' => $this->input->post('description')
        );
        $this->db->insert('supplier',$data);
        if ($this->db->affected_rows()>0){
            return true;
        }
        else{
            return false;
        }
    }
    public function viewAllSupplierDetails(){
        $query = $this->db->query("SELECT * FROM supplier where isActive = '1'");
        if ($query->num_rows()>0){
            return $query->result();
        }
        else{
            return false;
        }
    }
    public function deleteSupplierDetails(){
        $varSupplierId = $this->input->post('varSupplierId');
        $data = array(
            'isActive' => 0
        );
        $this->db->where('intVendorID', $varSupplierId);
        $query = $this->db->update('supplier', $data);
        if ($this->db->affected_rows()>0){
            return true;
        }
        else{
            return false;
        }
    }
    public function SelectSupplerForUpdate_M(){
        $sid = $this->input->post('sid');

        $query = $this->db->query("SELECT * FROM supplier where intVendorID = '".$sid."'");
        if ($query->num_rows()>0){
            foreach ($query->result() as $row)
            {
                return $row;
            }
        }
        else{
            return false;
        }
    }
    public function updateSupplierDetails(){
        $sid = $this->input->post('sid');
        $data = array(
            'varVName' => $this->input->post('sName'),
            'varAddLine1' => $this->input->post('addLine1'),
            'varAddLine2' => $this->input->post('addLine2'),
            'varAddLine3' => $this->input->post('addLine3'),
            'varContactNo' => $this->input->post('contactNo'),
            'varEmaiAdd' => $this->input->post('email'),
            'varDescription' => $this->input->post('description')
        );
        $this->db->where('intVendorID',$sid);
        $this->db->update('supplier', $data);
        if ($this->db->affected_rows()>0) {
            return true;
        }
        else{
            return false;
        }
    }
}