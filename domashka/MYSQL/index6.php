<?php
	require_once "lib/uploadtext_class.php";
	require_once "lib/uploadimage_class.php";
	require_once "lib/uploadmusic_class.php";
	if( $_POST["upload"])
		{
		print_r($_FILES);
		//$upload_text = new UploadText();
		//$upload_image = new UploadImage();
		$success_text = UploadText::uploadFile($_FILES["text"]);
		$success_image = UploadImage::uploadFile($_FILES["image"]);
		$success_music = UploadMusic::uploadFile($_FILES["music"]);
		Upload::uploadFile($_FILES["music"]);
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
				//delete
				echo $success_text.$success_image.$success_music;
				
				//delete
				
				
				
				if($success_text) echo "Текстовий файл успішно завантажений";
				else echo " При завантаженні файлу сталася помилка";
				echo "</br>";
				
				if($success_image) echo "Малюнок успішно завантажений";
				else echo " При завантаженні малюнка сталася помилка";
				echo "</br>";
				
				if($success_music) echo "Музика успішно завантажена";
				else echo " При завантаженні музики сталася помилка";
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
					<td>Музика:</td>
					<td> 
						<input type= "file" name = "music" />
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
					