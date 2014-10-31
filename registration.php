
	<?php
		
		require_once 'backend/user_functions.php';
		if(isset($_POST['user_id']) AND 
		
		isset($_POST['user_password']) AND 
		isset($_POST['user_email']))
		
		$result = add_user($_POST['user_email'], $_POST['user_id'], $_POST['user_password']);
		if($result === TRUE)
		{
			echo 'added new user';}
		else {
			echo $result;
		}
		?>
    <!-- Main Content -->
    <div class="container">
  				<div id="box">
				<form method="post" id="reg_form">
				<label for="username">Username:</label>
				<input type="text" name="user_id" id="username"/><br/><br/>
				<label for="userpw">Password:</label>
				<input type="text" name="user_password" id="userpw"/><br/><br/>
				<label for="usermail">Email:</label>
				<input type="text" name="user_email" id="useremail"/><br/><br/>
				<button class ="btn btn-success"type="submit">Create</button>
				</form>
		</div>
    </div>

    



    <!-- jQuery -->
    

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/clean-blog.js"></script>
    <script>
			$(function() {
				//handle sumbit event by validating our fields first
				$('#reg_form').submit(function(){
					var patt = /^[a-z][a-zA-Z0-9]{6,20}$/;
					var patt_password = /^[A-Za-z0-9]{6,12}$/;
					var patt_email = /^[A-Za-z0-9]+@[A-Za-z0-9]+\.(com|net|org)$/;
					var patt_caps = /[A-Z]+/;
					var patt_nums = /[0-9]+/;
					
					
					var username = $('#username').val();
					var password = $('#userpw').val();
					var email =$('#useremail').val();
					
					if (!patt.test(username)){
						alert('username is invalid');
						return false;
					}
					 if(!patt_caps.test(password)){
					 	alert('password needs at least one capital letter');
					 	return false;
					 }
					 
					 if(!patt_nums.test(password)){
					 	alert('Your password needs at least one number');
					 	return false;
					 }
					 
					 if(!patt_password.test(password)){
					 	alert('Password length must be between 6 and 12 characters');
					 	return false;
					 }
					
					if(!patt_caps.test(password) || !patt_nums.test(password) || !patt_password.test(password)){
						alert('password is invalid');
						return false;
					}
					if(!patt_email.test(email)){
						alert('email is invalid');
						return false;
					}
				});
			});
		</script>
		

</body>

</html>