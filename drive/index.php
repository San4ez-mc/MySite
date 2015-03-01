<?php
	mb_internal_encoding("UTF-8");//внутрішнє кодування двіжка
	require_once "lib/database_class.php";
	require_once "lib/frontpagecontent_class.php";
	
	$db= new DataBase();
	$view = $_GET["view"];
	switch ($view)
		{
		case "":
			$content = new FrontPage($db);
			break;
		default: exit;
		}

?>