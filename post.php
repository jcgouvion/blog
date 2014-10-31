<?php
include_once 'header.php';
include_once 'backend/post_functions.php';
include_once 'backend/sessions.php';
if (isset($_GET['id'])) {
	
	$post_id = $_GET['id'];
	$posts = get_post($post_id);
	$post = $posts[0];
	
	$comments = get_post_comments($post_id);
	
}


?>
<header class="intro-header" style="background-image: url('img/headers/<?php echo $post['picture']; ?>')">

<div class="container">
<div class="row">
<div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
<div class="site-heading">
<h1><?php echo $post['title']; ?></h1>
<hr class="small">
<span class="subheading">A Blog by Jonathan Gouvion</span>
</div>
</div>
</div>
</div>
</header>


<!-- Post Content -->
<article>
<div class="container">
<div class="row">
<div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
<?php echo $post['body']; ?>

</div>
</div>
</div>
</article>

<hr>
<?php
	foreach($comments as $comment)
	{
		?>
		
			<li><?php echo $comment['user_id']; ?></li>
			<li><?php echo $comment['post_id']; ?></li>
			<li><?php echo $comment['body']; ?></li>	
			<li><?php echo date ('F d, Y h:iA', $comment['created_ts']);?></li>
			
		
		<?php
		}
	?>
	
<form id="comment-form" role="form">
<div class="form-group">
<label for="comment">Comments</label>
<textarea class="form-control" id="comment" rows="5"></textarea>
</div>

<button type="submit" class="btn btn-default">
Post
</button>
</form>
<script>
$(function(){
	$('#comment-form').submit(function() {
		var confirm_result = confirm('Do you want to add this comment?');
		if(confirm_result) {
			var textarea = $('#comment').val();
			
			var data = {
				user_id : <?php echo $_SESSION['user']['user_id'];?>,
				post_id : <?php echo $post_id;?>,
				comment : textarea 
			}
		
			$.post('/ajax/add_comment.php', data,
			function(response) {
				if(response == 0) {
					var li = $('<li>').html(response);
					$('#comment-form').append(li);
				}
			});
		}
		return false;
	});
});
		
</script>
<?php
	include_once 'footer.php';
?>
