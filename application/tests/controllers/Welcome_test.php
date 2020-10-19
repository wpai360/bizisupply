<?php
/**
 * Part of ci-phpunit-test
 *
 * @author     Kenji Suzuki <https://github.com/kenjis>
 * @license    MIT License
 * @copyright  2015 Kenji Suzuki
 * @link       https://github.com/kenjis/ci-phpunit-test
 */

class Welcome_test extends UnitTestCase
{
	public function setUp():void
    {
        $this->resetInstance();
        $this->CI->load->model('OrderRequestModel');
        $this->obj = $this->CI->OrderRequestModel;
    }

	public function test_get_order_request()
	{
		$order = array(
			'user_id' => 1,
			'draft' => 0,
			'product_assign_category' => 1,
			'brand_name_1' => 'brand1',
			'order_name_1' => 'product1',
			'part_number_1' => 'partnumber1',
			'quantity_1' => 'qty1',
			'note_1' => 'note1',
			'order_random_id' => '19960516'
		  );
		$result = $this->obj->insertOrderRequest($order);
		print_r($result);
	}
	// public function test_method_404()
	// {
	// 	$this->request('GET', 'welcome/method_not_exist');
	// 	$this->assertResponseCode(404);
	// }

	// public function test_APPPATH()
	// {
	// 	$actual = realpath(APPPATH);
	// 	$expected = realpath(__DIR__ . '/../..');
	// 	$this->assertEquals(
	// 		$expected,
	// 		$actual,
	// 		'Your APPPATH seems to be wrong. Check your $application_folder in tests/Bootstrap.php'
	// 	);
	// }
}
