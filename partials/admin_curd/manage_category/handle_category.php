<?php
session_start();
include 'dbconnect.php';

// Delete Category
if(isset($_POST['delete_category']))
{
    $category_id=mysqli_real_escape_string($con,$_POST['delete_category']);

    $sql = "DELETE FROM `categories` WHERE `category_id` ='$category_id'";
    $result = mysqli_query($con,$sql);

    if($result)
    {
        $_SESSION['message'] = "Category Deleted Successfully";
        header("Location:/forum/partials/admin_curd/manage_category/admin_category.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Category Not Deleted";
        header("Location:/forum/partials/admin_curd/manage_category/admin_category.php");
        exit(0);
    }
}

// Update category
if(isset($_POST['update_category']))
{
    $category_id =  mysqli_real_escape_string($con,$_POST['category_id']);

    $name = mysqli_real_escape_string($con,$_POST['cname']);
    $description = mysqli_real_escape_string($con,$_POST['cdescription']);

    $sql = "UPDATE `categories` SET `category_name`='$name', `category_description`='$description' WHERE `category_id`='$category_id'";
    $result=mysqli_query($con,$sql);
    
    if($result)
    {
        $_SESSION['message'] = "Category Updated Successfully";
        header("Location:/forum/partials/admin_curd/manage_category/admin_category.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Category Not Updateed";
        header("Location:/forum/partials/admin_curd/manage_category/admin_category.php");
        exit(0);
    }
}


// Add Category 
if(isset($_POST['save_category']))
{
    $name = mysqli_real_escape_string($con,$_POST['cname']);
    $description = mysqli_real_escape_string($con,$_POST['cdescription']);

    $sql = "INSERT INTO `categories` (`category_name`, `category_description`, `created`) VALUES ('$name', '$description', current_timestamp())";
    $result = mysqli_query($con,$sql);
    if($result)
    {
        $_SESSION['message'] = "Category Added";
        header("Location:/forum/partials/admin_curd/manage_category/admin_category.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Category Not Added";
        header("Location:/forum/partials/admin_curd/manage_category/admin_category.php");
        exit(0);
    }
}
?>