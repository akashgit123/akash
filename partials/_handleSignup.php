<?php
$showError = "false";
if($_SERVER['REQUEST_METHOD']== "POST")
{
    include '_dbconnect.php';
    $user_email=$_POST['signupEmail'];
    $password = $_POST['signupPassword'];
    $cpassword = $_POST['signupcPassword'];

    // Check whether the user exists in the DB or Not
    $exist_sql = "select * from user where email='$user_email'";
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
            $sql = "INSERT INTO `user` (`email`, `password`, `creation_time`) VALUES ('$user_email', '$hash', current_timestamp())";
            $result = mysqli_query($con,$sql);
            echo $result;
            if($result)
            {
                $showAlert = true;
                header("Location:/forum/partials/index.php?signupsuccess=true");
                exit();
            }
        }
        else
        {
            $showError = "Passwords Do Not Match";
            
        }
    }
}
?>