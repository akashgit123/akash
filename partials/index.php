<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css " integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

    <!-- <link rel="stylesheet" href="card.css"> -->

    <title>Welcome To Discussion Forum</title>
</head>

<body>
    <h1>
        <center>ITech Disc Forum</center>
    </h1>

    <?php include '_dbconnect.php'; ?>
    <?php include '_header.php'; ?>

    

    <h3 style="text-align: center;">Browse Categories</h3>
    <!-- Fetch all the categories and use a loop to iterate through categories -->
    <div class="class row mr-0 ml-0 ">
        <?php
        $sql = "select * from categories ";
        $result = mysqli_query($con, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            // echo $row['category_id'];
            // echo $row['category_name'];
            $cat = $row['category_name'];
            $description = $row['category_description'];
            $id = $row['category_id'];
            // $img = $row['image'];
            echo '
            <div class="class row md4 mx-3 my-2">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="https://source.unsplash.com/500x400/?computer,technology/' . $cat . '" alt="Wait Image is loading...">
                    <div class="card-body">
                        <h5 class="card-title">' . $cat . '</h5>
                        <p class="card-text">' . substr($description, 0, 100) . '....</p>
                        <a href="threadlist.php?catid=' . $id . '" class="btn btn-primary">Explore</a>
                    </div>
                </div>
            </div>';
        }
        ?>
    </div>
    <div class="class row md4"></div>
    <?php include '_footer.php'; ?>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>