<?php
session_start();
include 'dbconnect.php';
include 'admin_header.php';
?>

<h1>View Comment</h1>
    <div class="containor mt-5">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4> Details
                            <a href="admin_post.php" class="btn btn-success float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if(isset($_GET['id']))
                        {
                            $comment_id= $_GET['id'];
                            $sql = "SELECT * FROM `comments` WHERE `comment_id`='$comment_id'";
                            $result = mysqli_query($con,$sql);
                            if(mysqli_num_rows($result)>0)
                            {
                                $comment = mysqli_fetch_array($result);
                                // print_r($category);
                                echo '
                                    <form action="handle_post_reply.php?comment_id='. $comment['comment_id'].'" method="POST">
                                        <div class="mb-3">
                                        <label>Comment Id</label>
                                        <p class="form-control"> '. $comment['comment_id'].'   </p>
                                        </div>
                                        <div class="mb-3">
                                            <label>Commet Description</label>
                                            <p class="form-control">'. $comment['comment_content'].'    </p>
                                        </div>
                                        <div class="mb-3">
                                        <label>Verify</label>
                                        <input type="text" name="verify"  class="form-control" >
                                        </div>
                                        <div class="mb-3">
                                            <button type="submit" class="btn btn-primary" name="verify_comment">Submit</button>
                                        </div>
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