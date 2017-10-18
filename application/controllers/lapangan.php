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
        
        
 	public function signup($page = "signup"){
            $data = $this->data->read('user')->result_array();
            $user['user'] = $data;
            $user['page'] = $page;
            $this->load->view('lapangan/header', $user);
            $this->load->view('lapangan/signup_view', $user);
            $this->load->view('lapangan/footer');
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
                $this->load->view('lapangan/home');
                    //redirect('lapangan/index');
            }else{
                    $data = $this->data->read('user')->result_array();
                    $user['user'] = $data;
                    $user['page'] = $page;
                    $this->load->view('lapangan/header', $user);
                    $this->load->view('lapangan/login_view', $user);
                    $this->load->view('lapangan/footer');
            }
	}
        
	public function cek_login($page="cek_login"){
            $data = $this->data->read('lapangan')->result_array();
            $lapangan['lapangan'] = $data;
            $lapangan['page'] = $page;
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $read = $this->data->readWhere('user', $username, 'id_user')->result_array();
            $enkripsi = $this->data->enkripsi($password);
            foreach ($read as $r) {
                $user = $r['id_user'];
                        $pass = $r['password_user'];
                        $nama = $r['nama_user'];
                        $no_telp = $r['no_telp'];
                }

            $enkripsi = $this->data->enkripsi($password);	       
            if ($username==$user) {
                if ($enkripsi==$pass) {
                    $enkripsi = $this->data->enkripsi($password);
                    $data = array(
                        'username'  	=> $user,                    
                        'nama'              => $nama,
                        'no_telp'		=> $no_telp

                    );
                    $this->session->set_userdata($data);
                    $this->session->set_flashdata('success', '
                                    <div class="alert alert-success alert-dismissible" role="alert">
                                              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                              <strong>Berhasil!</strong> Selamat datang '.$nama.'  
                                            </div>
                            ');
                    $this->load->view('lapangan/header', $lapangan);
                    $this->load->view('lapangan/home', $lapangan);
                    $this->load->view('lapangan/footer', $lapangan);
                            //redirect('lapangan/index');
                }
                else{
                    $this->session->set_flashdata('pesan', '
                                    <div class="alert alert-danger alert-dismissible" role="alert">
                                              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                              <strong>Maaf</strong> Password anda salah.
                                            </div>
                            ');
                    redirect('lapangan/login');
                } 
            }
            
            else{
                $this->session->set_flashdata('pesan', '
                                    <div class="alert alert-danger alert-dismissible" role="alert">
                                              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                              <strong>Maaf</strong> Username anda belum terdaftar.
                                            </div>
                            ');
               redirect(base_url('lapangan/login'));
            }
        }
        
 	public function tambah_user(){
            $id_user = $this->input->post('id_user');
            $nama_user = $this->input->post('nama_user');
            $password_user = $this->input->post('password_user');
            $no_telp = $this->input->post('no_telp');
            $cek_user = $this->data->readWhere('user', $id_user, 'id_user')->num_rows();	
            $enkripsi = $this->data->enkripsi($password_user);
            if($cek_user>0){
                    $this->session->set_flashdata('user_available', '
                            <div class="alert alert-danger alert-dismissible" role="alert">
                                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                      <strong>Maaf</strong> Username yang anda pilih sudah terdaftar.
                                    </div>
                    ');
                    
                    redirect('lapangan/signup');
            }else{
                    $data = array(
                    'id_user' => $id_user,
                    'nama_user' => $nama_user,
                    'password_user' => $enkripsi,
                    'no_telp' => $no_telp
            );
            $this->data->addData($data);
            $this->session->set_flashdata('berhasil', '
                            <div class="alert alert-success alert-dismissible" role="alert">
                                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                      <strong>Berhasil,</strong> akun anda telah terdaftar. Silahkan lakukan login kembali.
                                    </div>
                    ');
            redirect('lapangan/login');
            }		
	}
        
    public function logout(){
        unset($_SESSION['username']);    
//        $this->load->view('lapangan/header');
//        $this->load->view('lapangan/login_view');
//        $this->load->view('lapangan/footer');
        redirect(base_url('lapangan/login'));
    }
}