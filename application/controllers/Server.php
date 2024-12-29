<?php
defined('BASEPATH') OR exit('No direct script access allowed');



class Server extends CI_Controller {
	function __construct(){
		$this->custTable = 'pemesan';
        $this->ordTable = 'pesanan';
        $this->ordItemsTable = 'detail_order';
		parent::__construct();
		$this->load->model('Server_model');
	}

    public function index()
	{
		$data['subdomain'] = $this->Server_model->get_all_data('subdomain')->result();
		if (!empty($data['subdomain'])) {
			$i = 0;
			foreach ($data['subdomain'] as $result) {
				$data['subdomain'][$i] = (object) array(
					'id_subdomain' => $result->id_subdomain,
					'nama_instansi' => $this->Server_model->get_detail('instansi', 'id_instansi', $result->id_instansi, 'nama_instansi'),
					'website' => $result->website,
					'layanan' => $result->layanan,
					'subdomain' => $result->subdomain,
					'email' => $result->email,
					'keterangan' => $result->keterangan,
					'status' => $result->status,
					'nama_server' => $this->Server_model->get_detail('server', 'id_server', $result->id_server, 'nama_server'),
				);
				$i++;
			}
		} else {
			$data['subdomain'] = array();
		}

		$data['judul'] = 'Admin || Dashboard';
		$data['judul'] = 'Server';

		$this->template->load('layout_admin', 'server/dash_server', $data);

	}

	
	public function addbydocument(){
		if(empty($this->session->userdata('username'))){
		redirect('login');
		}
		$data['subdomain']=$this->Server_model->get_all_data('subdomain')->result();
    	$this->template->load('layout_admin','admin/add_bydocument',$data);
	}

	public function savebydocument(){
		$data = $this->input->post('id_subdomain');
		$status = $this->Server_model->insert('subdomain', $data);

        if($status != NULL ){
                redirect('server');
            } else {
                redirect('server');
            }
	}

    //add server
		public function addserver(){
			$data['server']=$this->Server_model->get_all_data('server')->result();
			$this->template->load('layout_admin','server/add_server',$data);
		} 

	//save server
	public function saveserver(){
	if(empty($this->session->userdata('username'))){
		redirect('login');
				}
	$data = $this->input->post();
	$status = $this->Server_model->insert('server', $data);
		
	if($status != NULL ){
		redirect('server/fisikserver');
		} else {
			echo $this->session->set_flashdata('msg',' Data Berhasil Ditambahkan </br>');
			redirect('server/fisikserver');
				}
	}
    public function addExcServer()
	{
        $data['judul']='Add Exciting Server';
		$this->template->load('layout_admin','server/add_exc_server', $data);
	}

	public function detail(){
		$data['server'] = $this->Server_model->get_Server();
        $this->template->load('layout_admin','server/detail_fisik_server', $data);
	}

	public function server(){
		$data['server'] = $this->Server_model->get_Server();
        $this->template->load('layout_admin','server/dash_server', $data);
	}
	
	public function fisikserver(){
		
		$data['server'] = $this->Server_model->get_FisikServer();
		$data['app_server'] = $this->Server_model->get_FisikAppServer();
        $this->template->load('layout_admin','server/fisik_server', $data);
	}

	public function detailfisikserver(){
		if(empty($this->session->userdata('username'))){
			redirect('login');
		}
		$dataWhere=array('id_server'=>$id);
		$result = $this->Server_model->get_by_id('server', $dataWhere)->row_object();
		$data['server'] = array(
			'id_server' => $result->id_server,
			'nama_server' => $result->nama_server,
			'os' => $result->os,
			'versi_os' => $result->versi_os,
		);
		$data['server'] = $this->Server_model->get_DetailFisikServer();
        $this->template->load('layout_admin','server/detail_fisik_server', $data);
	}

	public function detailappserver(){
		if(empty($this->session->userdata('username'))){
			redirect('login');
		}
		$dataWhere=array('id_appserver'=>$id);
		$result = $this->Server_model->get_by_id('app_server', $dataWhere)->row();
		
		if($result) {
			$data['app_server'][$i] = (object) array(
				'id_appserver' => $result->id_appserver,
				'jenis_server' => $result->jenis_server,	
				'versi' => $result->versi,
			);
		}
		$data['app_server'] = $this->Server_model->get_DetailAppServer();
		$this->template->load('layout_admin','server/detail_app_server', $data);
	}


	public function appserver(){
		$data['app_server'] = $this->Server_model->get_AppServer();
        $this->template->load('layout_admin','server/app_server', $data);
	}

