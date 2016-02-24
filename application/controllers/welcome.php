// <?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Welcome extends CI_Controller {

	public function index() {
		$this->session->sess_destroy();
		$this->load->model('model_users');
		$board = $this->model_users->get_highscore();
		$data  = array('board' => $board);
		$this->load->view('index', $data);

	}

	public function welcome_page() {
		$this->load->view('welcome_message');
	}
	// function sessions($value) {
	// 	$this - > session - > set_userdata('sample', $value);
	// 	$sId = $this->session->userdata('session_id');
	// 	if(isset($sId)){

	// 	}
	// }

	public function login() {
		echo "Inside Login";
		$this->load->library('session');
		$name      = $_POST['name'];
		$imageUrl  = $_POST['imageUrl'];
		$email     = $_POST['email'];
		$logged_in = $_POST['logged_in'];
		$data      = array
		(
			'email'     => $email,
			'imageUrl'  => $ImageUrl,
			'name'      => $name,
			'logged_in' => $logged_in,
		);
		$this->session->set_userdata($data);
	}

	public function logout() {
		echo "Inside Login";
		$this->load->library('session');
		$logged_in = $_POST['logged_in'];
		$data      = array
		(
			'logged_in' => $logged_in,
		);
		$this->session->sess_destroy();
		redirect('welcome/index');
	}

	public function play() {

		if (!empty($this->session->userdata('email'))) {
			$this->load->view('play');
		} else {
			$data = array('message' => "Please Sign In Before Continuing.");
			redirect('welcome/index', $data);
		}

	}

	public function leader() {
		$this->load->model('model_users');
		$board = $this->model_users->get_highscore();
		$data  = array('board' => $board);
		$this->load->view('leaderboard', $data);

	}

	public function profile() {

		if (!empty($this->session->userdata('email'))) {
			$this->load->model('model_users');
			$board = $this->model_users->get_highscore();
			$poems = $this->model_users->get_poems();
			$data  = array('poems' => $poems,
				'board'               => $board,
			);

			$this->load->view('profile', $data);
		} else {
			$message = array('message' => "Please Sign In Before Continuing.");
			redirect('welcome/index', $data);
		}

	}

	public function userdata() {
		$email    = $this->session->userdata('email');
		$title    = $this->input->post('title');
		$poem     = $this->input->post('text');
		$words    = $this->input->post('words');
		$score    = $this->input->post('score');
		$new_data = array
		(
			'email' => $email,
			'title' => $title,
			'poem'  => $poem,
			'words' => $words,
			'score' => $score,
		);
		$this->load->model('model_users');
		$this->model_users->enter_data($new_data);
		redirect('welcome/profile');
	}

	public function play_page() {
		$this->load->view('play');
	}

}
