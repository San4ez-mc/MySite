<?php
	abstract class Shape
		{
		protected $x;
		protected $y;
		
		public function __construct($x,$y)
			{
			$this->x=$x;
			$this->y=$y;
			}
			
		public function draw()
			{
			echo $this->drawShape()."<br/>";
			}
		
		abstract protected function drawShape();
		}
	 
	class Circle extends Shape
		{
		private $radius;
		
		public function __construct($x,$y,$radius)
			{
			parent::__construct($x,$y);
			$this-> radius= $radius;
			}
			
		protected function drawShape()
			{
			return "Малюємо коло з радіусом ".$this->radius;
			}
		} 
		
	class Rectangle extends Shape
		{
		private $width;
		private $height;
		
		public function __construct($x,$y,$width,$height)
			{
			parent::__construct($x,$y);
			$this->width = $width;
			$this->height= $height;
			}
			
		protected function drawShape()
			{
			return "Малюємо прямокутник з шириною ".$this->width." і висотою ".$this->height;
			}
		}
	
	$circle = new Circle(0,0,50);
	$rect= new Rectangle(0,0,100,50);
	$circle->draw();
	$rect->draw();
	
?>