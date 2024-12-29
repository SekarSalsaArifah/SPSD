<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Filter extends CI_Controller {

    public function index(){
        $data['data']=$this->db->get('server')->result();
        print_r($data['data']);
        $this->load->view('server/add_exc_server', $data, FALSE);
    }
}