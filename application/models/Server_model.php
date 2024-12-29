<?php

class Server_model extends CI_Model{

	public function get_all_data($table) {
        return $this->db->get($table);
    }

	public function insert($tabel, $data){
		$this->db->insert($tabel, $data);
	}
    public function list(){
		$this->db->order_by('id','desc');
		return $this->db->get('server');
	}

	public function get_by_id($tabel, $id){
		return $this->db->get_where($tabel, $id);
	}

	public function update($tabel, $data, $pk, $id){
		$this->db->where($pk, $id);
		$this->db->update($tabel, $data);
	}

    function single($x){
		$this->db->where('id_server', $x);
		$a=$this->db->get('server');
		$re = array();
		foreach($a->result() as $r)
		{
			$re['id_server'] = $r->id_server;
			$re['nama_server'] = $r->nama_server;
			$re['ip'] = $r->ip;
			$re['os'] = $r->aduan;
            $re['versi_os'] = $r->versi_os;
            $re['website'] = $r->website;
            $re['subdomain'] = $r->subdomain;
		}

		return $re;
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

	public function data_namaserver(){
        $this->db->order_by ('nama_server','asc');
        return $this->db->get('server')->result();
    }

    public function data_os($nama_server){
        $this->db->order_by('ip','asc');
        $this->db->order_by('os','asc');
        $this->db->order_by('versi_os','asc');

        $this->db->where('nama_server',$nama_server);
        return $this->db->get('server')->result();
    }
	

	public function get_FisikServer() {
		return $this->db->get('server')->result();
    }
	public function get_FisikAppServer() {
		return $this->db->get('app_server')->result();
    }
	public function get_DetailAppServer() {
		return $this->db->get('app_server')->result();
    }
	public function get_DetailFisikServer() {
		$this->db->select('app_server.*, server.versi_os AS versi_os, server.nama_server, server.ip');
        $this->db->join('app_server', 'server.id_server = app_server.id_server');
        $this->db->from('server');

		// ->where('server.id_server', $id);
        $query = $this->db->get();
        return $query->result();
    }
	public function get_AppServer() {
		$this->db->select('app_server.*, server.ip AS ip, server.nama_server, server.id_server');
        $this->db->join('app_server', 'app_server.id_server = server.id_server', 'left');
        $this->db->from('server');
        $query = $this->db->get();
        return $query->result();
    }
	
	public function get_Server() {
		$this->db->select('subdomain.*, server.nama_server AS nama_server, server.id_server');
        $this->db->join('subdomain', 'subdomain.id_server = server.id_server');
        $this->db->from('server');
        $query = $this->db->get();
        return $query->result();
    }

}

