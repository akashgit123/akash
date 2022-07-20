<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css " integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

    <title>Welcome To Discussion Forum</title>
</head>

<body>
    <h1>
        <center>Discussion Forum</center>
    </h1>

    <?php include '_dbconnect.php'; ?>
    <?php include '_header.php'; ?>
    <?php
    $id = $_GET['thread_id'];
    $sql = "select * from threads where thread_id= '$id'";
    $result = mysqli_query($con, $sql);
    $no_result = true;
    while ($row = mysqli_fetch_assoc($result)) {
        $no_result = false;
        $id = $row['thread_id'];
        $title = $row['thread_title'];
        $description = $row['thread_description'];
        $thread_user_id = $row['thread_user_id'];

        $sql2 = "SELECT email FROM `user` WHERE user_id=$thread_user_id";
        $result2 = mysqli_query($con,$sql2);
        $row2 = mysqli_fetch_assoc($result2);
        $posted_by = $row2['email'];
    }
    ?>
 <!-- Inserting the comments into the Comments DataBase from the Form -->
<?php
    $show_alert = false;
    $method = $_SERVER['REQUEST_METHOD'];
    // echo $method;
    if ($method == 'POST') {
        // Inserting the comments into the Comments DataBase 
        $comment_description = $_POST['comment'];
        $comment_description = str_replace("<","&lt;",$comment_description);
        $comment_description = str_replace(">","&gt;",$comment_description);


        $user_id = $_POST['user_id'];
        $sql = "INSERT INTO `comments` (`comment_content`, `thread_id`, `comment_time`, `comment_by`) VALUES ('$comment_description', '$id', current_timestamp(), '$user_id')";
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
                <?php echo $title ?>
            </h1>
            <p class="lead"> <?php echo $description ?></p>
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
            <p class=""><b>Posted By <?php echo $posted_by; ?></b></p>
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
                <textarea class="form-control" placeholder="Write Explanation here" id="comment" name="comment" rows="3"></textarea>
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
        <h1 class="py-2" style="text-align:left;">Replies / Comments</h1>
        <?php
        $id = $_GET['thread_id'];
        $sql = "select * from comments where thread_id= '$id'";
        $result = mysqli_query($con, $sql);
        $no_result = true;
        while ($row = mysqli_fetch_assoc($result)) {
            $no_result = false;
            $thread_id = $row['comment_id'];
            $content = $row['comment_content'];
            $comment_time = $row['comment_time'];
            $comment_user_id= $row['comment_by'];

            $sql2 = "SELECT email FROM `user` WHERE user_id=$comment_user_id";
            $result2 = mysqli_query($con,$sql2);
            $row2 = mysqli_fetch_assoc($result2);
            $user_email = $row2['email'];



            echo '<div class="media">
            <img class="mr-3" src="image\image_avatar.png" width="70px;" alt="There is some problem">
            <div class="media-body">
            <p class= "font-weight-bold my-0"> '.$user_email .'  '.$comment_time.'</p>
                ' . $content . '
            </div>
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





    <!-- Just for Our User interface now
    <div class="media">
      <img class="mr-3" src="image\image_avatar.png" alt="Generic placeholder image">
      <div class="media-body">
        <h5 class="mt-0">Media heading</h5>
        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
      </div>
    </div> -->



    <?php include '_footer.php'; ?>


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