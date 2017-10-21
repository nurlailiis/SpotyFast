<?php

class Lapangan_test extends TestCase
{
	
        public function setUp(){
        if(isset($_SESSION)) $_SESSION = aaray();
        $this->resetInstance();
        $this->CI->load->model('data');
        $this->objl= $this->CI->data;
        }
        
        public function test_index()
        {
            $output = $this->request('GET', 'lapangan/index');
            $this->assertContains('<meta charset="utf-8">', $output);
            $this->assertContains('<div class="card" style="width: 20rem;">', $output);
            $this->assertContains('<footer>', $output);
        }

        public function test_sewajadwal(){
            $_SESSION['username'] = "nama";
            
            $output = $this->request('GET', 'lapangan/sewajadwal');        
        }
        public function test_sewajadwal_gagal(){
            $_SESSION['username'] != "nama";
            
            $output = $this->request('GET', 'lapangan/sewajadwal');                                                      
            $this->assertRedirect(base_url('lapangan/login', $output));            
        }
        public function test_detail(){
            $output = $this->request('GET', 'lapangan/detail');
            $this->assertContains('<head>', $output);
            $this->assertContains('<h1>Detail Lapangan</h1>', $output);
            $this->assertContains('<footer>', $output);                       
        }
        public function test_inputsewa(){
            $_SESSION['username'] = "nama";
            
            $output = $this->request('GET', 'lapangan/inputsewa');           
            $this->assertContains('<head>', $output);
            $this->assertContains('<h3><i>Tambah Penyewaan</i></h3>', $output);
            $this->assertContains('<footer>', $output);                                           
        }
        public function test_inputsewa_gagal(){
            $_SESSION['username'] != "nama";
            
            $output = $this->request('GET', 'lapangan/inputsewa');                                                      
            $this->assertRedirect(base_url('lapangan/login', $output));            
        }       
        
        public function test_signup() {
            $output = $this->request('GET', 'lapangan/signup');
            $this->assertContains('<h1>SIGN UP</h1>', $output);
        }
        
        public function test_createsewa(){
            $_SESSION['username'] = "nama";
            $awal = $this->objl->getNumRow('3','ara','mahasiswa', '5215100128', 'Lapangan A', '2017-09-13', '14:00:00', '1');
            $this->request('POST', 'lapangan/createsewa',
                    [
                        'no' => '3',
                        'nama' => 'ara',
                        'kategori' => 'mahasiswa',
                        'nomer_identitas' => '5215100128',
                        'nama_lapangan' => 'Lapangan A',
                        'tanggal' => '2017-09-13',
                        'jam' => '14:00:00',
                        'lama_sewa' => '1' 
                    ]);
            $akhir = $this->objl->getNumRow('3','ara','mahasiswa', '5215100128', 'Lapangan A', '2017-09-13', '14:00:00', '1');
            $this->assertEquals($akhir, $awal+1);
            
            
            $this->assertRedirect('lapangan/sewajadwal');
            $where = 3;
            $this->objl->deleteData($where);
        }
        
        public function test_login_sukses(){
            $_SESSION['username'] = "nama";
            $output = $this->request('GET', 'lapangan/login');                                
        }
        public function test_login_gagal(){
            $_SESSION['username'] != "nama";
            
            $output = $this->request('GET', 'lapangan/login');
            $this->assertContains('<head>', $output);
            $this->assertContains('<h1>LOGIN</h1>', $output);
            $this->assertContains('<footer>',$output);                       
        }

        public function test_ceklogin(){
            $this->request('POST', 'lapangan/cek_login',
                    [
                        'username' => 'arakhrn',
                        'password' => '1234',
                    ]
                    );
            $this->assertEquals('arakhrn', $_SESSION['username']);
        }
        
        public function test_login_gagal_password() {
            $output = $this->request('POST', 'lapangan/cek_login',
                [
                    'username' => 'arakhrn',
                    'password' => '',
                ]);
            $this->assertFalse( isset($_SESSION['username']) );
        }
        
        public function test_login_gagal_username() {
            $output = $this->request('POST', 'lapangan/cek_login',
                [
                    'username' => 'arse',
                    'password' => '1234',
                ]);
            $this->assertFalse( isset($_SESSION['username']) );
        }
        
        public function test_tambah_user_gagal() {            
            $output = $this->request(
                    'POST',
                    'lapangan/tambah_user',
                    [
                        'id_user' => 'aisyahparamastri',
                        'nama_user' => 'aisyah paramastri khairina',
                        'password_user' => '1234',
                        'no_telp' => '081234567890', 
                    ]);
            //$this->assertRedirect('lapangan/signup',$output);
        }
        public function test_tambah_user_gagal_tidak_diisi() {
            $output = $this->request('POST', 'lapangan/tambah_user',
                [
                    'id_user' => '',
                    'nama_user' => 'aisyah paramastri khairina',
                    'password_user' => '1234',
                    'no_telp' => '081234567890',
                ]);
            $item = '';
            $this->objl->deleteUser($item);
            $this->assertFalse( isset($_SESSION['username']) );
            
        }
        public function test_tambah_user_gagal_namauser_tidak_diisi() {
            $output = $this->request('POST', 'lapangan/tambah_user',
                [
                    'id_user' => 'aisyahparamastri',
                    'nama_user' => '',
                    'password_user' => '1234',
                    'no_telp' => '081234567890',
                ]);
            $this->assertFalse( isset($_SESSION['username']) );
            
        }
        public function test_tambah_user_gagal_password_tidak_diisi() {
            $output = $this->request('POST', 'lapangan/tambah_user',
                [
                    'id_user' => 'aisyahparamastri',
                    'nama_user' => 'aisyah paramastri khairina',
                    'password_user' => '',
                    'no_telp' => '081234567890',
                ]);
            $item = '';
            $this->objl->deleteUser($item);
            $this->assertFalse( isset($_SESSION['username']) );
            
        }
        public function test_tambah_user_gagal_notelp_tidak_diisi() {
            $output = $this->request('POST', 'lapangan/tambah_user',
                [
                    'id_user' => 'aisyahparamastri',
                    'nama_user' => 'aisyah paramastri khairina',
                    'password_user' => '1234',
                    'no_telp' => '',
                ]);
            $this->assertFalse( isset($_SESSION['username']) );
            
        }
        public function test_tambah_user_gagal_tidak_diisi_semua() {
            $output = $this->request('POST', 'lapangan/tambah_user',
                [
                    'id_user' => '',
                    'nama_user' => '',
                    'password_user' => '',
                    'no_telp' => '',
                ]);
            $this->assertFalse( isset($_SESSION['username']) );
            
        }
        
        public function test_tambah_user_berhasil(){
            $output = $this->request(
                    'POST',
                    'lapangan/tambah_user',
                    [
                        'id_user' => 'modavid',
                        'nama_user' => 'david',
                        'password_user' => '1234',
                        'no_telp' => '0811111', 
                    ]);                      
            $item = 'modavid';
            $this->objl->deleteUser($item);            
            $this->assertRedirect('lapangan/login',$output); 
        }

        public function test_logout(){
            $output = $this->request('POST', 'lapangan/cek_login',
                    [
                        'username' => 'arakhrn',
                        'password' => '1234',
                    ]
                    );
            $this->assertEquals('arakhrn', $_SESSION['username']);
            $this->request('GET', 'lapangan/logout');
            
        }
}