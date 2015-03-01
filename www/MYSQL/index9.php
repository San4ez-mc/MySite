<?php
	require_once "lib/uploadtext_class.php";
	require_once "lib/uploadimage_class.php";
	if( $_POST["upload"])
		{
		print_r($_FILES);
		$upload_text = new UploadText();
		$upload_image = new UploadImage();
		$success_text = $upload_text->uploadFile($_FILES["text"]);
		$success_image = $upload_image->uploadFile($_FILES["image"]);
		}
?>

<html>
	<head>
		<title> Загрузка файлів </title>
	</head>
	<body>
		<h1>Загрузка файлів</h1>
		<?php
			if($_POST["upload"])
				{
				if($success_text) echo "Текстовий файл успішно завантажений";
				else echo " При завантаженні файлу сталася помилка";
				echo "</br>";
				if($success_image) echo "Малюнок успішно завантажений";
				else echo " При завантаженні малюнка сталася помилка";
				}
		
		?>
		<form name ="myform" acton = "index.php" method = "post" enctype = "multipart/form-data">
			<table>
				<tr>
					<td>Зображення:</td>
					<td> 
						<input type= "file" name = "image" />
					<td> 
				</tr>
				<tr>
					<td>Текст:</td>
					<td> 
						<input type= "file" name = "text" />
					<td> 
				</tr>
				<tr>
					<td colspan = "2">
						<input type= "submit" name ="upload" value= "Загрузити файли"/>
					</td>
				<tr>
			</table>
		</form>
	</body>
</html>
					