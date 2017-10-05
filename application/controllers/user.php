<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct(){
        parent::__construct();      
        $this->load->model('data');
                $this->load->helper('url');
    }

	public function index(){		
		$data = $this->data->read('user')->result_array();
		$user['user'] = $data;
		$this->load->view('user/header');
		$this->load->view('user/login', $user);
		$this->load->view('user/footer');
	}

	public function home(){
        $data = $this->data->read('lapangan')->result_array();
        $lapangan['lapangan'] = $data;
        $this->load->view('lapangan/header');
        $this->load->view('lapangan/home', $lapangan);
        $this->load->view('lapangan/footer');
    }

	public function login(){
		if($this->session->has_userdata('username')){
			$data = $this->data->read('user')->result_array();
			$user['user'] = $data;
			$this->load->view('lapangan/header');
			$this->load->view('lapangan/home', $user);
			$this->load->view('lapangan/footer');
		}
		else{
			$this->load->view('lapangan/header');
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
        }
        
        $hashed_password = $this->data->login($password);
        if ($username==$user) {
            if ($password==$pass) {
                $data = array(
                    'username'  => $user,
                );
                $this->session->set_userdata($data);
                redirect(base_url('lapangan/index'));
            }
            else{
                redirect(base_url('user/login'));
            }
        }
        else{
            redirect(base_url('user/login'));
        }
 	}

	public function signup(){
		$data = $this->data->read('user')->result_array();
		$user['user'] = $data;
		$this->load->view('user/header');
		$this->load->view('user/signup_view');
		$this->load->view('user/footer');
	}

	public function new_user_registration() {
		$id_user = $this->input->post('username', 'trim|required');
		$nama_user = $this->input->post('name', 'trim|required');
		$password_user = $this->input->post('password', 'trim|required');
		$data = array ('id_user' => $id_user,
		'nama_user' => $nama_user,
		'password_user' => $password_user);
			
		$insert = $this->data->addData($data);
		redirect('lapangan/login');
	}

	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('index.php/lapangan'));
	}
}