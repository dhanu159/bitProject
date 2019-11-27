<?php
/**
 * Created by PhpStorm.
 * User: Randi
 * Date: 11/27/2019
 * Time: 7:52 AM
 */
class Supplier_model extends CI_Controller{
    public function addSupplierDetails (){
        $data = array(
            'varVehicleNo' => $this->input->post('vNo'),
            'intFuelCapacity' => $this->input->post('fCapacity'),
            'varDescription' => $this->input->post('description'),
            'varVehicleType' => $this->input->post('vehiType'),
            'employee_intEmpID' => $this->input->post('driverID')
        );
        $this->db->insert('supplier',$data);
        if ($this->db->affected_rows()>0){
            return true;
        }
        else{
            return false;
        }
    }
}