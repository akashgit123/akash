<?php
include 'dbconnect.php';
// echo "loggedin";
if($_SERVER['REQUEST_METHOD']=="POST")
{
  // echo "loggedin";
  $username =$_POST['login_username'];
  $password =$_POST['login_password'];

  // echo $username;
  $sql = "SELECT * FROM `admin` WHERE admin_user_name='$username' AND admin_password='$password'";
  $result = mysqli_query($con,$sql);
  $row = mysqli_num_rows($result);
  if($row)
  {
    session_start();
    $_SESSION['admin_username']=$username;
    header("location:/forum/partials/admin_curd/admin_index.php");
  }
  else
  {
    header("location:/forum/partials/index.php");
  }

}
// header("location:/forum/partials/index.php");
?>