<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Lapangan extends CI_Controller {
	
	function __construct(){
		parent::__construct();		
		$this->load->model('data');
        $this->load->helper('url');
	}
 
	public function index($page = 'home'){		
		$data = $this->data->read('lapangan')->result_array();
		$lapangan['lapangan'] = $data;
		$lapangan['page'] = $page;
		$this->load->view('lapangan/header', $lapangan);
		$this->load->view('lapangan/home', $lapangan);
		$this->load->view('lapangan/footer');
	}

	
	public function sewajadwal($page = 'sewajadwal'){
		if ($this->session->has_userdata('username')) {
			$data = $this->data->selectJadwal()->result_array();
			$tampil['sewajadwal'] = $data;
			$tampil['page'] = $page;
			$this->load->view('lapangan/header', $tampil);
			$this->load->view('lapangan/sewajadwal', $tampil);
			$this->load->view('lapangan/footer');		
		}
		else{
			redirect(base_url('lapangan/login'));
		}
	}
	public function detail($id, $page="detail"){
		$data = $this->data->readWhere('lapangan', $id, 'id_lapangan')->result_array();
		$where = array('id_lapangan' => $id);
		$lapangan['lapangan'] = $data;
		$lapangan['page'] = $page;
		$this->load->view('lapangan/header', $lapangan);
		$this->load->view('lapangan/detail', $lapangan);
		$this->load->view('lapangan/footer');
	}
	public function inputsewa($page = "inputsewa"){
		if ($this->session->has_userdata('username')) {
			$data=array('nama_lapangan'=> $this->data->get_lapangan());  
			$lapangan['kode'] = time();
			$tampil = $this->data->read('lapangan')->result_array();
			$lapangan['lapangan'] = $data;
			$lapangan['lapangan'] = $tampil;
			$lapangan['page'] = $page;
			$this->load->view('lapangan/header', $lapangan);
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
	
	public function login($page = 'login'){
		if($this->session->has_userdata('username')){
			redirect('lapangan/index');
		}else{
			$data = $this->data->read('user')->result_array();
			$user['user'] = $data;
			$user['page'] = $page;
			$this->load->view('lapangan/header', $user);
			$this->load->view('lapangan/login_view', $user);
			$this->load->view('lapangan/footer');
		}
	}
	public function cek_login(){
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $read = $this->data->readData($username);
        $hashed_password = $this->data->login($password);
        foreach ($read as $r) {
            $user = $r['id_user'];
			$pass = $r['password_user'];
			$nama = $r['nama_user'];
			$sewa_user = $r['sewa_user'];
        }	
        
        $hashed_password = $this->data->login($password);
        if ($username==$user) {
            if ($password==$pass) {
                $data = array(
                    'username'  	=> $user,
                    'password_user'	=> $pass,			      
			        'nama' 			=> $nama,
			        'sewa_user'		=> $sewa_user,

                );
                $this->session->set_userdata($data);
        		redirect(base_url('lapangan/index'));
            }
            else{
            	$this->session->set_flashdata('pesan', 'Maaf username atau password salah');
                redirect(base_url('lapangan/login'));
            }
        }
        else{
        	$this->session->set_flashdata('pesan', 'Maaf username atau password salah');
            redirect(base_url('lapangan/login'));
        }
 	}
 	public function signup($page = "signup"){
		$data = $this->data->read('user')->result_array();
		$user['user'] = $data;
		$user['page'] = $page;
		$this->load->view('lapangan/header', $user);
		$this->load->view('lapangan/signup_view', $user);
		$this->load->view('lapangan/footer');
	}
 	public function new_user_registration() {
		$id_user = $this->input->post('id_user', 'trim|required');
		$nama_user = $this->input->post('nama_user', 'trim|required');
		$password_user = $this->input->post('password_user', 'trim|required');
		$sewa_user = $this->input->post('sewa_user', 'trim|required');
		$data = array (
			'id_user' => $id_user,
			'nama_user' => $nama_user,
			'password_user' => $password_user,
			'sewa_user' => $sewa_user
		);
		$this->data->addData($data);
		redirect('lapangan/login');
	}
	
	public function logout(){
		unset($_SESSION['username']);		
		redirect(base_url('lapangan/login'));
	}


}