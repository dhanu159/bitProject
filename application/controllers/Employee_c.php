<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 9/30/2019
 * Time: 8:51 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');
class Employee_c extends CI_Controller{
    function __construct()
    {
        parent:: __construct();
        $this->load->model('Employee_m','E');
    }
    public function index(){
        $this->load->view('partials/header');
        $this->load->view('Employee_v');
        $this->load->view('partials/footer');
    }
    public function saveEmployee_c(){
//        $response ="";
//        $msg = "";
//        $response = array(
//            'status'=>'',
//            'msg' =>''
//        );
        $this->load->library('form_validation');
        $this->form_validation->set_rules('fName','First Name','required|alpha');
        $this->form_validation->set_rules('mName','Middle Name','required|alpha');
        $this->form_validation->set_rules('lName','Last Name','required|alpha');
        $this->form_validation->set_rules('nicNo','NIC No','required');
        $this->form_validation->set_rules('addL1','Address Line 1','required');
        $this->form_validation->set_rules('addL2','Address Line 2','required');
        $this->form_validation->set_rules('addL3','Address Line 3','required');
        $this->form_validation->set_rules('contactNumberM','Contact No Mobile','required|numeric|exact_length[10]');
        $this->form_validation->set_rules('contactNumberH','Contact No Home','numeric|exact_length[10]');
        $this->form_validation->set_rules('joinDate','Join Date','required');
        $this->form_validation->set_rules('description','Description','alpha_numeric_spaces');
        $this->form_validation->set_rules('empImage','Employee Image','required');


        if ($this->form_validation->run()==false){
            $this->load->view('partials/header');
            $this->load->view('Employee_v');
            $this->load->view('partials/footer');
        }
        else{
            $result = $this->E->saveEmployee_m();

            $this->session->set_flashdata('flashError','');
            $this->session->set_flashdata('flashSuccess','');

            if (!$result){
                $this->session->set_flashdata('flashError', 'Employee already added!');

            }
            else{
                $this->session->set_flashdata('flashSuccess', 'Employee added successfully !');
            }
            $this->load->view('partials/header');
            $this->load->view('Employee_v');
            $this->load->view('partials/footer');

        }
    }
}