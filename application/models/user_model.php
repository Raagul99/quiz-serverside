<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	
	 
	public function store($data){
		$this->db->insert('user',$data);
		return true;
	}
	

	public function getUser($email){
		return $this->db->where('email',$email)->get('user')->row();
	}


	public function getHistory($uid){

		// $this->db->select('*');    
		// $this->db->from('table1');
		// $this->db->join('table2', 'table1.id = table2.id');
		// $this->db->join('table3', 'table1.id = table3.id');
		// $query = $this->db->get();


		$this->db->select('*');    
		$this->db->from('quiz_history');
		// $this->db->join('user', 'quiz_history.user_id = user.user_id', 'inner');
		$this->db->join('quiz', 'quiz_history.quiz_id = quiz.quiz_id', 'inner');
		$this->db->where('user_id',$uid);
		return $this->db->get();
	}
}
