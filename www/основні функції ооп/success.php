<?php
	session_start();
	if($_GET["send"] ==1)
		{
		echo "Ваше повідомлення було успішно відправлено на ".$_SESSION["to"];
		echo "<br/><a href = 'index.php'> Повернутися</a>";
		}

?>