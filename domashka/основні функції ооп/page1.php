<?php
$size= $_GET["size"];
setcookie("size", $size);
header("Location: index.php ");
echo $_COOKIE["size"];
print_r($_COOKIE);
?>