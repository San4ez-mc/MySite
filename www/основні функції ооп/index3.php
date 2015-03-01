<?php
	$im= imageCreateTrueColor(400,500);//сторення полотна
	$c=imageColorAllocate($im,12,22,100);
	imageLine($im,0,0,imageSX($im),imageSY($im),$c);
	imageLine($im,imageSX($im),0,0,imageSY($im),$c);//лінія
	
	imageFilledRectangle($im, 100,200,300,400,$c);//заповнений прямокутник
	$c=imageColorAllocate($im,255,255,255);//колір
	imageRectangle($im, 0,100,200,300,$c);
	
	imageSetThickness($im,5);
	imageRectangle($im, 44,103,243,323,$c);
	
	imageSetThickness($im,5);
	imageArc($im, 350,234, 200,300,15,260,$c);
	
	$c=imageColorAllocate($im,20,212,130);
	imageArc($im, 120,434, 200,200,0,360,$c);
	
	$c=imageColorAllocate($im,55,255,130);
	imageFill($im, 34,324,$c);
	
	$texture=imageCreateFromJpeg("texture.jpg");
	imageSetTile($im,$texture);
	imageFill($im, 134,50,IMG_COLOR_TILED);//С‚РµРєСЃС‚СѓСЂРё
	
	$array=array(10,20,300,403,59,39,19,32);
	imageFilledPolygon($im, $array,4,$c);
	
	for($i=0; $i<1000;$i++)
	{
	$x=mt_rand(0,imageSX($im));
	$y=mt_rand(0,imageSY($im));
	imageSetPixel($im,$x,$y,$c);
	}
	
	$new_im=imageCreateTrueColor(100,200);
	imageCopyResized($new_im, $im,0,0,50,50,100,200,70,70);
	
	header("Content-type: image/png");
	imagePng($im);
	imagePng($new_im,"image new.png");
	imageDestroy($im);
	imageDestroy($new_im);
	imageDestroy($texture);
	





?>