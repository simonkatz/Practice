<?php

abstract class Shape {
	protected $color;

	public function __construct($color = 'red') {
		$this->color = $color;
	}

	public function getColor() {
		return $this->color;
	}

	abstract protected function area()
}

class Square extends Shape {

	public function area($length) {
		return pow($length, 2);
	}
}

class Triangle extends Shape {
	
	public function area($base, $height) {
		return .5 * $base * $height;
	}
}

class Circle extends Shape {
	public function area($radius) {
		return M_pie * pow($radius, 2);
	}
}


