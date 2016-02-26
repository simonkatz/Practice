<?php 

use App\Product;
use App\Order;

class OrderTest extends PHPUnit_Framework_TestCase {
	
	protected $order;
	public function setup() {	
		$this->order = new Order();

		$product = new Product('Cup', 12);
		$product2 = new Product('Plate', 20);

		$this->order->addProduct($product);
		$this->order->addProduct($product2);
	}

	/** @test */
	function orderConsistsOfProduct() {
		$this->assertCount(2, $this->order->countProduct());
	}

	/** @test */
	public function order_determines_total_cost_of_all_products() {
		$this->assertEquals(32, $this->order->totalCost());
	}
}