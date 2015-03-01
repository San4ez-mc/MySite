<?php
	require_once "glabal_class.php";
	
	class Section extends GlobalClass
		{
		public function __construct($db)
			{
			parent::__constuct("sections", $db);
			}
		
		}



?>