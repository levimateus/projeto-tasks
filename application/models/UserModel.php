<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class UserModel extends CI_Model
{
    public function authenticate($email, $password){
        if (empty($email) || empty($password)) {
            return false;
        }

        $this->load->database();
        $this->db->select('id, name');
        $this->db->from('users');
        $this->db->where('email', $email);
        $this->db->where('password', md5($password));
        $query = $this->db->get();
        
        if ($query->num_rows() == 1) {
            $user = $query->row();
            return array('id' => $user->id, 'name' => $user->name);
        } else {
            return false;
        }
    }

    public function save($data){
        $this->load->database();
        $data['password'] = md5($data['password']);
        $this->db->insert('users', $data);
    }

}