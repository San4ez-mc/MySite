<?php
require_once "config_class.php";

class CheckValid
	{
	private $config;
	
	public function __construct()
		{
		$this->config = new Config();
		}
		
	public function validID($id)
		{
		if($this->isIntNumber($id))return false;
		if($id<=0) return false;
		return true;
		}
		
	public function validLogin($login)
		{
		if($this->isContainQuotes($login)) return false;
		if(preg_match("/^d*$/", $login)) return false;
		return $this->validString($login, $this->config->min_login, $this->config->max_login);
		}
	
	public function validHash($hash) 
		{
		if(!$this->validString($hash,32, 32)) return false;
		if(!$this->isOnlyLetterAndDigits($hash)) return false;
		return true;
		}
		
	public function validTimeStamp($time)
		{
		return $this->isNoNegativeInteger($time);
		}
		
		
	private function isIntNumber($number)
		{
		if(!is_int($number) && !is_string($number)) return false;
		if(!preg_match("/^-?(([1-9][0-9]*)|0)$/", $number)) return false;
		return true;
		}
	
	private function isNoNegativeInteger($number)
		{
		if(!$this->isIntNumber($number)) return false;
		if($number < 0) return false;
		return true;
		}
		
	private function isOnlyLetterAndDigits($string)
		{
		if(!is_int($string) &&(!is_string($string))) return false;
		if(!preg_match("/[a-zà-ÿ0-9]*/", $string)) return false;
		return true;
		}
	
	private function validString($string, $min_length, $max_lengtth)
		{
		if(!is_string($string)) return false;
		if(strlen($string) < $min_length) return false;
		if(strlen($string) > $max_length) return false;
		return true;
		}
	
	private function isContainQoutes($string)
		{
		$array= array("\"", "'", "`", "&quot;", "&apos;");
		foreach ($array as $key=>$value)
			{
			if(strpos($string,$value)!==false)return true;
			}
		return false;
		}
	
	public function isValidText($text,$min_length, $max_length)
		{
		if(!$this->validString($text, $min_length, $max_length)) return false;
		$regex .= "([a-z0-9+!*(),;?&=\$_.-]+(\:[a-z0-9+!*(),;?&=\$_.-]+)?@)?"; // User and Pass 
		if(!preg_match("/^$regex$/",$string)) return false;
	//	if(!preg_match("/[a-zà-ÿ0-9\.\,\-\(\)]*/", $string)) return false;
		return true;
		}
		
	public function isValidPath($text,$min_length, $max_length)
		{
		if(!$this->validString($text, $min_length, $max_length)) return false;
		$regex .= "(\/([a-z0-9+\$_-]\.?)+)*\/?"; // Path 
		if(!preg_match("/^$regex$/",$string)) return false;
	/	return true;
		}
	
	
	}



?>