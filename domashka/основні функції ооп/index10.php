<?php
	session_start();
	if (isset($_SESSION["login"])&&isset($_SESSION["password"]))
		{
		echo "Вітаємо, Адмін<br/>";
		echo '<a href = "page3.php">Вийти</a> ';
		//session_destroy();
		} 
	else 
		{
		echo "Авторизуйтесь, будь ласка<br/>";
		echo '
<html>
	<body>
		<form name = "form1" action= "index.php" method="post">
			<table>
				<tr>
					<td>Логін</td>
					<td>					
					<input type = "text" name = "login">
					</td>
				</tr>
				<tr>
					<td>Пароль</td>
					<td>					
					<input type = "text" name = "password">
					</td>
				</tr>
				<tr>
					<td>
					<input type = "submit" name= "button" value="ok">
					</td>
				</tr>
			</table>
		</form>
	<body>
<html>
';
		}
	if(isset($_POST["button"]))
		{
		$log= $_POST["login"];
		$pass= $_POST["password"];
		$reg = "/Admin/";
		$reg2 = "/pass/";
		if(preg_match($reg,$log)&&preg_match($reg2,$pass))
			{
			
			$_SESSION["login"]= "Admin";
			$_SESSION["password"] = "pass";
			ECHO "вІТАЄМО аДМІН";
			}
		else
			{
			echo "Хибний логін і/або пароль";
			}
		}
		



