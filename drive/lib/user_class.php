<?php
	require_once "glabal_class.php";
	
	class User extends GlobalClass
		{
		public function __construct($db)
			{
			parent::__constuct("users", $db);
			}
		
		public function addUser($login, $password, $regdate)
			{
			if($this->checkValid($login,$password,$regdate)) return false;
			return $this->add(array("login" =>$login, "password" =>$password, "regdate" =>$regdate);
			}
		
		public function editUser($id,$login, $password,$regdate)
			{
			if($this->checkValid($login,$password,$regdate)) return false;
			return $this->add($id,array("login" =>$login, "password" =>$password, "regdate" =>$regdate);
			}
		
		public function isExists($login)
			{
			return $this->isExists("login", $login);
			}
		
		public function getUserOnLogin($login)
			{
			$id = $this->getField("id", "login", $login);
			return $this->get($id);
			}
			
		private function checkValid($login, $password, $regdate) 
			{
			if(!$this->valid->validLogin($login) return false;
			if(!$this->valid->validHash($password) return false;
			if(!$this->valid->validTimeStamp($regdate) return false;
			return true;
			}
		}



?>