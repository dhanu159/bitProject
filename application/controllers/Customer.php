<?php
/**
 * Created by PhpStorm.
 * User: Randi
 * Date: 09/20/2019
 * Time: 6:55 PM
 */
class Customer extends CI_Controller{
    function __construct(){
        parent:: __construct();
        $this->load->model('Customer_model','c');
    }

    public function index(){
            $this->load->view('partials/header');
            $this->load->view('Customer/manageCustomer');
            $this->load->view('partials/footer');
    }
    public function addCustomer(){
        $data = array(
            'msg'=>'',
            'status'=>false
        );
        $result = $this->c->addCustomerDetails();
        if ($result){
            $data['msg']='sucess fully saved';
            $data['status']=true;
            echo json_encode($data);
        }
        else{
            $data['msg']='Record not saved';
            echo json_encode($data);
        }
    }
    public function viewCustomerDetails(){
        $result ='';
        $result = $this->c->viewAllCustomerDetails();
        if ($result){
            echo json_encode($result);
        }
        else{
            echo json_encode($result);
        }
    }
    public function deleteCustomerDetails(){
        $data = array(
            'msg'=>'',
            'status'=>false
        );
        $result = $this->c->deleteCustomerDetails();
        if ($result){
            $data['msg']='Record deleted successfully!';
            $data['status']=true;
        }
        else{
            $data['msg']='Record not deleted!';
        }
        echo json_encode($data);
    }
    public function SelectCustomerForUpdate(){
        $result ='';
        $result = $this->c->SelectCustomerForUpdate_M();
        if ($result){
            echo json_encode($result);
        }
        else{
            echo json_encode($result);
        }
    }
    public function updateCustomer(){
        $data = array(
            'msg'=>'',
            'status'=>false
        );
        $result = $this->c->updateCustomerDetails();
        if ($result){
            $data['msg'] = 'Record updated successfully!';
            $data['status']=true;
        }
        else{
            $data['msg'] = 'Failed to update vehicle details!';
        }
        echo json_encode($data);
    }

}