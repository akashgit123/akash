<?php
session_start();
include 'dbconnect.php';

// Delete feedback
if(isset($_POST['delete_feedback']))
{
    $feedback_id=mysqli_real_escape_string($con,$_POST['delete_feedback']);

    $sql = "DELETE FROM `poll` WHERE `id` ='$feedback_id'";
    $result = mysqli_query($con,$sql);

    if($result)
    {
        $_SESSION['message'] = "Feedback Deleted Successfully";
        header("Location:admin_feedback.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Feedback Not Deleted";
        header("Location:admin_feedback.php");
        exit(0);
    }
}

?>