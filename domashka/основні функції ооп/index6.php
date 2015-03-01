<html>
	<body>
		<form name="form1" action= "index.php" method = "post">
			<input type= "text" name= "mail">
			<input type="submit" name="button" value="ok">
		</form>
	</body>
</html>

<?php
if(isset($_POST["button"]))
	{
	$mail=$_POST["mail"];
	$reg="/\S+?@.+?\..+/";
	echo $mail."<br/>";
	if(preg_match($reg, $mail))
		{
		echo "канає";
		}
	else
		{
		echo "не канає";
		}
	
	
	
	}







?>