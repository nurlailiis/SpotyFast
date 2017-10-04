<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class admin extends CI_Controller {
    
    function __construct(){
        parent::__construct();      
        $this->load->model('data');
                $this->load->helper('url');
    }
 
    public function index(){        
        $data = $this->data->read('admin')->result_array();
        $admin['admin'] = $data;
        $this->load->view('admin/header');
        $this->load->view('admin/login', $admin);
        $this->load->view('admin/footer');
    }

    public function dashboard(){        
        $data = $this->data->read('admin')->result_array();
        $admin['admin'] = $data;
        $this->load->view('admin/header');
        $this->load->view('admin/dashboard', $admin);
        $this->load->view('admin/footer');
    }

    public function home(){
        $data = $this->data->read('admin')->result_array();
        $admin['admin'] = $data;
        $this->load->view('admin/headermasuk');
        $this->load->view('admin/dashboard', $admin);
        $this->load->view('admin/footer');
    }
    public function inputLapangan(){
            $data = $this->data->inputLapangan()->result_array();
            $tampil['inputLapangan'] = $data;
            $this->load->view('admin/headermasuk');
            $this->load->view('admin/sewajadwal', $tampil);
            $this->load->view('admin/footer');       
    }
    public function catatanJadwal(){
        $data = $this->data->read('admin')->result_array();
        $admin['admin'] = $data;
        $this->load->view('admin/headermasuk');
        $this->load->view('admin/detail', $admin);
        $this->load->view('admin/footer');
    }
    public function inputsewa(){
        
    }

    public function cek_login(){

        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $read = $this->data->readDataAdmin2($username);
        foreach ($read as $r) {
            $user = $r['username_admin'];
            $pass = $r['password_admin'];
        }
        
        $hashed_password = $this->data->login($password);
        if ($username==$user) {
            if ($password==$pass) {
                $data = array(
                    'username'  => $user,
                );
                $this->session->set_userdata($data);
                redirect(base_url('index.php/admin/login'));
            }
            else{
                redirect(base_url('index.php/admin'));
            }
        }
        else{
            redirect(base_url('index.php/admin'));
        }
    }

    function login(){
        $this->load->view('admin/headermasuk');
        $this->load->view('admin/footer');
        $this->load->view('admin/dashboard');
    }

    function lapangan(){
        if ($this->session->has_userdata('username')) {
            //$data = $this->data->read('lapangan');
            //$tampil['lapangan'] = $data;
            $this->load->view('admin/headermasuk');
            $this->load->view('admin/footer');
            $this->load->view('admin/lapangan');;
        }
        else{
            redirect(base_url('index.php/admin/lapangan'));
        }
    }

    function tambahLapangan(){
        $config['upload_path']          = './assets/lapangan/image/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 10000;
        $config['max_width']            = 5000;
        $config['max_height']           = 5000;

        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('gambar')) {
            echo print_r(array('error' => $this->upload->display_errors()));    
            redirect(base_url('admin/lapangan'));
        }
        else{
            $url = base_url().$config['upload_path'].$this->upload->data('file_name');
            $id = $this->input->post('id');
            $nama = $this->input->post('nama');
            $detail = $this->input->post('detail');
            $tarifmhs = $this->input->post('tarifmhs');
            $tarifnon = $this->input->post('tarifnon');
            $data = array(
                'id_lapangan' => $id,
                'nama_lapangan' => $nama,
                'detail_lapangan' => $detail,
                'tarif_mahasiswa' => $tarifmhs,
                'tarif_nonits' => $tarifnon,
                'gambar_lapangan' => $url, 
                );
            $this->data->insertData('lapangan', $data);
            redirect($uri = base_url('index.php/admin/add'), $method = 'auto', $code = NULL);
        }
    }

    function add(){
        if ($this->session->has_userdata('username')) {
            $this->load->view('admin/lapangan');
        }
        else{
            redirect(base_url('index.php/admin/login'));
        }

    }

}