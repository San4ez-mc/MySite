<?php
	class Auto
		{
		protected $x;
		protected $y;
		
		public function __construct($x =0,$y=0)
			{
			$this->x=$x;
			$this->y=$y;
			}
		public function Move($x,$y)
			{
			$this->strMove($x,$y);
			}
			
		public function strMove($x,$y,$type = "")
			{
			if($type == "") 
				{
				echo "Рухаємо автомобіль із точки (".$this->x.", ".$this->y.") в точку  (".$x.", ".$y.");<br/>";
				}
			else echo"Рухаємо ".$type."автомобіль із точки (".$this->x.", ".$this->y.") в точку  (".$x.", ".$y.");<br/>";
			} 
		
		}

	class Car extends Auto
		{
		public function __construct($x=0,$y=0)
			{
			parent::__construct($x,$y);
			}
		
		public function Move($x,$y)
			{
			$this->strMove($x,$y," легковий ");
			}
		}
		
		class Truck extends Auto
		{
		private $capacity;
		public function __construct($x=0,$y=0,$capacity= "5000")
			{
			parent::__construct($x,$y);
			$this->capacity=$capacity;
			}
		
		public function Move($x,$y)
			{
			$this->strMove($x,$y,"грузовий ");
			}
		}

		$auto = new Auto();
		$car = new Car();
		$truck = new Truck();

		$auto->Move(10,10);
		$car->Move(10,10);
		$truck->Move(10,10);
?>