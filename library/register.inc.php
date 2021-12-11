<?php

//register handler file

if(isset($_POST['submit'])){
	require 'database.php';

	$username=$_POST['username'];
	$password=$_POST['password'];
	$confirm_password=$_POST['confirm_password'];

	if (empty($username) || empty($password) || empty($confirm_password)){
		header("Location: ../register.php?error=emptyfield&username=".$username);
		exit(); //exit the script preventing from executing the remaning instruction
	}elseif (!preg_match("/^[a-zA-Z0-9]*/", $username)){// pattern matching regex
		header("Location: ../register.php?error=invalidusername&username=".$username);
		exit();
	}elseif ($password !== $confirm_password) {
		header("Location: ../register.php?error=passwordnotthesame&username=".$username);
		exit();
	}else{
		$sql="SELECT username FROM users WHERE username = ?";
		$stmt=mysqli_stmt_init($db_conn);
		if (!mysqli_stmt_prepare($stmt, $sql)){
			header("Location: ../register.php?error=sqlerror");
			exit();
		}else{
			mysqli_stmt_bind_param($stmt,"s",$username);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_store_result($stmt);
			$row_count=mysqli_stmt_num_rows($stmt);

			if ($row_count > 0){
				header("Location: ../register.php?error=usernametaken");
				exit();
			}else{
				$sql="insert into users (username, password) values (?, ?)";
				if (!mysqli_stmt_prepare($stmt, $sql)){
					header("Location: ../register.php?error=sqlerror");
					exit();
				}else{
					$hashed=password_hash($password, PASSWORD_DEFAULT);
					mysqli_stmt_bind_param($stmt,"ss",$username, $hashed);
					mysqli_stmt_execute($stmt);
					header("Location: ../login.php?succes=register");
					exit();
				}
			}
		}
		mysqli_stmt_close($stmt);
		mysqli_close($db_conn);
	}
}