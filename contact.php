<!DOCTYPE html>
<html>
<head>
	<title>Contact Us</title>
</head>
<body>
	<?php 
		require_once('variables.php');
	
		include_once('header.php');
		 include_once('nav.php'); 
		 if (isset($_POST['submit'])) {
		 	$first = $_POST['name'];
		 	$last = $_POST['last'];
		 	$email = $_POST['email'];
		 	$message = $_POST['submit'];
		 	// $dbconnection = mysqli_connect(HOST,USER,PASSWORD,DB_NAME) or die ('connection failed');
		 	// $query = "INSERT INTO dgm3790";
		 }
		?>

	<div id="contact">
		<div class="fancy">
			
		</div>
		<div class="shout">
			<h2>Give us a shout</h2>
			<p>Use the form below to drop us an email. Old fashioned phone calls work too -</p>
			<br>
			<p>1-666-467-2826</p>
		</div>
		
		
		<form action="contact-thanks.php" method="post" enctype="multipart/form-data">
			
			<fieldset>
				<label for="first">First Name</label>
				<input type="text" name="first">
				<label for="last">Last Name</label>
				<input type="text" name="last">
				<label for="email">Email</label>
				<input type="text" name="email">
				<label for="submit">Message</label>
				<textarea rows="10" cols="91"></textarea>
				<button type="submit" value="Submit" name="submit">Send</button>
			</fieldset>
		</form>
	</div>
</body>
</html>