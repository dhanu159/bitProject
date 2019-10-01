<?php
/**
 * Created by PhpStorm.
 * User: Randi
 * Date: 9/29/2019
 * Time: 6:04 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_c extends CI_Controller{
    public function index(){
        $this->load->view('Login_v');
    }
    public function userLogin()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email');
        $this->form_validation->set_rules('pwd','Password','trim|required|min_length[8]');

        if ($this->form_validation->run() == true) {
            $this->load->model('Login_m');
            $result =$this->Login_m->authentication();
            if ($result){

                $this->load->library('session');
                $this->session->set_userdata('user',$result);

               if (isset($_SESSION['user'])){
                   $add = base_url('index.php/Home_c/index');
                   header('Location: '.$add);
               }

            }
            else{
                $this->session->set_flashdata('flashError', 'Invalid User Name or Password.');
                $this->load->view('Login_v');
//                should pass msg to view user not exits

            }
        }
        else{
            $this->load->view('Login_v');

        }
    }
    public function logOut(){
        $this->session->unset_userdata('user');
        $add = base_url('index.php/Login_c/index');
        header('Location:'.$add);
    }
}