<?php
	require_once "upload_class.php";
	
	class UploadText extends Upload
		{
		static protected $dir = "text";
		static protected $mime_types = array ( "text/plain");
		}