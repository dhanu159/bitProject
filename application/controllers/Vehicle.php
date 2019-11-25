<?php

class vehicle extends CI_Controller{
    function __construct(){
        parent:: __construct();
        $this->load->model('vehicle_model','v');
    }

    public function index(){
        $this->load->view('partials/header');
        $this->load->view('vehicle/ManageVehicles');
        $this->load->view('partials/footer');
    }

    public function loadUserNameOfDriver(){
        $result = $this->v->loadDrivers();
        if ($result){
            echo json_encode($result);
        }
        else{
            echo json_encode('Failed to load driver names');
        }
    }

    public function addVehicle(){
        $data = array(
            'msg'=>'',
            'status'=>false
        );
        $result = $this->v->addVehicleDetails();
        if ($result){
            $data['msg']='sucess fully saved';
            $data['status']=true;
            echo json_encode($data);
        }
        else{
            $data['msg']='sucess fully saved';
            echo json_encode($data);
        }
    }
    public function viewVehicleDetails(){
        $result ='';
        $result = $this->v->viewAllVehicleDetails();
        if ($result){
            echo json_encode($result);
        }
        else{
            echo json_encode($result);
        }
    }
    public function deleteVehicleDetails(){
        $data = array(
            'msg'=>'',
            'status'=>false
        );
        $result = $this->v->deleteVehicleDetails();
        if ($result){
            $data['msg']='Record deleted successfully!';
            $data['status']=true;
        }
        else{
            $data['msg']='Record not deleted!';
        }
        echo json_encode($data);
    }

}
?>