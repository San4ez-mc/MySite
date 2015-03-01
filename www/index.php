<?php



?>



<html>
	<head>
	</head>
	<body>
		<h1>Стаття</h1>
		<p>Текст статті...</p>
		<h2>Комментарі</h2>
		<?php
			
			$array= transformCommentToArray();
			if(count($array)!=0)
				{
				echo  " <table>";
				for ($i=0; $i<count($array);$i++)
					{
					echo "<tr>";
					echo "<td><b>".$array[$i]["name"]."</b></td>";
					echo "<td>".$array[$i]["comment"]."</td>";
					echo "</tr>";
					echo "<tr>";
					echo "<td colspan ='2'><hr/></td>";
					echo "</tr>";
					}
				echo "</table>";
			}
		?>
	</body>
</html>
