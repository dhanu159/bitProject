<?php
/**
 * Created by PhpStorm.
 * User: Randi
 * Date: 11/26/2019
 * Time: 9:45 PM
 */
class Inventory extends CI_Controller{
    public function index(){
        $this->load->view('partials/header');
        $this->load->view('MainInventory/manageInventory');
        $this->load->view('partials/footer');
    }
}