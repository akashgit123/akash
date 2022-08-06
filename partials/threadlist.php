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
        <center>ITech Disc Forum</center>
    </h1>

    <?php include '_dbconnect.php'; ?>
    <?php include '_header.php'; ?>
    <!-- Fetching Selected Category Names -->
    <?php
    $id = $_GET['catid'];
    $sql = "select * from categories where category_id= '$id'";
    $result = mysqli_query($con, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['category_id'];
        $category_name = $row['category_name'];
        $category_description = $row['category_description'];
    }
    ?>

    <?php
    $show_alert = false;
    $method = $_SERVER['REQUEST_METHOD'];
    // echo $method;
    if ($method == 'POST') {
        // Inserting the Posts into the DataBase 
        $th_title = $_POST['thread_title'];
        $th_title = str_replace("<","&lt;", $th_title);
        $th_title = str_replace(">","&gt;", $th_title);

        $th_description = $_POST['thread_description'];
        $th_description = str_replace("<","&lt;",$th_description);
        $th_description = str_replace(">","&gt;",$th_description);

        $user_id = $_POST['user_id'];
        $sql = "INSERT INTO `threads` (`thread_title`, `thread_description`, `thread_category_id`, `thread_user_id`, `time_stamp`) VALUES ('$th_title', '$th_description', '$id', '$user_id', current_timestamp())";
        $result = mysqli_query($con, $sql);
        $show_alert = true;
    }
    if ($show_alert) {
        echo ' <div class="alert alert-success" role="alert">
  <h4 class="alert-heading">Posted Successfully........!</h4>
  <p>Aww yeah, you successfully  </p>
  <hr>
  <p class="mb-0">Whenever you need to, be sure to use margin utilities to keep things nice and tidy.</p>
</div> ';
    }
    // else if ($th_title=$_POST[' '] || $th_description=$_POST[' '])
    // {
    //     echo ' <div class="alert alert-danger" role="alert">
    //     <h4 class="alert-heading">Something Went Wrong...!</h4>
    //     <p>Please insert Title and Description of the Post  or there may be Network Issue.</p>
    //     <hr>
    //     <p class="mb-0">Whenever you need to, be sure to use margin utilities to keep things nice and tidy.</p>
    //   </div> ';
    // }

    ?>


    <!-- Jumbotron for Presenting Category -->
    <div class="containor">
        <div class="jumbotron">
            <h1 class="display-10">Welcome to
                <?php echo $category_name; ?>
            </h1>
            <p class="lead"><?php echo $category_description; ?></p>
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
            <p class="lead">
                <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
            </p>
        </div>
    </div>

    <?php
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        echo '    <div class="class container">
        <h1 class="py-2">Start Discussion</h1>';
        //  Form for Posting the Posts 
        echo '
        <form action=" '. $_SERVER["REQUEST_URI"].'" method="POST">
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Post Title</label>
        <input type="" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" id="thread_title"
            name="thread_title">
        <div id="emailHelp" class="form-text">Try to keep your Title as short as possible.</div>
    </div>
    <div class="form-floating">
        <label for="floatingTextarea">Detail Explanation About Your Post</label>
        <textarea class="form-control" placeholder="Write Explanation here" id="floatingTextarea"
            id="thread_description" name="thread_description" rows="3"></textarea>
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
            <h1 class="py-2">Start Discussion</h1>
                <p class="" >You are not Loggedin Please Login Or Signup to start Discussion...</p>
            </div>';  
    }
    ?>
    


        <!-- Listing All the Posts One by One -->
        <div class="container mb-5">
            <h1 class="py-2" style="text-align:left;">Browse questions</h1>

            <?php
            $id = $_GET['catid'];
            $sql = "select * from threads where thread_category_id= '$id'";
            $result = mysqli_query($con, $sql);
            $no_result = true;
            while ($row = mysqli_fetch_assoc($result)) {
                $no_result = false;
                $thread_id = $row['thread_id'];
                $thread_title = $row['thread_title'];
                $thread_description = $row['thread_description'];
                $post_time = $row['time_stamp'];
                $thread_user_id= $row['thread_user_id'];

                $sql2 = "SELECT `user_name` FROM `user` WHERE `user_id`='$thread_user_id'";
                $result2 = mysqli_query($con,$sql2);
                $row2 = mysqli_fetch_assoc($result2);
                $user_name = $row2['user_name'];


                echo '<div class="media">
                <img class="mr-3" src="image\image_avatar.png" alt="There is some problem">
                <div class="media-body">
                <p class= "font-weight-bold my-0"> '.$user_name .' at ' . $post_time . '</p>
                    <h5 class="mt-0"><a class="text-dark" href="thread.php?thread_id=' . $thread_id . '">' . $thread_title . '</a></h5>
                    ' . $thread_description . '
                </div>
            </div>';
            }
        // echo var_dump($no_result);
        if ($no_result) {
            echo "<b> Be the First Person to Start Discussion on topic of your Interest in this Category </b>";
        }
        ?>



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