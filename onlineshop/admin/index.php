<?php
	require_once "admin.php";
	
	if(isset($_POST["outButton"]))
		{
		ADMIN::logOut();
		}

	if(!ADMIN::isAuth())
		{
		header("Location: http://onlineshop.mysite.lol/index.php");
		exit;
		}
	else 	
		{
		
		if(isset($_GET["page"]))
			{
			$page = $_GET["page"];
			}
		else
			{
			$page=1;
			}
		
		$mysqli = new mysqli("localhost","root","","onlineshop");
		$mysqli->query("SET NAMES 'UTF8'");
		
		echo ADMIN::ShowAdminPanel($_SESSION["isAuth"]);
		
		$result_set=$mysqli->query("SELECT * FROM `products`");
		ADMIN::makke3Line($result_set,$page);
		
		ADMIN::pages($result_set);
	
		ADMIN::contents();
	
		$mysqli->close();
		}
?>