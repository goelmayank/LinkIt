<?php if (!defined('BASEPATH')) {exit('No direct script access allowed');
}

class Welcome extends CI_Controller {

	public function index() {
		$this->load->view('index');

	}

	public function welcome_page() {
		$this->load->view('welcome_message');
	}

	public function login() {
		echo "Inside Login";
		$this->load->library('session');
		$name     = $_POST['name'];
		$imageUrl = $_POST['imageUrl'];
		$email    = $_POST['email'];
		$data     = array
		(
			'email'    => $email,
			'imageUrl' => $ImageUrl,
			'name'     => $name,
		);
		$this->session->set_userdata($data);
	}

	public function play() {
		$this->load->view('play');

	}

	public function profile() {
		$data = array
		(
			'email' => 'mohit@mail.com',
		);

		$this->session->set_userdata($data);
		$poems = $this->model_users->get_poems();
		// $data=array(
		// 	'poems'=>$poems;
		// 	);
		$this->load->view('profile', $data);
	}

	public function userdata() {
		$email = $this->input->post('user_email');
		//$userData->email;
		$title    = $this->input->post('title');
		$poem     = $this->input->post('text');
		$new_data = array
		(
			'email' => $email,
			'title' => $title,
			'poem'  => $poem,
			'words' => $words,
		);
		$this->load->model('model_users');
		$this->model_users->enter_data($new_data);
		redirect('welcome/profile');
	}

	public function play_page() {
		$this->load->view('play');
	}

}
