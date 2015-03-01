<?php
	class Priamokytnuk
		{
		public $x;
		public $y;
		public $shuruna;
		public $vusota;
		public $id;
		public static $idnext; 
		
		public function __Construct($x,$y,$shuruna,$vusota)
			{
			$this->x=$x;
			$this->y=$y;
			$this->shuruna= $shuruna;
			$this->vusota=$vusota;
			$this->id = self::$idnext;
			self::$idnext++;
			}
			
		public function __Clone()
			{
			$this->id = self::$idnext;
			self::$idnext++;
			}
		
		public function __ToString()
			{
			return "Координати правого верхнього кута (".$this->x.",".$this->y.")</br>ширина - ".$this->shuruna.", висота - ".$this->vusota."<br/> id - ".$this->id."<br/>";
			}
		
		}
		
		
		if(!isset(Priamokytnuk::$idnext))
			{
			Priamokytnuk::$idnext=1;	
			}
	$priam1 = new Priamokytnuk(1,2,3,4);
	$priam2 = new Priamokytnuk(1,2,3,4);
	
	$priam3 = clone $priam1;
	$priam4 = clone $priam2;
	
	echo $priam1,$priam2,$priam3,$priam4;














?>