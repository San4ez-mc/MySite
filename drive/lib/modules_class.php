<?php
	require_once "config_class.php";
	require_once "article_class.php";
	require_once "section_class.php";
	require_once "user_class.php";
	require_once "menu_class.php";
	require_once "banner_class.php";
	require_once "message_class.php";
	
	abstract class Modules
		{
		protected $config;
		protected $article;
		protected $section;
		protected $user;
		protected $menu;
		protected $banner;
		protected $message;
		protected $data;
		
		public function __construct($db)
			{
			session_start();
			$this->config = new Config();
			$this->article = new Article($db);
			$this->section = new Section($db);
			$this->user = new User($db);
			$this->menu = new Menu($db);
			$this->banner = new Banner($db);
			$this->message = new Message();
			$this->data = $this->secureData($_GET);
			}
		
		public function getContent()	//можливо це саме те місце , де можна використати мої сет-гет методи....а може й ні
			{
			$sr["title"] = $this->getTitle();
			$sr["meta_desc"] = $this->getDescription();
			$sr["meta_key"] = $this->getKeyWords();
			$sr["menu"] = $this->getMenu();
			$sr["auth_user"] = $this->getAuthUser();
			$sr["banner"] = $this->getTitle();
			}
			
			
		private function secureData($data)
			{
			foreach($data as $key=>$value)
				{
				if(is_array($value)) $this->secureData($value);
				else $data[$key] = htmlspecialchars($value);
				}
			return $data;
			}
			
		protected function getTemplate($name)
			{
			$text = file_get_content($this->config->dir_tmpl.$name.".tpl");
			return str_replace("%address%", $this->config->address, $text);
			}
			
		protected function getReplaceTemplate($sr, $template)//приймає масив даних ждя заміни і назву шаблона
			{
			return $this->getReplaceContent($sr, $this->getTemplate($template));
			}
		
		private function getReplaceContent($sr, $content)
			{
			$search = array();
			$replace = array();
			$i = 0;
			foreach( $sr as $key=>$value)
				{
				$search[$i] = $key;
				$replace[$i] = $value;
				$i++;
				}
			return str_replace($search, $replace, $content);//хіба так можна ? міняти цілими масивами? 
			}
		}
	


?>	