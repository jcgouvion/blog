<?php include_once 'header.php';?>

<!DOCTYPE html>

<html>
	<head>
		<title>Form validation</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
		<script src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
 <!-- Page Header -->
    <!-- Set your background image for this header on the line below. -->
    <header class="intro-header" style="background-image: url('img/home-bg.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="site-heading">
                        <h1>The Gouv Blog</h1>
                        <hr class="small">
                        <span class="subheading">A Clean Blog Theme by Jonathan Gouvion</span>
                    </div>
                </div>
            </div>
        </div>
    
	</head>
	<body>

		<div id="message-container"></div>
		<div id="box">
			<form method="post" id="reg_form">
				<label for="username">ID:</label>
				<input type="text" name="user_id" id="username"/>
				<br/>
				<br/>
				<label for="userpw">Password:</label>
				<input type="text" name="user_password" id="userpw"/>
				<br/>
				<br/>
				<label for="usermail">Email:</label>
				<input type="text" name="user_email" id="useremail"/>
				<br/>
				<br/>
				<button class ="btn btn-success"type="submit">
					Register
				</button>
			</form>
		</div>

		<script>
			$(function() {
				$('#username').blur(function() {
					var user_field = $(this);
					var data = {
						'username' : $(this).val()
					}
					$.post('ajax/unique_check.php', data, function(response) {
						if (response == 1) {
							user_field.removeClass('alert-danger').addClass('alert-success');
						} else {
							user_field.removeClass('alert-success').addClass('alert-danger');
						}
					})
				});
				
				$('#useremail').blur(function() {
					var user_field = $(this);
					var data = {
						'useremail' : $(this).val()
					}
					$.post('ajax/unique_check.php', data, function(response) {
						if (response == 1) {
							user_field.removeClass('alert-danger').addClass('alert-success');
						} else {
							user_field.removeClass('alert-success').addClass('alert-danger');
						}
					})
				});
				
				

				//handle sumbit event by validating our fields first
				$('#reg_form').submit(function() {
					var patt = /^[a-z][a-zA-Z0-9]{6,20}$/;
					var patt_password = /^[A-Za-z0-9]{6,12}$/;
					var patt_email = /^[A-Za-z0-9]+@[A-Za-z0-9]+\.(com|net|org)$/;
					var patt_caps = /[A-Z]+/;
					var patt_nums = /[0-9]+/;

					var username = $('#username').val();
					var password = $('#userpw').val();
					var email = $('#useremail').val();

					//ajax column
					var data = {
						'user_id' : username,
						'user_password' : password,
						'user_email' : email
					}
					$.post('/ajax/registration.php', data, function(response) {
						if (response == 1) {
							var div = $('<div>').addClass('alert alert-success').html('Account registration successful');
						} else {
							var div = $('<div>').addClass('alert alert-danger').html(response);
						}
						$('#message-container').html(div);
					});

					return false;
				});
			});
		</script>

	</body>
</html>