<?php
/**
 * Created by PhpStorm.
 * User: Randi
 * Date: 9/29/2019
 * Time: 6:04 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_c extends CI_Controller
{
    public function index()
    {
        $this->load->view('Login_v');
    }

    public function userLogin()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email');
        $this->form_validation->set_rules('pwd', 'Password', 'trim|required|min_length[8]');

        if ($this->form_validation->run() == true) {
            $this->load->model('Login_m');
            $userInfo = $this->Login_m->authentication();

            if ($userInfo) {

                $uData = array(
                    'uEmail' => $userInfo->varEmail,
                    'uRole' => $userInfo->varRole,
                    'uName' => $userInfo->varEmpFname,
                    'uImage' => $userInfo->image
//                    'uPermission'=>$userInfo->permission
                );

                $this->load->library('session');
                $this->session->set_userdata($uData);

//                print_r($this->session->set_userdata($uData));
                if (isset($this->session->userdata['uRole'])){
                    $this->load->view('partials/header');
                    $this->load->view('Home_v');
                    $this->load->view('partials/footer');
                }

            }
            else {
                $this->session->set_flashdata('flashError', 'Invalid User Name or Password.');
                $this->load->view('Login_v');
//                should pass msg to view user not exits

            }
        } else {
            $this->load->view('Login_v');

        }
    }

    public function logOut()
    {
        session_destroy();
        header('Location:' .base_url('index.php/Login_c/index'));

    }
}