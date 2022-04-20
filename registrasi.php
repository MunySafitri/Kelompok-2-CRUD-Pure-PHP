<?php 
require 'functions.php';
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Registrasi User</title>
</head>
<body>
	<h3>Registrasi User</h3>
	<form action="" method="post">
		<ul>
			<li>
				<label for="username">Username :</label>
				<input type="text" name="username" id="username" required>
			</li>
			<li>
				<label for="password">Password :</label>
				<input type="password" name="password" id="password" required>
			</li>
			<li>
				<label for="email">Email :</label>
				<input type="text" name="email" id="email" required>
			</li>
			<li>
				<button type="submit" name="register">Register</button>
			</li>
		</ul>
	</form>

