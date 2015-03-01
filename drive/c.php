<?php
require_once "lib/database_class.php";
require_once "lib/global_class.php";
require_once "lib/article_class.php";

$db = new DataBase();

$ar= new Article($db);

print_r($ar->get("2"));
//print_r($ar->getTitle("2"));
//print_R($ar->getAllSortDate());

//print_r($database->getAllInsideBorders("articles", "date", "1410028734", "1410028428"));

	

?> 