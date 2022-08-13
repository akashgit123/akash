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
                    <h4>Category Details
                        <a href="add_category.php" class="btn btn-primary  mx-3 float-end">Add Category</a>
                        <a href="/forum/partials/admin_curd/admin_index.php" class="btn btn-primary float-end">BACK</a>
                    </h4>
                </div>
                <div class="card-body">

                    <table class="table">

                        <tr>
                            <th>Category Id</th>
                            <th>Categoty Name</th>
                            <th>Category Description</th>
                            <th>Creation Date</th>
                            <th>Operations</th>
                        </tr>
                        <tbody>
                            <?php
                            $sql = "select * from categories ";
                            $result = mysqli_query($con, $sql);

                            if (mysqli_num_rows($result) > 0) {
                                foreach ($result as $category) {
                            ?>
                                    <tr>
                                        <td> <?= $category['category_id']; ?></td>
                                        <td> <?= $category['category_name']; ?></td>
                                        <td> <?= $category['category_description']; ?></td>
                                        <td> <?= $category['created']; ?></td>

                                        <div class="row mx-2">
                                            <td>
                                                <a href="/forum/partials/admin_curd/manage_category/edit_category.php?id=<?= $category['category_id']; ?>" class="btn btn-success btn-sm my-1" style="width: 5rem; margin-left: 0rem">Edit</a>
                                                
                                                <form action="/forum/partials/admin_curd/manage_category/handle_category.php" method="POST" class="d-inline">
                                                    <button type="submit" name="delete_category" value="<?= $category['category_id']; ?>" class="btn btn-danger btn-sm " style="width: 5rem;  margin-left: 0rem">Delete</button>
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