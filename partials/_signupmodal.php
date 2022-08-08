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
      <h1>SignUp</h1>
      <?php include 'message.php' ;?>
      <form action="/forum/partials/_handleSignup.php" method="POST">
        <div class="form-control">
          <input type="text" id="" name="signupUsername" required />
          <label>Username</label>
        </div>
        <div class="form-control">
          <input type="email" id="" name="signupEmail" required />
          <label>Email</label>
        </div>
        <div class="form-control">
          <input type="password" id="" name="signupPassword" required />
          <label>Create Password</label>
        </div>
        <div class="form-control">
          <input type="password" id="" name="signupcPassword" required />
          <label>Confirm Password</label>
        </div>
        <button class="btn">Submit</button>
      </form>
    </div>
    <script src="user_signup.js"></script>
  </body>
</html>
