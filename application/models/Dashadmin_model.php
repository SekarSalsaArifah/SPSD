<?php

class Dashadmin_model extends CI_Model{

	function __construct() {
        $this->proTable = 'subdomain';
	}

	public function getRows($id = 'id_subdomain'){
        $this->db->select('*');
        $this->db->from($this->proTable);
        if($id){
            $this->db->where('id_subdomain', $id);
            $query = $this->db->get();
            $result = $query->row_array();
        }else{
            $this->db->order_by('buktiupload', 'asc');
            $query = $this->db->get();
            $result = $query->result_array();
        }
        return !empty($result)?$result:false;
    }

	public function get_all_data($tabel){
		$q=$this->db->get($tabel);
		return $q;
	}

	public function get_all_dataa($tabel){
		$q=$this->db->get($tabel);
		return $q;
	}

    public function get_data_from_tables() {
        $this->db->select('*');
        $this->db->from('server');
        $this->db->join('app_server', 'server.nama_server = app_server.jenis_server', 'left');
        $query = $this->db->get();
        
        return $query->result();
    }

	public function insert($tabel, $data){
		$this->db->insert($tabel, $data);
	}

	public function get_by_id($tabel, $id){
		return $this->db->get_where($tabel, $id);
	}

	public function update($tabel, $data, $pk, $id){
    $this->db->where($pk, $id);
    $this->db->update($tabel, $data);
}

	public function updatee($tabel, $data, $pk, $id){
		$this->db->where($pk, $id);
		$this->db->update($tabel, $data);
	}

	public function delete($id,$tabel){
		$this->db->where($id);
		$this->db->delete($tabel);
	}

	public function get_view($view){
		$query=$this->db->get($view);
		return $query;
	}

	public function get_detail($table, $id_column, $id_value, $result_column) {
		$this->db->select($result_column);
		$this->db->where($id_column, $id_value);
		
		$result = $this->db->get($table)->row();
	
		if ($result) {
			return $result->$result_column;
		} else {
			return null;
		}
	}

	function get_namaserver($title){
		$this->db->like('nama_server',$title, 'BOTH');
		$this->db->order_by('id_server','ASC');
		$this->db->limit(10);
		return $this->db->get('server')->result();
	}

	public function list_server(){
		$this->db->select('*')->from('server')
		->order_by('id_server', 'asc');
		return $this->db->get();
	}
	public function list_subdomain(){
		$this->db->select('*')->from('subdomain')
		->order_by('id_subdomain', 'asc');
		return $this->db->get();
	}

	public function list_appserver(){
		$this->db->select('*')->from('app_server')
		->order_by('id_appserver', 'asc');
		return $this->db->get();
	}

	public function instansi($id_instansi){
		$this->db->select()->from('instansi')
		->where('id_instansi', $id_instansi);
		return $this->db->get();
	}
	public function server($id_server){
		$this->db->select()->from('server')
		->where('id_server', $id_server);
		return $this->db->get();
	}
	public function app_server($id_appserver){
		$this->db->select()->from('app_server')
		->where('id_appserver', $id_appserver);
		return $this->db->get();
	}

	public function data_server(){
        $this->db->order_by ('id_server','asc');
        return $this->db->get('server')->result();
    }

    public function data_appserver($id_appserver){
        $this->db->order_by('id_server','asc');
        $this->db->order_by('id_appserver','asc');

        $this->db->where('id_kapanewon',$id_kapanewon);
        return $this->db->get('reff_kalurahan')->result();
    }

	//=========statstik data=========//
	public function get_countpengajuan(){

		$sql = "SELECT count(website) as website FROM subdomain";
		$result = $this->db->query($sql);
		return $result->row()->website;
	   }
	public function get_countinstansi(){

		$sql = "SELECT count(nama_instansi) as nama_instansi FROM instansi";
		$result = $this->db->query($sql);
		return $result->row()->nama_instansi;
	   }
	public function get_countfisik(){

		$sql = "SELECT count(nama_server) as nama_server FROM server";
		$result = $this->db->query($sql);
		return $result->row()->nama_server;
	   }
	public function get_countapp(){

		$sql = "SELECT count(jenis_server) as jenis_server FROM app_server";
		$result = $this->db->query($sql);
		return $result->row()->jenis_server;
	   }

}

