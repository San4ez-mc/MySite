<?php
	$mysqli = new mysqli("localhost","root","","firstbase");
	$mysqli->query("SET NAMES 'UTF8'");
	$result_set=$mysqli->query("SELECT * FROM `orders`");
	$P=$_GET["product"];
	if(isset($P)) $result_set=$mysqli->query("SELECT * FROM `orders` WHERE `orderid` LIKE '".$P."'");
	
	function makeLine($result_set)
		{
		while (($row = $result_set->fetch_assoc())!=false)
			{
			echo "<tr>";
			echo "<td>".$row["id"]."</td>";
			echo "<td>".$row["orderid"]."</td>";
			echo "<td>".$row["name"]."</td>";
			echo "<td>".$row["mail"]."</td>";
			echo "<td>".$row["comment"]."</td>";
			echo "<td>".$row["date"]."</td>";
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