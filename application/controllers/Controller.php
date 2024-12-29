<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Controller extends CI_Controller {

	public function index()
	{
		$this->load->view('login');
		$data = array(
            'widget' => $this->recaptcha->getWidget(),
        	'script' => $this->recaptcha->getScriptTag(),
        );
	}

	//>>> CONTROLLER ADMIN <<<

	// Dashboard admin
	public function dashadmin()
	{
		$data['judul']='Manajemen Persetujuan';
		$this->template->load('layout_admin','admin/dash_admin', $data);
	}
	
	// Edit halaman admin
	public function editadmin()
	{
		$data['judul']='Admin || Edit';
		$this->template->load('layout_admin','admin/edit_admin', $data);
	}

	// Alasan ditolak
	public function tolakadmin(){
		$data['judul']='Alasan Ditolak';
		$data['ket']='tolak';
		$this->template->load('layout_admin','admin/reason_admin', $data);
	}

	// Alasan dinonaktifkan
	public function nonaktifadmin(){
		$data['judul']='Alasan Dinonaktifkan';
		$data['ket']='nonaktifkan';
		$this->template->load('layout_admin','admin/reason_admin', $data);
	}

	// >>> CONTROLLER DINAS <<<

	// Dashboard Dinas
	public function dashdinas()
	{
		$data['judul']='Data Domain dan Server INSTANSI X yang sudah ada';
		$this->template->load('layout_dinas','dinas/dash_dinas', $data);
	}
	
	// Add halaman dinas
	public function adddinas()
	{
		$data['judul']='Dinas || Add';
		$this->template->load('layout_dinas','dinas/add_dinas', $data);
	}

	// Edit halaman dinas
	public function editdinas()
	{
		$data['judul']='Dinas || Edit';
		$this->template->load('layout_dinas','dinas/edit_dinas', $data);
	}

}
