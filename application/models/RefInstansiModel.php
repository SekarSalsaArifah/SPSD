<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RefInstansiModel extends CI_Model {
    public function getNamainstansiById($id_instansi) {
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