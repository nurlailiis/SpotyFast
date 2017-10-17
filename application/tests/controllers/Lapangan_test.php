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
            $this->assertContains('<head>', $output);
            $this->assertContains('<div class="table-responsive">', $output);
            $this->assertContains('<footer>', $output);          
        }
        public function test_sewajadwal_gagal(){
            $_SESSION['username'] != "name";
            
            $output = $this->request('GET', 'lapangan/sewajadwal');                                                      
            $this->assertRedirect(base_url('lapangan/login'));            
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
            $this->assertRedirect(base_url('lapangan/login'));            
        }       
        
        public function test_signup() {
            $output = $this->request('GET', 'lapangan/signup');
            $this->assertContains('<h1>SIGN UP</h1>', $output);
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
            $this->assertRedirect(base_url('lapangan/index'));                                  
        }
        public function test_login_gagal(){
            $_SESSION['username'] != "name";
            
            $output = $this->request('GET', 'lapangan/login');
            $this->assertContains('<head>', $output);
            $this->assertContains('<h1>LOGIN</h1>', $output);
            $this->assertContains('<footer>',$output);                       
        }
        
//        public function test_createsewa(){
//           $output = $this->request('POST', 'lapangan/createsewa');
//           $this->assertRedirect(base_url('lapangan/sewajadwal'));                   
//        }

        public function test_method_404()
	{
		$this->request('GET', 'welcome/method_not_exist');
		$this->assertResponseCode(404);
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
}