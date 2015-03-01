<?php
if(!file_exists("text"))
	{
	mkdir("text");
	}

class SomeClass
	{
	public static $dir="text";
	
	public static function ReadFile()
		{
		//chdir(self::$dir);
		if (file_exists("file"))
			{
			
			$string = file_get_contents("file");
			echo $string;
			}	
		}
		
	public static function WriteIntoFile($write)
		{
		//chdir(self::$dir);
		
			$file=fopen("file", "a+t");
			fwrite($file, $write);
			
		}	
		
	public static function DeleteText()
		{
		chdir(self::$dir);
		unlink("file");
		}
	
	}
	chdir(SomeClass::$dir);
	echo SomeClass::ReadFile()."<br/>";
	SomeClass::WriteIntoFile("lol");
	echo SomeClass::ReadFile()."<br/>";
	SomeClass::DeleteText();
	echo "Залишилося: ".SomeClass::ReadFile()."<br/>";











?>