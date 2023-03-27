<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="user_signup.css" />
  <link rel="stylesheet" href="strong_password.css" />

  <title>Form Input Wave</title>
</head>

<body>
  <div class="container">
    <h1>SignUp</h1>
    <?php include '_message.php';  ?>
    <form action="/forum/partials/_handleSignup.php" method="POST">
      <div class="form-control">
        <input type="text" id="" name="signupUsername" required />
        <label>Username</label>
      </div>
      <div class="form-control">
        <input type="email" id="" name="signupEmail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" title="Please enter correct email address" required />
        <label>Email</label>
      </div>
      <!-- <div class="form-control">
          <input type="password" id="" name="signupPassword" required />
          <label>Create Password</label>
        </div> -->
      <div class="input-container">
        <div class="input-group">
          <input type="password" name="signupPassword" placeholder="Create a password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters and spaces are not allowed" required />
          <span class="toggle">☠️</span>
          <span class="ripple"></span>
        </div>
        <div class="pass-strength">
          <div class="strength-percent"><span></span></div>
          <span class="strength-label">Strength</span>
        </div>
      </div>
      <script src="./strong_password.js"></script>

      <!-- <div class="input-container">
        <div class="input-group">
          <input type="password" name="signupcPassword" placeholder="Confirm your password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters and spaces are not allowed" required />
          <span class="toggle">☠️</span>
          
          <span class="ripple"></span>
        </div>
        <div class="pass-strength">
          <div class="strength-percent"><span></span></div>
          <span class="strength-label">Strength</span>
        </div>
      </div> -->
      <!-- <script src="./strong_password.js"></script> -->
      
      <div class="form-control">
          <input type="password" id="" name="signupcPassword" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters and spaces are not allowed" required />
          <label>Confirm Password</label>
        </div>
      <button class="btn">Submit</button>
    </form>
    <p>Already have an account ? <a style="color:black;" href="/forum/partials/_loginmodal.php">Login</a></p>
    <br>
    <p style="text-align:right;"><a href="/forum/partials/index.php"><b>Exit</b></a></p>
  </div>
  <script src="user_signup.js"></script>
</body>

</html>