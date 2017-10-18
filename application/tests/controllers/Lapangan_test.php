<?php
/**
 * Part of ci-phpunit-test
 *
 * @author     Kenji Suzuki <https://github.com/kenjis>
 * @license    MIT License
 * @copyright  2015 Kenji Suzuki
 * @link       https://github.com/kenjis/ci-phpunit-test
 */

class Lapangan_test extends TestCase
{
	
        public function setUp(){
        if(isset($_SESSION)) $_SESSION = aaray();
        $this->resetInstance();
        $this->CI->load->model('data');
        $this->obj1 = $this->CI->data;
        }
        
        public function test_index()
        {
            $output = $this->request('GET', 'lapangan/index');
            $this->assertContains('<meta charset="utf-8">', $output);
            $this->assertContains('<div class="card" style="width: 20rem;">', $output);
            $this->assertContains('<footer>', $output);
        }

        public function test_sewajadwal(){
            $_SESSION['username'] = "name";
            
            $output = $this->request('GET', 'lapangan/sewajadwal');
//            $this->assertContains('<head>', $output);
//            $this->assertContains('<div class="table-responsive">', $output);
//            $this->assertContains('<footer>', $output);          
        }
        public function test_sewajadwal_gagal(){
            $_SESSION['username'] != "name";
            
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
            $_SESSION['username'] = "name";
            
            $output = $this->request('GET', 'lapangan/inputsewa');           
            $this->assertContains('<head>', $output);
            $this->assertContains('<h3><i>Tambah Penyewaan</i></h3>', $output);
            $this->assertContains('<footer>', $output);                                           
        }
        public function test_inputsewa_gagal(){
            $_SESSION['username'] != "name";
            
            $output = $this->request('GET', 'lapangan/inputsewa');                                                      
            $this->assertRedirect(base_url('lapangan/login', $output));            
        }       
        
        public function test_signup() {
            $output = $this->request('GET', 'lapangan/signup');
            $this->assertContains('<h1>SIGN UP</h1>', $output);
        }
        
//        public function test_createsewa() {
//            $output = $this->request('GET', 'lapangan/createsewa');
//            $this->assertContains('<h2>Tabel Sewa Jadwal</h2>', $output);
//        }
        
//        public function test_createsewa(){
//            $this->request('POST', 'lapangan/createsewa',
//                    [
//                        'no' => '3',
//                        'nama' => 'ara',
//                        'kategori' => 'mahasiswa',
//                        'nomer_identitas' => '5215100128',
//                        'tanggal' => '2017-09-13',
//                        'jam' => '14:00:00',
//                        'lama_sewa' => '1', 
//                    ]);
//            
//            //$this->assertEquals('arakhrn', $_SESSION['username']);
//            //$output = $this->request('GET', 'lapangan/createsewa');
////            $this->assertContains('<h2>Tabel Sewa Jadwal</h2>');
//            $this->assertRedirect('lapangan/sewajadwal');
//        }

        public function test_ceklogin(){
            $this->request('POST', 'lapangan/cek_login',
                    [
                        'username' => 'arakhrn',
                        'password' => '1234',
                    ]
                    );
            $this->assertEquals('arakhrn', $_SESSION['username']);
        }
        
        public function test_login_sukses(){
            $_SESSION['username'] = "name";
            $output = $this->request('GET', 'lapangan/login');
//            $this->assertRedirect(base_url('lapangan/index', $output));                                  
        }
        public function test_login_gagal(){
            $_SESSION['username'] != "name";
            
            $output = $this->request('GET', 'lapangan/login');
            $this->assertContains('<head>', $output);
            $this->assertContains('<h1>LOGIN</h1>', $output);
            $this->assertContains('<footer>',$output);                       
        }
        
        public function test_login_gagal_password() {
            $output = $this->request('POST', 'lapangan/cek_login',
                [
                    'username' => 'arakhrn',
                    'password' => '',
                ]);
//            $this->assertRedirect('index.php/lapangan/index/fail', $output);
            $this->assertFalse( isset($_SESSION['username']) );
        }
        
        public function test_login_gagal_username() {
            $output = $this->request('POST', 'lapangan/cek_login',
                [
                    'username' => 'arse',
                    'password' => '1234',
                ]);
//            $this->assertRedirect('index.php/lapangan/index/fail', $output);
            $this->assertFalse( isset($_SESSION['username']) );
        }
        
        public function test_tambah_user_gagal() {
            $this->request('POST', 'lapangan/tambah_user',
                    [
                        'id_user' => 'arakhrn',
                        'nama_user' => 'aisyah paramastri',
                        'password' => '1234',
                        'no_telp' => '082226256261',
                    ]);
//                $this->load->view('lapangan/header', $lapangan);
//                $this->load->view('lapangan/tambah_akun', $lapangan);
//                $this->load->view('lapangan/footer', $lapangan);
            $this->assertRedirect('lapangan/tambah_user');
        }
        
        public function test_tambah_user_berhasil() {
            $this->request('POST', 'lapangan/tambah_user',
                    [
                        'id_user' => 'aisyahparamastri',
                        'nama_user' => 'aisyah paramastri khairina',
                        'password_user' => '1234',
                        'no_telp' => '081234567890', 
                    ]);
                 $this->load->view('lapangan/header', $lapangan);
                 $this->load->view('lapangan/login_view', $lapangan);
                 $this->load->view('lapangan/footer', $lapangan);

//            $this->assertRedirect('lapangan/login');
//            $this->assertRedirect('lapangan/tambah_user');
        }
    //    public function test_createsewa(){
  //         $output = $this->request('POST', 'lapangan/createsewa');
//           $this->assertRedirect(base_url('lapangan/sewajadwal'));                   
//        }

//        public function test_method_404()
//	{
//		$this->request('GET', 'welcome/method_not_exist');
//		$this->assertResponseCode(404);
//	}

        public function test_APPPATH()
        {
            $actual = realpath(APPPATH);
            $expected = realpath(__DIR__ . '/../..');
            $this->assertEquals(
                $expected,
                $actual,
                'Your APPPATH seems to be wrong. Check your $application_folder in tests/Bootstrap.php'
            );
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
            //$this->assertRedirect('index.php/lapangan');
//            $this->assertRedirect('index.php/lapangan', $output);
            $this->load->view('lapangan/header', $lapangan);
            $this->load->view('lapangan/login_view', $lapangan);
            $this->load->view('lapangan/footer', $lapangan);
        }
}