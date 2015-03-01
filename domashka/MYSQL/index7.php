<html> 
	<body>
		<form name ="form1" action = "index.php" method = "post">
			<table>
				<tr>
					<td>
						<tr>
							<td>Назва продукту</td>
							<td>
								<input type ="text" name= "name">
							</td>
						</tr>
						<tr>
							<td>Короткий опис</td>
							<td>
								<textarea name="description" rows = 3 cols = 15></textarea>
							</td>
							<td>
								<span style="color: red;"><?php echo $error_all;?></span>
							</td>
						</tr>
						<tr>
							<td>Повний опис</td>
							<td>
								<textarea name="fulldescription" rows = 6 cols = 15></textarea>
							</td>
						</tr>
						<tr>
							<td>
								<input type = "submit" name = "addbutton" value = "ok">
							</td>
						</tr>
					</td>
					
					
					<td>
						<tr>
							<td>id</td>
							<td>
								<input type ="text" name= "id">
							</td> 
						</tr>
						<tr>
							<td>Ім'я</td>
							<td>
								<input type ="text" name= "custumerName">
							</td> 
						</tr>
						<tr>
							<td>Електронна адреса</td>
							<td>
								<input type ="mail" name= "mail">
							</td> 
							<td>
								<span style="color: red;"><?php echo $error_mail;?></span>
							</td>
						</tr>
						<tr>
							<td>Коментар</td>
							<td>
								<textarea name="comment" rows = 6 cols = 15></textarea>
							</td> 
						</tr>
						<tr>
							<td>
								<input type = "submit" name = "addorder" value = "ok">
							</td>
							<td>
								<span style="color: red;"><?php echo $error_all2;?></span>
							</td>
						</tr>
					</td>
				</tr>
			</table>
		</form>
	</body>
</html>



<?php
	$error_mail= "";
	$error_all= "";
	$error_all2 = "";
	$error=false;
	$error2= false;
	if (isset($_POST["addbutton"]))
		{
		$name = $_POST["name"];
		$description= $_POST["description"];
		$fulldescription= $_POST["fulldescription"];
		
		if( strlen($name)==null||strlen($description)==null||strlen($fulldescription)==null)
			{
			$error_all = "заповніть, будь ласка, всі поля";
			$error = true;
			$echo = "lol";
			}
		else 
			{
			$error_all= "все добре";
			echo " dct lj,ht";
			}
			
		if(!$error)
			{
			$mysqli= new mysqli("localhost", "root", "", "firstbase" );
			$mysqli->query("SET NAMES 'UTF8'");
			$mysqli->query("INSERT INTO `products`(`productName`,`description`,`descriptionFull`,`countCustumers`) VALUES ('$name','$description','$fulldescription','0')"); 
			
			$mysqli->close();
			}
		
		}
	
	if (isset($_POST["addorder"]))
		{
		$id= $_POST["id"];
		$cName = $_POST["custumerName"];
		$mail= $_POST["mail"];
		$comment= $_POST["comment"];
		
	//0981076987	
		$reg="/[a-z0-9][a-z0-9\._-]*?[a-z0-9]*?@([a-z0-9]+([a-z0-9-]*?[a-z0-9]+)+\.)+[a-z]+/i";
		if(!preg_match($reg,$mail))
			{
			$error_mail= "ви ввели невірний мейл";
			$error2=true;
			} 
			
		if( strlen($comment)==0) $comment = "__";
		if( strlen($id)==0||strlen($cName)==0)
			{
			$error_all2 = "заповніть, будь ласка, всі поля";
			$error2= true;
			}
	 
		if(!$error2)
			{
			$mysqli= new mysqli("localhost", "root", "", "firstbase" );
			$mysqli->query("SET NAMES 'UTF8'");
			
			//тут треба зробити перевірку чи існує такий код товару в таблиці з товарами і якщо існує, то в полі кількість замовлень - зробити +1 
		//	$success= $mysqli->query("UPDATE 'products'");
		
			$result_set= $mysqli->query("SELECT * FROM `products` WHERE `id` LIKE '".$id."'");
			printResultSet($result_set);
			if($result_set->num_rows==0)
				{
				echo "виберіть існуючий товар";
				}
			else
				{
				
				//echo printResultSet($result_set)["id"];
				//$mysqli0>query("UPDATE `products` SET 
				$mysqli->query("INSERT INTO `orders`(`orderid`,`name`,`mail`,`comment`,`date`) VALUES ('$id','$cName','$mail','$comment',".time().")"); 
				$mysqli->close();
				echo " все успішно";
				}
			}
		}
		
		function printResultSet($result_set)	
		{
		echo "Кількість записів: ".$result_set->num_rows."<br/>";
		while (($row = $result_set->fetch_assoc())!=false)
			{
			print_r($row);
			$myrow= $row;
			echo "<br/>";
			} 
		echo "----------------------------<br/>";
		return $myrow;
		}
?>