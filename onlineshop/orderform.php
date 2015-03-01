<?php
	require_once "admin/admin.php";
	if($_GET["product"]==="")
		{
		header("Location: http://onlineshop.mysite.lol/error.php");
		}
		
		
	$error_mail= "";
	$error_name= "";
	$error=false;
		
	session_start();
		
		
	
	
	if (isset($_POST["addorder"]))
		{
		$id=$_SESSION["orders"];
		$cName = $_POST["custumerName"];
		$mail= $_POST["mail"];
		$comment= $_POST["comment"];
		
//перевірка чи корректно введний email
		$reg="/[a-z0-9][a-z0-9\._-]*?[a-z0-9]*?@([a-z0-9]+([a-z0-9-]*?[a-z0-9]+)+\.)+[a-z]+/i";
		if(!preg_match($reg,$mail))
			{
			$error_mail= "ви ввели невірний мейл";
			$error=true;
			} 
		
//перевірка чи заповнено всі поля		
		if( strlen($comment)==0) $comment = "__";
		if( strlen($cName)==0)
			{
			$error_name = "заповніть, будь ласка, поле 'ім'я'";
			$error= true;
			}
	 
		if(!$error)
			{
			$mysqli= new mysqli("localhost", "root", "", "onlineshop" );
			$mysqli->query("SET NAMES 'UTF8'");
			
			foreach( $id as &$value)
				{
				$mysqli->query("INSERT INTO `orders`(`orderid`,`name`,`mail`,`comment`,`date`) VALUES ('$value','$cName','$mail','$comment',".time().")"); 
				$result_set=$mysqli->query("SELECT `countCustumers` FROM `products` WHERE `id` LIKE '$value'");
				$row = $result_set->fetch_assoc();
				$count=$row["countCustumers"]+1;
				$mysqli->query("UPDATE `products` SET `countCustumers`='$count' WHERE `id` LIKE '$value'");
				}
			$mysqli->close();
			header("Location: http://onlineshop.mysite.lol/success.php");
			exit;
			}
		}
		echo ADMIN::ShowAdminPanel($_SESSION["isAuth"]);
		//potim zaminutu id na nazvy tovary w4ob luduni bulo zrozumiliwe
	echo "ви обрали товари <br/>";
	$orders = $_SESSION["orders"];
	foreach($orders as &$value)
		{
		echo " № ".$value."</br>";
		}
	echo "Для продовження заповніть, будь ласка, наступні форми:";
	?>


<html>
	<head>
	
	</head>
	<body>
		<form name = "order" action= "orderform.php" method = "post">
			<table>
				<tr>
					<td>Ім'я</td>
					<td>
						<input type ="text" name= "custumerName">
					</td> 
				</tr>
				<tr>
					<td>Електронна адреса</td>
					<td>
						<input type ="mail" name= "mail">
					</td> 
					<td>
						<span style="color: red;"><?php echo $error_mail;?></span>
					</td>
				</tr>
				<tr>
					<td>Коментар</td>
					<td>
						<textarea name="comment" rows = 6 cols = 15></textarea>
					</td> 
				</tr>
				<tr>
					<td>
						<input type = "submit" name = "addorder" value = "ok">
					</td>
					<td>
						<span style="color: red;"><?php echo $error_name;?></span>
					</td>
				</tr>
			</table>
		</form>
	</body>
</html>



