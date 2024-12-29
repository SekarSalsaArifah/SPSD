<?php
class Dashdinas extends CI_Controller{
	function __construct(){
		parent::__construct();
		if(!isset($this->session->idadmin) && ($this->session->idrole !=2)){
			redirect('Login');
		}
		$data = array();
		$this->idinstansi = $this->session->idinstansi;
		$this->load->model('Dashdinas_model');
		$this->load->library('session');
		$this->load->library('upload');
	}	
	public function index(){
	
		$data = $this->Dashdinas_model->get_all_data($this->idinstansi)->result();
			if($data!=NULL){
				$i = 0;
	            foreach($data as $result){
	                $data['subdomain'][$i] = array(
	                    'id_subdomain' => $result->id_subdomain,
						'nama_instansi' => $this->Dashdinas_model->get_detail('instansi','id_instansi',$result->id_instansi,'nama_instansi'),
        	            'website' => $result->website,
        	            'layanan' => $result->layanan,
        	            'buktiupload' => $result->buktiupload,
        	            'keterangan' => $result->keterangan,
                        'statusAktif' => $result->statusAktif
	                );
	                $data['subdomain'][$i] = (object)$data['subdomain'][$i];
	                $i++;
	            }
	        }else{
	        	$data['subdomain']=array();
	        }
		$data['judul']='Dinas || Dashboard';
		$this->template->load('layout_dinas','dinas/dash_dinas', $data);
	}

	public function add(){
	
		$data['judul']='Dinas || Add';
		$data['instansi']=$this->Dashdinas_model->instansi($this->idinstansi);
    	$this->template->load('layout_dinas','dinas/add_dinas',$data);
	}

	public function save(){
	
		$website = $this->input->post('website');
		$layanan = $this->input->post('layanan');
		$id_instansi = $this->input->post('id_instansi');
		$keterangan = $this->input->post('keterangan');

		$data = array(
			'website'=>$website,
			'layanan'=>$layanan,
			'id_instansi'=>$id_instansi,
			'keterangan'=>$keterangan
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
			redirect('dashdinas/add');
		} else {
			echo $this->session->set_flashdata('msg', 'Data Berhasil Ditambahkan </br>');
			redirect('dashdinas');
		}
	}

	//add instansi baru
	public function addinstansi(){
	
		$data['judul']='Dinas || Add';
		$data['instansi']=$this->Dashdinas_model->get_all_data('instansi')->result();
    	$this->template->load('layout_dinas','dinas/add_dinas',$data);
	}
	//save instansi baru
	public function saveinstansi(){
		$data = $this->input->post();
		$status = $this->Dashdinas_model->insert('instansi', $data);

        if($status != NULL ){
                redirect('dashadmin/add');
            } else {
                redirect('dashadmin/add');
            }
	}

	public function get(){
		$data = $this->Dashdinas_model->get_all_data('subdomain')->result();
			if($data!=NULL){
				$i = 0;
	            foreach($data as $result){
	                $data['subdomain'][$i] = array(
	                    'id_subdomain' => $result->id_subdomain,
						'website' => $result->website,
						'layanan' => $result->layanan,
						'buktiupload' => $result->buktiupload,
        	            'keterangan' => $result->keterangan,
                        'statusAktif' => $result->statusAktif
	                );
	                $data['subdomain'][$i] = (object)$data['subdomain'][$i];
	                $i++;
	            }	
	        }else{
	        	$data['subdomain']=array();
	        }
		$data['judul']='Dinas || Dashboard';
		$this->template->load('layout_dinas','dinas/dash_dinas', $data);
	}


	public function getid($id){
	
		$dataWhere=array('id_subdomain'=>$id);
		$result = $this->Dashdinas_model->get_by_id('subdomain', $dataWhere)->row_object();
        $data['subdomain'] = array(
        	'id_subdomain' => $result->id_subdomain,
			'nama_instansi' => $this->Dashdinas_model->get_detail('instansi','id_instansi',$result->id_instansi,'nama_instansi'),
        	'website' => $result->website,
        	'layanan' => $result->layanan,
        	'buktiupload' => $result->buktiupload,
        	'keterangan' => $result->keterangan
        );
        $data['subdomain'] = (object)$data['subdomain'];
		$data['subdomain']=$this->Dashdinas_model->get_all_data('subdomain')->result();
		$this->template->load('layout_dinas','dinas/edit_dinas', $data);
	}
	
	public function edit(){
	
		$data['judul']='Dinas || Edit';
		$id = $this->input->post('id_subdomain');
		$data = $this->input->post();
        $this->Dashdinas_model->updatee('subdomain', $data, 'id_subdomain', $id);   
        redirect('das');
	}
	public function delete($id){
	
		$dataDelete=array('id_subdomain'=>$id);
		$this->Dashdinas_model->delete($dataDelete,'subdomain');
		$this->session->set_flashdata('success', 'Produk berhasil dihapus');
		$this->session->set_flashdata('error', 'Produk gagal dihapus');
		redirect('dashdinas');
	}

	public function aktif($id){
		$dataUpdate=array('statusAktif'=>'Y');
		$this->Dashdinas_model->update('subdomain',$dataUpdate,'id_subdomain',$id);
		redirect('dashdinas/get');
	}

	public function non_aktif($id){
		$dataUpdate=array('statusAktif'=>'N');
		$this->Dashdinas_model->update('subdomain',$dataUpdate,'id_subdomain',$id);
		redirect('dashdinas/get');
	}
}

