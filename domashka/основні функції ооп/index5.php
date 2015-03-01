<?php echo "ââåä³òü äàòó â ôîðìàò³ ÌÌ.ÄÄ.ÐÐÐP";?>
<html>
	<body>
		<form name = "form1" action= "index.php" method="post">
			<table>
				<tr>
					<td>
					<input type = "text" name = "field">
					</td>
					<td>
					<input type = "submit" name= "button" value="ok">
					</td>
				</tr>
			</table>
		</form>
	<body>
<html>



<?php
if(isset($_POST["button"]))
	{
	$t1 = $_POST["field"];
	$reg= "/[1-12]\.[1-31].[1-3000]/";
	/*echo $t1;
	echo "<br/>";
		echo $reg;
	echo "<br/>";
	echo preg_match($reg, $t1);*/
	if(preg_match($reg, $t1))
		{
		echo "date is correct";
		}
	else
		{
		echo "date is incorrect";
		}
		
		
		echo "<br/>";
		
//$reg= "/[1-12]\.[1-31].[1-3000]/";
//echo preg_match($reg, "12.12.1112")."<br/>";
	}
?>
