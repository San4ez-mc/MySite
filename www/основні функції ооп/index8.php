<?php
echo " ;";
$count = (isset($_COOKIE["count"]))?$_COOKIE["count"]:0;
$count++;
setcookie("count", $count);
setcookie("count", $count,time()+5);
echo "Сторінка оновлювалася $count разів";

//setcookie



?>