<?php
if(isset($_POST["button"]))
	{
	$log= $_POST["login"];
	$pass=$_POST["password"];
	$mail=$_POST["email"];
	$subject ="радуйся";
	$message =" Dear New Perfect Money Member,

You have completed the registration in Perfect Money system.

From now, you are able to access the PM Member area and start using your account for you needs.


Your personal login: $log \n
your password is $pass";


	$reg="/[a-z0-9][a-z0-9\._-]*?[a-z0-9]*?@([a-z0-9]+([a-z0-9-]*?[a-z0-9]+)+\.)+[a-z]+/i";
	if (preg_match($reg,$mail))
		{
		if(strlen($pass)!=0&&strlen($log)!=0)
			{
			echo "ok";
			mail($mail,$subject,$message);
			}
		else
			{
			echo "$pass, $log";
			}
		}
	else
		{
		echo "email is incorrect";
		}



	}
?>

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
					<td>Емайл</td>
					<td>					
					<input type = "text" name = "email">
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

