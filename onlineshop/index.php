<?php
	require_once "admin/admin.php";
	if(isset($_POST["adminbutton"]))
		{
		ADMIN::$error_admin="невірний логін та/або пароль";
		ADMIN::CheckLoginPassword($_POST["login"],$_POST["password"]);
		}
	else ADMIN::$error_admin="";
	
	$mysqli = new mysqli("localhost","root","","onlineshop");
	$mysqli->query("SET NAMES 'UTF8'");
	
	if(isset($_POST["outButton"]))
		{
		ADMIN::logOut();
		}
			
	if(isset($_POST["button"]))
		{
		session_start();
		
		$result_set=$mysqli->query("SELECT `id` FROM `products`");
		while (($row = $result_set->fetch_assoc())!=false)
			{
			if($_POST["check".$row["id"]]=="on")
				{
				$ordersarr[]= $row["id"];
				}
			}

			if($ordersarr!=null)
				{
				foreach($ordersarr as $value)
				{
				$orders=$orders.$value.",";
				}
				
				$_SESSION["orders"]=$ordersarr;
				header("Location: http://onlineshop.mysite.lol/orderform.php?product=".$orders);
				}
			else
				{
				header("Location: http://onlineshop.mysite.lol/error.php");
				}
		$mysqli->close();
		exit;
		}
	
	$result_set=$mysqli->query("SELECT * FROM `products`");
	session_start();
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<meta charset="utf-8"/>
		<?php echo ADMIN::ShowAdminPanel($_SESSION["isAuth"]);?>
	</head>
	<body>
		<form name ="form" action = "index.php" method="post">
			<table>
				<?php ADMIN::makkeLine($result_set);?>
				<tr>
					<td>
						<input type="submit" name = "button" value= " зробити замовлення">
					</td>
				</tr>
			</table>
		</form>
	</body>
</html>


