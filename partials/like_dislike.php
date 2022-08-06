<?php include ('server.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Like and Dislike system</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <link rel="stylesheet" href="like_dislike.css">
</head>
<body>
  <div class="posts-wrapper">
   <?php 
//    foreach ($comments as $comment):
    $id = $_GET['thread_id'];
    $sql = "select * from comments where thread_id= '$id'";
    $result = mysqli_query($con, $sql);
    $no_result = true;
    while ($comment = mysqli_fetch_assoc($result)): 
?>
   	<div class="post">
      <?php echo $comment['comment_content']; ?>
      <div class="post-info">
	    <!-- if user likes post, style button differently -->
      	<i <?php if (userLiked($comment['comment_id'])): ?>
      		  class="fa fa-thumbs-up like-btn"
      	  <?php else: ?>
      		  class="fa fa-thumbs-o-up like-btn"
      	  <?php endif ?>
      	  data-id="<?php echo $comment['comment_id'] ?>"></i>
      	<span class="likes"><?php echo getLikes($comment['comment_id']); ?></span>
      	
      	&nbsp;&nbsp;&nbsp;&nbsp;

	    <!-- if user dislikes post, style button differently -->
      	<i 
      	  <?php if (userDisliked($comment['comment_id'])): ?>
      		  class="fa fa-thumbs-down dislike-btn"
      	  <?php else: ?>
      		  class="fa fa-thumbs-o-down dislike-btn"
      	  <?php endif ?>
      	  data-id="<?php echo $comment['comment_id'] ?>"></i>
      	<span class="dislikes"><?php echo getDislikes($comment['comment_id']); ?></span>
      </div>
   	</div>
   <?php 
//    endforeach 
          endwhile;?>
  </div>
  <script src="scripts.js"></script>
</body>
</html>