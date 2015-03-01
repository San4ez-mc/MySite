<?php 
header("Content-type: text/html ");
//header("Content-type: image/png");?>
<html>
	<body>
		<form name = "form1" action = "index.php" method="post">
			<table>
				<tr>
					<td>
						<input type = "text" name = "text">
					</td>
					<td>
						<input type = "submit" name= "button" value= "OK">
					</td>
				</tr>
			</table>
		</form>
	</body>
</html>







<?php
if(isset($_POST["button"]))
	{
	$im = imageCreateTrueColor(90,50);
	$c = imageColorAllocate($im,0,0,23);
	imageFilledRectangle($im,0,0, imageSX($im),imageSY($im),$c);
	$c2 = imageColorAllocate($im,242,22,233);
	$string1=$_POST["text"];
	imageString($im, 40,10,30,$string1,$c2);
    imagettfText($im, 20,0,0,0,$c2,"verdana.ttf",$string1);
	imagePNG($im,"im.png");
	
	echo "<img src='im.png' alt='yra'  />";
	imageDestroy($im);
	

	} 





?>