<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class user_c extends CI_Controller
{
    function __construct()
    {
        parent:: __construct();
        $this->load->model('user_m','m');
    }

    public function index()
    {
        $this->load->view('partials/header');
        $this->load->view('user_view');
        $this->load->view('partials/footer');
    }
    public function getAllUsers(){
        $result =  $this->m->getAllUsersFromM();
        echo json_encode($result);
    }
    public function addUser(){
        $result = $this->m->addUserM();
        $msq['success'] = false;
        if ($result){
            $msq['success'] = true;
        }
        echo json_encode($msq);
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

/* End of file user_c.php */
/* Location: ./application/controllers/user_c.php */