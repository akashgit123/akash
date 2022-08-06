<?php
session_start();
include 'dbconnect.php';
include 'admin_header.php';
?>

    <h1>Category Update</h1>
    <div class="containor mt-5">

        <?php include 'message.php'; ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Update
                            <a href="admin_index.php" class="btn btn-success float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if(isset($_GET['id']))
                        {
                            $admin_id= $_GET['id'];
                            $sql = "SELECT * FROM `admin` WHERE `admin_id`='$admin_id'";
                            $result = mysqli_query($con,$sql);
                            if(mysqli_num_rows($result)>0)
                            {
                                $admin = mysqli_fetch_array($result);
                                // print_r($category);
                                echo '
                                    <form action="handle_admin.php" method="POST">
                                        <input type="hidden" name="admin_id" value="'. $admin['admin_id'].'">
                                        <div class="mb-3">
                                            <label>Admin Name</label>
                                            <input required type="text" name="admin_name" value=" '.$admin['admin_name'].'" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label>Admin Username</label>
                                            <input required type="text" name="admin_user_name" value=" '.$admin['admin_user_name'].' " class="form-control" >
                                        </div>
                                        <div class="mb-3">
                                        <label>Admin Password</label>
                                        <input required type="text" name="admin_password" value=" '.$admin['admin_password'].'" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                        <label>Admin Email</label>
                                        <input required type="text" name="admin_email" value=" '.$admin['admin_email'].'" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <button type="submit" class="btn btn-primary" name="edit_admin">Save</button>
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