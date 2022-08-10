<?php
session_start();
include 'dbconnect.php';

// Delete User
if(isset($_POST['delete_user']))
{
    $user_id =  mysqli_real_escape_string($con,$_POST['delete_user']);

    $sql = "DELETE FROM `user` WHERE `user_id` ='$user_id'";
    $result = mysqli_query($con,$sql);

    if($result)
    {
        $_SESSION['message'] = "User Deleted Successfully";
        header("Location:/forum/partials/admin_curd/manage_user/users.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "User Not Deleted";
        header("Location:/forum/partials/admin_curd/manage_user/users.php");
        exit(0);
    }
}

?>