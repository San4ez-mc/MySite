<?php
	require_once "model.php";
	if(isset($_POST["Send"])) addComment($_POST["name"], $_POST["comment"]);
	$array = transformCommentToArray();
	require_once "view.html"; 


?>