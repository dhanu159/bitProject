<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_m extends CI_Model {
    private $user_table= 'user';
    private $member_table = 'employee';

    public function getAllUsersFromM(){
//      $query = $this->db->get($this->table_name);
        $query = $this->db->query("SELECT varEmpFname,varEmpMName,varEmpLname,varEmail,intUid  FROM $this->user_table INNER JOIN $this->member_table ON $this->user_table.employee_intEmpID = $this->member_table.	intEmpID   WHERE isActive = '1' ORDER BY intUid DESC");
        if ($query->num_rows() > 0){
            return $query->result();
        }
        else{
            return false;
        }
    }
    public function loadUserNameToModelFromM(){
        $query = $this->db->query("SELECT intEmpID,varEmpFname,varEmpMName,varEmpLname FROM $this->member_table WHERE empIsActive='1'");
        if ($query->num_rows() >0){
            return $query->result();
        }
        else{
            return false;
        }
    }

    public function addUserM(){
        $result =array(
            'msg'=>'',
            'status'=>false
        );
        $data = array(
            'passWord' =>sha1($this->input->post('pwd')),
            'varEmail' =>$this->input->post('email'),
            'employee_intEmpID'=>$this->input->post('id'),
            'dateCreatedDate'=>date('Y-m-d'),
            'intCreatedBy'=>(10)
        );
        $email = $data['varEmail'];
        $query = $this->db->query("SELECT * FROM $this->user_table WHERE varEmail = '$email'");

        if ($query->num_rows()<1){
            $this->db->insert($this->user_table,$data);
            if ($this->db->affected_rows()>0){
                $result['msg'] = 'Record added successfully';
                $result['status'] = true;
            }
            else{
                $result['msg'] = 'Failed to save record sql error';
            }
        }
        else{
            $result['msg'] = 'User already exist';
        }
        return $result;
    }

    public function selectUserToUpdateM(){
        $id = $this->input->post('id');
        $this->db->where('intUid',$id);
        $query = $this->db->get($this->table_name);
        if ($query->num_rows() > 0){
            return $query->row();
        }
        else{
            return false;
        }
    }
    public function updateUserM(){
        $email = $this->input->post('email');
        $data = array(
          'userName'=>$this->input->post('userName')
        );
        $this->db->where('varEmail',$email);
        $this->db->update($this->table_name,$data);
//      $this->db->query("DELETE FROM user WHERE varEmail = '$email '");

        if ($this->db->affected_rows() > 0){
            return true;
        }
        else{
            return flase;
        }

    }
}

/* End of file user_m.php */
/* Location: ./application/models/user_m.php */