<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Quiz_model extends CI_Model {

	// Retrieve all quizzes
	public function getQuiz() {
		return $this->db->get('quiz');
	}

	// Insert quiz details into database
	public function insertQuiz($quiz_topic, $quiz_difficulty, $quiz_scoringsystem) {
		$this->db->set('quiz_topic', $quiz_topic);
		$this->db->set('quiz_difficulty', $quiz_difficulty);
		$this->db->set('quiz_scoringsystem', $quiz_scoringsystem);
		$this->db->insert('quiz');
	}

	// Insert question into database
	public function insertQuestion($quiz_id, $q_num, $question_text, $question_option_1, $question_option_2, $question_option_3, $question_answer) {	
		$this->db->set('quiz_id', $quiz_id);
		$this->db->set('q_num', $q_num);
		$this->db->set('question_text', $question_text);
		$this->db->set('question_option_1', $question_option_1);
		$this->db->set('question_option_2', $question_option_2);
		$this->db->set('question_option_3', $question_option_3);
		$this->db->set('question_answer', $question_answer);
		$this->db->insert('questions');
	}

	// Get review data for a particular quiz
	public function getReviewData($quiz_id) {
		$this->db->select('*');    
		$this->db->from('quiz_review');
		$this->db->join('user', 'quiz_review.user_id = user.user_id', 'inner');
		$this->db->where('quiz_id', $quiz_id);
		return $this->db->get();
	}

	// Get the last quiz ID
	public function getLastID() {
		return $this->db->select('quiz_id')->order_by('quiz_id', "desc")->limit(1)->get('quiz')->row();
	}

	// Get questions for a particular quiz
	public function getQuestions($quiz_id) {
		$this->db->select("q_num, question_id, question_text, question_option_1, question_option_2, question_option_3, question_answer");
		$this->db->from("questions");
		$this->db->where('quiz_id', $quiz_id);
		$query = $this->db->get();
		return $query->result();
	}

	// Insert quiz history into database
	public function insertScore($user_id, $quiz_id, $score) {
		$this->db->set('user_id', $user_id);
		$this->db->set('quiz_id', $quiz_id);
		$this->db->set('score', $score);
		$this->db->insert('quiz_history');
	}

	// Insert review into database
	public function insertReview($user_id, $quiz_id, $review, $rating) {
		$this->db->set('user_id', $user_id);
		$this->db->set('quiz_id', $quiz_id);
		$this->db->set('review', $review);
		$this->db->set('rating', $rating);
		$this->db->insert('quiz_review');
	}
}
?>
