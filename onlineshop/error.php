<?php
require_once "admin/admin.php";
echo ADMIN::ShowAdminPanel($_SESSION["isAuth"]);
echo "Ви не вибрали жодного товару. Поверніться, будь ласка , назад та оберіть!<br/>
<a href='http://onlineshop.mysite.lol/index.php'>Повернутися назад</a>";
?>