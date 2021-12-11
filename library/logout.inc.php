<?php

//register handler file

if(isset($_GET['logout'])){
	session_start();
	session_unset(); //remove all session variables
	session_destroy(); //destroy the session
	//die();
	header("Location: ../index.php");
	exit();
}else{
	header("Location: ../index.php");
	exit();
}