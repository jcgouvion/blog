<?php
include_once 'header.php';
include_once 'backend/post_functions.php';
if (isset($_GET['id'])) {
	$post_id = $_GET['id'];
	$posts = get_post($post_id);
	$post = $posts[0];
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

<form id="comment-form" role="form">
<div class="form-group">
<label for="comment"><?php echo $post['comment']; ?></label>
<textarea class="form-control" id="comment" rows="5"></textarea>
</div>

<button type="submit" class="btn btn-default">
Create
</button>
</form>

<?php
	include_once 'footer.php';
?>
