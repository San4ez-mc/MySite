<?php
session_start();
session_destroy();
$s=$_SERVER['HTTP_REFERER'];
header("Location: index.php");

?>