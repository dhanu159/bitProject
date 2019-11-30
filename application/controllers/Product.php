<?php
/**
 * Created by PhpStorm.
 * User: Randi
 * Date: 10/15/2019
 * Time: 10:59 PM
 */

class Product extends CI_Controller{
    function __construct(){
        parent:: __construct();
        $this->load->model('Product_model','p');
    }

    public function index(){
        $this->load->view('partials/header');
        $this->load->view('Product/manageProducts');
        $this->load->view('partials/footer');
    }
    public function loadProductCategories(){
        $result ='';
        $result = $this->p->loadProductCategories();
        if ($result){
            echo json_encode($result);
        }
        else{
            echo json_encode($result);
        }
    }
    public function addProduct(){
        $data = array(
            'msg'=>'',
            'status'=>false
        );
        $result = $this->p->addProductDetails();
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
    public function loadProductSupplier(){
        $result ='';
        $result = $this->p->loadProductSupplier();
        if ($result){
            echo json_encode($result);
        }
        else{
            echo json_encode($result);
        }
    }
}


