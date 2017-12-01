<?php
	session_start();
require_once('variables.php');
$feedback = " ";

// Try to log the user in
if (isset($_POST['submit'])) {

	//BUILD THE DATABASE CONNECTION WITH host, user, pass, database
	$dbconnection = mysqli_connect(HOST,USER,PASSWORD,DB_NAME) or die ('connection failed');

	$user = mysqli_real_escape_string($dbconnection, trim($_POST['username']));
	$pwd = mysqli_real_escape_string($dbconnection, trim($_POST['password']));

	// Get username and password from database
	$query = "SELECT * FROM users_w WHERE username='$user' AND password='$pwd'";
	$data = mysqli_query($dbconnection, $query) or die ('query failed...');

	if (mysqli_num_rows($data) == 1) {
		$row = mysqli_fetch_array($data);
		$_SESSION['username'] = $row['username'];
		$_SESSION['password'] = $row['password'];
		$_SESSION['name'] = $row['name'];
		
		//echo $_SESSION['username'];
		
		echo $_SESSION['username'];
		// Move to the page after loging in
		//header('location: index.php');

	} else {
		//echo 'Could not found you, try again...';
		$feedback = 'Could not found you, try again...';
	} // End if/else

}	// End isset

?>




<?php include_once('header.php')?>
    <title>Checkout - Card</title>
    
  </head>
  <body >
    <?php include_once('nav.php'); ?>
    <div id="home" class="container">
     <div id="main">
  
		<div class="login">
		 <form enctype="multipart/form-data" method="post" action="signIn.php">
			 <fieldset>
			 <legend>Log-In</legend>
			 <span> Username: </span><br><input type="text" name="username" value=""><br>
			 <span> Password: </span><br><input type="password" name="password" value=""><br>
			<input type="submit" name="submit" value="Log-In">
				 
				<div><?php echo $feedback; ?></div>
			 </fieldset>
			 
		</form>
		<p>Don't have an Account? </p><a href="signup.php" class="signup">Sign Up!</a>
		 </div>


	

		    

   
   
    </div> <!-- end of main div -->
</div> <!-- end of container div -->
<?php include_once('footer.php'); ?>