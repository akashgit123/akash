<?php
session_start();
include 'dbconnect.php';
include 'admin_header.php';
include 'report.php';
?>

    
<div class="containor mt-5 ">

<?php include 'message.php';  ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Admin Details
                        <a href="add_admin.php" class="btn btn-primary float-end">Add Admin</a>
                    </h4>
                </div>
                <div class="card-body">

                    <table class="table">

                        <tr>
                            <th>Sl No</th>
                            <th> Name</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>E-mail</th>
                            <th>Creation Time</th>
                            <th>Operations</th>

                        </tr>
                        <tbody>
                            <?php
                            $sql = "select * from admin ";
                            $result = mysqli_query($con, $sql);

                            if (mysqli_num_rows($result) > 0) {
                                foreach ($result as $admin) {
                            ?>
                                    <tr>
                                        <td> <?= $admin['admin_id']; ?></td>
                                        <td> <?= $admin['admin_name']; ?></td>
                                        <td> <?= $admin['admin_user_name']; ?></td>
                                        <td> <?= $admin['admin_password']; ?></td>
                                        <td> <?= $admin['admin_email']; ?></td>
                                        <td> <?= $admin['creation_time']; ?></td>

                                        <div class="row mx-2">
                                            <td>
                                                <a href="edit_admin.php?id=<?= $admin['admin_id']; ?>" class="btn btn-success btn-sm mx-1 my-1">Edit</a>
                                                
                                                <form action="handle_admin.php" method="POST" class="d-inline">
                                                    <button type="submit" name="delete_admin" value="<?= $admin['admin_id'];?>" class="btn btn-danger btn-sm">Delete</button>
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