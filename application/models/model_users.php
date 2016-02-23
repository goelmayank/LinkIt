<?php 

class Model_users extends CI_Model{

	public function enter_data($new_data)
	{
		$this->db->insert('user-data', $new_data);
	}	

	public function enter_para($new_data){
		$this->db->insert('mail_data', $new_data);
	}


	public function get_highscore(){
			$query_str = "SELECT  `email` , `title` ,  `score` FROM `user-data` ORDER BY `score` DESC LIMIT 3 ";
		$query = $this->db->query($query_str);
		return $query->result_array(); 

	}
	
	public function get_poems(){
		
		$email=$this->session->userdata('email');
		$query_str = "SELECT `id` , `poem` , `title` ,  `words` ,`score` FROM `user-data` WHERE `email` = '$email' ";
		$query = $this->db->query($query_str);
		return $query->result_array(); 
	}
    
    public function canlogin(){

		$this->db->where('email',$this->input->post('email'));
		$this->db->where('password',md5($this->input->post('password')));
		$query=$this->db->get('murge');
		if($query->num_rows() == 1)
			return true;
		else
			return false;
	}



	public function add_user(){

		$data=array(
 				'email'=> $this->input->post('email'),
 				'password'=> md5($this->input->post('password')),
 				
					);

		$query=$this->db->insert('murge',$data);

		if($query)
			return true;
		else 
			return false;

	}
	
}