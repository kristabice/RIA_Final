<?php
session_start();
if (isset($_POST['submitCard'])){
$name = $_POST['cardName'];
$number = $_POST['cardNumber'];
$ccv = $_POST['cardSecurity'];
$date = $_POST['cardExpire'];
$billing = $_POST['billing'];
$city = $_POST['city'];
$state = $_POST['state'];
$zip = $_POST['zip'];

	$_SESSION['cardNum'] = $number;
	

require_once('variables.php');

//BUILD THE DATABASE CONNECTION WITH host, user, pass, database
$dbconnection = mysqli_connect(HOST,USER,PASSWORD,DB_NAME) or die ('connection failed');

//BUILD THE query
$query = "INSERT INTO cc_info( number, cvv, date, name, billing, city, state, zip) VALUES ('$number','$ccv','$date', '$name', '$billing','$city','$state','$zip')";

//NOW TRY AND TALK TO THE database
$result = mysqli_query($dbconnection, $query) or die ('query failed');

}


$email = $_SESSION['email'];

echo $email;
$name = $_SESSION['name'];
$body = "Got it! your order of an  ".$_SESSION['model'].' '.$_SESSION['brand']." has been processed! Your order will be on its way soon!!";
 $sender = 'Water Bottles R Us';

  $to = "bubgirl17@gmail"; //recipient

  $subject = "Confirmation Email"; //subject
  $header = "From: ". $sender . " <" . $to . ">\r\n";
	
	 // if (mail($email, $subject, $body, $header)){
	  if (true){
		//include'thanks.php';
		  echo 'hello world';

	  	session_destroy();

	  
  } else {
		echo 'Error: something went wrong.';
	  }
/*
		session_unset('cardNum');


	$email = $_SESSION['email'];
	$name = $_SESSION['name'];
	$body = "Sorry your order of an  ".$_SESSION['model'].' '.$_SESSION['brand']." was not proccessed! Please try a different payment method!!";


	  $to = "bubgirl17@gmail"; //recipient

	  $subject = "Payment Declined"; //subject
	  $header = "From: ". $sender . " <" . $to . ">\r\n";

	  if (mail($email, $subject, $body, $header)){
			include'thanks.php';


	  } else {
			echo 'Error: something went wrong.';
		  }

*/
?> 
 <?php include_once('header.php');?>
    <title>Checkout - Card</title>
    
  </head>
  <body >
    <?php include_once('nav.php'); ?>
    <div id="home" class="container">
     <div id="main">
     <p>Thanks for visiting Water Bottles R Us! Your order is being proccessed! You will hear from us soon!</p>
     <a href="shopping.php">Back to Shopping</a>
     <a href="contact.php">Contact Us</a>
   <br>
   
    </div> <!-- end of main div -->
</div> <!-- end of container div -->
<?php include_once('footer.php'); ?>
