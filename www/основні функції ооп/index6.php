<html>
	<body>
		<form name="form1" action= "new.php" method = "post">
			<table>
				<tr>
					<td>число 1</td>
					<td>
						<input type= "text" name= "tex1">
					</td>
				</tr>
				<tr>
					<td>число 2</td>
					<td>
						<input type= "text" name= "text2">
					</td>
				</tr>
				<tr>
					<td>
						<input type="submit" name="button" value="ok">
					</td>
				</tr>
			</table>
		</form>
	</body>
</html>




<?php
	echo $_GET["sum"];
	


?>