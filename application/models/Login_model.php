<?php 
class Login_model extends CI_Model{
	public function cek($username,$password){
		echo $username;
		echo $password;
		$this->db->where('username',$username);
		$this->db->where('password',$password);
		//$this->db->where=md5($_POST['password'],$password);
		$result=$this->db->get('user');
		return $result;	
	}
}
?>