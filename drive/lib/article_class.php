<?php
	require_once "global_class.php";
	
	class Article extends GlobalClass
		{
		public function __construct($db)
			{
			parent::__construct("articles", $db);
			}
			
		public function getAllSortDate()
			{
			return $this->getAll("date",false);
			}
			
		public function getAllOnSectionID($section_id)
			{
			return $this->getAllOnField("section_id",$section_id, "date",false);
			}
		
		
		public function getSectionID($id)
			{
			return $this->getFieldOnID($id, "section_id");
			}
		
		public function setSectionID($id,$value)//ok
			{
			if(!$this->valid->validID($value)) return false;
			return $this->setFieldOnID($id,"section_id",$value);
			}
		
		public function getTitle($id)//ok
			{
			return $this->getFieldOnID($id, "title");
			}
		
		public function setTitle($id,$title)//ok
			{
			if(!$this->valid->isValidText($title,3, 255)) return false;
			return $this->setFieldOnID($id,"title",$title);
			}
		
		public function	getIntroText($id)
			{
			return $this->getFieldOnID($id, "intro_text");
			}
		
		public function setIntroText($id,$intro_text)//ok
			{
			if(!$this->valid->isValidText($title,3, 800)) return false;
			return $this->setFieldOnID($id,"intro_text",$intro_text);
			}
		
		public function getFullText($id)
			{
			return $this->getFieldOnID($id, "full_text");
			}
		
		public function setFullText($id,$full_text)
			{
			if(!$this->valid->isValidText($full_text,3, 8000)) return false;
			return $this->setFieldOnID($id,"full_text",$full_text);
			}
		
		public function getMeta_desc($id)
			{
			return $this->getFieldOnID($id, "meta_desc");
			}
		
		public function setMeta_desc($id,$meta_desc)
			{
			if(!$this->valid->isValidText($meta_desc,3, 80)) return false;
			return $this->setFieldOnID($id,"meta_desc",$meta_desc);
			}
		
		public function getMeta_key($id)
			{
			return $this->getFieldOnID($id, "meta_key");
			}
		
		public function setMeta_key($id,$meta_key)
			{
			if(!$this->valid->isValidText($meta_key,3, 80)) return false;
			return $this->setFieldOnID($id,"meta_key",$meta_key);
			}
		
		public function getDate($id)
			{
			return $this->getFieldOnID($id, "date");
			}
		
		public function setDate($id,$date)
			{
			if(!$this->valid->validTimeStamp($date))return false;
			return $this->setFieldOnID($id,"date",$date);
			}
		
		public function getImage($id)
			{
			return $this->getFieldOnID($id, "image");
			}
		
		public function setImage($id,$image)
			{
			if(!$this->valid->isValidPath($image,3, 80)) return false;
			return $this->setFieldOnID($id,"image",$image);
			}
		
		
		
		
		
		
		}



?>