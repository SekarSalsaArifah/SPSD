<?php
class Login extends CI_Controller {
	function __construct(){
		parent::__construct();
		//$this->load->model('Login_model');
		$this->load->library('recaptcha');
	}	
	public function index(){

		if ($this->session->userdata('iduser')) {
            $id_role = $this->session->userdata('idrole');
            $id_instansi = $this->session->userdata('idinstansi');
            if ($id_role == 1) {
                redirect('Dashadmin/dashboard');
            } else if ($id_role == 2) {
                redirect('Dashdinas');
            } else {
                redirect('default_page'); 
            }
        } else {
            $recaptcha = $this->input->post('g-recaptcha-response');
        	if (!empty($recaptcha)) {
            $response = $this->recaptcha->verifyResponse($recaptcha);
            	if (isset($response['success']) and $response['success'] === true) {
                
                redirect('login','refresh');
            	}
        	}

			$data = array(
				'widget' => $this->recaptcha->getWidget(),
				'script' => $this->recaptcha->getScriptTag(),
			);
			$this->load->view('login', $data);
        }
		
	}
	public function aksi_login(){
		$data = array();
        $username = $this->input->post('username', TRUE);
        $password = $this->input->post('password', TRUE);
        
        $this->load->model('LoginModel');
        $user_details = $this->LoginModel->checkuserlogin($username);
        
        if ($user_details && password_verify($password, $user_details->password)) {
            if ($user_details->id_role == 1) {
                $this->load->model('LoginModel');
                $nama_instansi = $this->LoginModel->getNamaInstansiById($user_details->id_instansi);
                $session_data = array(
                    'iduser'   => $user_details->id_user,
                    'idinstansi'  => $user_details->id_instansi,
                    'username'  => $user_details->username,
                    'idrole'    => $user_details->id_role,
                    'nama_instansi'  => $nama_instansi
                );
                $this->session->set_userdata($session_data);
                redirect("Dashadmin/dashboard");
            } else if ($user_details->id_role == 2) {
				$this->load->model('LoginModel');
                $nama_instansi = $this->LoginModel->getNamaInstansiById($user_details->id_instansi);
                $session_data = array(
                    'iduser'   => $user_details->id_user,
                    'idinstansi'     => $user_details->id_instansi,
                    'username'  => $user_details->username,
                    'idrole'    => $user_details->id_role,
                    'nama_instansi'  => $nama_instansi
                );
                $this->session->set_userdata($session_data);
                redirect("Dashdinas");
			} else {
				$data['error_message'] = "Akun Anda Tidak Aktif";
				$this->load->view('login',$data);
			}
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Login</div>');
			redirect('Login');
		}
	}

	public function recaptcha()
    {
        // load from spark tool
        $this->load->spark('recaptcha-library/1.0.1');
        // load from CI library
        // $this->load->library('recaptcha');

        $recaptcha = $this->input->post('g-recaptcha-response');
        if (!empty($recaptcha)) {
            $response = $this->recaptcha->verifyResponse($recaptcha);
            if (isset($response['success']) and $response['success'] === true) {
                echo "You got it!";
            }
        }
        $data = array(
            'widget' => $this->recaptcha->getWidget(),
            'script' => $this->recaptcha->getScriptTag(),
        );
        $this->load->view('recaptcha', $data);
    }
	public function aksi_logout(){
		$this->session->sess_destroy();
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Sudah Logout!</div>');
		redirect('login');
	}
}