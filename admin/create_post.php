<?php
include_once 'admin-header.php';
require_once '../backend/post_functions.php';

if (isset($_POST['title']) AND isset($_POST['body'])) {
	
	$picture = '';
	//check that $_FILES['photo'] is set and there are no errors//
	if(isset($_FILES['photo']) AND $_FILES['photo']['error'] == 0)
{ 
		// Move the temporary files to the final location//
		move_uploaded_file(
		$_FILES['photo']['tmp_name'],
		$_SERVER['DOCUMENT_ROOT'].'/img/headers/'.$_FILES['photo']['name']
	);
	
	//assign the filename to $Picture
	$picture =$_FILES['photo']['name'];
}

	$result = add_post($_POST['title'], $_POST['body'], $_SESSION['user']['user_id'], $picture);

	if (is_array($result)) {
		echo 'added new post';
	} else {
		echo $result;
	}

}
?>

<h1 class="page-header"> Create Post <small></small></h1>
<ol class="breadcrumb">
	<li>
		<i class="fa fa-dashboard"></i><a href="index.php">Create Post</a>
	</li>
	<li class="active">
		<i class="fa fa-file"></i> Blank Page
	</li>
</ol>
<?php include_once 'inc/post_form.php';?>
