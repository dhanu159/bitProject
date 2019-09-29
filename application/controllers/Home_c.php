<?php
/**
 * Created by PhpStorm.
 * User: Randi
 * Date: 9/29/2019
 * Time: 11:26 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');


class Home_c extends CI_Controller{
    public function index(){
        $this->load->view('partials/header');
        $this->load->view('Home_v');
        $this->load->view('partials/footer');
    }
}