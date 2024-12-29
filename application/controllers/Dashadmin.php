<?php
class Dashadmin extends CI_Controller{
	function __construct(){
		parent::__construct();
		if(!isset($this->session->idadmin) && ($this->session->idrole !=1)){
			redirect('Login');
		}
		$data = array();
		$this->idinstansi = $this->session->idinstansi;
		$this->load->model('Dashadmin_model');
		$this->load->library('session');
		$this->load->library('upload');
	}
	public function index(){

		$data = $this->Dashadmin_model->get_all_data('subdomain')->result();
			if($data!=NULL){
				$i = 0;
	            foreach($data as $result){
	                $data['subdomain'][$i] = array(
	                    'id_subdomain' => $result->id_subdomain,
						'nama_instansi' => $this->Dashadmin_model->get_detail('instansi','id_instansi',$result->id_instansi,'nama_instansi'),
						'website' => $result->website,
						'layanan' => $result->layanan,
						'subdomain' => $result->subdomain,
						'email' => $result->email,
						'buktiupload' => $result->buktiupload,
        	            'keterangan' => $result->keterangan,
                        'status' => $result->status,
	                );
	                $data['subdomain'][$i] = (object)$data['subdomain'][$i];
	                $i++;
	            }	
	        }else{
	        	$data['subdomain']=array();
	        }
		$data['judul']='Admin || Dashboard';
		$this->template->load('layout_admin','admin/dash_admin', $data);
		$data['data']=$this->db->get('server')->result();
	}

	public function dashboard(){
		$data = $this->Dashadmin_model->get_all_data('subdomain')->result();
	
		if($data != NULL){
			$i = 0;
	
			foreach($data as $result){
				$data['subdomain'][$i] = array(
					'id_subdomain' => $result->id_subdomain,
					'nama_instansi' => $this->Dashadmin_model->get_detail('instansi','id_instansi',$result->id_instansi,'nama_instansi'),
					'website' => $result->website,
					'layanan' => $result->layanan,
					'subdomain' => $result->subdomain,
					'email' => $result->email,
					'buktiupload' => $result->buktiupload,
					'keterangan' => $result->keterangan,
					'status' => $result->status,
					'nama_server' => $this->Dashadmin_model->get_detail('server','id_server',$result->id_server,'nama_server'),
					'jenis_server' => $this->Dashadmin_model->get_detail('app_server','id_appserver',$result->id_appserver,'jenis_server'),
				);
	
				$data['subdomain'][$i] = (object)$data['subdomain'][$i];
				$i++;
			}

		} else {
			$data['subdomain'] = array();
		}
			$data['count_pengajuan'] = $this->Dashadmin_model->get_countpengajuan();
			$data['count_instansi'] = $this->Dashadmin_model->get_countinstansi();
			$data['count_fisik'] = $this->Dashadmin_model->get_countfisik();
			$data['count_app'] = $this->Dashadmin_model->get_countapp();
		$data['judul'] = 'Admin || Dashboard';
		$this->template->load('layout_admin','admin/dashboard', $data);
		$data['data'] = $this->db->get('server')->result();
	}
	

	//============detail statistik===============//

	public function detailpengajuan(){

		$data = $this->Dashadmin_model->get_all_data('subdomain')->result();
			if($data!=NULL){
				$i = 0;
	            foreach($data as $result){
	                $data['subdomain'][$i] = array(
	                    'id_subdomain' => $result->id_subdomain,
						'nama_instansi' => $this->Dashadmin_model->get_detail('instansi','id_instansi',$result->id_instansi,'nama_instansi'),
						'website' => $result->website,
						'layanan' => $result->layanan,
						'subdomain' => $result->subdomain,
						'email' => $result->email,
						'buktiupload' => $result->buktiupload,
        	            'keterangan' => $result->keterangan,
                        'status' => $result->status
	                );
	                $data['subdomain'][$i] = (object)$data['subdomain'][$i];
	                $i++;
	            }	
	        }else{
	        	$data['subdomain']=array();
	        }
		$data['judul']='Admin || Dashboard';
		$data['instansi']=$this->Dashadmin_model->get_all_data('instansi')->result();
		$this->template->load('layout_admin','admin/detail_pengajuan', $data);
		$data['data']=$this->db->get('server')->result();
	}

