<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    function __construct() {
        parent::__construct();
        // Load required libraries and helper
        $this->load->database();
        $this->load->model('user_model');
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->library('session');
    }

    // Method to load signup form
    public function signup() {
        $this->load->view('signup_form');
    }

    // Method to submit signup form
    public function submit_signup() {
        // Form validation rules
        $this->form_validation->set_rules('user_name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[user.email]', array('is_unique' => 'This email address is already registered.'));
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');

        // Check if form validation passed
        if ($this->form_validation->run() == FALSE) {
            // If validation failed, return error messages as JSON response
            $response = array(
                'status' => 'error',
                'message' => validation_errors()
            );
        } else {
            // If validation passed, proceed with form submission
            $data['user_name'] = $this->input->post('user_name');
            $data['email'] = $this->input->post('email');
            $data['password'] = password_hash($this->input->post('password'), PASSWORD_DEFAULT); // Hash the password
            // Call the model method to store user data
            $response = $this->user_model->store($data);
            if ($response == true) {
                // If user data stored successfully, return success message as JSON response
                $response = array(
                    'status' => 'success',
                    'message' => 'Successfully registered'
                );
            } else {
                // If user data storage failed, return error message as JSON response
                $response = array(
                    'status' => 'error',
                    'message' => 'Failed to register'
                );
            }
        }
        // Return JSON response
        echo json_encode($response);
    }

    // Method to load login form
    public function login() {
        if ($this->session->has_userdata('id')) {
            redirect('user/welcome_page');
        }
        $this->load->view('login_form');
    }

    // Method to authenticate user login
    public function login_user() {
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('login_form');
        } else {
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            if ($user = $this->user_model->getUser($email)) {
                if (password_verify($password, $user->password)) { // Verify hashed password
                    $newdata = array(
                        'user_name' => $user->user_name,
                        'id' => $user->user_id
                    );
                    $this->session->set_userdata($newdata);
                    redirect('user/welcome_page');
                } else {
                    $this->session->set_flashdata('error', 'Invalid password');
                    redirect('user/login');
                }
            } else {
                $this->session->set_flashdata('error', 'No account exists with this email');
                redirect('user/login');
            }
        }
    }

    // Method to display welcome page
    public function welcome_page() {
        $this->load->view('welcome_page');
    }

    // Method to fetch and display user's history data
    public function history_data() {
        $draw = $this->input->get('draw');
        $start = $this->input->get('start');
        $length = $this->input->get('length');
        $uid = $this->session->id;
        $histories = $this->user_model->getHistory($uid);
        $data = array();
        foreach ($histories->result() as $history) {
            $data[] = array(
                $history->quiz_topic,
                $history->score
            );
        }
        $output = array(
            'draw' => $draw,
            'recordsTotal' => $histories->num_rows(),
            'recordsFiltered' => $histories->num_rows(),
            'data' => $data
        );
        echo json_encode($output);
        exit();
    }

    // Method to load history page
    public function history() {
        $this->load->view('history');
    }

    // Method to logout user
    public function logout() {
        $this->session->unset_userdata('id');
        redirect('user/login');
    }

}

?>
