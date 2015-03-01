<?php
	interface housekeeping
		{
		public function Flatkeeping();
		public function kitchenkeeping();
		}
	abstract class Human implements housekeeping
		{
		public function birth() 
			{
			$this->birthMessage();
			}
		
		abstract protected function birthMessage();
				
		}
		
	class Student extends Human
		{
		public function birthMessage()
			{
			echo "народився новий студент)"; 
			}
			
		public function Flatkeeping()
			{
			echo "Студент прибирає квартиру";
			}
			
		public function kitchenkeeping()
			{
			echo "Студент прибирає кухню";
			}
		}
		
	class Programmer extends Human
		{
		public function birthMessage()
			{
			echo "народився новий програміст)"; 
			}
		
		public function Flatkeeping()
			{
			echo "Програміст прибирає квартиру";
			}
			
		public function kitchenkeeping()
			{
			echo "Програміст прибирає кухню";
			}
		}
		
		
	$prog = new Programmer();
	$stud = new Student;
	$prog->birth();
	$stud->birth();
	$stud->Flatkeeping();
	$stud->kitchenkeeping();


?>