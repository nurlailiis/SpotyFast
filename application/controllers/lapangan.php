<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Lapangan extends CI_Controller {
	
	function __construct(){
		parent::__construct();		
		$this->load->model('data');
                $this->load->helper('url');
	}
 
	public function index(){		
		$data = $this->data->read('lapangan')->result_array();
		$lapangan['lapangan'] = $data;
		$this->load->view('lapangan/header');
		$this->load->view('lapangan/home', $lapangan);
		$this->load->view('lapangan/footer');
	}

	public function home(){
		$data = $this->data->read('lapangan')->result_array();
		$lapangan['lapangan'] = $data;
		$this->load->view('lapangan/header');
		$this->load->view('lapangan/home', $lapangan);
		$this->load->view('lapangan/footer');
	}
	
	public function sewajadwal(){
		if ($this->session->has_userdata('username')) {
			$data = $this->data->selectJadwal()->result_array();
			$tampil['sewajadwal'] = $data;
			$this->load->view('lapangan/header');
			$this->load->view('lapangan/sewajadwal', $tampil);
			$this->load->view('lapangan/footer');		
		}
		else{
			redirect(base_url('user/login'));
		}
	}
	public function detail($id){
		$data = $this->data->readWhere('lapangan', $id, 'id_lapangan')->result_array();
		$lapangan['lapangan'] = $data;
		$this->load->view('lapangan/header');
		$this->load->view('lapangan/detail', $lapangan);
		$this->load->view('lapangan/footer');
	}
	public function inputsewa(){
		if ($this->session->has_userdata('username')) {
			$lapangan['kode'] = time();
			$data = $this->data->read('lapangan')->result_array();
			$lapangan['lapangan'] = $data;
			$this->load->view('lapangan/header');
			$this->load->view('lapangan/inputsewa', $lapangan);
			$this->load->view('lapangan/footer');		
		}
		else{
			redirect(base_url('lapangan/login'));
		}
	}
	public function createsewa(){
		$no = $this->input->post('no');
		$nama = $this->input->post('nama');
		$kategori = $this->input->post('kategori');
		$nomer_identitas = $this->input->post('nomer_identitas');
		$nama_lapangan = $this->input->post('nama_lapangan');
		$tanggal = $this->input->post('tanggal');
		$jam = $this->input->post('jam');
		$lama_sewa = $this->input->post('lama_sewa');

		$data = array(
			'no' => $no,
			'nama' => $nama,
			'kategori' => $kategori,
			'nomer_identitas' => $nomer_identitas,
			'nama_lapangan' => $nama_lapangan,
			'tanggal' => $tanggal,
			'jam' => $jam,
			'lama_sewa' => $lama_sewa
		);
		$this->data->createJadwal($data, 'jadwal');
		redirect('lapangan/sewajadwal');
	}
	function login(){
		if($this->session->has_userdata('username')){
			$data = $this->data->read('lapangan')->result_array();
			$lapangan['lapangan'] = $data;
			$this->load->view('lapangan/header');
			$this->load->view('lapangan/home', $lapangan);
			$this->load->view('lapangan/footer');
		}
		else{
			$this->load->view('lapangan/header');
			$this->load->view('lapangan/login');
			$this->load->view('lapangan/footer');	
		}
	}
	function cek_login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$read = $this->data->readWhere('user', $username, 'id_user')->result_array();
		$hashed_password = $this->data->login($password);
		foreach($read as $r){
			$user = $r['id_user'];
			$pass = $r['password_user'];
			$nama = $r['nama_user'];
			$sewa_user = $r['sewa_user'];
		}
		if ($username==$user) {
			if ($password==$pass) {
				$data = array(
			        'username'  => $user,
			        'email'     => $email,
			        'nama' 		=> $nama,
			        'path' 		=> $path, 
				);
				$this->session->set_userdata($data);
				redirect(base_url('lapangan/index'));
			}
			else{
				redirect(base_url('lapangan/login'));
			}
		}
		else{
			redirect(base_url('lapangan/login'));
		}
	}
	function signup(){
		$this->load->view('lapangan/header');
		$this->load->view('lapangan/signup');
		$this->load->view('lapangan/footer');
	}
	function logout(){
		unset($_SESSION['username']);		
		redirect(base_url('lapangan/login'));
	}
}