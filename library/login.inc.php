<?php  

//login handler

if(isset($_POST['submit'])){
	require 'database.php';

	$username=$_POST['username'];
	$password=$_POST['password'];

	if (empty($username) || empty($password)){
		header("Location: ../login.php?error=emptyfield");
		exit();
	}else{
		$sql="SELECT * FROM users WHERE username = ?";
		$stmt=mysqli_stmt_init($db_conn);
		if (!mysqli_stmt_prepare($stmt, $sql)){
			header("Location: ../login.php?error=sqlerror");
			exit();
		}else{
			mysqli_stmt_bind_param($stmt,"s",$username);
			mysqli_stmt_execute($stmt);
			$result=mysqli_stmt_get_result($stmt); //get the query result

			if ($row = mysqli_fetch_assoc($result)){
				$pass_check=password_verify($password, $row['password']); //not working :.)
				if(!$pass_check){
					header("Location: ../login.php?error=wrongpass");
					exit();
				}else{
					session_start();
					$_SESSION['session_id']=$row['id'];
					$_SESSION['session_user']=$row['username'];
					header("Location: ../index.php?success=loggedin");
					exit();
				}
			}else{
				header("Location: ../login.php?error=nouser");
				exit();
			}
		}
	}
}else{
	header("Location: ../login.php?error=forbiden");
	exit();
}
