<?php

	function printResultSet($result_set)	
		{
		echo "Кількість записів: ".$result_set->num_rows."<br/>";
		while (($row = $result_set->fetch_assoc())!=false)
			{
			print_r($row);
			echo "<br/>";
			} 
		echo "----------------------------<br/>";
		}

	$mysqli = new mysqli("localhost","root", "", "mybase");
	$mysqli->query("SET NAMES 'UTF8'");
/*	$mysqli->query("CREATE DATABASE `temp`");
	$mysqli->query("CREATE TABLE `temp`.`cities`(`id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY, `title` VARCHAR(255) character set utf8 collate utf8_general_ci NOT NULL) ENGINE=MYISAM CHARACTER SET utf8 COLLATE utf8_general_ci");
	$mysqli->query("ALTER TABLE `'temp`.`cities` ADD `utc` TINYINT(2) NOT NULL");
	$mysqli->query("INSERT INTO `users` ( `login`, `password`, `reg_date`) VALUES ('USER1','".MD5("123")."','".time()."')");
	for($i=20; $i<30; $i++)
		{
		$mysqli->query("INSERT INTO `users` ( `login`, `password`, `reg_date`) VALUES ('USER$i','".MD5($i)."','".time()."')");
		}
		$insert_id = $mysqli->insert_id;
		echo $insert_id;
		
	$mysqli->query("UPDATE `users` SET `reg_date`='1', `password` = '2c89109d42178de8a367c0228f169bf8' WHERE `id`>5");
	$mysqli->query("UPDATE `users` SET `reg_date`='1', `password` = '2c89109d42178de8a367c0228f169bf8' WHERE `id`=1");
	$mysqli->query("DELETE FROM `users` WHERE `id`<4");
	$mysqli->query("DELETE FROM `users` WHERE `id`> '".($insert_id-5)."'");
	
*/
	$result_set=$mysqli->query("SELECT * FROM `users`");
	PrintResultSet($result_set);//1
	$result_set=$mysqli->query("SELECT `login`,`password` FROM `users`");
	PrintResultSet($result_set);//2
	$result_set=$mysqli->query("SELECT `login`,`password` FROM `users` WHERE `id`>27");
	PrintResultSet($result_set);//3
	$result_set=$mysqli->query("SELECT * FROM `users` ORDER BY `id` DESC LIMIT 1,3");
	PrintResultSet($result_set);//4
	$result_set=$mysqli->query("SELECT COUNT(`id`) FROM `users`");
	PrintResultSet($result_set);//5
	$result_set=$mysqli->query("SELECT * FROM `users` WHERE `login` LIKE '%ser2%'");
	PrintResultSet($result_set);//6
	
	$mysqli->close();

?>