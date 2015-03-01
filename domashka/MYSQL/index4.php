<?php
	class Human
		{
		private $height;
		private $weight;
		private $age;
		private $eyeColor;
		
		public function __construct($height,$weight,$age,$eyeColor)
			{
			$this->height=$height;
			$this->weight=$weight;
			$this->age=$age;
			$this->eyeColor=$eyeColor;
			}
		
		public function getHeight()
			{
			return $this->height;
			}

		public function SetHeight($height)
			{
			$this->height=$height;
			}

			public function getWeight()
			{
			return $this->weight;
			}

		public function SetWeight($weight)
			{
			$this->weight=$weight;
			}
			
			public function getAge()
			{
			return $this->age;
			}

		public function SetAge($age)
			{
			$this->age=$age;
			}
			
			public function getEyeColor()
			{
			return $this->eyeColor;
			}

		public function SetEyeColor($eyeColor)
			{
			$this->eyeColor=$eyeColor;
			}
		}

	Class Student extends Human
		{
		private $univercity;
		private $course=1;
		private $faculty;
		
		public function __construct($height,$weight,$age,$eyeColor,$univercity,$course=1,$faculty)
			{
			parent::__construct($height,$weight,$age,$eyeColor);
			$this->univercity=$univercity;
			$this->course=$course;
			$this->faculty=$faculty;
			}
		
		public function getUnivercity()
			{
			return $this->univercity;
			}

		public function SetUnivercity($univercity)
			{
			$this->univercity=$univercity;
			}

		public function getCourse()
			{
			return $this->course;
			}

		public function SetCourse($course)
			{
			$this->course=$course;
			}
			
		public function getFaculty()
			{
			return $this->faculty;
			}

		public function SetFaculty($faculty)
			{
			$this->faculty=$faculty;
			}
		
		public function GraduateCourse()
			{
			$this->course++;
			if($this->course>5)
				{
				echo "Вітаємо з закінченням";
				}
			}
		}

	Class Programmer extends Human
		{
		private $zarplata;
		private $languages = array();
		
		public function __construct($height,$weight,$age,$eyeColor,$zarplata,$languages)
			{
			parent::__construct($height,$weight,$age,$eyeColor);
			$this->languages= $languages;
			$this->zarplata = $zarplata;
			}
		
		public function getZarplata()
			{
			return $this->zarplata;
			}

		public function SetZarplata($z)
			{
			$this->zarplata = $z;
			}
			
		public function SetLanguages($languages)
			{
			$this->languages=array($languages);
			}
			
		public function GetLanguages()
			{
			return $this->languages;
			}
		
		public function NewLanguage($lang)
			{
			if(!isset($this->languages))
				{
				$this->languages=array();
				}
				$this->languages[count($this->languages)+1]=$lang;
			}
		
		}

		$array  = array("php","java");
		$Sasha = new Programmer(170, 68,21,"brown",6000,$array);
		$J= new Student ( 180,80, 21,"blue","TNEY",1,"FKIT");
		
		echo $Sasha->GetHeight()."<br/>";
		echo $Sasha->GetWeight()."<br/>";
		echo $Sasha->GetAge()."<br/>";
		echo $Sasha->GetEyeColor()."<br/>";
		echo $Sasha->GetZarplata()."<br/>";
		echo "<br/>";
		echo $J->getFaculty()."<br/>";
		echo $J->GetHeight()."<br/>";
		echo $J->GetWeight()."<br/>";
		echo $J->GetAge()."<br/>";
		echo $J->GetEyeColor()."<br/>";
		echo "<br/>";
		$Sasha->setHeight(172);
		echo $Sasha->GetHeight();
		echo "<br/>";
		//$newarrs= array("C++","Java");
		//$Sasha->SetLanguages($newarrs);
		print_r($Sasha->GetLanguages());
		$Sasha->NewLanguage("perl");
		print_r($Sasha->GetLanguages());
		?>		