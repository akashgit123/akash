<?php
$showError = "false";
if($_SERVER['REQUEST_METHOD'] == "POST")
{
    
     include '_dbconnect.php';
     $email = $_POST['email'];

    //  echo $email;

    $sql = "select * from user where email= '$email'";
    $result = mysqli_query($con,$sql);
    $num_rows = mysqli_num_rows($result);

    // echo $num_rows;
    if($num_rows)
    {
        $npassword=$_POST['new_password'];
        $cpassword=$_POST['Cpassword'];
    
        if($npassword==$cpassword)
        {
            $hash=password_hash($npassword,PASSWORD_DEFAULT);
            $sql="UPDATE `user` SET `password`='$hash' where email='$email'";
            $result=mysqli_query($con,$sql);
            header("location:/forum/partials/index.php");

        }
        // header("location:/forum/partials/new_pass.php");
    }
    //  $npassword=$_POST['new_pass'];
    //  $cpassword=$_POST['Cpassword'];
    //  session_start();
    //  $email = $_SESSION['email'];
    
    //  if($npassword==$cpassword)
    //  {
    //     $sql="UPDATE `user` SET `user_pass`='$npassword' where user_email='$email'";
    //     $result=mysqli_query($con,$sql);

    //  }
}
?>