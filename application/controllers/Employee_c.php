<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 9/30/2019
 * Time: 8:51 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');
class Employee_c extends CI_Controller{
    public function index(){
        $this->load->view('partials/header');
        $this->load->view('Employee_v');
        $this->load->view('partials/footer');
    }
}