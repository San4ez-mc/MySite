<?php
for($i=0;$i<3*M_PI;$i=$i+0.1)
		{	
		$x=round($i*1000/(3*M_PI));
		$y=imageSY($im)/2+cos($i);
		//imageSetPixel($im,$x,$y,$c);
		//echo $i;
		echo "$x  $y</br>";
		}	


?>