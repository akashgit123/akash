<?php
session_start();
include 'dbconnect.php';
include 'admin_header.php';
?>


<div class="containor mt-4 ">
        <?php
        include 'message.php';
        ?>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Commemt Details
                            <a href="admin_post.php" class="btn btn-primary float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <table class="table">

                            <tr>
                                <th>Comment Id</th>
                                <th>Comment</th>
                                <th>Description</th>
                                <th>Comment Time</th>
                                <th>User Id</th>
                                <th>Verify</th>
                                <th>Operations</th>
                            </tr>
                            <tbody>
                                <?php
                                $thread_id = $_GET['thread_id'];
                                $sql = "SELECT * from comments WHERE `thread_id`='$thread_id' ORDER BY `comment_id` DESC";
                                $result = mysqli_query($con, $sql);

                                if (mysqli_num_rows($result) > 0) {
                                    foreach ($result as $comment) {
                                ?>
                                        <tr>
                                            <td> <?= $comment['comment_id']; ?></td>
                                            <td> <?= $comment['comment_content']; ?></td>
                                            <td> <?= $comment['thread_id']; ?></td>
                                            <td> <?= $comment['comment_time']; ?></td>
                                            <td> <?= $comment['comment_by']; ?></td>
                                            <td> <?= $comment['verify']; ?></td>

                                            <div class="row mx-2">
                                                <td>
                                                    <a href="verify_comments.php?id=<?= $comment['comment_id']; ?>" class="btn btn-success btn-sm mx-1 my-1"style="width: 5rem; margin-left: 0rem">Verify</a>
                                                    
                                                    <form action="handle_post_reply.php" method="POST" class="d-inline">
                                                        <button type="submit" name="delete_comment" value="<?= $comment['comment_id']; ?>" class="btn btn-danger btn-sm"style="width: 5rem; margin-left: 0rem">Delete</button>
                                                        <?php
                                                            $_SESSION['thread_id']=$thread_id;                                                        ?>
                                                    </form>
                                                </td>
                                            </div>

                                        </tr>
                                <?php
                                    }
                                } else {
                                    echo '<h5> No Records Found </h5>';
                                }


                                ?>

                            </tbody>

                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>


<?php include 'admin_footer.php'; ?>