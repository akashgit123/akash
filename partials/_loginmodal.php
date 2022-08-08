<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="user_signup.css" />
    <title>Form Input Wave</title>
  </head>
  <body>
    <div class="container">
      <h1>Login In</h1>
      <?php include 'message.php';  ?>
      <form action="/forum/partials/_handleLogin.php" method="POST">
        <div class="form-control">
          <input type="text" id="" name="loginUsername" required />
          <label>Your Username</label>
        </div>
        <div class="form-control">
          <input type="password" id="" name="loginPassword" required />
          <label>Your Password</label>
        </div>
        <button class="btn">Submit</button>
        <br> <br>
        <a href="/forum/partials/forgot.php" style="color: black;">Forgot Password?</a>
      </form>
    </div>
    <script src="user_signup.js"></script>
  </body>
</html>