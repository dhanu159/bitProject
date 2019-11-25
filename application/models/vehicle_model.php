<?php
/**
 * Created by PhpStorm.
 * User: Randi
 * Date: 11/19/2019
 * Time: 10:21 PM
 */
class vehicle_model extends CI_Model {
    public function loadDrivers(){
        $query = $this->db->query("SELECT intEmpID, varEmpFname, varEmpMName, varEmpLname FROM employee INNER JOIN jobcateogory ON intJobCategoryID=jobCateogory_intJobCategoryID WHERE varDesignation = 'Driver'");
        if ($query->num_rows()>0){
            return $query->result();
        }
        else{
            return false;
        }
    }
    public function addVehicleDetails(){
        $data = array(
            'varVehicleNo' => $this->input->post('vNo'),
            'intFuelCapacity' => $this->input->post('fCapacity'),
            'varDescription' => $this->input->post('description'),
            'employee_intEmpID' => $this->input->post('driverID')
    );
        $this->db->insert('vehicle',$data);
       if ($this->db->affected_rows()>0){
           return true;
       }
       else{
        return false;
    }
    }
    public function viewAllVehicleDetails(){
        $query = $this->db->query("select e.intEmpID,e.varEmpFname,e.varEmpMName, e.varEmpLname,v.varVehicleId,v.varVehicleNo,v.intFuelCapacity,v.varDescription from vehicle v INNER JOIN employee e ON v.employee_intEmpID = e.intEmpID WHERE varVehicleIsActive = '1'");
        if ($query->num_rows()>0){
            return $query->result();
        }
        else{
            return false;
        }
    }
    public function deleteVehicleDetails(){
        $varVehicleId = $this->input->post('varVehicleId');
        $data = array(
            'varVehicleIsActive' => 0
        );
        $this->db->where('varVehicleId', $varVehicleId);
        $query = $this->db->update('vehicle', $data);
        if ($this->db->affected_rows()>0){
            return true;
        }
        else{
            return false;
        }
    }
}
