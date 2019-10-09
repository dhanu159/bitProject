<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ManageUsers_c extends CI_Controller
{
    function __construct()
    {
        parent:: __construct();
        $this->load->model('ManageUsers_m','m');
    }

    public function index()
    {
        $this->load->view('partials/header');
        $this->load->view('ManageUsers_v');
        $this->load->view('partials/footer');
    }
    public function getAllUsers(){
        $result =  $this->m->getAllUsersFromM();
        echo json_encode($result);
    }
    public function loadUserNameToModel(){
        $result = $this->m->loadUserNameToModelFromM();
        echo json_encode($result);
    }
    public function addUser(){
        $result = $this->m->addUserM();
//        $msq['success'] = false;
//        if ($result){
//            $msq['success'] = true;
//        }
        echo json_encode($result);
    }
    public function selectUserToUpdate(){
        $result = $this->m->selectUserToUpdateM();
            echo json_encode($result);
    }
    public function updateUser(){
        $result = $this->m->updateUserM();
        $msg['success'] = false;
        if ($result){
            $msg['success'] = true;
        }
        echo json_encode($msg);
    }
}

/* End of file ManageUsers_cUser_c.php */
/* Location: ./application/controllers/ManageUsers_cUser_c.php */