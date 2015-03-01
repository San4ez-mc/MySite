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
		<title>��������� � ����������� ������������</title>
	</head>
	<body>	
		<?php
			if($auth)
				{
				echo "³����, ".$_SESSION["login"]."(<a href= 'logout.php'>�����</a>)";
				}
			else 
				{ 
				if ($_POST["reg"])
					{ 
					if($reg_success) echo "<span style='color: red;'> ��������� ������� ������</span>";
					else echo "<span style='color: red;'>������� ��� ���������</span>";;
					}
				elseif ($_POST["auth"])
					{
					if(!$auth_success) echo "<span style='color: red;'> ������ ��'� ����������� �/��� ������</span>";
					}
				echo 
				'<h1>���������</h1>
					<form name="reg" action = "index.php" method="post">
						<table>
							<tr>
								<td>���� :</td>
								<td>
									<input type = "text" name= "login">
								</td>
							</tr>
							<tr>
								<td>������ :</td>
								<td>
									<input type = "text" name= "password">
								</td>
							</tr>
							<tr>
								<td colspan="2">
									<input type = "submit" name="reg" value = "��������������">
								</td>
							</tr>
						</table>
					</form>
					<h1>�����������</h1>
					<form name="auth" action = "index.php" method="post">
						<table>
							<tr>
								<td>���� :</td>
								<td>
									<input type = "text" name= "login">
								</td>
							</tr>
							<tr>
								<td>������ :</td>
								<td>
									<input type = "text" name= "password">
								</td>
							</tr>
							<tr>
								<td colspan="2">
									<input type = "submit" name="auth" value = "�����">
								</td>
							</tr>
						</table>
					</form>';
				}
		?>
	</body>
</html>