	//add app server
	public function addappserver(){
		if(empty($this->session->userdata('username'))){
			redirect('login');
			}
		$data['judul']='App Server || Add';
		$data['app_server']=$this->Server_model->get_all_data('app_server')->result();
		$data['server']=$this->Server_model->get_all_data('server')->result();
    	$this->template->load('layout_admin','server/add_app_server',$data);
	}
	//save app server
	public function saveappserver(){
		$data = $this->input->post();
		$status = $this->Server_model->insert('app_server', $data);

        if($status != NULL ){
			redirect('server/appsrver');
		} else {
			redirect('server/appserver');
		}
	}

		//add fisik server//
		public function addfisikserver(){
			if(empty($this->session->userdata('username'))){
				redirect('login');
			}
			$data['server']=$this->Server_model->get_all_data('server')->result();
			$this->template->load('layout_admin','server/add_fisik_server',$data);
			}

		//save fisik server
		public function savefisikserver(){
			if(empty($this->session->userdata('username'))){
				redirect('login');
			}
			$data = $this->input->post();
			$status = $this->Server_model->insert('server', $data);
			
			if($status != NULL ){
				redirect('server/fisikserver');
				} else {
					echo $this->session->set_flashdata('msg',' Data Berhasil Ditambahkan </br>');
				redirect('server/fisikserver');
				}
			}

			public function getid($id){
				if(empty($this->session->userdata('username'))){
					redirect('login');
				}
				$dataWhere=array('id_server'=>$id);
				$result = $this->Server_model->get_by_id('server', $dataWhere)->row_object();
				$data['server'] = array(
					'id_server' => $result->id_server,
					'nama_server' => $result->nama_server,
					'ip' => $result->ip,
					'os' => $result->os,
					'versi_os' => $result->versi_os,
				);
				$data['server'] = (object)$data['server'];
				$this->template->load('layout_admin','server/detail_fisik_server', $data);
			}

			public function getexcserver($id) {
				$dataWhere = array('id_subdomain' => $id);
				$result = $this->Server_model->get_by_id('subdomain', $dataWhere)->row_object();
			
				if ($result) {
					$data['subdomain'] = (object) array(
						'id_subdomain' => $result->id_subdomain,
						'nama_instansi' => $this->Server_model->get_detail('instansi', 'id_instansi', $result->id_instansi, 'nama_instansi'),
						'website' => $result->website,
						'layanan' => $result->layanan,
						'email' => $result->email,
						'subdomain' => $result->subdomain,
						'keterangan' => $result->keterangan,
						'id_server' => $result->id_server,
						'nama_server' => $this->Server_model->get_detail('server', 'id_server', $result->id_server, 'nama_server'),
						'jenis_server' => $this->Server_model->get_detail('app_server', 'id_appserver', $result->id_appserver, 'jenis_server'),
					);
					$data['subdomain'] = (object)$data['subdomain'];
					$data['server']=$this->Server_model->get_all_data('server')->result();
					$data['app_server']=$this->Server_model->get_all_data('app_server')->result();
					$this->template->load('layout_admin', 'server/add_exc_server', $data);
				} else {
					// Handle case when data is not found, for example, redirect to an error page.
					redirect('error_page');
				}
			}
			
			public function getidappserver($id){
				if(empty($this->session->userdata('username'))){
					redirect('login');
				}
				$dataWhere=array('id_server'=>$id);
				$result = $this->Server_model->get_by_id('app_server', $dataWhere)->row_object();

					if ($result) {
						$data['app_server'] = array(
							'id_appserver' => $result->id_appserver,
							'jenis_server' => $result->jenis_server,
							'versi' => $result->versi,
						);
					} else {
						// Handle case when no result is found, maybe redirect or show an error message
						// For now, let's set default values or an empty array
						$data['app_server'] = array(
							'id_appserver' => '',
							'jenis_server' => '',
							'versi' => '',
						);
					}

					$data['app_server'] = (object) $data['app_server'];
					$this->template->load('layout_admin', 'server/detail_app_server', $data);

			}

			// public function delete($id){
			// 	if(empty($this->session->userdata('username'))){
			// 		redirect('appserver');
			// 	}
			// 	$dataDelete=array('id_appserver'=>$id);
			// 	$this->Server_model->delete($dataDelete,'app_server');
			// 	$this->session->set_flashdata('success', 'berhasil dihapus');
			// 	$this->session->set_flashdata('error', 'gagal dihapus');
			// 	redirect('server/appserver');
			// }
    
}
?>