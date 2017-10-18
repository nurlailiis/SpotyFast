<?php

class Welcome_test extends TestCase
{
	
        public function setUp(){
            $this->resetInstance();
            $this->obj = $this->newModel('data');
        }
        
        public function test_index()
	{
            $output = $this->request('GET', 'admin/index');
//            $this->assertContains('<h1>PANEL ADMIN FUTSAL FASOR ITS</h1>', $output);
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
        
        public function test_ceklogin_admin_not_login_kosongsemua(){
            $output = $this->request('POST', 'admin/cek_login',
                [
                    'username' => '',
                    'password' => '',
                ]);
            $this->assertFalse( isset($_SESSION['username'], $output) );
//            $this->assertContains('<strong>Welcome</strong>', $output);
	}
        
        public function test_ceklogin_admin_not_login_nopassword(){
            $ouput = $this->request('POST', 'admin/cek_login',
                [
                    'username' => 'nurlailiis',
                    'password' => '',
                ]);
            $this->assertFalse( isset($_SESSION['username'], $ouput) );
//            $this->assertContains('<strong>Welcome</strong>', $output);
        }
        
        public function test_ceklogin_admin_not_login_nousername(){
            $output = $this->request('POST', 'admin/cek_login',
                [
                    'username' => '',
                    'password' => '1234',
                ]);
            $this->assertFalse( isset($_SESSION['username'], $output) );
//            $this->assertContains('<strong>Welcome</strong>', $output);
        }
        
        public function test_ceklogin_admin_not_login_unmatch(){
            $output = $this->request('POST', 'admin/cek_login',
                [
                    'username' => 'nurlailiis',
                    'password' => 'unmatch',
                ]);
            $this->assertFalse( isset($_SESSION['username'], $output) );
//            $this->assertContains('<strong>Welcome</strong>', $output);
        }
        
        public function test_login(){
            $this->request('POST', 'admin/cek_login',
                    [
                        'username' => 'nurlailiis',
                        'password' => '1234',
                    ]
                    );
            $this->assertEquals('nurlailiis', $_SESSION['username']);
            $output = $this->request('GET', 'admin/login');
//            $this->assertContains('Dashboard', $output);
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
//            $this->assertContains('<h6>Add</h6>', $output);   
        }
        
        public function test_no_inputlapangan() {
            $output = $this->request('GET', 'admin/inputlapangan');
//            $this->assertContains('<h6>Add</h6>', $output);   
        }
        
        public function test_dahboard(){
            $this->request('POST', 'admin/cek_login',
                    [
                        'username' => 'nurlailiis',
                        'password' => '1234',
                    ]
                    );
            $this->assertEquals('nurlailiis', $_SESSION['username']);
            $output = $this->request('GET', 'admin/dashboard');
//            $this->assertContains('<strong>Data Lapangan</strong>', $output);
        }
        
        public function test_datapenyewaan(){
            $this->request('POST', 'admin/cek_login',
                    [
                        'username' => 'nurlailiis',
                        'password' => '1234',
                    ]
                    );
            $this->assertEquals('nurlailiis', $_SESSION['username']);
            $output = $this->request('GET', 'admin/datapenyewaan');
//            $this->assertContains('<th>NO</th>', $output);
        }
        
        public function test_tambahlapangan(){
            $output = $this->request('GET', 'admin/tambahLapangan');
//            $this->assertContains('<th>NO</th>', $output);
        }
        
        public function test_tambahlapangan_success(){
            $this->request('POST', 'admin/cek_login',
                    [
                        'username' => 'nurlailiis',
                        'password' => '1234',
                    ]
                    );
            $this->assertEquals('nurlailiis', $_SESSION['username']);
            $output = $this->request('GET', 'admin/tambahLapangan');
//            $this->assertContains('<th>NO</th>', $output);
        }
        
        public function test_editData(){
            $this->request('POST', 'admin/cek_login',
                    [
                        'username' => 'nurlailiis',
                        'password' => '1234',
                    ]
                    );
            $this->assertEquals('nurlailiis', $_SESSION['username']);
            $output = $this->request('GET', 'admin/editData');
//            $this->assertContains('<h6>Edit</h6>', $output);
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
//            $this->assertContains('<h6>Data</h6>', $output);
        }
        
         public function test_not_datalapangan(){
            $output = $this->request('GET', 'admin/datalapangan');
//            $this->assertContains('<strong>Dashboard</strong>', $output); 
        }
        
        public function test_deleteData(){
            $this->request('POST', 'admin/cek_login',
                    [
                        'username' => 'nurlailiis',
                        'password' => '1234',
                    ]
                    );
            $this->assertEquals('nurlailiis', $_SESSION['username']);
            $output = $this->request('GET', 'admin/deleteData');
            $this->assertRedirect('index.php/admin/datapenyewaan');
        }
       
        public function test_deleteDataLapangan(){
            $output = $this->request('GET', 'admin/deleteDataLapangan');
            $this->assertRedirect('index.php/admin/datalapangan', $output);
        }
        
        public function test_validasi(){
            $this->request('POST', 'admin/cek_login',
                    [
                        'username' => 'nurlailiis',
                        'password' => '1234',
                    ]
                    );
            $this->assertEquals('nurlailiis', $_SESSION['username']);
            $output = $this->request('GET', 'admin/validasi');
        }
        
        public function test_no_validasi(){
            $output = $this->request('GET', 'admin/validasi');
//            $this->assertRedirect('index.php/admin/datapenyewaan', $output);
        }
        
        public function test_do_editData(){
            $this->request('POST', 'admin/cek_login',
                    [
                        'username' => 'nurlailiis',
                        'password' => '1234',
                    ]
                    );
            $this->assertEquals('nurlailiis', $_SESSION['username']);
            $output = $this->request('GET', 'admin/do_editData');
//            $this->assertContains('<h6>Edit</h6>');
        }
        
        public function test_do_editData_failed(){
            $output = $this->request('GET', 'admin/do_editData');
//            $this->assertContains('<h6>Edit</h6>');
//            $this->assertRedirect('index.php/admin/inputlapangan', $output);
        }
}