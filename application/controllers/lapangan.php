<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Lapangan extends CI_Controller {
	
	function __construct(){
            parent::__construct();		
            $this->load->model('data');
            $this->load->helper('url');
	}
 
	public function index($page = 'home'){		
            $lapangan['page'] = $page;
            $this->load->view('lapangan/header', $lapangan);
            $this->load->view('lapangan/home', $lapangan);
            $this->load->view('lapangan/footer');
	}

    public function homePil($type, $page = 'homePilihan'){
        
        $data = $this->data->selectLapanganSewa($type)->result_array();
        $tampil['lapangan'] = $data;
        $tampil['page'] = $page;
        
        if($type=='futsal'){

            $this->load->view('lapangan/header', $tampil);
            $this->load->view('lapangan/homeFutsal', $tampil);
            $this->load->view('lapangan/footer');
        }
        else if($type=='basket'){
            $this->load->view('lapangan/header', $tampil);
            $this->load->view('lapangan/homeBasket', $tampil);
            $this->load->view('lapangan/footer');
        }
        else if($type=='futsalKom'){
            $this->load->view('lapangan/header', $tampil);
            $this->load->view('lapangan/homeFutsalKom', $tampil);
            $this->load->view('lapangan/footer');
        }
        else{
            $this->load->view('lapangan/header', $tampil);
            $this->load->view('lapangan/homeBasketKom', $tampil);
            $this->load->view('lapangan/footer');
        }
    }

    public function homePilKom($type,$page = 'homePilihan'){

            
        /*$lapangan['page'] = $page;
        if($type=='futsal'){

            $data = $this->data->selectKompetisi1($type)->result_array();
            $lapangan['datalapangan'] = $data;
            $lapangan['page'] = $page;

            $this->load->view('lapangan/header', $lapangan);
            $this->load->view('lapangan/kompetisi', $lapangan);
            $this->load->view('lapangan/footer');
        }
        else if($type=='basket'){
            $this->load->view('lapangan/header', $lapangan);
            $this->load->view('lapangan/homeBasket', $lapangan);
            $this->load->view('lapangan/footer');
        }
        else if($type=='futsalKom'){
            $this->load->view('lapangan/header', $lapangan);
            $this->load->view('lapangan/homeFutsalKom', $lapangan);
            $this->load->view('lapangan/footer');
        }
        else{
            $this->load->view('lapangan/header', $lapangan);
            $this->load->view('lapangan/homeBasketKom', $lapangan);
            $this->load->view('lapangan/footer');
        }*/
    }

    public function gambarLapangan($type, $page = 'gambarLapangan'){      
            $data = $this->db->get_where('lapangan',array('type' => $type));
            $data = $data->result_array();
            $lapangan['lapangan'] = $data;
            $lapangan['page'] = $page;

            

            if($type=='futsal'){
                $this->load->view('lapangan/header', $lapangan);
                $this->load->view('lapangan/lapFutsal', $lapangan);
                $this->load->view('lapangan/footer');
            }
            else{
                $this->load->view('lapangan/header', $lapangan);
                $this->load->view('lapangan/lapBasket', $lapangan);
                $this->load->view('lapangan/footer');
            }
    }

	public function sewajadwal($page = 'sewajadwal'){
            $data = $this->data->selectJadwal($this->session->userdata('nama'))->result_array();
            $tampil['sewajadwal'] = $data;
            $tampil['page'] = $page;
            $this->load->view('lapangan/header', $tampil);
            $this->load->view('lapangan/sewajadwal', $tampil);
            $this->load->view('lapangan/footer');		
	}

    public function jadwal($id, $page="jadwal"){
            //$data = $this->data->selectCekJadwal($nama)->result_array();

            //$data = $this->data->readWhere('jadwal', $id, 'nama_lapangan')->result_array();
            //$where = array('nama_lapangan' => $id);

            $data = $this->data->selectJadwal1($id)->result_array();
            $jadwal['jadwal'] = $data;
            //$tampil['cekjadwal'] = $data;
            $jadwal['page'] = $page;
            $this->load->view('lapangan/header', $jadwal);
            $this->load->view('lapangan/cekjadwal', $jadwal);
            $this->load->view('lapangan/footer');       
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

    public function detailkompetisi($id, $page="detail"){
            $data = $this->data->readWhere('kompetisi', $id, 'id_kompetisi')->result_array();
            $where = array('id_kompetisi' => $id);
            $lapangan['lapangan'] = $data;
            $lapangan['page'] = $page;
            $this->load->view('lapangan/header', $lapangan);
            $this->load->view('lapangan/detailkompetisi', $lapangan);
            $this->load->view('lapangan/footer');
    }

    public function kompetisi($page = 'kompetisi'){
            $data = $this->data->selectKompetisi()->result_array();
            $tampil['kompetisi'] = $data;
            $tampil['page'] = $page;
            $this->load->view('lapangan/header', $tampil);
            $this->load->view('lapangan/kompetisi', $tampil);
            $this->load->view('lapangan/footer');       
    }

	public function inputsewa($admin, $page = "inputsewa"){
            if ($this->session->has_userdata('username')) {
                    $data=array('nama_lapangan'=> $this->data->get_lapangan($admin));  
                    $lapangan['kode'] = time();
                    $tampil = $this->data->readWhere('lapangan', $admin, 'pemilik')->result_array();
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

    public function uploadnota($admin, $page = "uploadnota"){
            if ($this->session->has_userdata('username')) {
                    $data=array('nama_lapangan'=> $this->data->get_lapangan($admin));  
                    $lapangan['kode'] = time();
                    $tampil = $this->data->readWhere('lapangan', $admin, 'pemilik')->result_array();
                    $lapangan['lapangan'] = $data;
                    $lapangan['lapangan'] = $tampil;
                    $lapangan['page'] = $page;
                    $this->load->view('lapangan/header', $lapangan);
                    $this->load->view('lapangan/uploadnota', $lapangan);
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
            $type = $this->input->post('type');
            $admin = $this->input->post('admin');
//            $nomer_identitas = $this->input->post('nomer_identitas');
            $nama_lapangan = $this->input->post('nama_lapangan');
            $tanggal = $this->input->post('tanggal');
            $jam = $this->input->post('jam');
            $lama_sewa = $this->input->post('lama_sewa');

            $data = array(
                    'no' => $no,
                    'nama' => $nama,
                    'kategori' => $kategori,
                    'type' => $type,
                    'admin' => $admin,
                    //'nomer_identitas' => $nomer_identitas,
                    'nama_lapangan' => $nama_lapangan,
                    'tanggal' => $tanggal,
                    'jam' => $jam,
                    'lama_sewa' => $lama_sewa
            );
            $this->data->createJadwal($data, 'jadwal');
            redirect('lapangan/sewajadwal/'.$admin);}
	

        function upload(){
            
            $config['upload_path']          = './assets/nota/image/';
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
            $no = $this->input->post('no');

            $data = array(
                'no' => $no,
                'nota_pembayaran' => $url, 
                );
            
            $this->data->insertData('jadwal', $data);
            redirect($uri = base_url('lapangan.cekjadwal'), $method = 'auto', $code = NULL);

        }
    }


	public function login($page = 'login'){
            
            if($this->session->has_userdata('username')){
                $this->load->view('lapangan/home');
                    //redirect('lapangan/index');
            }

            else{
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
                        'no_telp'		=> $no_telp,

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
                    
                    redirect('lapangan/signup');}
            else{
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
            redirect('lapangan/login');}}
        
    public function logout(){
        unset($_SESSION['username']);    
        redirect(base_url('lapangan/login'));}
}