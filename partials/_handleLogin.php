<?php
$showError = "false";
if($_SERVER['REQUEST_METHOD'] == "POST")
{

  include '_dbconnect.php';
  $username=$_POST['loginUsername'];
  $pass=$_POST['loginPassword'];

  $sql = "select * from user where user_name= '$username'";
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
        $_SESSION['user_name']= $row['user_name'];
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
header("location:/forum/partials/index.php");



if($_SERVER['REQUEST_METHOD']=="POST")
{
  // echo "loggedin";
  // include 'dbconnect.php';
  $username =$_POST['loginUsername'];
  $password =$_POST['loginPassword'];

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
?>