<?php
/**
 * Created by PhpStorm.
 * User: Randi
 * Date: 9/29/2019
 * Time: 10:27 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_m extends CI_Model
{
    private $userTable = 'user';

    public function authentication()
    {
        $email = $this->input->post('email');
        $pwd = sha1($this->input->post('pwd'));
//        $sql =  $this->db->query("SELECT varEmail FROM user WHERE varEmail= '$email' and passWord = '$pwd'");
        $query = $this->db->query("SELECT u.varEmail,r.varRole,e.varEmpFname, e.image FROM user_has_role1 uhr INNER JOIN user u ON u.intUid = uhr.user_intUid INNER JOIN role r ON r.intRoleID = uhr.role_intRoleID INNER JOIN employee e ON e.intEmpID = u.employee_intEmpID  WHERE varEmail= '$email' and passWord = '$pwd'");
//        $query = $this->db->query("SELECT u.varEmail,r.varRole,p.permission FROM user_has_role1 uhr INNER JOIN user u ON u.intUid = uhr.user_intUid INNER JOIN role r ON r.intRoleID = uhr.role_intRoleID INNER JOIN role_has_permission rhp ON rhp.role_intRoleID = r.intRoleID INNER JOIN permission p ON p.IntPermissionId = rhp.permission_IntPermissionId WHERE varEmail= '$email' and passWord = '$pwd'");
        if ($query->num_rows() == 1) {
            return $row = $query->row();
        } else {
            return false;
        }
    }
}
