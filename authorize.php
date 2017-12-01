<?php
session_start();



if(isset($_SESSION['username'])){
	if ($_SESSION['username'] === $admin && $_SESSION['password'] === $password){
		echo 'this is working magic';
		
	}
}

else{
	echo "You are not authorized to view this page";
	exit();
}

?>