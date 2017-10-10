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
            //$this->obj1 = $this->newController('data/readWhere');
        
        }
        
        public function test_index()
	{
		$output = $this->request('GET', 'admin/index');
		$this->assertContains('<h1>PANEL ADMIN FUTSAL FASOR ITS</h1>', $output);
	}
        
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
        
        //adminlogin
        public function test_index_not_logged_in_admin()
	{
		// This request is redirected to '/auth/login'
		$this->request('GET', 'C_adminlogin/adminmasuk');
		$this->assertRedirect('C_adminlogin/index');
	}
        //adminlogin
       
        
        //admin
        public function test_getBarang() {
            $actual = $this->obj1->GetBarang();
            $this->assertEquals('1',count($actual));
        }
        
}
