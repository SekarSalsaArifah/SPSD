<?php

class Dashdinas_model extends CI_Model{

	public function get_all_data($tabel){
		$this->db->select('*')->from('subdomain')
		->where('id_instansi', $this->idinstansi)
		->order_by('id_instansi', 'asc');
		return $this->db->get();
	}

	public function insert($tabel, $data){
		$this->db->insert($tabel, $data);
	}

	public function update($tabel, $data, $pk, $id){
		$this->db->where($pk, $id);
		$this->db->update($tabel, $data);
	}

	public function delete($id,$tabel){
		$this->db->where($id);
		$this->db->delete($tabel);
	}

	public function get_detail($tabel,$id_column,$id,$column){
        $dataWhere = array($id_column => $id);
        $data = $this->db->get_where($tabel,$dataWhere)->row_object();
        return ($data->$column);           
    }

	public function instansi($id_instansi){
		$this->db->select()->from('instansi')
		->where('id_instansi', $id_instansi);
		return $this->db->get();
	}

}

