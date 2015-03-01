<?php
	class Math
		{
		public static $count=0;
		
		public static function getSin($x)
			{
			self::$count++;
			return sin($x);
			}
		
		public static function getCos($x)
			{
			self::$count++;
			return cos($x);
			}
		
		}

	echo Math::getSin(1)."<br/>";
	echo Math::getcOS(1)."<br/>";
	echo Math::$count;
?>