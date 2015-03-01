<?php
//header("Content-type:image/jpeg");
//echo "davai perevirumo";


//phpinfo();
$_GET["some"]=1;
//while(true){echo "2";}
//echo $_SERVER["HTTP_HOST"]."</br>";
//echo $_SERVER["REMOTE_ADDR"]."</br>";
$info = getImagesize("image.jpg");
//print_r( $info);
$im = imageCreateFromJpeg("image.jpg");
/*echo $im."</br>";
echo imageSX($im)."</br>";
echo imageSY($im)."</br>";*/
$color = imagecolorat($im, 400,10);
//echo $color."</br>";
$r=($color>>16)&0xFF;
$g= ($color>>8)&0xFF;
$b=$color&0xFF;  
//echo "Колір точки: ($r , $b , $g )";
$color= imagecolorsforindex($im,$color);
//echo "Колір точки: ";print_r($color);
//imageJpeg($im, "image_new.jpg");
header("Content-type:image/jpeg");
imageJpeg($im);
imageDestroy($im);
?>