<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginModel extends CI_Model {
	public function checkuserlogin($username){
		$user_details = $this->db->select('*')
							->from('user')
							->where('username',$username)
							->get()
							->row();
		return 	$user_details;
	}
    
    public function getNamaInstansiById($id_instansi) {
        $this->db->select('nama_instansi');
        $this->db->where('id_instansi', $id_instansi);
        $query = $this->db->get('instansi');

        if ($query->num_rows() > 0) {
            $row = $query->row();
            return $row->nama_instansi;
        } else {
            return false;
        }
    }
}