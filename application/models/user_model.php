<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	// Store user data into the database
	public function store($data) {
		$this->db->insert('user', $data);
		return true;
	}

	// Get user data by email
	public function getUser($email) {
		return $this->db->where('email', $email)->get('user')->row();
	}

	// Get user's quiz history
	public function getHistory($uid) {
		$this->db->select('*');    
		$this->db->from('quiz_history');
		$this->db->join('quiz', 'quiz_history.quiz_id = quiz.quiz_id', 'inner');
		$this->db->where('user_id', $uid);
		return $this->db->get();
	}
}
?>
