<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class TaskModel extends CI_Model 
{
    function __construct(){
        parent::__construct();
    }

    public function delete($id){
    	$this->load->database();
    	$this->db->where('id', $id);
    	$this->db->delete('tasks');
    }

    public function listAll(){
    	$this->load->database();
        $query = $this->db->query('
            SELECT tasks.*, users.name AS user_name
            FROM tasks
            LEFT JOIN users
            ON tasks.user_id = users.id');
        
    	return $query->result_array();
    }

    public function listByUser($userId){
    	$this->load->database();
    	$this->db->select('*');
    	$this->db->from('tasks');
    	$this->db->where('user_id', $userId);
    	$query = $this->db->get();

    	return $query->result_array();
    }

    public function save($data){
        $this->load->database();
        $this->db->insert('tasks', $data);
    }

    public function selectOne($id){
        $this->load->database();
        $this->db->select('*');
        $this->db->from('tasks');
        $this->db->where('id', $id);

        $query = $this->db->get();
        return $query->row_array();
    }

    public function update($data){
    	$this->load->database();
    	$id = $data['id'];

    	$this->db->where('id', $id);
    	$this->db->update('tasks', $data);
    }

}