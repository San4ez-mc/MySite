<?php
require_once "admin/admin.php";
echo ADMIN::ShowAdminPanel($_SESSION["isAuth"]);
echo "�� �� ������� ������� ������. ����������, ���� ����� , ����� �� ������!<br/>
<a href='http://onlineshop.mysite.lol/index.php'>����������� �����</a>";
?>