	public function detailinstansi(){

		$data = $this->Dashadmin_model->get_all_data('instansi')->result();
			if($data!=NULL){
				$i = 0;
	            foreach($data as $result){
	                $data['instansi'][$i] = array(
	                    'id_instansi' => $result->id_instansi,
						'nama_instansi' => $result->nama_instansi,
						'alamat_instansi' => $result->alamat_instansi,
						'no_telepon' => $result->no_telepon,
	                );
	                $data['instansi'][$i] = (object)$data['instansi'][$i];
	                $i++;
	            }	
	        }else{
	        	$data['instansi']=array();
	        }
		$data['judul']='Admin || Dashboard';
		$data['instansi']=$this->Dashadmin_model->get_all_data('instansi')->result();
		$this->template->load('layout_admin','admin/detail_instansi', $data);
		$data['data']=$this->db->get('server')->result();
	}

	public function detailfisikserver(){

		$data = $this->Dashadmin_model->get_all_data('server')->result();
			if($data!=NULL){
				$i = 0;
	            foreach($data as $result){
	                $data['server'][$i] = array(
	                    'id_server' => $result->id_server,
						'nama_server' => $result->nama_server,
						'ip' => $result->ip,
	                );
	                $data['server'][$i] = (object)$data['server'][$i];
	                $i++;
	            }	
	        }else{
	        	$data['server']=array();
	        }
		$data['judul']='Admin || Dashboard';
		$data['server']=$this->Dashadmin_model->get_all_data('server')->result();
		$this->template->load('layout_admin','admin/detail_fisikserver', $data);
		$data['data']=$this->db->get('server')->result();
	}

	public function detailappserver(){

		$data = $this->Dashadmin_model->get_all_data('app_server')->result();
			if($data!=NULL){
				$i = 0;
	            foreach($data as $result){
	                $data['app_server'][$i] = array(
	                    'id_server' => $result->id_server,
						'jenis_server' => $result->jenis_server,
						'nama_server' => $this->Dashadmin_model->get_detail('server', 'id_server', $result->id_server, 'nama_server'),
	                );
	                $data['app_server'][$i] = (object)$data['app_server'][$i];
	                $i++;
	            }	
	        }else{
	        	$data['app_server']=array();
	        }
		$data['judul']='Admin || Dashboard';
		$this->template->load('layout_admin','admin/detail_appserver', $data);
		$data['data']=$this->db->get('app_server')->result();
	}


	//add pengajuan admin
	public function addpengajuan(){
	
		$data['judul']='Admin || Add';
		$data['instansi']=$this->Dashadmin_model->instansi($this->idinstansi);

    	$this->template->load('layout_admin','admin/add_pengajuan',$data);
	}

