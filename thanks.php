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

//$cart = new Cart($id, $cartSessionStore);
 				

	
	 // if (mail($email, $subject, $body, $header)){

?> 
 <?php include_once('header.php');?>
    <title>Checkout - Card</title>
    
  </head>
  <body >
    <?php include_once('nav.php'); ?>
    <div id="home" class="container">
     <div id="main">
     <p>Thanks for visiting Water Bottles R Us! Your order of <?php echo $_SESSION['price']; ?> is being proccessed! You will hear from us soon!</p>
     <a href="shopping.php">Back to Shopping</a>
     <a href="contact.php">Contact Us</a>
   <br>
   
    </div> <!-- end of main div -->
</div> <!-- end of container div -->
<?php include_once('footer.php'); ?>
