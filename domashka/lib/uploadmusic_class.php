<?php
	require_once "upload_class.php";
	
	class UploadMusic extends Upload
		{
		static protected $dir = "music";
		static protected $mime_types = array ( "audio/mp3", "audio/wav");
		}




?>