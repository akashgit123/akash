<?php
session_start();

echo '
<nav class="navbar navbar-expand-lg navbar-dark bg-dark my-4">
    <a class="navbar-brand" href="#">V Discuss</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="/forum/partials/index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/forum/partials/about.html">About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="feedback">FeedBack</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/forum/partials/latest_posts.php">Latest Posts</a>
            </li>
        </ul>

        <div class="row mx-2">';
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
  echo '<form class="form-inline my-2 my-lg-0" method="get" action="search.php">
                <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button> 
                    <p class="text-light my-0 mx-2">Welcome '.$_SESSION['user_name']. '</p>
                    <a href="_logout.php" class="btn btn-success ml-2 bg-dark" >LogOut</a >
                </form>';
} else {
  echo '
            <form class="form-inline my-2 my-lg-0" method="get" action="search.php">
                <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button> 
                <a href="/forum/partials/_loginmodal.php" class="btn btn-success ml-2 bg-dark" >Login</a >
                <a href="/forum/partials/_signupmodal.php" class="btn btn-success ml-2 bg-dark" >Signup</a >
            </form>';  
}

echo '</div>  
    </div>
</nav>';
?>



<?php
// To Give the Signup Success message
if (isset($_GET['signupsuccess']) && ($_GET['signupsuccess'] == "true")) {
  echo ' <div class="alert alert-success" role="alert">
      <h4 class="alert-heading">Signup is Successful........!</h4>
      <p>Now you can Login Any Time  </p>
      <hr>
      <p class="mb-0">
      </div>';
}

?>