<?php
session_start();
if($_SERVER['REQUEST_METHOD']=='POST')
{
    include '_dbconnect.php';
    $username=$_POST['loginUsername'];
    $password=$_POST['loginPassword'];

    $sql="SELECT * FROM `user` WHERE `user_name`='$username'";
    $result=mysqli_query($con,$sql);
    $num_row=mysqli_num_rows($result);
    if($num_row==1)
    {
        $row=mysqli_fetch_assoc($result);
        if(password_verify($password,$row['password']))
        {
            session_start();
            $_SESSION['loggedin']=true;
            $_SESSION['user_id']=$row['user_id'];
            $_SESSION['user_name']=$row['user_name'];
            $_SESSION['email']=$email;
            header("location:/forum/partials/index.php");

        }
        else
        {
            $_SESSION['message']="Incorrect Password";
            header("location:/forum/partials/_loginmodal.php");
        }
       
    }
    elseif($num_row==0)
    {
        $sql2="SELECT * FROM `admin` WHERE `admin_user_name`='$username'";
        $result2=mysqli_query($con,$sql2);
        $num_row2=mysqli_num_rows($result2);
        if($num_row2==1)
        {
            $row2=mysqli_fetch_assoc($result2);
            if($password==$row['password'])
            {
                header("location:/forum/partials/admin_curd/admin_index.php");
            }
            else
            {
                $_SESSION['message']="Incorrect Password";
                header("location:/forum/partials/_loginmodal.php");
            }
        }
        else
        {
            $_SESSION['message']="Username Doesnot Exist";
            header("location:/forum/partials/_loginmodal.php");
        }
    }
}
?>