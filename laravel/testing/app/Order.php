<?php

namespace App;
use App\Product;

class Order {
	protected $products = [];

	public function addProduct(Product $product) {
		$this->products[] = $product; 
	}

	public function countProduct() {
		return $this->products;
	}

	public function totalCost() {
		$totalCost = 0;
		foreach ($this->products as $product) {
			$totalCost += $product->price(); 
		}
		return $totalCost;
	}
}