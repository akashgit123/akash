<?php
session_start();
include 'dbconnect.php';
include 'admin_header.php';
?>

<h1>View Post</h1>
    <div class="containor mt-5">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>View Post Details
                            <a href="admin_post.php" class="btn btn-success float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if(isset($_GET['id']))
                        {
                            $thread_id= $_GET['id'];
                            $sql = "SELECT * FROM `threads` WHERE `thread_id`='$thread_id'";
                            $result = mysqli_query($con,$sql);
                            if(mysqli_num_rows($result)>0)
                            {
                                $thread = mysqli_fetch_array($result);
                                // print_r($category);
                                echo '
                                    <form action="handle_post_reply.php" method="POST">
                                        <input type="hidden" name="category_id" value="'. $thread['thread_id'].'">
                                        <div class="mb-3">
                                        <label>Post Id</label>
                                        <p class="form-control"> '. $thread['thread_id'].'   </p>
                                        </div>
                                        <div class="mb-3">
                                            <label>Post Title</label>
                                            <p class="form-control">'. $thread['thread_title'].'    </p>
                                        </div>
                                        <div class="mb-3">
                                            <label>Thread Description</label>
                                            <p class="form-control">'. $thread['thread_description'].'    </p>
                                        </div>
                                        <div class="mb-3">
                                            <label>Category Id</label>
                                            <p class="form-control">'. $thread['thread_category_id'].'    </p>
                                        </div>
                                        <div class="mb-3">
                                            <label>User Id</label>
                                            <p class="form-control">'. $thread['thread_user_id'].'    </p>
                                        </div>
                                        <div class="mb-3">
                                            <label>Post Date</label>
                                            <p class="form-control">'. $thread['time_stamp'].'    </p>
                                    </form> ';
                                     
                            }
                            else
                            {
                                echo "<h4>No Such Id Found </h4>";
                            }
                        }
                        ?>

                        
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include 'admin_footer.php'; ?>