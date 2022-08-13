<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css "
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

    <style>
        .containor
        {
            min-height: 20vh;
        }
    </style>
    <title>Welcome To Discussion Forum</title>
</head>

<body>
    <h1>
        <center>Discussion Forum</center>
    </h1>

    <?php include '_dbconnect.php'; ?>
    <?php include '_header.php'; ?>
   
     <!-- Search Results of Category -->
   <div class="containor " >
    <h1>Search Results for Category <em> " <?php echo $_GET['search']; ?>" </em></h1>

    <?php
    $no_result=true;
    $search =$_GET['search'];
    $sql = "SELECT * FROM `categories` WHERE MATCH(category_name ) against('$search');";
    $result = mysqli_query($con, $sql);
    $no_result = true;
    while ($row = mysqli_fetch_assoc($result)) 
    {
        $no_result=false;
        $category_title = $row['category_name'];
        $category_description = $row['category_description'];
        $category_id = $row['category_id'];

        $url = "threadlist.php?catid=2".$category_id ;

        // Display Search Results
        echo '
            <div class="class row md4 mx-3 my-2">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="https://source.unsplash.com/500x400/?computer,technology/' . $category_title . '" alt="Wait Image is loading...">
                    <div class="card-body">
                        <h5 class="card-title">' . $category_title . '</h5>
                        <p class="card-text">' . substr($category_description, 0, 100) . '....</p>
                        <a href="threadlist.php?catid=' . $category_id . '" class="btn btn-primary">Explore</a>
                    </div>
                </div>
            </div>';
    }
    if($no_result)
    {
        echo '<div class="jumbotron jumbotron-fluid">
                <div class="container">
                    <h1 class="display-4">No Results Found</h1>
                    <p class="lead">Suggestions:<ul>
                    <li>Make sure that all words are spelled correctly.</li>
                    <li>Try different keywords.</li>
                    <li>Try more general keywords.</li>
                    </ul>
                    </p>
                </div>
                </div>';
    }
    ?>
    
   </div>





   <!-- Search Results -->
   <div class="containor my-3" >
    <h1>Search Results for <em> " <?php echo $_GET['search']; ?>" </em></h1>

    <?php
    $no_result=true;
    $search =$_GET['search'];
    $sql = "SELECT * FROM `threads` WHERE MATCH(thread_title,thread_description) against('$search');";
    $result = mysqli_query($con, $sql);
    $no_result = true;
    while ($row = mysqli_fetch_assoc($result)) 
    {
        $no_result=false;
        $title = $row['thread_title'];
        $description = $row['thread_description'];
        $thread_id = $row['thread_id'];

        $url = "thread.php?thread_id=".$thread_id ;

        // Display Search Results
        echo '
        <div class="class result">
        <h3> <a href=" '.$url .' " class="text-dark"> '.$title.'</a> </h3>
            <p>'.$description.'</p>
        </div>';
    }
    if($no_result)
    {
        echo '<div class="jumbotron jumbotron-fluid">
                <div class="container">
                    <h1 class="display-4">No Results Found</h1>
                    <p class="lead">Suggestions:<ul>
                    <li>Make sure that all words are spelled correctly.</li>
                    <li>Try different keywords.</li>
                    <li>Try more general keywords.</li>
                    </ul>
                    </p>
                </div>
                </div>';
    }
    ?>
    
   </div>


  

    <?php include '_footer.php'; ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>  