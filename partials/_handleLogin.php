<?php
$showError = "false";
if($_SERVER['REQUEST_METHOD'] == "POST")
{
    include '_dbconnect.php';
    $email=$_POST['loginEmail'];
    $pass=$_POST['loginPassword'];

    $sql = "select * from user where email= '$email'";
    $result = mysqli_query($con,$sql);
    $num_rows = mysqli_num_rows($result);
    if($num_rows==1)
    {
       $row = mysqli_fetch_assoc($result);
       if(password_verify($pass,$row['password']))
       {
        session_start();
        $_SESSION['loggedin']=true;
        $_SESSION['user_id']= $row['user_id'];
        $_SESSION['email']=$email;
        echo "logged in :".$email; 
        header("location:/forum/partials/index.php");
        // exit();
       }

        // echo "Unable to Login ".$pass.$row['password'];
        header("location:/forum/partials/index.php");    
    }
  header("location:/forum/partials/index.php");

}
?>