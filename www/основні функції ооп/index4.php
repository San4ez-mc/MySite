<?php
	$im= imagecreateTrueColor(400,500);
	$white=imageColorAllocate($im,255,255,255);
	imageFilledRectangle($im,0,0, imageSX($im),imageSY($im),$white);
	
	$string1= "Matsuk";
	$string2="ну хто б міг подумати?";
	$string2=iconv("CP1251", "UTF-8",$string2);
	$c= ImageColorAllocate($im,0,0,0);
	imageString($im, 5,10,20,$string1,$c);
	
	imageTtfText($im, 20, 5,10,130,$c,"verdana.ttf", $string2);
	
	
	header("Content-type: image/png");
	//imagePng($im);
	imageDestroy($im);

	$im=imageCreateTrueColor(90,50)  ;
	$rand=mt_rand(1000,9999);
	$c=imageColorAllocate($im,255,255,255);
	imageTtfText($im,20,-10,10,30,$c,"verdana.ttf",$rand);
	
	imagePNG($im);
	imageDestroy($im);



?>