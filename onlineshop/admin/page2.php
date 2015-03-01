<?php
	require_once "admin.php";
	if(!ADMIN::isAuth())
		{
		header("Location: http://onlineshop.mysite.lol/index.php");
		exit;
		}

		if(isset($_GET["page"]))
			{
			$page = $_GET["page"];
			}
		else
			{
			$page=1;
			}
			
	echo ADMIN::ShowAdminPanel($_SESSION["isAuth"]);
	
	$mysqli = new mysqli("localhost","root","","onlineshop");
	$mysqli->query("SET NAMES 'UTF8'");
	$result_set=$mysqli->query("SELECT * FROM `orders`");
	
	ADMIN::makke3Line($result_set,$page);
	
	ADMIN::pages($result_set);
	
	ADMIN::contents();
	
	$mysqli->close();
	
	
?>
