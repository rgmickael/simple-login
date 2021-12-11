<?php 
session_start();
require_once 'library/database.php';
require_once 'library/register.inc.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>.: Simple Login</title>
</head>
<body>
	<header>
		<p>Simple Login 1.0</p>
		<nav>
			<ul>
				<li><a href="index.php">Home</a></li>
				<li><a href="login.php">Login</a></li>
				<li><a href="register.php">Register</a></li>
			</ul>
		</nav>
	</header>

<hr>