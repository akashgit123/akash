<?php
session_start();
$showError = "false";
if($_SERVER['REQUEST_METHOD']== "POST")
{
    include '_dbconnect.php';
    $username=$_POST['signupUsername'];
    $user_email=$_POST['signupEmail'];
    $password = $_POST['signupPassword'];
    $cpassword = $_POST['signupcPassword'];

    // Check whether the user exists in the DB or Not
    $exist_sql = "select * from user where `user_name`='$username'";
    $result = mysqli_query($con,$exist_sql);
    $num_rows = mysqli_num_rows($result);
    if($num_rows)
    {
        session_start();
        $_SESSION['message'] = "Username Already Exists";
        header("Location:/forum/partials/_signupmodal.php");

    }
    else
    {
        if($password==$cpassword)
        {
            $hash = password_hash($password,PASSWORD_DEFAULT);
            $sql = "INSERT INTO `user` (`user_name`,`email`, `password`, `creation_time`) VALUES ('$username','$user_email', '$hash', current_timestamp())";
            $result = mysqli_query($con,$sql);
            echo $result;
            if($result)
            {
                $showAlert = true;
                header("Location:/forum/partials/_loginmodal.php?signupsuccess=true");
                exit();
            }
        }
        $_SESSION['message'] = "Passwords Do Not Match";
        header("Location:/forum/partials/_signupmodal.php");
    }
}
?>