	public function savepengajuan() {
		$website = $this->input->post('website');
		$layanan = $this->input->post('layanan');
		$id_instansi = $this->input->post('id_instansi');
		$keterangan = $this->input->post('keterangan');
	
		$data = array(
			'website' => $website,
			'layanan' => $layanan,
			'id_instansi' => $id_instansi,
			'keterangan' => $keterangan
		);
	
		$target_dir = "./uploads/";
		$extension = strtolower(pathinfo($_FILES["buktiupload"]["name"], PATHINFO_EXTENSION)); // Mendapatkan ekstensi file dan mengonversinya menjadi huruf kecil
		$allowed_extensions = array('pdf');
		$max_file_size = 2 * 1024 * 1024; // Ukuran maksimum file dalam byte (2MB)
	
		if (in_array($extension, $allowed_extensions)) {
			// Memeriksa ukuran file
			if ($_FILES["buktiupload"]["size"] > $max_file_size) {
				$this->session->set_flashdata('error', 'Ukuran file terlalu besar. Maksimum 2MB.');
			} else {
				// Jika ukuran file memenuhi batasan, lanjutkan dengan proses unggah
				$target_name = $data['website'] . "-buktiupload." . $extension;
				$_FILES["buktiupload"]["name"] = $target_name;
				$target_file = $target_dir . basename($_FILES["buktiupload"]["name"]);
	
				if (move_uploaded_file($_FILES["buktiupload"]["tmp_name"], $target_file)) {
					// Jika proses unggah berhasil, lakukan penyimpanan nama file ke database
					$data['buktiupload'] = $target_name;
					$status = $this->Dashadmin_model->insert('subdomain', $data);
					$this->session->set_flashdata('success', 'Berhasil Memasukkan Data Pengajuan');
				} else {
					// Jika proses unggah gagal
					$this->session->set_flashdata('error', 'Gagal Memasukkan Data Pengajuan');
				}
			}
		} else {
			// Jika ekstensi file tidak diizinkan
			$this->session->set_flashdata('error', 'Hanya file PDF yang diizinkan');
		}
	
		if ($status != NULL) {
			redirect('dashadmin/addpengajuan');
		} else {
			echo $this->session->set_flashdata('msg', 'Data Berhasil Ditambahkan </br>');
			redirect('dashadmin');
		}
	}
	

	//add user baru
	public function add(){

		if(empty($this->session->userdata('username'))){
		redirect('login');
		}
		$data['user_role']=$this->Dashadmin_model->get_all_data('user_role')->result();
		$data['instansi']=$this->Dashadmin_model->get_all_data('instansi')->result();
    	$this->template->load('layout_admin','admin/add_admin',$data);
	}

	//save user baru
	public function save(){
		
		$data = $this->input->post('instansi', true);
		$data = [
			'id_instansi' => ($this->input->post('id_instansi', true)),
			'username' => ($this->input->post('username', true)),
			'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
			'id_role' => ($this->input->post('id_role', true)),
		];
		$status = $this->Dashadmin_model->insert('user', $data);

        if($status != NULL ){
                redirect('dashadmin/add');
            } else {
				echo $this->session->set_flashdata('msg',' Data Berhasil Ditambahkan </br>');
                redirect('dashadmin/add');
            }
	}

	//save instansi baru
	public function saveinstansi(){

		$data = $this->input->post();
		$status = $this->Dashadmin_model->insert('instansi', $data);
		echo $this->session->set_flashdata('msg',' Data Berhasil Ditambahkan </br>');

        if($status != NULL ){
                redirect('dashadmin/add');
            } else {
				echo $this->session->set_flashdata('msg',' Data Berhasil Ditambahkan </br>');
                redirect('dashadmin/add');
            }
	}

	//add by document
	public function addbydocument(){

		if(empty($this->session->userdata('username'))){
		redirect('login');
		}
		$data['subdomain']=$this->Dashadmin_model->get_all_data('subdomain')->result();
		$data['subdomain']=$this->Dashadmin_model->get_all_data('server')->result();
    	$this->template->load('layout_admin','admin/add_bydocument',$data);
	}

	//save by document
	public function savebydocument(){

		$website = $this->input->post('website');
		$layanan = $this->input->post('layanan');
		$subdomain = $this->input->post('subdomain');
		$email = $this->input->post('email');
		$id_instansi = $this->input->post('id_instansi');
		$id_server = $this->input->post('id_server');
		$id_appserver = $this->input->post('id_appserver');

		$data = array(
			'website'=>$website,
			'layanan'=>$layanan,
			'subdomain'=>$subdomain,
			'email'=>$email,
			'id_instansi'=>$id_instansi,
			'id_server'=>$id_server,
			'id_appserver'=>$id_appserver,
		);
		// $data = $this->input->post('id_subdomain');
		$status = $this->Dashadmin_model->insert('subdomain', $data);

        if($status != NULL ){
                redirect('dash_server');
            } else {
                redirect('dash_server');
            }
	}

