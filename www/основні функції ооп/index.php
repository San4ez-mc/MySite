<?php
	session_start(); 
	if(isset($_POST["button"]))
		{
			$from= $_POST["from"];
			$to = $_POST["to"];
			$message = $_POST["message"];
			$subject = $_POST["subject"];
			
			$_SESSION["from"]=$from;
			$_SESSION["to"] = $to;
			$_SESSION["subject"]=$subject;
			$_SESSION["message"] = $message;
			
			$error_from="";
			$error_to="";
			$error_subject="";
			$error_message="";
			$error= false;
			
			$reg="/[a-z0-9][a-z0-9\._-]*?[a-z0-9]*?@([a-z0-9]+([a-z0-9-]*?[a-z0-9]+)+\.)+[a-z]+/i";
			if(!preg_match($reg,$from))
				{
				$error_from ="неправильний email";
				$error=true;
				echo $reg;
				echo "<br/>";
				echo $from;
				echo "<br/>";
				}
							
			if(!preg_match($reg,$to))
				{
				$error_to="неправильний email";
				$error=true;
				}
			
			if(strlen($subject)==0)
				{
				$error_subject= " Не написана тема";
				$error= true;
				}
							
			if(strlen($message)==0)
				{
				$error_message= " Не написане повідомлення";
				$error= true;
				}
				
			if(!$error)
				{
				$subject = "=?windows-1251?B?".base64_encode($subject)."?=";
				$headers = "From: $from\r\nReply-to:$from\r\nContent-type: text/plain; charset=windows-1251\r\n";
				mail($to, $subject,$message,$headers);
				header("Location: success.php?send=1");
				exit;
				} 
		}




?>








<html>
	<head>
		<title>Cервіс розсилки</title>
	</head>
	<body>
		<h1> Відправте почту!<h1>
		<form name ="myform" action= "index.php" method = "post">
			<table>
				<tr>
					<td>від кого</td>
					<td>
						<input  type="text" name = "from" value ="<?php echo $_SESSION["from"]?>" >
					</td>
					<td>
						<span style="color: red;"><?php echo $error_from;?></span>
					</td>
				</tr>
				<tr>
					<td>кому</td>
					<td>
						<input  type="text" name = "to" value ="<?php echo $_SESSION["to"]?>">
					</td>
					<td>
						<span style="color: red;"><?php echo $error_to;?></span>
					</td>
				</tr>
				<tr>
					<td>Тема</td>
					<td>
						<input  type="text" name = "subject" value ="<?php echo $_SESSION["subject"]?>" >
					</td>
					<td>
						<span style="color: red;"><?php echo $error_subject;?></span>
					</td>
				</tr>
				<tr>
					<td>Повідомлення:</td>
					<td>
						<textarea  name = "message" cols = "15" rows = "10" value =""><?php echo $_SESSION["message"]?></textarea>
					</td>
					<td>
						<span style="color: red;"><?php echo $error_message;?></span>
					</td>
				</tr>
				<tr>
					<td colspan= "3 ">
						<input  type="submit" name = "button" value=" відправити">
					</td>
				</tr>
			</table>
		</form>
	</body>
</html>