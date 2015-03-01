<?if(!empty($_GET['show']))
{
	$DBH = new PDO("mysql:host=localhost;dbname=medprosv_zm_users;charset=utf8", $user, $pass);  
	$DBH->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
	$query = "SELECT name, surname, age, plan_to_born, phone_number, email, city, card_code, doctor_name, cons_phone, adress, reg_date FROM users";
	$STH = $DBH->query($query);	

	# устанавливаем режим выборки
	// if($STH)
	// {
		$STH->setFetchMode(PDO::FETCH_ASSOC);
		//$error = $error.'<br />Такий номер  зареєстрований. Уточніть деталі за телефоном <b>044 459 01 95</b>'; $ok='no';
		echo "<table>nnn";
		while($row = $STH->fetch()) 
		{?>
			<tr>
				<td><?=$row['name'] ?></td>
				<td><?=$row['surname'] ?></td>
				<td><?=$row['age'] ?></td>
				<td><?=$row['plane_to_born'] ?></td>
				<td><?=$row['phone_number'] ?></td>
				<td><?=$row['email'] ?></td>
				<td><?=$row['city'] ?></td>
				<td><?=$row['card_code'] ?></td>
				<td><?=$row['doctor_name'] ?></td>
				<td><?=$row['cons_phone'] ?></td>
				<td><?=$row['adress'] ?></td>
				<td><?=$row['reg_date'] ?></td>
			</tr>
		<?}
		echo "</table>";
	// }
}?>