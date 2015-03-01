<?php
	class Point
		{	
		public $x;
		public $y;
		public function __construct ($x,$y)
			{
			$this->x= $x;
			$this->y= $y;
			}
			
		public function getX()
			{
			return $this->x;
			}
			
		public function setX($x)
			{
			$this->x=$x;
			}
			
		public function __toString()
			{
			return "Точка з координатами (".$this->x." ; ".$this->y." )";
			}
		public function __destruct()
			{
			echo "<br/>конец";
			}
			
		public function setPoint($point)
			{
			$this->x=$point->x;
			$this->y=$point->y;
			}
		}
	
	$point = new Point(5,7);
	echo $point->x."<br/>";
	echo $point->y."<br/>";
	$point->y=100;
	echo $point->y."<br/>";
	echo $point->getX()."<br/>";
	$point->setX(10);
	echo $point->getX()."<br/>";
	$point1 = new Point(52,73);
	echo $point."<br/>". $point1;
	$point->setPoint($point1);
	echo $point."<br/>". $point1;
	