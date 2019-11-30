<?php
/**
 * Created by PhpStorm.
 * User: Randi
 * Date: 11/28/2019
 * Time: 7:07 PM
 */
class Customer_model extends CI_Model{

    public function addCustomerDetails(){
        $data = array(
            'varCFName' => $this->input->post('cName'),
            'varVNIC' => $this->input->post('cIdNo'),
            'varAddLine1' => $this->input->post('addLine1'),
            'varAddLine2' => $this->input->post('addLine2'),
            'varAddLine3' => $this->input->post('addLine3'),
            'varContactNo' => $this->input->post('contactNo'),
            'varEmail' => $this->input->post('email'),
            'description' => $this->input->post('description')
        );
        $this->db->insert('customer',$data);
        if ($this->db->affected_rows()>0){
            return true;
        }
        else{
            return false;
        }
    }
    public function viewAllCustomerDetails(){
        $query = $this->db->query("SELECT * FROM customer where cusIsActive = '1'");
        if ($query->num_rows()>0){
            return $query->result();
        }
        else{
            return false;
        }
    }
    public function deleteCustomerDetails(){
        $varCustomerId = $this->input->post('varCustomerId');
        $data = array(
            'cusIsActive' => 0
        );
        $this->db->where('intCid', $varCustomerId);
        $query = $this->db->update('customer', $data);
        if ($this->db->affected_rows()>0){
            return true;
        }
        else{
            return false;
        }
    }
    public function SelectCustomerForUpdate_M(){
        $cid = $this->input->post('cid');

        $query = $this->db->query("SELECT * FROM customer where intCid = '".$cid."'");
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
    public function updateCustomerDetails(){
        $cid = $this->input->post('cid');
        $data = array(
            'varCFName' => $this->input->post('cName'),
            'varVNIC' => $this->input->post('cIdNo'),
            'varAddLine1' => $this->input->post('addLine1'),
            'varAddLine2' => $this->input->post('addLine2'),
            'varAddLine3' => $this->input->post('addLine3'),
            'varContactNo' => $this->input->post('contactNo'),
            'varEmail' => $this->input->post('email'),
            'description' => $this->input->post('description')
        );
        $this->db->where('intCid',$cid);
        $this->db->update('customer', $data);
        if ($this->db->affected_rows()>0) {
            return true;
        }
        else{
            return false;
        }
    }

//cName+" "+cIdNo+" "+addLine1+" "+addLine2+" "+addLine3+" "+contactNo+" "+email+" "+description+" "+cid

}