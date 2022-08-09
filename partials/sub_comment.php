<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css " integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <link rel="stylesheet" href="like_dislike.css">

    <title>Welcome To Discussion Forum</title>
</head>

<body>
    <h1>
        <center>ITech Disc Forum</center>
    </h1>

    <?php include '_dbconnect.php'; ?>
    <?php include '_header.php'; ?>
    <?php
    $id = $_GET['comment_id'];
    $sql = "select * from comments where comment_id= '$id'";
    $result = mysqli_query($con, $sql);
    $no_result = true;
    while ($row = mysqli_fetch_assoc($result)) {
        $no_result = false;
        $id = $row['comment_id'];
        $comment_content = $row['comment_content'];
        $user_id = $row['comment_by'];
        $time =$row['comment_time'];

        $sql2 = "SELECT `user_name` FROM `user` WHERE `user_id`=$user_id";
        $result2 = mysqli_query($con,$sql2);
        $row2 = mysqli_fetch_assoc($result2);
        $posted_by = $row2['user_name'];
        
    }
    ?>
 <!-- Inserting the comments into the Comments DataBase from the Form -->
<?php
    $show_alert = false;
    $method = $_SERVER['REQUEST_METHOD'];
    // echo $method;
    if ($method == 'POST') {
        // Inserting the comments into the Comments DataBase 
        $sub_comment = $_POST['sub_comment'];
        $sub_comment = str_replace("<","&lt;",$sub_comment);
        $sub_comment = str_replace(">","&gt;",$sub_comment);

        $verify=" ";


        $user_id = $_POST['user_id'];
        $sql = "INSERT INTO `sub_comment` (`sub_comment_content`, `comment_id`,`sub_comment_by`, `sub_comment_time`, `verify`) VALUES ('$sub_comment', '$id', '$user_id', current_timestamp(),'$verify')";
        $result = mysqli_query($con, $sql);
        $show_alert = true;
    }
    if ($show_alert) {
        echo ' <div class="alert alert-success" role="alert">
  <h4 class="alert-heading"> Comment Posted Successfully........!</h4>
  <p>Aww yeah, you successfully  </p>
  <hr>
  </div> ';
    }
    ?>




<!-- To Display the Selected Post -->
    <div class="containor">
        <div class="jumbotron">
            <h1 class="display-10">
                <?php echo $comment_content ?>
            </h1>
            <hr class="my-4">
            <p>Important Notice... <br>
                <marquee behavior="" direction="left"><b>Rules:</b>
                    No Spam / Advertising / Self-promote in the forums. ...
                    Do not post copyright-infringing material. ...
                    Do not post “offensive” posts, links or images. ...
                    Do not cross post questions. ...
                    Do not PM users asking for help. ...
                    Remain respectful of other members at all times.
            </p>
            </marquee>
            <p class="">Posted By : <b><?php echo $posted_by; ?></b>
            <br>Time: <?php echo $time; ?>
            </p>
            <!-- <p class="lead">
        <a class="btn btn-success btn-lg" href="#" role="button">Learn more</a>
      </p> -->
        </div>
    </div>

    <!-- Form for posting Comments or Reply -->
    <?php
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        echo '
    <div class="class container">
        <h1 class="py-2">Post your Comment</h1>

        <form action=" '.$_SERVER["REQUEST_URI"].' " method="POST">
            <div class="form-floating">
                <label for="floatingTextarea">Please Post your Reply or Comment Here</label>
                <textarea class="form-control" placeholder="Write Explanation here" id="comment" name="sub_comment" rows="3"></textarea>
                <input type="hidden" name="user_id" value=" '.$_SESSION["user_id"].' ">

            </div><br>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <hr>
    </div> ';
    }
    else 
    {
      echo '<div class="containor">
            <h1 class="py-2">Post your Comment</h1>
                <p class="" >You are not Loggedin Please Login Or Signup to Post your Comment...</p>
            </div>';  
    }
    ?>


    <!-- Fetching the Comments from the DB -->
    <div class="container mb-5">
        <h1 class="py-2" style="text-align:left;">Comments</h1>
        
        <?php
        $id = $_GET['comment_id'];
        $sql = "SELECT * from sub_comment  where comment_id= '$id' ORDER BY `sub_comment_time` DESC";
        $result = mysqli_query($con, $sql);
        $no_result = true;
        while ($row = mysqli_fetch_assoc($result)) {
            $no_result = false;
            $sub_comment_id = $row['sub_comment_id'];
            $sub_comment_content = $row['sub_comment_content'];
            $sub_comment_time = $row['sub_comment_time'];
            $sub_comment_by= $row['sub_comment_by'];
            $verify = $row['verify'];

            $sql2 = "SELECT `user_name` FROM `user` WHERE `user_id`=$sub_comment_by";
            $result2 = mysqli_query($con,$sql2);
            $row2 = mysqli_fetch_assoc($result2);
            $user_name = $row2['user_name'];



            echo '<div class="media">
            <img class="mr-3" src="image\image_avatar.png" width="70px;" alt="There is some problem">
            <div class="media-body">
            <p class= "font-weight-bold my-0">Replied By: '.$user_name .'  </p>
            <a style="color:black;" href="sub_comment.php">
                ' . $sub_comment_content . '</a> <br> '.$sub_comment_time.'
            </div><b style="color:red";> '.$verify.'</b>
        </div>';
        }
        if($no_result)
        {
            echo '
            <div class="jumbotron jumbotron-fluid">
                <div class="container">
                <h1 class="display-4">No Comments Found</h1>
                <p class="lead">Be the first person to comment.</p>
                </div>
            </div>  ';
        }
            
        ?>
    </div>  


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>
<?php include '_footer.php'; ?>