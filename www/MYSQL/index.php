<?php
	require_once "lib2/user_class.php";
	$user = User::getObject();
	$auth= $user->isAuth();
	if(isset($_POST["reg"]))
		{
		$login = $_POST["login"];
		$password = $_POST["password"];
		$reg_success = $user->regUser($login,$password);
		}
	elseif (isset($_POST["auth"]))
		{
		$login = $_POST["login"];
		$password = $_POST["password"];
		$auth_success = $user->logIn($login,$password);
		if($auth_success)
			{
			header("Location: index.php");
			exit;
			}
		}
?>

<html>
	<head>
		<title>Реєстрація і авторизація користувачів</title>
	</head>
	<body>	
		<?php
			if($auth)
				{
				echo "Вітаємо, ".$_SESSION["login"]."(<a href= 'logout.php'>Вихід</a>)";
				}
			else 
				{ 
				if ($_POST["reg"])
					{ 
					if($reg_success) echo "<span style='color: red;'> Реєстрація пройшла успішно</span>";
					else echo "<span style='color: red;'>Помилка при реєстрації</span>";;
					}
				elseif ($_POST["auth"])
					{
					if(!$auth_success) echo "<span style='color: red;'> Невірне ім'я користувача і/або пароль</span>";
					}
				echo 
				'<h1>Реєстрація</h1>
					<form name="reg" action = "index.php" method="post">
						<table>
							<tr>
								<td>Логін :</td>
								<td>
									<input type = "text" name= "login">
								</td>
							</tr>
							<tr>
								<td>Пароль :</td>
								<td>
									<input type = "text" name= "password">
								</td>
							</tr>
							<tr>
								<td colspan="2">
									<input type = "submit" name="reg" value = "Зареєструватися">
								</td>
							</tr>
						</table>
					</form>
					<h1>Авторизація</h1>
					<form name="auth" action = "index.php" method="post">
						<table>
							<tr>
								<td>Логін :</td>
								<td>
									<input type = "text" name= "login">
								</td>
							</tr>
							<tr>
								<td>Пароль :</td>
								<td>
									<input type = "text" name= "password">
								</td>
							</tr>
							<tr>
								<td colspan="2">
									<input type = "submit" name="auth" value = "Ввійти">
								</td>
							</tr>
						</table>
					</form>';
				}
		?>
	</body>
</html>