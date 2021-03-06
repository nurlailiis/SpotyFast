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
        if ($this->session->has_userdata('username_admin')) {
            $data = $this->data->read('admin')->result_array();
            $admin['admin'] = $data;
            $this->load->view('admin/headermasuk');
            $this->load->view('admin/dashboard', $admin);
            $this->load->view('admin/footer');
        }
        else{
            redirect(base_url('index.php/admin/index'));
        }
    }

    function inputkompetisi(){
        if ($this->session->has_userdata('username_admin')) {
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
            $this->session->has_userdata('username_admin');
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
        if ($this->session->has_userdata('username_admin')) {
            $data = $this->data->selectKompetisi()->result_array();
            $tampil['datakompetisi'] = $data;
            $this->load->view('admin/headermasuk');
            $this->load->view('admin/datakompetisi', $tampil);
            $this->load->view('admin/footer');
        }
        else{
            redirect(base_url('index.php/admin/login'));}}

    public function datapenyewaan(){
        if ($this->session->has_userdata('username_admin')) {
            $data = $this->data->selectJadwal2($this->session->userdata('username_admin'))->result_array();
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
                        'username_admin'=>$admin,
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

    function deleteDataLapangan($id){  
        $where = array('id_lapangan' => $id ); 
        $res = $this->data->deleteLapangan($where);  
        redirect($uri = base_url('index.php/admin/datalapangan'), $method = 'auto', $code = NULL);}

    function login(){
        if ($this->session->has_userdata('username_admin')) {
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
        if ($this->session->has_userdata('username_admin')) {
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
            $this->session->has_userdata('username_admin');
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
        if ($this->session->has_userdata('username_admin')) {
            $data = $this->data->selectLapangan($this->session->userdata('username_admin'))->result_array();
            $tampil['datalapangan'] = $data;
            $this->load->view('admin/headermasuk');
            $this->load->view('admin/datalapangan', $tampil);
            $this->load->view('admin/footer');
        }
        else{
            redirect(base_url('index.php/admin/login'));}}

    function editDataLapangan($id){
        $update = $this->data->getDataLapangan("where id_lapangan = '$id'");

            $image= $update[0]['gambar_lapangan'];
            $id = $update[0]['id_lapangan'];
            $nama = $update[0]['nama_lapangan'];
            $detail = $update[0]['detail_lapangan'];
            $admin = $update[0]['pemilik'];
            $type = $update[0]['type'];
            $tarifmhs = $update[0]['tarif_student'];
            $tarifnon = $update[0]['tarif_umum'];
            $data = array(
                'id_lapangan' => $id,
                'nama_lapangan' => $nama,
                'detail_lapangan' => $detail,
                'pemilik' => $admin,
                'type' => $type,
                'tarif_student' => $tarifmhs,
                'tarif_umum' => $tarifnon,
                'gambar_lapangan' => $image, 
                );
        $this->load->view('admin/headermasuk');
        $this->load->view('admin/editDataLapangan', $data);
        $this->load->view('admin/footer');}

    function doEditLapangan(){
        $config['upload_path']          = './assets/lapangan/image/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 1000000;
        $config['max_width']            = 1000000;
        $config['max_height']           = 1000000;

        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('gambar')) {
            echo print_r(array('error' => $this->upload->display_errors()));    
            //redirect(base_url());
        }
        else{
            $id = $_POST['id'];
            $where = array('id_lapangan' => $id);

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
            $this->data->updateData('lapangan', $data, $where);
            redirect($uri = base_url('index.php/admin/inputlapangan'), $method = 'auto', $code = NULL);}}

    function editDataKompetisi($id){
        $update = $this->data->getDataKompetisi("where id_kompetisi = '$id'");

            $image= $update[0]['gambar_kompetisi'];
            $id = $update[0]['id_kompetisi'];
            $nama = $update[0]['nama_kompetisi'];
            $tanggal = $update[0]['tanggal_kompetisi'];
            $penyelenggara = $update[0]['penyelenggara'];
            $lokasi = $update[0]['lokasi_kompetisi'];
            $data = array(
                'id_kompetisi' => $id,
                'nama_kompetisi' => $nama,
                'tanggal_kompetisi' => $tanggal,
                'penyelenggara' => $penyelenggara,
                'lokasi_kompetisi' => $lokasi,
                'gambar_kompetisi' => $image, 
                );
        $this->load->view('admin/headermasuk');
        $this->load->view('admin/editDataKompetisi', $data);
        $this->load->view('admin/footer');}

    function doEditKompetisi(){
        $config['upload_path']          = './assets/lapangan/image/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 1000000;
        $config['max_width']            = 1000000;
        $config['max_height']           = 1000000;

        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('gambar')) {
            echo print_r(array('error' => $this->upload->display_errors()));    
            //redirect(base_url());
        }
        else{
            $id = $_POST['id'];
            $where = array('id_kompetisi' => $id);

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
            $this->data->updateData('kompetisi', $data, $where);
            redirect($uri = base_url('index.php/admin/inputkompetisi'), $method = 'auto', $code = NULL);}}

    function deleteData($id){  
        $where = array('no' => $id ); 
        $res = $this->data->deleteData($where); 
        redirect('admin/datapenyewaan');
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