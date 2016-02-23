<?php

class Model_users extends CI_Model {

	public function enter_data($new_data) {
		$this->db->insert('user-data', $new_data);
	}

	public function enter_para($new_data) {
		$this->db->insert('mail_data', $new_data);
	}

	// public function get_requests($logged_email){
	// 	$query_str = "SELECT `Hostel` FROM `staff` WHERE `email` = '$logged_email'";
	// 	$query4 = $this->db->query($query_str4);
	// 	$query6 = $query4->row_array()['Hostel'];
	// 	$request_str = "SELECT `s_email`, `exit_date`, `return_date`, `id` FROM `pendingreq` WHERE `hostel` = '$query6' AND `status` = 'n' ";
	// 	$query5 = $this->db->query($request_str);
	// 	return $query5->result();
	// }

	public function get_poems() {

		$query_str = "SELECT `id` , `poem` , `title` , `words`  FROM `user-data` WHERE `email` = this->session->userdata('email') ";
		$query     = $this->db->query($query_str);
		return $query->result();
	}

	public function get_requests() {

		$query_str = "SELECT `id` , `from` , `subject` , `data` , `date` FROM `mail_data` WHERE `status1` = 'n' ";
		$query     = $this->db->query($query_str);
		return $query->result();
	}

	public function get_requests_ipc() {

		$query_str = "SELECT `id` , `from` , `subject` , `data` , `date` FROM `mail_data` WHERE `status2` = 'n' ";
		$query     = $this->db->query($query_str);
		return $query->result();
	}

	public function req_approve() {
		$this->db->where('request_password', md5($this->input->post('req_pass')));

		$query = $this->db->get('staff');
		if ($query->num_rows() == 1) {
			return 1;
		}
	}

	public function update_status($updated_status, $id) {
		$this->db->where('id', $id);
		$this->db->update('mail_data', $updated_status);
	}

	/************Extra
	public function can_log_in(){
	$this->db->where('email', $this->input->post('email'));
	$this->db->where('password', md5($this->input->post('password')));

	$query_student = $this->db->get('users');
	$query_staff = $this->db->get('staff');
	if($query_student->num_rows() == 1){
	return 1;
	}elseif($query_staff->num_rows() == 1){
	return 2;
	}else{
	return 0;
	}
	}


	/* ***select*** function is working fine */
	// public function select($logged_email, $logged_user){
	// 	if($logged_user == 'student'){
	// 		$this->db->select("name, branch, native, f_email, m_email, s_mobile, f_mobile, m_mobile, Address, Hostel, room_no");
	// 	    $this->db->where('email', $logged_email);

	// 	    $query1 = $this->db->get('users');
	// 	    return $query1->result();
	// 	}else if($logged_user == 'staff'){
	// 		$this->db->select('Name, Native, Mobile_Number');
	// 		$this->db->where('email', $logged_email);

	// 		$query2 = $this->db->get('staff');
	// 		return $query2->result();
	// 	}

	// }

	// /*
	// public function select($logged_email){
	// 	$this->db->select('name, branch, native');
	// 	$this->db->from('users');
	// 	$this->db->where('email', $logged_email);
	// 	return $this->db->get()->row_array();
	// }*/

	// public function update_para($login_email, $updated_data, $logged_user){
	// 	if($logged_user == 'student'){
	// 		$this->db->where('email', $login_email);
	// 	    $this->db->update('users', $updated_data);
	// 	}
	// 	elseif($logged_user == 'staff'){
	// 		$this->db->where('email', $login_email);
	// 		$this->db->update('staff', $updated_data);
	// 	}
	// }

	// public function enter_para($new_data){
	// 	$this->db->insert('pendingreq', $new_data);
	// }

	// public function select_special($logged_email, $logged_user){
	// 	if($logged_user == 'student'){
	// 		$this->db->select('f_email, m_email, f_mobile, m_mobile, Hostel');
	// 		$this->db->where('email', $logged_email);
	// 		$query3 = $this->db->get('users');
	// 		$data3 = $query3->row_array();
	// 		return $data3;
	// 	}
	// }

	// public function get_requests($logged_email){
	// 	$query_str4 = "SELECT `Hostel` FROM `staff` WHERE `email` = '$logged_email'";
	// 	$query4 = $this->db->query($query_str4);
	// 	$query6 = $query4->row_array()['Hostel'];
	// 	$request_str = "SELECT `s_email`, `exit_date`, `return_date`, `id` FROM `pendingreq` WHERE `hostel` = '$query6' AND `status` = 'n' ";
	// 	$query5 = $this->db->query($request_str);
	// 	return $query5->result();
	// }

	// public function get_requests_stu($logged_email){
	// 	$query_str4 = "SELECT `Hostel` FROM `users` WHERE `email` = '$logged_email'";
	// 	$query4 = $this->db->query($query_str4);
	// 	$query6 = $query4->row_array()['Hostel'];
	// 	$request_str = "SELECT `s_email`, `exit_date`, `return_date` FROM `pendingreq` WHERE `hostel` = '$query6' AND `status` = 'n' ";
	// 	$query5 = $this->db->query($request_str);
	// 	return $query5->result();
	// }

	// public function get_approved_stu($logged_email){
	// 	$query_str4 = "SELECT `Hostel` FROM `users` WHERE `email` = '$logged_email'";
	// 	$query4 = $this->db->query($query_str4);
	// 	$query6 = $query4->row_array()['Hostel'];
	// 	$request_str = "SELECT `s_email`, `exit_date`, `return_date` FROM `pendingreq` WHERE `hostel` = '$query6' AND `status` = 'y' ";
	// 	$query5 = $this->db->query($request_str);
	// 	return $query5->result();
	// }

	// public function update_status($updated_status, $id){
	// 	$this->db->where('id', $id);
	// 	$this->db->update('pendingreq', $updated_status);
	// }

	// public function req_approve(){
	// 	$this->db->where('request_password', md5($this->input->post('req_pass')));

	// 	$query = $this->db->get('staff');
	// 	if($query->num_rows() == 1){
	// 		return 1;
	// 	}
	// }
}