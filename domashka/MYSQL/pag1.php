<?php
	$mysqli = new mysqli("localhost","root","","firstbase");
	$mysqli->query("SET NAMES 'UTF8'");
	$result_set=$mysqli->query("SELECT * FROM `products`");

	function makeLine($result_set)
		{
		while (($row = $result_set->fetch_assoc())!=false)
			{
			echo "<tr>";
			echo "<td>".$row["id"]."</td>";
			echo "<td><a href='http://domashka.mysite.lol/pag2.php?product=".$row["id"]."'>".$row["productName"]."</a></td>";
			echo "<td>".$row["description"]."</td>";
			echo "<td>".$row["descriptionFull"]."</td>";
			echo "<td>".$row["countCustomers"]."</td>";
			echo "</tr>";
			}
		}
?>
<html>
	<body>
		<table>
			<?php
			makeLine($result_set);
			?>
		</table>
	</body>
</html>


<?php
$mysqli->close();
?>