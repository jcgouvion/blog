<?php	
$response = '';

		if(isset($_POST['user_id']) AND 
		
		isset($_POST['user_password']) AND 
		isset($_POST['user_email']))
		{
		require_once '../backend/user_functions.php';
		$result = add_user($_POST['user_email'], $_POST['user_id'], $_POST['user_password']);
		
		$response = $result;
		}
		else {
			
		
		$response = 'Required fields are missing';}
		
		echo $response;
		
