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
			echo "��������� ����� �������)"; 
			}
			
		public function Flatkeeping()
			{
			echo "������� ������� ��������";
			}
			
		public function kitchenkeeping()
			{
			echo "������� ������� �����";
			}
		}
		
	class Programmer extends Human
		{
		public function birthMessage()
			{
			echo "��������� ����� ���������)"; 
			}
		
		public function Flatkeeping()
			{
			echo "��������� ������� ��������";
			}
			
		public function kitchenkeeping()
			{
			echo "��������� ������� �����";
			}
		}
		
		
	$prog = new Programmer();
	$stud = new Student;
	$prog->birth();
	$stud->birth();
	$stud->Flatkeeping();
	$stud->kitchenkeeping();


?>