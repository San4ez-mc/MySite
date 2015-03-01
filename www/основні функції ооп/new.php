<?php
if(isset($_POST["button"]))
	{
	$t1=$_POST["tex1"];
	$t2=$_POST["text2"];
	$s=$t1+$t2;
	$_POST["sum"]=$s;
	//echo $s;
	header("Location: index.php?sum=$s;");
	}
exit;


?>