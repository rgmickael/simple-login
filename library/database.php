<?php

//database connection

$db_host="localhost";
$db_user="root";
$db_pass="";
$db_name="simple_login";

$db_conn=mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if(!$db_conn) die("Unable to connect the database");