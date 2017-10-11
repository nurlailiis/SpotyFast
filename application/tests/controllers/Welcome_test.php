<?php
/**
 * Part of ci-phpunit-test
 *
 * @author     Kenji Suzuki <https://github.com/kenjis>
 * @license    MIT License
 * @copyright  2015 Kenji Suzuki
 * @link       https://github.com/kenjis/ci-phpunit-test
 */

class Welcome_test extends TestCase
{
	
        public function setUp(){
            $this->resetInstance();
            $this->obj = $this->newModel('data');
        }
        
        public function test_index()
	{
            $output = $this->request('GET', 'admin/index');
            $this->assertContains('<h1>PANEL ADMIN FUTSAL FASOR ITS</h1>', $output);
	}
        
        public function test_header_session(){
            $this->request('POST', 'admin/index',
                    $_POST['username'] = 'username',
                    $_POST['password'] = 'username',
                    ]
                    );
            $this->assertEquals('nurlailiis', $_SESSION['username']);
            $this->assertContains('<h1>PANEL ADMIN FUTSAL FASOR ITS</h1>', $output);
        }

        public function test_ceklogin(){
            $this->request('POST', 'admin/cek_login',
                    [
                        'username' => 'nurlailiis',
                        'password' => '1234',
                    ]
                    );
            $this->assertEquals('nurlailiis', $_SESSION['username']);
        }
        
        public function test_ceklogin_admin_not_login(){
            $this->request('GET', 'admin/cek_login');
            $this->assertRedirect('index.php/admin/index');
	}
        
        public function test_login(){
            $output = $this->request('GET', 'admin/login');
            $this->assertContains('<strong>Dashboard</strong>', $output);
        }

//      public function test_logout(){
//            $this->request('GET', 'admin/logout');
//            $this->warningOff();
//            $this->assertRedirect('index.php/admin/index');
//        }
        
        public function test_dahboard(){
            $output = $this->request('GET', 'admin/dashboard');
            $this->assertContains('<strong>Data Lapangan</strong>', $output);
        }
        
        public function test_datapenyewaan(){
            $output = $this->request('GET', 'admin/datapenyewaan');
            $this->assertContains('<th>NO</th>', $output);
        }
        
        public function test_method_404()
	{
		$this->request('GET', 'welcome/method_not_exist');
		$this->assertResponseCode(404);
	}
        
        public function test_dashboard()
	{
		$output = $this->request('GET', 'admin/index');
		$this->assertContains('<h1>PANEL ADMIN FUTSAL FASOR ITS</h1>', $output);
	}

//	public function test_APPPATH()
//	{
//		$actual = realpath(APPPATH);
//		$expected = realpath(__DIR__ . '/../..');
//		$this->assertEquals(
//			$expected,
//			$actual,
//			'Your APPPATH seems to be wrong. Check your $application_folder in tests/Bootstrap.php'
//		);
//	}
        
}