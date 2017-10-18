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
	}
        
        public function test_ceklogin_admin_not_login_nopassword(){
            $ouput = $this->request('POST', 'admin/cek_login',
                [
                    'username' => 'nurlailiis',
                    'password' => '',
                ]);
            $this->assertFalse( isset($_SESSION['username'], $ouput) );
        }
        
        public function test_ceklogin_admin_not_login_nousername(){
            $output = $this->request('POST', 'admin/cek_login',
                [
                    'username' => '',
                    'password' => '1234',
                ]);
            $this->assertFalse( isset($_SESSION['username'], $output) );
        }
        
        public function test_ceklogin_admin_not_login_unmatch(){
            $output = $this->request('POST', 'admin/cek_login',
                [
                    'username' => 'nurlailiis',
                    'password' => 'unmatch',
                ]);
            $this->assertFalse( isset($_SESSION['username'], $output) );
        }
        
        public function test_login(){
            $_SESSION['username'] = "username";
            $output = $this->request('GET', 'admin/login');
        }

        public function test_logout(){
            $_SESSION['username'] = "username";
            $this->request('GET', 'admin/logout');
            $this->assertRedirect('index.php/admin');
        }
        
        public function test_inputlapangan() {
            $_SESSION['username'] = "username";
            $output = $this->request('GET', 'admin/inputlapangan');
        }
        
        public function test_no_inputlapangan() {
            $_SESSION['username'] != "username";
            $output = $this->request('GET', 'admin/inputlapangan');
        }
        
        public function test_dahboard(){
            $_SESSION['username'] = "username";
            $output = $this->request('GET', 'admin/dashboard');
        }
        
        public function test_datapenyewaan(){
            $_SESSION['username'] = "username";
            $output = $this->request('GET', 'admin/datapenyewaan');
        }
        
        public function test_tambahlapangan_failed(){
            $_SESSION['username'] != "username";
            $output = $this->request('GET', 'admin/tambahLapangan');
        }
        
        public function test_tambahlapangan_success(){
            $_SESSION['username'] = "username";
            $this->request('POST', 'admin/tambahLapangan',
                    [
                        'id_lapangan' => '1009',
                        'nama_lapangan' => 'Lapangan B',
                        'detail_lapangan' => 'Lapangan Futsal Fasor ITS',
                        'tarif_mahasiswa' => '80000',
                        'tarif_nonits' => '10000',
                        'gambar_lapangan' => 'http://localhost/GIT/./assets/lapangan/image/20140608_1845481.jpg'
                    ]);
        }
        
        public function test_editData(){
            $_SESSION['username'] = "username";
            $output = $this->request('GET', 'admin/editData');
        }
        
        public function test_datalapangan(){
            $_SESSION['username'] = "username";
            $output = $this->request('GET', 'admin/datalapangan');
        }
        
         public function test_not_datalapangan(){
             $_SESSION['username'] != "username";
            $output = $this->request('GET', 'admin/datalapangan');
        }
        
        public function test_deleteData(){
            $_SESSION['username'] = "username";
            $output = $this->request('GET', 'admin/deleteData');
        }
        
        public function test_validasi(){
            $_SESSION['username'] = "username";
            $output = $this->request('GET', 'admin/validasi');
        }
        
        public function test_no_validasi(){
            $_SESSION['username'] != "username";
            $output = $this->request('GET', 'admin/validasi');
        }
        
        public function test_do_editData(){
            $_SESSION['username'] = "username";
            $output = $this->request('GET', 'admin/do_editData');
        }
        
        public function test_do_editData_failed(){
            $_SESSION['username'] != "username";
            $output = $this->request('GET', 'admin/do_editData');
        }
}