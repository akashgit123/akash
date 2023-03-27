<?php
session_start();
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Admin Crud</title>
</head>

<body>
    
    <div class="containor mt-5">

<?php include 'message.php'; ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Add Admin
                            <a href="admin_index.php" class="btn btn-success float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <form action="handle_admin.php" method="POST">
                            <div class="mb-3">
                                <label>Admin Name</label>
                                <input required type="text" name="admin_name" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Admin Username</label>
                                <input required type="text" name="admin_username" class="form-control" >
                            </div>
                            <div class="mb-3">
                                <label>Admin Email</label>
                                <input required type="text" name="admin_email" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Password</label>
                                <input required type="text" name="admin_password" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Confirm Password</label>
                                <input required type="text" name="admin_cpassword" class="form-control">
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary" name="save_admin">Save</button>
                            </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>