		//add server
		public function addserver(){

			$data['server']=$this->Dashadmin_model->get_all_data('server')->result();
			$this->template->load('layout_admin','server/add_server',$data);
		} 

		//add fisik server
		public function addfisikserver(){
			
			if(empty($this->session->userdata('username'))){
				redirect('login');
			}
			$data['server']=$this->Dashadmin_model->get_all_data('server')->result();
			$this->template->load('layout_admin','server/add_fisik_server',$data);
			}
			
		//save fisik server
		public function savefisikserver(){
			
			if(empty($this->session->userdata('username'))){
				redirect('login');
			}
			$data = $this->input->post();
			$status = $this->Dashadmin_model->insert('server', $data);
			
			if($status != NULL ){
				redirect('server/fisikserver');
				} else {
					echo $this->session->set_flashdata('msg',' Data Berhasil Ditambahkan </br>');
				redirect('server/fisikserver');
				}
			}

				
		//add excserver
		public function addexcserver(){
			$data['subdomain']=$this->Dashadmin_model->get_all_data('server')->result();
			$data['subdomain']=$this->Dashadmin_model->get_all_data('subdomain')->result();
			$data['server']=$this->Dashadmin_model->list_server();
			$this->template->load('layout_admin','server/add_exc_server',$data);
		}

	
		//save excserver
		public function saveexcserver(){
			if(empty($this->session->userdata('username'))){
				redirect('login');
			}
			$data = $this->input->post();
			$status = $this->Dashadmin_model->insert('server', $data);
	
			if($status != NULL ){
					redirect('server/fisikserver');
				} else {
					redirect('server/fisikserver');
				}
		}

		//AJAX
		public function getNamaServer()
		{

			$this->load->model('Server_model');
       		$data['server'] = $this->server_model->getAllNamaServer();
        	echo json_encode($data);
		}

		//add app server
		public function addappserver(){
			if(empty($this->session->userdata('username'))){
			redirect('login');
			}
			$data['server']=$this->Dashadmin_model->get_all_data('server')->result();
			$this->template->load('layout_admin','server/add_server',$data);
		}
	
		//save appserver
		public function saveappserver(){
			if(empty($this->session->userdata('username'))){
				redirect('login');
			}
			$data = $this->input->post();
			$status = $this->Dashadmin_model->insert('server', $data);
	
			if($status != NULL ){
					redirect('server/appsrver');
				} else {
					redirect('server/appserver');
				}
		}

	public function getid($id){
		$dataWhere=array('id_subdomain'=>$id);
		$result = $this->Dashadmin_model->get_by_id('subdomain', $dataWhere)->row_object();
        $data['subdomain'] = array(
        	'id_subdomain' => $result->id_subdomain,
        	'nama_instansi' => $this->Dashadmin_model->get_detail('instansi','id_instansi',$result->id_instansi,'nama_instansi'),
        	'website' => $result->website,
        	'layanan' => $result->layanan,
        	'email' => $result->email,
        	'keterangan' => $result->keterangan
        );

        $data['subdomain'] = (object)$data['subdomain'];
		$data['instansi']=$this->Dashadmin_model->get_all_data('instansi')->result();
		$this->template->load('layout_admin','admin/dashadmin/edit_admin', $data);
	}

	//edit admin aktif non aktif//
	public function get(){
		$data = $this->Dashadmin_model->get_all_data('subdomain')->result();
			if($data!=NULL){
				$i = 0;
	            foreach($data as $result){
	                $data['subdomain'][$i] = array(
	                    'id_subdomain' => $result->id_subdomain,
						'nama_instansi' => $this->Dashadmin_model->get_detail('instansi','id_instansi',$result->id_instansi,'nama_instansi'),
						'website' => $result->website,
						'layanan' => $result->layanan,
						'email' => $result->email,
        	            'keterangan' => $result->keterangan,
                        'statusAktif' => $result->statusAktif
	                );
	                $data['subdomain'][$i] = (object)$data['subdomain'][$i];
	                $i++;
	            }	
	        }else{
	        	$data['subdomain']=array();
	        }
		$data['judul']='Admin || Dashboard';
		$this->template->load('layout_admin','admin/edit_admin', $data);
	}

