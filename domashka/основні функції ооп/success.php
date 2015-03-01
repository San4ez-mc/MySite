<?php
	session_start();
	if($_GET["register"] ==1)
		{
		echo "Вітаємо Вас, ".$_SESSION['login'].", з успішною реєстрацією</br>";
		echo "<br/><a href = 'index.php'> Повернутися</a>";
		}
	
	if($_GET["enter"] ==1)
		{
		echo "Вітаємо,".$_SESSION['login2'].", Ви увійшли</br>";
		echo "<br/><a href = 'index.php?session=over'> Вийти</a>";
		}
		
	if(isset($_POST["button"]))
		{
		$text= htmlspecialchars($_POST["code"]);
		$reg = '/[a-z][a-z0-9-_]*\.[a-z]{2,}/';
		$textarray= preg_split("/\s/",$text);
		//print_r($textarray);
		foreach( $textarray as &$value)
			{
			if(preg_match($reg,$value))
				{
				$value = "<b>\"http://domaska.mysite.lol/".substr($value, 6)."</b>";
				}
			}
			$textedited="";
			unset( $value);
		foreach($textarray as $value)
			{	
			$textedited = $textedited.$value." ";
			}
		echo $textedited;
		unset( $value);
		unset($textedited);
		}
?>

<html>
	<body>
		<form name = "form1" action= "success.php" method="post">
			<table>
				<tr>
					<td>Введіть Ваш код</td>
					<td>
						<textarea name = "code" rows=30 cols = 150><?php echo $text;?></textarea>
					</td>
				</tr>
					<td>	
						<input type = "submit" value = "ok" name = "button">
					</td>
				</tr>
			</table>
		</form>
	</body>
</html>