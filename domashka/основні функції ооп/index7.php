<html>
	<body>
		<form name="form1" action= "index.php" method = "post">
			<input type= "text" name= "mail" size="100" height="50">
			<input type="submit" name="button" value="ok">
		</form>
	</body>
</html>
<?php
if(isset($_POST["button"]))
	{
	if(strlen($_POST["mail"])!=0)
		{
		$text= $_POST["mail"];
		echo $text."<br/>";
		}
	else 
		{
		$text= "Всім привіт! mysite@site.ru, пишіть мені хтось щось сюди alexander220393@mail.ru , просто сюди ми ще допишео сайт google.com.ua";
		echo $text."<br/>";
		}
	
	function replaceEmail($text)
		{
		$reg="/[a-z0-9][a-z0-9\._-]*?[a-z0-9]*?@([a-z0-9]+([a-z0-9-]*?[a-z0-9]+)+\.)+[a-z]+/i";
		return preg_replace($reg,"<b> тут був Емейл </b>", $text);
		}

	echo replaceEmail($text);
	echo "<br/>";

	$text= replaceEmail($text);
	function replaceSite($text)
		{
		$reg="/(https{0,1}:\/\/){0,1}([a-z0-9][a-z0-9_-]*?[a-z0-9]\.)+[a-z]{2,}(\/[a-z0-9][a-z0-9_-]*?[a-z0-9]\.[a-z]{2,}){0,1}(\?[a-z0-9\=\%\&\-]{3,})*/i";
		return preg_replace($reg,"<b> тут був сайт </b>", $text);
		}
	echo replaceSite($text);
	}
?>