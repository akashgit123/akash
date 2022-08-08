<?php
session_start();
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
        // $_SESSION['message']="Login Successful..!";
        header("location:/forum/partials/index.php");
      
       // exit();
    }
    $_SESSION['message']="Wrong Password..!";
    header("location:/forum/partials/_loginmodal.php");          
  }
  $_SESSION['message']="Please Enter Username Correctly..!";
  header("location:/forum/partials/_loginmodal.php");          
}
// $_SESSION['message']="Please Enter Username And Password..";
// header("location:/forum/partials/_loginmodal.php");          



// if($_SERVER['REQUEST_METHOD']=="POST")
// {
//   // echo "loggedin";
//   // include 'dbconnect.php';
//   $username =$_POST['loginUsername'];
//   $password =$_POST['loginPassword'];

//   // echo $username;
//   $sql = "SELECT * FROM `admin` WHERE admin_user_name='$username'";
//   $result = mysqli_query($con,$sql);
//   $row = mysqli_num_rows($result);
//   if($row)
//   {
//     $row = mysqli_fetch_assoc($result);
//     if($password==$row['admin_password'])
//     {
//       session_start();
//       $_SESSION['admin_username']=$username;
//       header("location:/forum/partials/admin_curd/admin_index.php");
//     }
//     $_SESSION['message']="Wrong Password..!"; 
    
//   }
//   else
//   {
//     $_SESSION['message']="Please Enter Username Correctly..!";
//     header("location:/forum/partials/_loginmodal.php");
//   }

// }
?>

