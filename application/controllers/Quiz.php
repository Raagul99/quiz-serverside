<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Quiz extends CI_Controller {

	function __construct(){
		parent:: __construct();
		$this->load->database();
		$this->load->model('quiz_model');
		$this->load->helper('url');
		$this->load->library('session');
	}
	
	// Redirect to viewQuizTopic
	public function index() {
		redirect('quiz/viewQuizTopic');
	}

	// Retrieve quiz data for DataTables
	public function quiz_data() {
		$draw = $this->input->get('draw');
		$start = $this->input->get('start');
		$length = $this->input->get('length');

		$quizzes = $this->quiz_model->getQuiz();
		$data = array();
		foreach($quizzes->result() as $quiz) {
			$data[] = array(
				$quiz->quiz_id,
				$quiz->quiz_topic,
				$quiz->quiz_difficulty,
				$quiz->quiz_scoringsystem
			);
		}

		$output = array(
			'draw' => $draw,
			'recordsTotal' => $quizzes->num_rows(),
			'recordsFiltered' => $quizzes->num_rows(),
			'data' => $data
		);

		echo json_encode($output);
		exit();
	}

	// Set quiz_id in session and redirect to viewReview
	public function getReview() {
		$quiz_id = $this->input->post('quiz_id');
		$new_data = array(
			'quiz_id' => $quiz_id
		);
		$this->session->set_userdata($new_data);
		redirect('quiz/viewReview');
	}

	// Retrieve review data for DataTables
	public function viewreviewData() {
		$draw = $this->input->get('draw');
		$start = $this->input->get('start');
		$length = $this->input->get('length');
		$quiz_id = $this->session->quiz_id;
		$reviews = $this->quiz_model->getReviewData($quiz_id);
		$data = array();
		foreach($reviews->result() as $review) {
			$data[] = array(
				$review->user_name,
				$review->rating,
				$review->review
			);
		}

		$output = array(
			'draw' => $draw,
			'recordsTotal' => $reviews->num_rows(),
			'recordsFiltered' => $reviews->num_rows(),
			'data' => $data
		);

		echo json_encode($output);
		exit();
	}

	// Load review_view
	public function viewReview() {
		$this->load->view('review_view');
	}

	// Insert quiz details into database
	public function addQuiz() {
		$quiz_topic = $this->input->post('quiz_topic');
		$quiz_difficulty = $this->input->post('quiz_difficulty');
		$quiz_scoringsystem = $this->input->post('quiz_scoringsystem');
		
		$data = $this->quiz_model->insertQuiz($quiz_topic, $quiz_difficulty, $quiz_scoringsystem);
		echo json_encode($data);
	}

	// Insert questions into database
	public function addQuestion() {
		$id = $this->input->post('quiz_id');
		$q_num = $this->input->post('q_num');
		$quiz_id = intval($id);
		$question_text = $this->input->post('question_text');
		$question_option_1 = $this->input->post('question_option_1');
		$question_option_2 = $this->input->post('question_option_2');
		$question_option_3 = $this->input->post('question_option_3');
		$question_answer = $this->input->post('question_answer');

		$data = $this->quiz_model->insertQuestion($quiz_id, $q_num, $question_text, $question_option_1, $question_option_2, $question_option_3, $question_answer);
		echo json_encode($data);
	}

	// Load quiz_display
	public function viewQuizTopic() {
		$this->load->view('quiz_display');
	}

	// Load quiz_add_display
	public function viewAddQuiz() {
		$this->load->view('quiz_add_display');
	}

	// Load quiz_add_questions with last quiz_id
	public function viewAddQuestion() {
		$last_id = $this->quiz_model->getLastID();
		$new_data = array(
			'last_id' => $last_id->quiz_id
		);
		$this->session->set_userdata($new_data);
		$this->load->view('quiz_add_questions');
	}

	// Load play_quiz with questions
	public function quizDisplay() {
		$quiz_id = $this->session->quiz_id;
		$this->data['questions'] = $this->quiz_model->getQuestions($quiz_id);
		$this->load->view('play_quiz', $this->data);
	}

	// Load result_display with results
	public function resultsDisplay() {
		$quiz_id = $this->session->quiz_id;
		$this->data['checks'] = array(
			'ques1' => $this->input->post('questionID1'),
			'ques2' => $this->input->post('questionID2'),
			'ques3' => $this->input->post('questionID3'),
			'ques4' => $this->input->post('questionID4'),
			'ques5' => $this->input->post('questionID5'),
			'ques6' => $this->input->post('questionID6'),
			'ques7' => $this->input->post('questionID7'),
			'ques8' => $this->input->post('questionID8'),
			'ques9' => $this->input->post('questionID9'),
			'ques10' => $this->input->post('questionID10'),
	   );
	   $this->load->model('quiz_model');
	   $this->data['results'] = $this->quiz_model->getQuestions($quiz_id);
	   $this->load->view('result_display', $this->data);
	}

	// Insert quiz history into database and redirect to addReviewView
	public function addHistory() {
		$user_id = $this->session->id;
		$quiz_id = $this->session->quiz_id;
		$score = $this->input->post('score');
		$this->load->model('quiz_model');
		$this->quiz_model->insertScore($user_id, $quiz_id, $score);
		redirect('quiz/addReviewView');
	}

	// Load add_review
	public function addReviewView() {
		$this->load->view('add_review');
	}

	// Insert review into database and redirect to user/history
	public function addReview() {
		$user_id = $this->session->id;
		$quiz_id = $this->session->quiz_id;
		$review = $this->input->post('review');
		$rating = $this->input->post('rating');
		$this->load->model('quiz_model');
		$this->quiz_model->insertReview($user_id, $quiz_id, $review, $rating);
		redirect('user/history');
	}
}

?>
