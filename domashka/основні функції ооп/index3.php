<?php
header("Content-type: image/png");
	$im=imageCreateTrueColor(1000,100);
	$c= imageColorAllocate($im, 123,232,12);
	imageLine($im, 0,imageSY($im)/2,imageSX($im),imageSY($im)/2,$c);
	imageLine($im, imageSX($im)/3,0,imageSX($im)/3,imageSY($im),$c);
	imageLine($im, imageSX($im)/3*2,0,imageSX($im)/3*2,imageSY($im),$c);
	
	for($i=0;$i<3*M_PI;$i=$i+0.005)
		{	
		$x=round($i*1000/(3*M_PI));
		$y=imageSY($im)/2+cos($i)*imageSY($im)/2;
		imageSetPixel($im,$x,$y,$c);
		}	

	//imagePng($im);
	
	imageDestroy($im);

	$im=imageCreateTrueColor(400,700);
	$c=imageColorAllocate($im,121,12,42);
	imageLine($im, 0,imageSY($im)/2,imageSX($im),imageSY($im)/2,$c);
	imageLine($im, imageSX($im)/2,0,imageSX($im)/2,imageSY($im),$c);
	imageLine($im, 0,imageSY($im)/4,imageSX($im),imageSY($im)/4,$c);
	
	//голова
	$c=imageColorAllocate($im,124,120,252);
	imageSetThickness($im,3);
	
	imageArc($im, imageSX($im)/2, imageSY($im)/4,80,100,0,360,$c);
	imageLine($im,(imageSX($im)/2-20), (imageSY($im)/4+45),(imageSX($im)/2-20), (imageSY($im)/4+60),$c);
	imageLine($im,(imageSX($im)/2+20), (imageSY($im)/4+45),(imageSX($im)/2+20), (imageSY($im)/4+60),$c);

	//туловище
	imageArc($im, imageSX($im)/2, imageSY($im)/2,200,235,0,360,$c);
	
	//ноги
	$array=array(imageSX($im)/3, imageSY($im)*2/3-25, imageSX($im)/3-30, imageSY($im)*2/3+180,
			   	 imageSX($im)*2/3, imageSY($im)*2/3-25, imageSX($im)*2/3+30, imageSY($im)*2/3+180
			    ); 
	imagePolygon($im,$array,4,$c);
	
	//руки
	$array=array(imageSX($im)/4, imageSY($im)/3+40, imageSX($im)/6, imageSY($im)*5/8,
				 imageSX($im)/6+25, imageSY($im)/2, imageSX($im)/4+10, imageSY($im)/3+60,
	);
	imagePolygon($im,$array,4,$c);
	
	$array=array(imageSX($im)*3/4, imageSY($im)/3+40, imageSX($im)*5/6, imageSY($im)*5/8,
				 imageSX($im)*5/6+25, imageSY($im)/2, imageSX($im)*3/4+10, imageSY($im)/3+60,
	);
	imagePolygon($im,$array,4,$c);
	
	imagePng($im);
	
	imageDestroy($im);
















?>