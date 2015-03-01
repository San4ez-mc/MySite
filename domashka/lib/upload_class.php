<?php

	abstract class Upload
		{
		static protected $dir="music";
		static protected $mime_types; 
		
		public static function uploadFile($file)
			{
			echo " success";
			if(!self::isSecurity($file))
				{
				return false;
				}
			$uploadfile = self::$dir."/".$file["name"];
			echo $uploadfile;
			return move_uploaded_file($file["tmp_name"], $uploadfile);
			
			}
			
		protected  static function isSecurity($file)
			{
			$blacklist = array(".php", ".phtml", ".php3", ".html", ".htm");
			foreach ($blacklist as $item)
				{
				if(preg_match("/$item\$/i", $file["name"])) return false; 
				}
			$type = $file["type"];
			for($i=0;$i<count(self::$mime_types);$i++)
				{
				if($type == self::$mime_types[$i])break;
				if($i+1 == count(self::$mime_types))return false;
				}
			$size  = $file["size"];
			if($size> 20480000) return false;
			return true;
			} 
		}	


?>