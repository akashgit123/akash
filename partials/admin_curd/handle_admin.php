<?php
session_start();
include 'dbconnect.php';

// Delete Admin
if(isset($_POST['delete_admin']))
{
    $admin_id =  mysqli_real_escape_string($con,$_POST['delete_admin']);

    $sql = "DELETE FROM `admin` WHERE `admin_id` ='$admin_id'";
    $result = mysqli_query($con,$sql);

    if($result)
    {
        $_SESSION['message'] = "Admin Deleted Successfully";
        header("Location:admin_index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Admin Not Deleted";
        header("Location:admin_index.php");
        exit(0);
    }
}

// Edit Admin
if(isset($_POST['edit_admin']))
{
    $admin_id =  mysqli_real_escape_string($con,$_POST['admin_id']);

    $name = mysqli_real_escape_string($con,$_POST['admin_name']);
    $username = mysqli_real_escape_string($con,$_POST['admin_user_name']);
    $email = mysqli_real_escape_string($con,$_POST['admin_email']);
    $password = mysqli_real_escape_string($con,$_POST['admin_password']);
    // $cpassword = mysqli_real_escape_string($con,$_POST['admin_cpassword']);

    $sql = "UPDATE `admin` SET `admin_name`='$name', `admin_user_name`='$username', `admin_email`='$email',`admin_password`='$password' WHERE `admin_id`='$admin_id'";
    $result=mysqli_query($con,$sql);
    
    if($result)
    {
        $_SESSION['message'] = "Admin Updated Successfully";
        header("Location:admin_index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Admin Not Updated";
        header("Location:admin_index.php");
        exit(0);
    }
}


// Add Admin 
if(isset($_POST['save_admin']))
{
    $name = mysqli_real_escape_string($con,$_POST['admin_name']);
    $username = mysqli_real_escape_string($con,$_POST['admin_username']);
    $email = mysqli_real_escape_string($con,$_POST['admin_email']);
    $password = mysqli_real_escape_string($con,$_POST['admin_password']);
    $cpassword = mysqli_real_escape_string($con,$_POST['admin_cpassword']);

     // Check whether the user exists in the DB or Not
     $exist_sql = "select * from admin where admin_email='$email'";
     $result = mysqli_query($con,$exist_sql);
     $num_rows = mysqli_num_rows($result);
     if($num_rows)
     {
         $showError = "Email Address Already Exists";
     }
     else
     {
         if($password==$cpassword)
         {
            $hash = password_hash($password,PASSWORD_DEFAULT);
            $sql = "INSERT INTO `admin` (`admin_name`, `admin_user_name`,`admin_password`,`admin_email`, `creation_time`) VALUES ('$name', '$username','$hash','$email', current_timestamp())";
            $result = mysqli_query($con,$sql);
            if($result)
            {
            $_SESSION['message'] = "Admin Added";
            header("Location:/forum/partials/admin_curd/admin_index.php");
            exit(0);
            }
            else
            {
            $_SESSION['message'] = "Admin Not Added";
            header("Location:/forum/partials/admin_curd/add_admin.php");
            exit(0);
            }
         }
    }

}
?>