	public function aktif($id){
		$dataUpdate=array('statusAktif'=>'Y');
		$this->Dashadmin_model->update('subdomain',$dataUpdate,'id_subdomain',$id);
		redirect('dashadmin/get');
	}

	public function non_aktif($id){
		$dataUpdate=array('statusAktif'=>'N');
		$this->Dashadmin_model->update('subdomain',$dataUpdate,'id_subdomain',$id);
		redirect('dashadmin/get');
	}
	

	public function getserver($id){
		$dataWhere=array('id_server'=>$id);
		$result = $this->Dashadmin_model->get_by_id('server', $dataWhere)->row_object();
        $data['server'] = array(
        	'id_server' => $result->id_server,
			'nama_server' => $result->nama_server,
			'ip' => $result->ip,
        	'os' => $result->os,
        	'versi_os' => $result->versi_os,
			'keterangan' => $result->keterangan,
			'website' => $this->Dashadmin_model->get_detail('subdomain','id_subdomain',$result->id_subdomain,'website'),
			'subdomain' => $this->Dashadmin_model->get_detail('subdomain','id_subdomain',$result->id_subdomain,'subdomain')
        );
        $data['server'] = (object)$data['server'];
		$data['server']=$this->Dashadmin_model->get_all_data('server')->result();
		$this->template->load('layout_admin','admin/add_bydocument', $data);
	}

	//halaman pengajuan//
	public function getidinstansi($id_instansi) {
		$dataWhere = array('id_subdomain' => $id_instansi);
		$result = $this->Dashadmin_model->get_by_id('subdomain', $dataWhere)->row_object();
			$data['subdomain'] = array(
				'id_subdomain' => $result->id_subdomain,
				'nama_instansi' => $this->Dashadmin_model->instansi('instansi', 'id_instansi', $result->id_instansi, 'nama_instansi'),
				'website' => $result->website,
				'layanan' => $result->layanan,
				'subdomain' => $result->subdomain,
				'email' => $result->email,
				'keterangan' => $result->keterangan,
				'nama_server' => $this->Dashadmin_model->get_detail('server', 'id_server', $result->id_server, 'nama_server'),
				'jenis_server' => $this->Dashadmin_model->get_detail('app_server', 'id_appserver', $result->id_appserver, 'jenis_server'),
			);
			$data['subdomain'] = (object)$data['subdomain'];
			$data['server']=$this->Dashadmin_model->get_all_dataa('server')->result();
			$data['app_server']=$this->Dashadmin_model->get_all_data('app_server')->result();
			$data['instansi']=$this->Dashadmin_model->get_all_data('instansi')->result();
			// $data['instansi'] = $this->Dashadmin_model->instansi('instansi', 'id_instansi', $this->idinstansi, 'nama_instansi');
	
		$this->template->load('layout_admin', 'admin/add_bydocument', $data);
	}

	public function edit(){
		$website = $this->input->post('website');
		$layanan = $this->input->post('layanan');
		$subdomain = $this->input->post('subdomain');
		$email = $this->input->post('email');
		$id_instansi = $this->input->post('id_instansi');
		$id_appserver = $this->input->post('id_appserver');
		$id_server = $this->input->post('id_server');
		$status = $this->input->post('status');
		
	
		$update_data = array(
			'website' => $website,
			'layanan' => $layanan,
			'subdomain' => $subdomain,
			'email' => $email,
			'id_instansi' => $id_instansi,
			'id_appserver' => $id_appserver,
			'id_server' => $id_server,
			'status' => $status,
		);
	
		$id = $this->input->post('id_subdomain');
		$this->Dashadmin_model->update('subdomain', $update_data, 'id_subdomain', $id);   
		
		echo $this->session->set_flashdata('msg', 'Data Berhasil Diubah </br>');
		redirect('server');
	}
	
