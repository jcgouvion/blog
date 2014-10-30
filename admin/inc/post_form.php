<form method="post" role="form" enctype="multipart/form-data">
	<div class="form-group">
		<label for="exampleInputEmail1">Title</label>
		<input type="text" name="title" class="form-control" id="exampleInputEmail1" placeholder="">
	</div>
	<div class="form-group">
		<label for="exampleInputPassword1">Body</label>
		<textarea class="form-control" name="body" rows="10"></textarea>		
	</div>
	
	
	<div class="form-group">
		<input type="hidden" name="original_picture" values=<?php echo $post['picture'];?>
		<?php
		if(!empty($post['picture']))
		{
			?>
			<a href="/img/headers/<?php echo $post['picture'];?>" target="_new">current image
				<?php
				
		}
		?>
		<label for="photo">Header Photo</label>
		<input type="file" name="photo" id="photo">
	</div>
	
	<button type="submit">Submit</button>
	
	
	</form>

<script>
	var post id = <?php echo $_GET['id'];?>
	var user id = <?php echo $_SESSION['user']['user_id'];?>;
	var comment;
	$(function(){
		$('#comment-form').submit(function(){
			//populate the comment variable
			comment = $('#comment').val();
			// run AJAX
			var data = {
				'post_id' : post_id,
				'user_id' : user_id,
				'comment' : comment
			}
		});
	});
</script>