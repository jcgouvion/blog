<?php include_once 'admin-header.php';?>
<?php require_once '../backend/post_functions.php';
$post_id = $_GET['id'];
$message = '';
if (isset($_POST['title']) AND isset($_POST['body'])) {
	
	$picture = '';
	//check that $_FILES['photo'] is set and there are no errors//
	if(isset($_FILES['photo']) AND $_FILES['photo']['error'] == 0)
{ 
		// Move the temporary files to the final location//
		move_uploaded_file(
		$_FILES['photo']['tmp_name'],
		$_SERVER['DOCUMENT_ROOT'].'img/headers/'.$_FILES['photo']['name']
	);
	
	//assign the filename to $Picture
	$picture =$_FILES['photo']['name'];
}
	$result = update_post($_POST['title'], $_POST['body'], $_SESSION['user']['user_id'], $picture);
	if (is_array($result)) {
		echo 'added new post';
	} else {
		echo $result;
	}
}
$posts = get_post($post_id);
$post = $posts[0];
?>




<form method="post" role="form" enctype="multipart/form-data">
	<div class="form-group">
		<label for="exampleInputEmail1">Title</label>
		<input type="text" name="title" class="form-control" id="exampleInputEmail1" value="<?php echo $post['title']?>">
	</div>
	<div class="form-group">
		<label for="exampleInputPassword1">Body</label>
		<textarea class="form-control" name="body" rows="10"><?php echo $post['body']?></textarea>		

   

	</div>
	<div class="form-group">
		<label for="exampleInputFile">Photo</label>
		<input type="file" name="photo" id="exampleInputFile">
		<p class="help-block"></p>
	</div>
	<div class="checkbox">
		<label>
			<input type="checkbox">
			Check me out </label>
	</div>
	<button type="submit" class="btn btn-default">
		Post
	</button>
</form>
<script>
	
</script>