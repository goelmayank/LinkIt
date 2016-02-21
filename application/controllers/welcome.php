<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	
	public function index()
	{
		$this->load->view('index');

	}

	public function welcome_page()
	{
		$this->load->view('welcome_message');
	}

	public function play()
	{
		//$this->load->view('play');
		redirect('user_authentication/index');

	}

	public function profile()
	{
		$this->load->view('profile');
	}

	public function userdata()
	{
		$email = $this->input->post('user_email');//$userData->email;
		$title = $this->input->post('title');
		$poem = $this->input->post('text');
		$new_data = array
		(
			'email' => $email , 
			'title' => $title ,
			'poem' => $poem
			);
		$this->load->model('model_users');
		$this->model_users->enter_data($new_data);
		redirect('welcome/profile');
	}

	public function play_page()
	{
		$this->load->view('play');
	}

}

