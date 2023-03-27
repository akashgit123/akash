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
                        <h4>FeedBack
                            <a href="admin_index.php" class="btn btn-primary float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <table class="table">

                            <tr>
                                <th>SL No</th>
                                <th>Name</th>
                                <th>Email</th>
                                <!-- <th>Phone</th> -->
                                <th>Feedback</th>
                                <th>Suggestions</th>
                                <th>Date</th>
                                <th>Operation</th>
                            </tr>
                            <tbody>
                                <?php
                                $sql = "SELECT * from poll";
                                $result = mysqli_query($con, $sql);

                                if (mysqli_num_rows($result) > 0) {
                                    foreach ($result as $feedback) {
                                ?>
                                        <tr>
                                            <td> <?= $feedback['id']; ?></td>
                                            <td> <?= $feedback['name']; ?></td>
                                            <td> <?= $feedback['email']; ?></td>
                                            <td> <?= $feedback['feedback']; ?></td>
                                            <td> <?= $feedback['suggestions']; ?></td>
                                            <td> <?= $feedback['feedback_date']; ?></td>


                                            <div class="row mx-2">
                                                <td>
                                                    <!-- <a href="view_post.php?id=<?= $comment['comment_id']; ?>" class="btn btn-success btn-sm mx-1 my-1">View</a> -->
                                                    
                                                    <form action="feedback_delete.php" method="POST" class="d-inline">
                                                        <button type="submit" name="delete_feedback" value="<?= $feedback['id']; ?>" class="btn btn-danger btn-sm">Delete</button>
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