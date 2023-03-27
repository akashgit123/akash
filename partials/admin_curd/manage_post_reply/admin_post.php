<?php
session_start();
include 'dbconnect.php';
include 'admin_header.php';
?>

<!DOCTYPE html>
<html>

<head>
    <style>
        table
        {
            border: 1px solid black;
            visibility: visible;
        }
    </style>
    <center>
        <h1>Post details between Selected date range</h1>
</head>

<body>
    <form action="\forum\partials\admin_curd\manage_post_reply\admin_post.php" method="POST">
        <input type="date" name="txtstartdate">
        <input type="date" name="txtenddate">
        <br> <br>
        <p>
            <input type="submit" name="search" value="Search" id="">
        </p>
        <?php
        // include '_dbconnect.php';
        if (isset($_POST['search'])) 
        {
            $txtstartdate = $_POST['txtstartdate'];
            $txtenddate = $_POST['txtenddate'];

            $sql = "SELECT * FROM threads WHERE `time_stamp` between '$txtstartdate' AND '$txtenddate'";
            $result = mysqli_query($con, $sql);
            $count = mysqli_num_rows($result);


            if ($count == 0) {
                echo '<h2>No Results Found</h2>';
            } 
            else 
            {
                ?>
                <div class="card-header">
                    <h4>Search Results</h4>
                </div>
                <div class="card-body">

                    <table class="table">

                        <tr>
                            <th>Post Id</th>
                            <th>Post TItle</th>
                            <th>Description</th>
                            <th>Category Id</th>
                            <th>User Id</th>
                            <th>Creation Date</th>
                            <th>Operations</th>
                        </tr>
                            <?php
                                while ($thread = mysqli_fetch_assoc($result)) :
                            ?>
                            <tbody>
                            <tr>
                                <td> <?= $thread['thread_id']; ?></td>
                                <td> <a href="admin_comments.php?thread_id=<?= $thread['thread_id']; ?>"> <?= $thread['thread_title']; ?></a></td>
                                <td> <?= $thread['thread_description']; ?></td>
                                <td> <?= $thread['thread_category_id']; ?></td>
                                <td> <?= $thread['thread_user_id']; ?></td>
                                <td> <?= $thread['time_stamp']; ?></td>

                                <div class="row mx-2">
                                    <td>
                                        <a href="view_post.php?id=<?= $thread['thread_id']; ?>" class="btn btn-success btn-sm mx-1 my-1">View</a>
                                        
                                        <form action="handle_post_reply.php" method="POST" class="d-inline">
                                            <button type="submit" name="delete_post" value="<?= $thread['thread_id']; ?>" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                                </div>
                            </tr>
                            </tbody>
                            <?php
                                endwhile;
                            ?>
                    </table>
                </div>
                <?php
            }
        }
        ?>
        </form>
</body>
</center>

</html>

<div class="containor mt-4 ">
        <?php include 'message.php'; ?>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Post Details
                            <a href="/forum/partials/admin_curd/admin_index.php" class="btn btn-primary float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <table class="table">

                            <tr>
                                <th>Post Id</th>
                                <th>Post TItle</th>
                                <th>Description</th>
                                <th>Category Id</th>
                                <th>User Id</th>
                                <th>Creation Date</th>
                                <th>Operations</th>
                            </tr>
                            <tbody>
                                <?php
                                $sql = "SELECT * from threads ORDER BY `thread_id` DESC ";
                                $result = mysqli_query($con, $sql);

                                if (mysqli_num_rows($result) > 0) {
                                    foreach ($result as $thread) {
                                ?>
                                        <tr>
                                            <td> <?= $thread['thread_id']; ?></td>
                                            <td> <a href="admin_comments.php?thread_id=<?= $thread['thread_id']; ?>"> <?= $thread['thread_title']; ?></a></td>
                                            <td> <?= $thread['thread_description']; ?></td>
                                            <td> <?= $thread['thread_category_id']; ?></td>
                                            <td> <?= $thread['thread_user_id']; ?></td>
                                            <td> <?= $thread['time_stamp']; ?></td>

                                            <div class="row mx-2">
                                                <td>
                                                    <a href="view_post.php?id=<?= $thread['thread_id']; ?>" class="btn btn-success btn-sm mx-1 my-1">View</a>
                                                    
                                                    <form action="handle_post_reply.php" method="POST" class="d-inline">
                                                        <button type="submit" name="delete_post" value="<?= $thread['thread_id']; ?>" class="btn btn-danger btn-sm">Delete</button>
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