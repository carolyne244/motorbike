<?php
	session_start();
	include 'db_config.php';

	if(isset($_POST['root']) && isset($_POST[''])) {
		$username = $_POST['root'];
		$password = $_POST[''];

		// Check if the username and password match a record in the database
		$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
		$result = mysqli_query($conn, $query);
        // Login successful, set session variables and redirect to home page
		if(mysqli_num_rows($result) == 1) {
			$_SESSION['root'] = $username;
			header('Location: home.php');
		} else {
			// Login failed, redirect back to login page with error message
			header('Location: login.php?error=1');
		}
	} else {
		// Invalid request, redirect back to login page
		header('Location: login.php');
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login - Motorbike Management System</title>
	<link rel="stylesheet" type="text/css" href="login.css">
</head>
<body>
	<div class="login-container">
		<h1>Login</h1>
		<?php
			if(isset($_GET['error'])) {
				echo '<p style="color:red;">Invalid username or password. Please try again.</p>';
			}
		?>
		<form action="login.php" method="POST">
			<label for="username">Username:</label>
			<input type="text" id="username" name="username" required>
			<label for="password">Password:</label>
			<input type="password" id="password" name="password" required>
			<button type="submit">Log In</button>
		</form>
		<div class="links">
			<p>Don't have an account? <a href="signup.html">Sign up</a></p>
		</div>
		<p><a href="#">Forgot password?</a></p>
	</div>
</body>
</html>