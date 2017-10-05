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
        $this->load->view('admin/headermasuk');
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
    public function inputJadwal(){
            $data = $this->data->inputLapangan()->result_array();
            $tampil['inputLapangan'] = $data;
            $this->load->view('admin/headermasuk');
            $this->load->view('admin/sewajadwal', $tampil);
            $this->load->view('admin/footer');       
    }
    public function datapenyewaan(){
        $data = $this->data->read('jadwal')->result_array();
        $jadwal['jadwal'] = $data;
        $this->load->view('admin/headermasuk');
        $this->load->view('admin/datapenyewaan', $jadwal);
        $this->load->view('admin/footer');
    }
    public function sewajadwal(){
        if ($this->session->has_userdata('username')) {
            $data = $this->data->selectJadwal()->result_array();
            $tampil['sewajadwal'] = $data;
            $this->load->view('admin/headermasuk');
            $this->load->view('admin/datapenyewaan', $jadwal);
            $this->load->view('admin/footer');     
        }
        else{
            redirect(base_url('admin/login'));
        }
    }
    public function cetaksewa(){
        $data = $this->data->read('jadwal')->result_array();
        $jadwal['jadwal'] = $data;
        $this->load->view('admin/headermasuk');
        $this->load->view('admin/cetaksewa', $jadwal);
        $this->load->view('admin/footer');
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
        $this->load->view('admin/dashboard');
        $this->load->view('admin/footer');
    }

    function logout(){
        $this->session->sess_destroy();
        redirect(base_url('index.php/admin'));
    }

    function inputlapangan(){
        if ($this->session->has_userdata('username')) {
            $this->load->view('admin/headermasuk');
            $this->load->view('admin/lapangan');
            $this->load->view('admin/footer');
        }
        else{
            redirect(base_url('index.php/admin/login'));
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
            redirect($uri = base_url('index.php/admin/inputlapangan'), $method = 'auto', $code = NULL);
        }
    }

    function editData($id){
        $update = $this->data->getDataLapangan("where id_lapangan = '$id'");
            $image= $update[0]['gambar_lapangan'];
            $id_lapangan = $update[0]['id_lapangan'];
            $nama = $update[0]['nama_lapangan'];
            $detail = $update[0]['detail_lapangan'];
            $tarifmhs = $update[0]['tarif_mahasiswa'];
            $tarifnon = $update[0]['tarif_nonits'];
            $data = array(
                'id_lapangan' => $id_lapangan,
                'nama_lapangan' => $nama,
                'detail_lapangan' => $detail,
                'tarif_mahasiswa' => $tarifmhs,
                'tarif_nonits' => $tarifnon,
                'gambar_lapangan' => $image, 
                );
        $this->load->view('admin/headermasuk');
        $this->load->view('admin/editData', $data);
        $this->load->view('admin/footer');
    }

    function do_editData(){
        $config['upload_path']          = './assets/lapangan/image/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 10000;
        $config['max_width']            = 5000;
        $config['max_height']           = 5000;

        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('gambar')) {
            echo print_r(array('error' => $this->upload->display_errors()));    
        }
        else{
            $url = base_url().$config['upload_path'].$this->upload->data('file_name');
            $id = $_POST['id'];
            $where = array('id_lapangan' => $id);
            $id = $this->input->post('id');
            $nama = $this->input->post('nama');
            $detail = $this->input->post('detail');
            $tarifmhs = $this->input->post('tarif_mahasiswa');
            $tarifnon = $this->input->post('tarif_nonits');
            $data = array(
                'id_lapangan' => $id_lapangan,
                'nama_lapangan' => $nama,
                'detail_lapangan' => $detail,
                'tarif_mahasiswa' => $tarifmhs,
                'tarif_nonits' => $tarifnon,
                'gambar_lapangan' => $url,  
                );
            $this->data->updateData('lapangan', $data, $where);
            redirect($uri = base_url('index.php/admin/inputlapangan'), $method = 'auto', $code = NULL);
        }
    }

    function datalapangan(){
        if ($this->session->has_userdata('username')) {
            $data = $this->data->selectLapangan()->result_array();
            $tampil['datalapangan'] = $data;
            $this->load->view('admin/headermasuk');
            $this->load->view('admin/datalapangan', $tampil);
            $this->load->view('admin/footer');
        }
        else{
            redirect(base_url('index.php/admin/login'));
        }

    }

    function deleteData($id){  
        $where = array('no' => $id ); 
        $res = $this->data->deleteData($where);  
        redirect($uri = base_url('index.php/admin/datapenyewaan'), $method = 'auto', $code = NULL);
    }

    function deleteDataLapangan($id){  
        $where = array('id_lapangan' => $id ); 
        $res = $this->data->deleteDataLapangan($where);  
        redirect($uri = base_url('index.php/admin/datalapangan'), $method = 'auto', $code = NULL);
    }

}