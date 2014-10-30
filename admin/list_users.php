<?php
include_once 'admin-header.php';
require_once '../backend/user_functions.php';

$users = get_user();
 ?>
 <style>
	.glyphicon {
		color: red;
		font-size: 18px;
		font-weight: bold;
		cursor: pointer
	}
 </style>
 
 <h1 class="page-header">
 	Users
 </h1>
 <ol class="breadcrumb">
 	<li><i class="fa fa-dashboard"></i></li>
 	<li class="active"><i class="fa fa-file"></i></li>
 </ol>


<table class="table table-stripped">
	<tr>
		<th>Post ID</th>
		<th>Title</th>
		<th>Posted</th>
		<th>Options</th>
	</tr>
	<?php
	foreach($users as $user)
	{
		?>
		<tr>
			<td><?php echo $user['user_id']; ?></td>
			<td><?php echo $user['username']; ?></td>
			<td><?php echo $user['email']; ?></td>	
			<td><span user-id="<?php echo $user['user_id']; ?>" class="glyphicon glyphicon-remove remove-user"></span> | edit</td>
		</tr>
		<?php
		}
	?>
</table>
<script>
	$('.remove-user').click(function() {
		var confirm_result = confirm('Are you sure you want to delete this?');
		if(confirm_result) {
			var blah = $(this);
			var data = {id: blah.attr('user-id')}
		
		$.post('/ajax/delete_user.php', data,
		function(response) {
			if(response == 1) {
				blah.parent().parent().remove();
				
			}
		});
		}
	});
</script>
