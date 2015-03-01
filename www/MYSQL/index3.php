<?php
	class Circle
		{	
		private $x;
		private $y;
		private $r;
		public function __construct ($x,$y,$r)
			{
			$this->x= $x;
			$this->y= $y;
			$this->r= $r;
			}
			
		public function getX()
			{
			return $this->x;
			}
			
		public function setX($x)
			{
			$this->x=$x;
			}
		
		public function getY()
			{
			return $this->x;
			}
			
		public function setY($x)
			{
			$this->x=$x;
			}
		
		public function getR()
			{
			return $this->r;
			}
			
		public function setR($r)
			{
			$this->r=$r;
			}
		
		
		public function getDistantion($circle_1)
			{
			return sqrt($this->getPow2($circle_1));
			}
			
		private function getPow2($circle) 
			{
			return pow(($this->x - $circle->x),2) + pow(($this->y - $circle->y),2);
			}
			
		public function __toString()
			{
			return "Точка з координатами (".$this->x." ; ".$this->y." )";
			}
		public function __destruct()
			{
			echo "<br/>конец";
			}
			
		public function setcircle($circle)
			{
			$this->x=$circle->x;
			$this->y=$circle->y;
			}
		
		
		public function areOverlaped($circle1)
			{
			$d = $this->getDistantion($circle1);
			$r1= $this->getR();
			$r2= $circle1->getR();
			if ($d>$r1+$r2)
				{
				echo "коло не перетинаються, вони далеко";
				}
			else 
				{
				if($d==$r1+$r2)
					{
					echo "Кола ззовні доторкаються";
					}
				else
					{
					if(($r1<=$d+$r2&&$r1>$r2)||($r2<=$d+$r1&&$r2>$r1))
						{
						echo "кола перетинаються, або дотикаються зсередини";
						}
					else 
						{
						echo "одне коло всередині іншого, але не перетинаються";
						}
					}
				}
			}
		}
		
	$circle = new Circle(0,0,10);
	$circle_1= new Circle(5,0,5);
	echo $circle->getDistantion($circle_1);
	echo "<br/> і так, <br/>";
	$circle->areOverlaped($circle_1);
	