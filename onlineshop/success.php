<?php
require_once "admin/admin.php";
echo ADMIN::ShowAdminPanel($_SESSION["isAuth"]);
echo " Вітаємо, ви успішно здійснили покупку<br/>";
echo "<a href = 'http://onlineshop.mysite.lol'>Повернутися на головну<a/>";
?> 