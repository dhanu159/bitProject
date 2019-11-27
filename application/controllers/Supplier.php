<?php
/**
 * Created by PhpStorm.
 * User: Randi
 * Date: 11/26/2019
 * Time: 11:15 PM
 */
class Supplier extends CI_Controller{
    function __construct(){
        parent:: __construct();
        $this->load->model('Supplier_model','s');
    }

    public function index(){
        $this->load->view('partials/header');
        $this->load->view('Supplier/manageSupplier');
        $this->load->view('partials/footer');
    }
    public function addSupplier(){
        $data = array(
            'msg'=>'',
            'status'=>false
        );
        $result = $this->s->addSupplierDetails();
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
    public function viewSupplierDetails(){
        $result ='';
        $result = $this->s->viewAllSupplierDetails();
        if ($result){
            echo json_encode($result);
        }
        else{
            echo json_encode($result);
        }
    }
    public function deleteSupplierDetails(){
        $data = array(
            'msg'=>'',
            'status'=>false
        );
        $result = $this->s->deleteSupplierDetails();
        if ($result){
            $data['msg']='Record deleted successfully!';
            $data['status']=true;
        }
        else{
            $data['msg']='Record not deleted!';
        }
        echo json_encode($data);
    }
    public function SelectSupplerForUpdate(){
        $result ='';
        $result = $this->s->SelectSupplerForUpdate_M();
        if ($result){
            echo json_encode($result);
        }
        else{
            echo json_encode($result);
        }
    }
    public function updateSupplier(){
        $data = array(
            'msg'=>'',
            'status'=>false
        );
        $result = $this->s->updateSupplierDetails();
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