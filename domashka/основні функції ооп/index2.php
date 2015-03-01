<html>
	<body>
		<form name ="form1" action="index.php" method= "post">
			<table>
				<tr>
					<td>введіть х</td>
					<td>
						<input type="text" name= "X">
					</td>
				</tr>
				<tr>
					<td>введіть y</td>
					<td>
						<input type="text" name= "Y">
					</td>
				</tr>
				<tr>
					<td>
						<input type="submit" name = "button1" value= "ok">
					</td>
				</tr>
			</table>
		</form>
	</body>
</html>

<?php 
if(isset($_POST["button1"]))
{
	$x=$_POST["X"];
	$y=$_POST["Y"];
	$image=imageCreateFromJpeg("image.jpg");
	$color = imageColorAt($image,$x,$y);
	$color= imageColorsForIndex($image,$color);
	//print_r( $color);
	
	echo "колір пікселя - (".$color["red"].", ".$color["green"].", ".$color["blue"].")";

}






echo "Єєєє";?>
