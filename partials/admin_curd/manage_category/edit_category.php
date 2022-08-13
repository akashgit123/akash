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
                            $category_id= $_GET['id'];
                            $sql = "SELECT * FROM `categories` WHERE `category_id`='$category_id'";
                            $result = mysqli_query($con,$sql);
                            if(mysqli_num_rows($result)>0)
                            {
                                $category = mysqli_fetch_array($result);
                                // print_r($category);
                                echo '
                                    <form action="handle_category.php" method="POST">
                                        <input type="hidden" name="category_id" value="'. $category['category_id'].'">
                                        <div class="mb-3">
                                            <label>Category Name</label>
                                            <input required type="text" name="cname" value=" '.$category['category_name'].'" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label>Category Description</label>
                                            <input required type="text" name="cdescription" value=" '.$category['category_description'].' " class="form-control" >
                                        </div>
                                        <div class="mb-3">
                                            <button type="submit" class="btn btn-primary" name="update_category">Update Category</button>
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