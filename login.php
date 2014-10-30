<!DOCTYPE html>
<html>
	<head>
		<title>login</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
		<script src="https://code.jquery.com/jquery-1.11.0.min.js"></script>

	</head>
	<body>

		<?php
		require_once 'backend/user_functions.php';
		if (isset($_POST['user_id']) AND isset($_POST['user_password'])) {
			$username = $_POST['user_id'];
			$password = $_POST['user_password'];

			$result = login_user($_POST['user_id'], $_POST['user_password']);
			if (is_array($result)) {
				header('Location: '.$_GET['url']); }
			else {
				header('Location: list_post.php');
			} 
			exit;
		}
			  else {
				echo 'Please check your username and password';
			}
		
		
		?>
		<div id="box">
			<form method="post" id="reg_form">
				<label for="username">Username:</label>
				<input type="text" name="user_id" id="username"/>
				<br/>
				<br/>
				<label for="userpw">Password:</label>
				<input type="text" name="user_password" id="userpw"/>
				<br/>
				<br/>

				<button class ="btn btn-success"type="submit">
					Create
				</button>
			</form>
		</div>

	</body>
</html>

