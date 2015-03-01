<?php
/*
session_start();
$count = (isset($_SESSION["count"]))?$_SESSION["count"]:0;
$count++;
$_SESSION["count"] = $count;
echo "Сторінку оновлено $count";
session_destroy();*/

$string = "жили у бабусі , два  веселих гуся, один сірий, другий білий, два веселих гуся";
$arr= explode(" ",$string);
print_r($arr);






?>