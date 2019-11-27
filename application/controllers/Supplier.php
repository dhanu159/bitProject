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
}