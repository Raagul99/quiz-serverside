<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->database();
        $this->load->model('user_model');
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->library('session');
    }

    public function signup()
    {
        $this->load->view('signup_form');
    }

	public function submit_signup()
{
    $this->form_validation->set_rules('user_name','Name','required');
    $this->form_validation->set_rules('email','Email','required|valid_email|is_unique[user.email]', array('is_unique' => 'This email address is already registered.'));
    $this->form_validation->set_rules('password','Password','required|min_length[8]');

    if($this->form_validation->run() == FALSE){
        $response = array(
            'status' => 'error',
            'message' => validation_errors()
        );
    }else{
        $data['user_name'] = $this->input->post('user_name');
        $data['email'] = $this->input->post('email');
        $data['password'] = password_hash($this->input->post('password'), PASSWORD_DEFAULT); // Hashing the password
        $this->load->model('user_model');
        $response = $this->user_model->store($data);
        if($response == true){
            $response = array(
                'status' => 'success',
                'message' => 'Successfully registered'
            );
        }else{
            $response = array(
                'status' => 'error',
                'message' => 'Failed to register'
            );
        }
    }
    echo json_encode($response);
}


    public function login(){
        if($this->session->has_userdata('id')){
            redirect('user/home');
        }
        $this->load->view('login_form');
    }

    public function login_user(){
		$this->form_validation->set_rules('email','Email','required|valid_email');
		$this->form_validation->set_rules('password','Password','required');
	
		if($this->form_validation->run()==FALSE){
			$this->load->view('login_form');
		}else{
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			$this->load->database();
			$this->load->model('user_model');
			if($user = $this->user_model->getUser($email)){
				if($user->password==$password){
					$newdata = array(
						'user_name' => $user->user_name,
						'id' => $user->user_id
					);
					$this->session->set_userdata($newdata);
					redirect('user/home');
				}else{
					$this->session->set_flashdata('error', 'Invalid password');
					redirect('user/login');
				}
			}else{
				$this->session->set_flashdata('error', 'No account exists with this email');
				redirect('user/login');
			}
		}
	}
	

    public function history_data(){
        $draw = $this->input->get('draw');
        $start = $this->input->get('start');
        $length = $this->input->get('length');
        $uid = $this->session->id;
        $histories = $this->user_model->getHistory($uid);
        $data = array();
        foreach($histories->result() as $history){
            $data[] = array(
                $history->quiz_topic,
                $history->score
            );
        }
        $output = array(
            'draw'=>$draw,
            'recordsTotal'=>$histories->num_rows(),
            'recordsFiltered'=>$histories->num_rows(),
            'data'=>$data
        );
        echo json_encode($output);
        exit();
    }

    public function home(){
        $this->load->view('home');
    }

    public function logout(){
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->session->unset_userdata('id');
        redirect('user/login');
    }

}

?>
