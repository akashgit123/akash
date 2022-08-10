<?php
session_start();
include 'dbconnect.php';
include 'admin_header.php';
?>

    
<div class="containor mt-4 ">
    <?php
    // include 'message.php';
    ?>
    <div class="row">
        <?php include 'message.php';  ?>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>User Details
                        <a href="/forum/partials/admin_curd/admin_index.php" class="btn btn-primary float-end">Back</a>
                    </h4>
                </div>
                <div class="card-body">

                    <table class="table">

                        <tr>
                            <th>User Id</th>
                            <th>User_name</th>
                            <!-- <th>Password</th> -->
                            <th>E-mail</th>
                            <th>Creation Time</th>
                            <th>Operations</th>

                        </tr>
                        <tbody>
                            <?php
                            $sql = "select * from user ";
                            $result = mysqli_query($con, $sql);

                            if (mysqli_num_rows($result) > 0) {
                                foreach ($result as $user) {
                            ?>
                                    <tr>
                                        <td> <?= $user['user_id']; ?></td>
                                        <td> <?= $user['user_name']; ?></td>
                                        <td> <?= $user['email']; ?></td>
                                        <td> <?= $user['creation_time']; ?></td>

                                        <div class="row mx-2">
                                            <td>                                                
                                                <form action="/forum/partials/admin_curd/manage_user/handle_user.php" method="POST" class="d-inline">
                                                    <button type="submit" name="delete_user" value="<?= $user['user_id']; ?>" class="btn btn-danger btn-sm">Delete</button>
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