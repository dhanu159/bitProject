<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class user_m extends CI_Model {
    private $table_name = 'user2';
    public function getAllUsersFromM(){

        $query = $this->db->get($this->table_name);

        if ($query->num_rows() > 0){
            return $query->result();
        }
        else{
            return false;
        }

    }
    public function addUserM(){
        $data = array(
            'name' =>$this->input->post('userName')
        );
        $this->db->insert($this->table_name,$data);
        if ($this->db->affected_rows()>0){
            return true;
        }
        else{
            return false;
        }
    }
    public function selectUserToUpdateM(){
        $id = $this->input->post('id');
        $this->db->where('id',$id);
        $query = $this->db->get($this->table_name);
        if ($query->num_rows() > 0){
            return $query->row();
        }
        else{
            return false;
        }
    }
    public function updateUserM(){
        $id = $this->input->post('id');
        $data = array(
          'name'=>$this->input->post('userName')
        );
        $this->db->where('id',$id);
        $this->db->update($this->table_name,$data);
        if ($this->db->affected_rows() > 0){
            return true;
        }
        else{
            return false;
        }

    }
}

/* End of file user_m.php */
/* Location: ./application/models/user_m.php */