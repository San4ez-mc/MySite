<?php
	session_start(); 
	if($_GET["session"]=="over")
		{
		print_r($_SESSION);
		SESSION_DESTROY();
		print_r($_SESSION);
		}
	if(isset($_POST["button"]))
		{
			$login= $_POST["login"];
			$password = $_POST["password"];
			$mail = $_POST["mail"];
			$from= "slyzhba_bezpoleznoi_rozsulku@zhizni.net";
			$subject = "Вітаємо вас";
			$message = "Вітаємо Вас\nВи успішно пройшли реєстрацію на нашому неіснуючому сайті. \nВаш логін - $login\nВаш пароль - $password\nНасолоджуйтеся";
						
			$_SESSION["login"]=$login;
			$_SESSION["password"] = $password;
			$_SESSION["mail"]=$mail;
					
			$error_login="";
			$error_password="";
			$error_mail="";
			$error= false;
			
			$reg="/[a-z0-9][a-z0-9\._-]*?[a-z0-9]*@([a-z0-9]+([a-z0-9-]*?[a-z0-9]+)+\.)+[a-z]+/i";
			if(!preg_match($reg,$mail))
				{
				$error_mail ="неправильний email";
				$error=true;
				}
							
						
			if(strlen($login)==0)
				{
				$error_login= " Не написаний логін";
				$error= true;
				}
			
			//перевірка чи існує даний логін	
			if(file_exists("logins.txt"))
				{
				$logins = file_get_contents("logins.txt");
				if(preg_match("$$login$",$logins))
					{
					$error_login = "Такий логін уже існує";
					$error = true;
					}
				}
										
			if(strlen($password)==0)
				{
				$error_password= " Не вказаний пароль";
				$error= true;
				}
				
			if(!$error)
				{
				$subject = "=?windows-1251?B?".base64_encode($subject)."?=";
				$headers = "From: $from\r\nReply-to:$from\r\nContent-type: text/plain; charset=windows-1251\r\n";
				mail($mail, $subject,$message,$headers);
				
				if(file_exists('logins.txt'))
					{
					$file = fopen('logins.txt', "a+t");
					fwrite($file, "$$login$\n*$password*\n$mail\n\n");
					fclose($file);
					}
				
				header("Location: success.php?register=1");
				exit;
				} 
		}
	if(isset($_POST["button2"]))
		{
		$login= $_POST["login2"];
		$password = $_POST["password2"];
		$error_password2="";
		$error2 = false; 
		
		$_SESSION['login2']=$login;
		
		if(strlen($login)==0||strlen($password)==0)
			{
			$error_password2= "Заповніть, будь ласка , всі поля";
			$error2= true;
			}
		else
			{
			if(file_exists("logins.txt"))
				{
				$logins = file_get_contents("logins.txt");
				if(strpos($logins, "$$login$"))
					{
					$p1=strpos($logins, "*", strpos($logins, "$$login$"))+1;
					$p2=strpos($logins, "*", $p1);
					if($password != substr($logins,$p1,$p2-$p1))
						{
						$error_password2= "Такої комбінації логіна/пароля не знайдено";
						$error2= true;
						}
					}
				}
			else
				{
				$error_password2= "Такої комбінації логіна/пароля не знайдено";
				$error2= true;
				}
			}
			if(!$error2)
				{
				header("Location: success.php?enter=1");
				exit;
				}
		}

?>
<html>
	<body>
		<table>
			<tr>
				<td>
					<form name = "form1" action= "index.php" method="post">
						<table>
							<tr>
								<td>Реєстрація</td>
							</tr>
							<tr>
								<td>Логін</td>
								<td>					
								<input type = "text" name = "login" value ="<?php echo $_SESSION["login"]?>">
								</td>
								<td>
									<span style="color: red;"><?php echo $error_login;?></span>
								</td>
							</tr>
							<tr>
								<td>Пароль</td>
								<td>					
								<input type = "text" name = "password" value ="<?php echo $_SESSION["password"]?>">
								</td>
								<td>
									<span style="color: red;"><?php echo $error_password;?></span>
								</td>
							</tr>
							<tr>
								<td>Електронна адреса</td>
								<td>
									<input  type="text" name = "mail" value ="<?php echo $_SESSION["mail"]?>">
								</td>
								<td>
									<span style="color: red;"><?php echo $error_mail;?></span>
								</td>
							</tr>
							<tr>
								<td>
								<input type = "submit" name= "button" value="ok">
								</td>
							</tr>
						</table>
					</form>
				</td>
				<td>
					<form name = "form2" action= "index.php" method="post">
						<table>
							<tr>
								<td>Вхід</td>
							</tr>
							<tr>
								<td>Логін</td>
								<td>					
								<input type = "text" name = "login2" >
								</td>
								<td>
									<span style="color: red;"></span>
								</td>
							</tr>
							<tr>
								<td>Пароль</td>
								<td>					
								<input type = "text" name = "password2" >
								</td>
								<td>
									<span style="color: red;"><?php echo $error_password2;?></span>
								</td>
							</tr>
							<tr>
								<td>
								<input type = "submit" name= "button2" value="ok">
								</td>
							</tr>
						</table>
					</form>
				</td>
			</tr>
		</table>
	<body>
<html>