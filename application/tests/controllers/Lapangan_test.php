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
            $_SESSION['username'] = "name";
            
            $output = $this->request('GET', 'lapangan/sewajadwal');        
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
        
        public function test_createsewa(){
            $_SESSION['username'] = "name";
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
            $this->assertRedirect('lapangan/sewajadwal');
            $where = 1;
            $this->objl->deleteData($where);
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
        
        public function test_login_sukses(){
            $_SESSION['username'] = "name";
            $output = $this->request('GET', 'lapangan/login');                                
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
            $this->request('POST', 'lapangan/tambah_user',
                    [
                        'id_user' => 'arakhrn',
                        'nama_user' => 'aisyah paramastri',
                        'password' => '1234',
                        'no_telp' => '082226256261',
                    ]);
        }
        
        public function test_tambah_user_berhasil() {
            $this->request('POST', 'lapangan/tambah_user',
                    [
                        'id_user' => 'aisyahparamastri',
                        'nama_user' => 'aisyah paramastri khairina',
                        'password_user' => '1234',
                        'no_telp' => '081234567890', 
                    ]);
                 
        }

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
            
        }
}