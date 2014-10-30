<?php
require_once 'backend/sessions.php';
require_once 'backend/post_functions.php';

$result = FALSE;
if(isset($_POST['post_id']) AND isset($_POST['user_id']) AND isset($_POST['comment'])) {
	$result = add_comment($_POST['post_id'], $_POST['user_id'], $_POST['comment']);
	if($result !== FALSE)
	echo $_post['post_id'];
	echo $_post['user_id'];
	echo $_post['comment'];
	echo $_post['created_ts']; 
	
}
return $result;
?>
