<?php
	require_once "glabal_class.php";
	
	class Banner extends GlobalClass
		{
		public function __construct($db)
			{
			parent::__constuct("banners", $db);
			}
		
		}



?>