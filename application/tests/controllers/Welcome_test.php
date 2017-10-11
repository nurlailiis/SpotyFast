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

        public function test_logout(){
            $this->request('POST', 'admin/cek_login',
                    [
                        'username' => 'nurlailiis',
                        'password' => '1234',
                    ]
                    );
            $this->assertEquals('nurlailiis', $_SESSION['username']);
            $this->request('GET', 'admin/logout');
            $this->assertRedirect('index.php/admin');
        }
        
        public function test_inputlapangan() {
            $this->request('POST', 'admin/cek_login',
                    [
                        'username' => 'nurlailiis',
                        'password' => '1234',
                    ]
                    );
            $this->assertEquals('nurlailiis', $_SESSION['username']);
            $output = $this->request('GET', 'admin/inputlapangan');
            $this->assertContains('<h6>Add</h6>', $output);   
        }
        
        public function test_dahboard(){
            $output = $this->request('GET', 'admin/dashboard');
            $this->assertContains('<strong>Data Lapangan</strong>', $output);
        }
        
        public function test_datapenyewaan(){
            $output = $this->request('GET', 'admin/datapenyewaan');
            $this->assertContains('<th>NO</th>', $output);
        }
        
        public function test_tambahlapangan(){
            $output = $this->request('GET', 'admin/tambahLapangan');
            $this->assertContains('<th>NO</th>', $output);
        }
        
        public function test_editData(){
            $output = $this->request('GET', 'admin/editData');
            $this->assertContains('<h6>Edit</h6>', $output);
        }
        
        public function test_datalapangan(){
            $this->request('POST', 'admin/cek_login',
                    [
                        'username' => 'nurlailiis',
                        'password' => '1234',
                    ]
                    );
            $this->assertEquals('nurlailiis', $_SESSION['username']);
            $output = $this->request('GET', 'admin/datalapangan');
            $this->assertContains('<h6>Data</h6>', $output);
        }
        
         public function test_not_datalapangan(){
            $output = $this->request('GET', 'admin/datalapangan');
            $this->assertContains('<strong>Dashboard</strong>', $output); 
        }
        
        public function test_deleteData(){
            $output = $this->request('GET', 'admin/deleteData');
            $this->assertRedirect('index.php/admin/datapenyewaan');
        }
      
}