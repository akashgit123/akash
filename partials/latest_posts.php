<?php 
include '_dbconnect.php';

?>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css " integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

    <!-- <link rel="stylesheet" href="card.css"> -->

    <title>Welcome To Discussion Forum</title>
</head>

<body>
    <h1>
        <center>ITech Disc Forum</center>
    </h1>
    <?php include '_header.php';  ?>
    
    <div class="conatinor my-3 mr-5">
        <h2 style="text-align:center;">Latest Posts</h2>
        <?php

        $sql = "SELECT * from `threads` ORDER BY `time_stamp` DESC  LIMIT 10 ";
        $result = mysqli_query($con, $sql);
        $no_result = true;
        while ($row = mysqli_fetch_assoc($result)) {
            $no_result = false;
            $thread_id = $row['thread_id'];
            $thread_title = $row['thread_title'];
            $thread_description = $row['thread_description'];
            $post_time = $row['time_stamp'];
            $thread_user_id = $row['thread_user_id'];

            $sql2 = "SELECT `user_name` FROM `user` WHERE `user_id`='$thread_user_id'";
            $result2 = mysqli_query($con, $sql2);
            $row2 = mysqli_fetch_assoc($result2);
            $user_name = $row2['user_name'];
        ?>


            <div class="row  mr-15 ml-15">
                <div class="media">
                    <img class="mr-3" src="image\image_avatar.png" alt="There is some problem">
                    <div class="media-body">
                        <p class="font-weight-bold my-0"> <?= $user_name ?> at <?= $post_time ?></p>
                        <h5 class="mt-0"><a class="text-dark" href="thread.php?thread_id= <?= $thread_id ?>"><?= $thread_title ?></a></h5>
                        <?= $thread_description ?>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
        <hr>
    </div>



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