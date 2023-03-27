<?php
session_start();
include 'dbconnect.php';
// Delete Post
if(isset($_POST['delete_post']))
{
    $thread_id=mysqli_real_escape_string($con,$_POST['delete_post']);


    $sql = "DELETE FROM `threads` WHERE `thread_id` ='$thread_id'";
    $result = mysqli_query($con,$sql);

    if($result)
    {
        $_SESSION['message'] = "Post Deleted Successfully";
        header("Location:/forum/partials/admin_curd/manage_post_reply/admin_post.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Post Not Deleted";
        header("Location:/forum/partials/admin_curd/manage_post_reply/admin_post.php");
        exit(0);
    }
}


// Delete Comments 
if(isset($_POST['delete_comment']))
{
    $comment_id=mysqli_real_escape_string($con,$_POST['delete_comment']);
    $thread_id=$_SESSION['thread_id'];

    $sql = "DELETE FROM `comments` WHERE `comment_id` ='$comment_id'";
    $result = mysqli_query($con,$sql);

    if($result)
    {
        $_SESSION['message'] = "Comment Deleted Successfully";
        header("Location:/forum/partials/admin_curd/manage_post_reply/admin_comments.php?thread_id=$thread_id");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Comment Not Deleted";
        header("Location:/forum/partials/admin_curd/manage_post_reply/admin_post.php");
        exit(0);
    }
}

// Verify Comments
if(isset($_POST['verify_comment']))
{
    $comment_id= $_GET['comment_id'];
    
    $verify =  mysqli_real_escape_string($con,$_POST['verify']);

    $sql = "UPDATE `comments` SET `verify`='$verify' where `comment_id`='$comment_id' ";
    $result=mysqli_query($con,$sql);
    
    
    if($result)
    {
        $_SESSION['message'] = "Comment Verified Successfully";
        header("Location:/forum/partials/admin_curd/manage_post_reply/admin_post.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Comment Not Verified";
        header("Location:/forum/partials/admin_curd/manage_post_reply/admin_post.php");
        exit(0);
    }
}

?>