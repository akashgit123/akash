<?php 
// include('app_logic.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Password Reset</title>
	<link rel="stylesheet" href="forgot_password.css">
</head>
<body>
	<form class="login-form" action="handle_forgot_password.php" method="post">
		<h2 class="form-title">Reset password</h2>
		<!-- form validation messages -->
		<?php 
		// include('messages.php'); ?>
		<div class="form-group">
			<label>Your email address</label>
			<input required type="email" name="email">
		</div>
		<div class="form-group">
			<label>New password</label>
			<input required type="password" name="new_password">
		</div>
		<div class="form-group">
			<label>Confirm new password</label>
			<input required type="password" name="Cpassword">
		</div>
		<div class="form-group">
			<button type="submit" name="reset_password" class="login-btn">Reset Password</button>
		</div>
	</form>
</body>
</html> 