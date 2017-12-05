<?php
session_start();
$sessionUser = $_SESSION['username'];
$sessionPassword = $_SESSION['password'];

require_once('variables.php');
 $dbconnection = mysqli_connect(HOST,USER,PASSWORD,DB_NAME) or die ('connection failed');
//BUILD THE query
$brand_query = "SELECT * FROM users_w WHERE username = 'admin' && password = 'adminpanel' ";


$results = mysqli_query($dbconnection, $brand_query) or die('getting username has failed');

$row = mysqli_fetch_array($results);

$admin = $row['username'];
$password = $row['password'];

if(isset($_SESSION['username'])){
	if ($_SESSION['username'] === 'admin' && $_SESSION['password'] === $password){
		
	}
}

else{
	echo "You are not authorized to view this page";
	exit();
}

?>