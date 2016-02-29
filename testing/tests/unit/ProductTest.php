<?php

use App\Product;

class ProductTest extends PHPUnit_Framework_TestCase {
	protected $product;
	
	public function setup() {
		$this->product = new Product('Fallout4', 59);
	}

	/** @test */
	function aProductHasAName() {
		$this->assertEquals('Fallout4', $this->product->name());
	}

	/** @test */
	function aProductHasAPrice() {
		$this->assertEquals('59', $this->product->price());
	}
}