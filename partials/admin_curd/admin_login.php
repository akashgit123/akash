<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="admin_login.css" />
    <title>Form Input Wave</title>
  </head>
  <body>
    <div class="container">
      <h1>Login In</h1>
      <form action="/forum/partials/admin_curd/handle_admin_login.php" method="POST">
        <div class="form-control">
          <input type="text" id="" name="login_username" required />
          <label>Your Username</label>
        </div>
        <div class="form-control">
          <input type="password" id="" name="login_password" required />
          <label>Your Password</label>
        </div>
        <button class="btn">Submit</button>
      </form>
    </div>
    <script src="admin_login.js"></script>
  </body>
</html>