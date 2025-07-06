<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Register</title>
	<!-- Link to your downloaded Bootstrap CSS -->
	<link rel="stylesheet" href="../asset/css/bootstrap.min.css">
</head>

<body class="bg-light">

	<div class="container d-flex justify-content-center align-items-center min-vh-100">
		<div class="card shadow p-4 w-100" style="max-width: 400px;">
			<h3 class="text-center mb-4">Register</h3>
			<form method="POST" action="registeration.php">
				<div class="mb-3">
					<label for="username" class="form-label">Username</label>
					<input type="text" class="form-control" id="username" name="username" required placeholder="Enter username">
				</div>
				<div class="mb-3">
					<label for="password" class="form-label">PASSSWORD</label>
					<input type="password" class="form-control" id="password" name="password" required placeholder="Enter password">
				</div>
				<button type="submit" class="btn btn-primary w-100">Register</button>
			</form>
		</div>
	</div>

	<!-- Link to your downloaded Bootstrap JS -->
	<script src="../asset/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<?php
include "../class/register.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$username = $_POST['username'] ?? '';
	$password = $_POST['password'] ?? '';

	$user = new User();
	$result = $user->register($username, $password);

	echo $result;
}
?>