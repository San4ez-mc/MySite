<?php
	interface FileIO
		{
		public function read();
		public function write();
		}

	class Point implements FileIO
		{
		public function read()
			{
			echo "читаємо з файла";
			}
		
		public function write()
			{
			echo "Пишемо в файл";
			}
		}
		 
		$point = new Point();
		$point->read();
		echo "<br/>";
		$point->write(); 
		
		
?>
<html>
<a href="http://agent.privatbank.ua/pb/120/1004623963/" target="_blank" style="border:0" > 
<img src="http://agent.privatbank.ua/media/banners/shared/foto_ua_250x250.jpg" alt="Именная карта 'Универсальная' с фото"/> </a>