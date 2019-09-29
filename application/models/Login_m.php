<?php
/**
 * Created by PhpStorm.
 * User: Randi
 * Date: 9/29/2019
 * Time: 10:27 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');
class Login_m extends CI_Model{
    private $userTable = 'user';

    public function authentication(){
        $email = $this->input->post('email');
        $pwd = sha1($this->input->post('pwd'));
        $sql =  $this->db->query("SELECT varEmail,passWord FROM user WHERE varEmail= '$email' and passWord = '$pwd'");
        if ($sql->num_rows() == 1){
            return $email;
        }
        else{
            return false;
        }
    }
}