	public function getexcserver($id){
		$dataWhere=array('id_subdomain'=>$id);
		$result = $this->Dashadmin_model->get_by_id('subdomain', $dataWhere)->row_object();
		$data['subdomain'] = array(
			'id_subdomain' => $result->id_subdomain,
			'nama_instansi' => $this->Dashadmin_model->get_detail('instansi','id_instansi',$result->id_instansi,'nama_instansi'),
			'website' => $result->website,
			'layanan' => $result->layanan,
			'email' => $result->email,
			'subdomain' => $result->subdomain,
			'keterangan' => $result->keterangan,
			'nama_server' => $this->Dashadmin_model->get_detail('server', 'id_server', $result->id_server, 'nama_server'),
			'jenis_server' => $this->Dashadmin_model->get_detail('app_server', 'id_appserver', $result->id_appserver, 'jenis_server'),
		);
		$data['subdomain'] = (object)$data['subdomain'];
		$data['server']=$this->Dashadmin_model->get_all_dataa('server')->result();
		$data['app_server']=$this->Dashadmin_model->get_all_dataa('app_server')->result();
		$this->template->load('layout_admin','server/add_exc_server', $data);
	}

	public function editserver(){

		$website = $this->input->post('website');
		$layanan = $this->input->post('layanan');
		$subdomain = $this->input->post('subdomain');
		$email = $this->input->post('email');
		$id_instansi = $this->input->post('id_instansi');
		$id_appserver = $this->input->post('id_appserver');
		$id_server = $this->input->post('id_server');
		$status = $this->input->post('status');
		
	
		$update_data = array(
			'website' => $website,
			'layanan' => $layanan,
			'subdomain' => $subdomain,
			'email' => $email,
			'id_instansi' => $id_instansi,
			'id_appserver' => $id_appserver,
			'id_server' => $id_server,
			'status' => $status,
		);
		$id = $this->input->post('id_subdomain');
		$data = $this->input->post();
        $this->Dashadmin_model->updatee('subdomain', $data, 'id_subdomain', $id);   
		echo $this->session->set_flashdata('msg','Data Berhasil Ditambahkan </br>');
        redirect('server');
	}

	public function delete($id){
		$dataDelete=array('id_subdomain'=>$id);
		$this->Dashadmin_model->delete($dataDelete,'subdomain');
		$this->session->set_flashdata('success', 'Produk berhasil dihapus');
		$this->session->set_flashdata('error', 'Produk gagal dihapus');
		redirect('subdomain');
	}

	// Alasan ditolak
	public function tolakadmin(){
		$data['judul']='Alasan Ditolak';
		$data['ket']='tolak';
		$this->template->load('layout_admin','admin/reason_admin', $data);
	}

	// Alasan dinonaktifkan
	public function nonaktifadmin($id){
		$dataWhere=array('id_subdomain'=>$id);
		$result = $this->Dashadmin_model->get_by_id('subdomain', $dataWhere)->row_object();
        $data['subdomain'] = array(
        	'id_subdomain' => $result->id_subdomain,
        );
        $data['subdomain'] = (object)$data['subdomain'];
         
		$data['judul']='Alasan Dinonaktifkan';
		$data['ket']='nonaktifkan';
		$this->template->load('layout_admin','admin/reason_admin', $data);
	}

	function updateSetuju(){
        $update = 0;
        $rowid = $this->input->get('rowid');
        $qty = $this->input->get('buktiupload');
        if(!empty($rowid) && !empty($buktiupload)){
            $data = array(
                'rowid' => $rowid,
                'buktiupload'   => $buktiupload
            );
            $update = $this->dash_admin->update($data);
        }
        echo $update?'ok':'err';
    }
    
    function removeItem($rowid){
        $remove = $this->dash_admin->remove($rowid);

        redirect('dashadmin/');
    }

	public function getfisikserver(){

		$data= $this->dashadmin_model->data_server();
	
		echo json_encode($data);
	   }
	
	   public function getappserver($id_server){
	
		$data= $this->dashadmin_model->data_appserver($id_appserver);
	
		echo json_encode($data);
	   }
	

}

