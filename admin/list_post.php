<?php
include_once 'admin-header.php';
require_once '../backend/post_functions.php';
$posts = get_post();
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
 	Posts listings
 </h1>
 <ol class="breadcrumb">
 	<li><i class="fa fa-dashboard"></i></li>
 	<li class="active"><i class="fa fa-file"></i></li>
 </ol>


<table class="table table-stripped">
	<tr>
		<th>Post ID</th>
		<th>Title</th>
		<th>Author</th>
		<th>Posted</th>
		<th>Options</th>
	</tr>
	<?php
	foreach($posts as $post)
	{
		?>
		<tr>
			<td><?php echo $post['post_id']; ?></td>
			
			<td><a href="post.php?id=<?php echo $post['post_id']; ?>"><?php echo $post['title']; ?></a></td>
			<td><?php echo $post['username'];?></td>
			<td><?php echo date('Y-m-d h:ia', $post['created_ts']); ?></td>	
			<td><span data-id="<?php echo $post['post_id']; ?>" class="glyphicon glyphicon-remove remove-post"></span> | edit</td>
			<td><a href="post.php?id=<?php echo $post['post_id'];?>" class="glyphicon glyphicon-pencil"></a></td>
		</tr>
		<?php
		}
	?>
</table>
<script>
	$('.remove-post').click(function() {
		var confirm_result = confirm('Are you sure you want to delete this?');
		if(confirm_result) {
			var blah = $(this);
			var data = {id: blah.attr('data-id')}
		
		$.post('/ajax/delete_post.php', data,
		function(response) {
			if(response == 1) {
				blah.parent().parent().remove();
				
			}
		});
		}
	});
</script>

