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

    function inputkompetisi(){
        if ($this->session->has_userdata('username')) {
            $this->load->view('admin/headermasuk');
            $this->load->view('admin/kompetisi');
            $this->load->view('admin/footer');
        }
        else{
            redirect(base_url('index.php/admin/login'));}}

    function tambahKompetisi(){
        $config['upload_path']          = './assets/lapangan/image/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 1000000;
        $config['max_width']            = 1000000;
        $config['max_height']           = 1000000;

        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('gambar')) {
            $this->session->has_userdata('username');
            echo print_r(array('error' => $this->upload->display_errors()));
        }
        else{
            $url = base_url().$config['upload_path'].$this->upload->data('file_name');
            $id = $this->input->post('id');
            $nama = $this->input->post('nama');
            $tanggal = $this->input->post('tanggal');
            $penyelenggara = $this->input->post('penyelenggara');
            $lokasi = $this->input->post('lokasi');
            $data = array(
                'id_kompetisi' => $id,
                'nama_kompetisi' => $nama,
                'tanggal_kompetisi' => $tanggal,
                'penyelenggara' => $penyelenggara,
                'lokasi_kompetisi' => $lokasi,
                'gambar_kompetisi' => $url, 
                );
            $this->data->insertData('kompetisi', $data);
            redirect($uri = base_url('index.php/admin/inputkompetisi'), $method = 'auto', $code = NULL);}}

    function datakompetisi(){
        if ($this->session->has_userdata('username')) {
            $data = $this->data->selectKompetisi()->result_array();
            $tampil['datakompetisi'] = $data;
            $this->load->view('admin/headermasuk');
            $this->load->view('admin/datakompetisi', $tampil);
            $this->load->view('admin/footer');
        }
        else{
            redirect(base_url('index.php/admin/login'));}}

    public function dashboard(){
        if ($this->session->has_userdata('username')) {
            $data = $this->data->read('admin')->result_array();
            $admin['admin'] = $data;
            $this->load->view('admin/headermasuk');
            $this->load->view('admin/dashboard', $admin);
            $this->load->view('admin/footer');
        }
        else{
            redirect(base_url('index.php/admin/index'));}}
            
    public function datapenyewaan(){
        if ($this->session->has_userdata('username')) {
            $data = $this->data->selectJadwal($this->session->userdata('username'))->result_array();
            $jadwal['jadwal'] = $data;
            $this->load->view('admin/headermasuk');
            $this->load->view('admin/datapenyewaan', $jadwal);
            $this->load->view('admin/footer');
        }
        else{
            redirect(base_url('index.php/admin/index'));}}
            
    public function cek_login(){
            $data = $this->data->read('admin')->result_array();
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $read = $this->data->readWhere('admin', $username, 'username_admin')->result_array();
            $pass1 = $this->data->enkripsi($password);
            foreach ($read as $id) {
                $admin = $id['username_admin'];
                $pass = $id['password_admin'];
                $type = $id['type'];
                }
            $pass1 = $this->data->enkripsi($password);	       
            if ($username==$admin) {
                if ($pass1==$pass) {
                    $pass1 = $this->data->enkripsi($password);
                    $data = array(
                        'username'=>$admin,
                        'type'=>$type
                    );
                    $this->session->set_userdata($data);
                    $this->load->view('admin/headermasuk');
                    $this->load->view('admin/dashboard');
                    $this->load->view('admin/footer');
                            
                }
                else{
                    $this->session->set_flashdata('pesan', '<strong>Maaf</strong> Password anda salah.
                            ');
                    redirect('index.php/admin/index');
                } 
            }
            else{
                $this->session->set_flashdata('pesan', '<strong>Maaf</strong> Username anda salah.
                            ');
               redirect(base_url('index.php/admin/index'));}}

    function login(){
        if ($this->session->has_userdata('username')) {
            $this->load->view('admin/headermasuk');
            $this->load->view('admin/dashboard');
            $this->load->view('admin/footer');
        }
        else{
            redirect(base_url('index.php/admin/index'));}}

    function logout(){
        $this->session->sess_destroy();
        $this->load->view('admin/header');
        $this->load->view('admin/login');
        $this->load->view('admin/footer');
        redirect(base_url('index.php/admin'));}

    function inputlapangan(){
        if ($this->session->has_userdata('username')) {
            $this->load->view('admin/headermasuk');
            $this->load->view('admin/lapangan');
            $this->load->view('admin/footer');
        }
        else{
            redirect(base_url('index.php/admin/login'));}}

    function tambahLapangan(){
        $config['upload_path']          = './assets/lapangan/image/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 1000000;
        $config['max_width']            = 1000000;
        $config['max_height']           = 1000000;

        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('gambar')) {
            $this->session->has_userdata('username');
            echo print_r(array('error' => $this->upload->display_errors()));
        }
        else{
            $url = base_url().$config['upload_path'].$this->upload->data('file_name');
            $id = $this->input->post('id');
            $nama = $this->input->post('nama');
            $detail = $this->input->post('detail');
            $type = $this->input->post('type');
            $admin = $this->input->post('admin');
            $tarifmhs = $this->input->post('tarifmhs');
            $tarifnon = $this->input->post('tarifnon');
            $data = array(
                'id_lapangan' => $id,
                'nama_lapangan' => $nama,
                'detail_lapangan' => $detail,
                'pemilik' => $admin,
                'type'=> $type,
                'tarif_student' => $tarifmhs,
                'tarif_umum' => $tarifnon,
                'gambar_lapangan' => $url, 
                );
            $this->data->insertData('lapangan', $data);
            redirect($uri = base_url('index.php/admin/inputlapangan'), $method = 'auto', $code = NULL);}}

    function datalapangan(){
        if ($this->session->has_userdata('username')) {
            $data = $this->data->selectLapangan($this->session->userdata('username'))->result_array();
            $tampil['datalapangan'] = $data;
            $this->load->view('admin/headermasuk');
            $this->load->view('admin/datalapangan', $tampil);
            $this->load->view('admin/footer');
        }
        else{
            redirect(base_url('index.php/admin/login'));}}

    function deleteData($id){  
        $where = array('no' => $id ); 
        $res = $this->data->deleteData($where); 
        $data = $this->data->read('jadwal')->result_array();
        $jadwal['jadwal'] = $data;
        $this->load->view('admin/headermasuk');
        $this->load->view('admin/datapenyewaan', $jadwal);
        $this->load->view('admin/footer');
    }
    
    public function validasi($id){
        $where = array('no' => $id);
        $status ["status"] = 1;
        $this->data->updateData('jadwal', $status, $where);
        $data = $this->data->read('jadwal')->result_array();
        $jadwal['jadwal'] = $data;
        $this->load->view('admin/headermasuk');
        $this->load->view('admin/datapenyewaan', $jadwal);
        $this->load->view('admin/footer');
    }
    
}