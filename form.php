<?php
session_start();

require_once('cartStuff.php');
$cartItems = $cart->all();


foreach ($cartItems as $item) {
echo '<br><br><br>';
echo $item->name;
}
echo '<br><br><br>';


if(isset($_POST['submitInfo'])){
$name = $_POST['fullname'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$address2 = $_POST['address2'];
$city = $_POST['city'];
$state = $_POST['state'];
$zip = $_POST['zipcode'];
$bottles = "water Bottle";
$price = $_SESSION['price'];
$user = 'guest';

require_once('variables.php');

//BUILD THE DATABASE CONNECTION WITH host, user, pass, database
$dbconnection = mysqli_connect(HOST,USER,PASSWORD,DB_NAME) or die ('connection failed');

//BUILD THE query
$query = "INSERT INTO checkout(name, email, phone, address1, address2, city, state, zip, in_cart, shipping_cost, user_address) VALUES ('$name','$email','$phone','$address','$address2','$city','$state','$zip','$bottles','$price','$user')";
	
$itemAdd = "INSERT INTO orders(order_items, address) VALUES ('$item->name.$item->model.$item->color.$item->size','123')";

//NOW TRY AND TALK TO THE database
$result = mysqli_query($dbconnection, $query) or die ('query failed');
$results = mysqli_query($dbconnection, $itemAdd) or die ('query failed');

//RETURN TO THE APPROVE PAGE
header('Location: card.php');
	$_SESSION['email'] = $email;
	$_SESSION['name'] = $name;
}


if(isset($_GET['item'])){

	
}
?>


<?php include_once('header.php')?>
    <title>Checkout - Shipping</title>
    
  </head>
  <body >
    <?php include_once('nav.php'); ?>
    <div id="Shipping" class="container">
     <div id="main">
     <div class="nameInfo">
    <h2><span>CHECKOUT</span></h2>
    <div class="progress">
    	<img src="img/progress2.png" alt="progressBar">
    </div>
     <body>
		 <?php if(isset($_SESSION['username'])){
			require_once('variables.php');
			$user = $_SESSION['username'];
			$dbconnect = mysqli_connect(HOST,USER,PASSWORD,DB_NAME) or die ('connection failed');
			
			$select = "SELECT * FROM users_w  INNER JOIN checkout ON (users_w.id = checkout.user_address) WHERE users_w.username='$user'";
			
	
			$results = mysqli_query($dbconnect, $select) or die('this query is deffinatly not working');
			
			$info = mysqli_fetch_array($results);
	
			
	
	?>
	

          <form action="card.php" method="post" enctype="multipart/form-data">
               <label for="fullname" >FULL NAME</label>
               <input id="fullname" type="text" name="fullname" value="<?php echo $info['name'];?>">
               <label for="email">EMAIL</label>
               <input id="email" type="email" name="email" value="<?php echo $info['email'];?>">
               <label for="phone">PHONE</label>
               <input id="phone" type="number" name="phone" value=" <?php echo $info['phone'];?>">
               <label for="address1">ADDRESS 1</label>
               <input id="address1" type="text" name="address" value="<?php echo $info['address1'];?>">
               <label for="adress2">ADDRESS 2</label>
               <input id="address2" type="text" name="address2" value="<?php echo $info['address2'];?>">
               <label for="city">CITY</label>
               <input id="city" type="text" name="city" value="<?php echo $info['city'];?>">
               <label for="state">STATE</label>
               <input id="state" type="text" name="state" value="<?php echo $info['state'];?>">
               <label for="zip">ZIP CODE</label>
               <input id="zip" type="text" name="zipcode" value="<?php echo $info['zip'];?>">
               <div class="shipping-method">
                    <h2>Shipping Method</h2>
                    <div>
                         <label for="standard">$4 Standard</label>
                         <input id="standard" type="radio" name="shipping" value="Standard" checked/>
                         <p>(2-3 weeks)</p>

                    </div>
                    <div>
                         <label for="ultra">$10 Ultra</label>
                         <input id="ultra" type="radio" name="shipping" value="Ultra" />
                         <p>(1-3 days)</p>
                    </div>
               </div>
               <input type="submit" value="Submit" name="submitMyInfo" class="cartButton">
          </form>  
		 
		 <?php }else { ?>
		 
		 <form action="form.php" method="post" enctype="multipart/form-data">
               <label for="fullname" >FULL NAME</label>
               <input id="fullname" type="text" name="fullname" value="">
               <label for="email">EMAIL</label>
               <input id="email" type="email" name="email" value="">
               <label for="phone">PHONE</label>
               <input id="phone" type="number" name="phone" value="">
               <label for="address1">ADDRESS 1</label>
               <input id="address1" type="text" name="address" value="">
               <label for="adress2">ADDRESS 2</label>
               <input id="address2" type="text" name="address2" value="">
               <label for="city">CITY</label>
               <input id="city" type="text" name="city">
               <label for="state">STATE</label>
               <input id="state" type="text" name="state">
               <label for="zip">ZIP CODE</label>
               <input id="zip" type="text" name="zipcode">
               <div class="shipping-method">
                    <h2>Shipping Method</h2>
                    <div>
                         <label for="standard">$4 Standard</label>
                         <input id="standard" type="radio" name="shipping" value="Standard" checked/>
                         <p>(2-3 weeks)</p>

                    </div>
                    <div>
                         <label for="ultra">$10 Ultra</label>
                         <input id="ultra" type="radio" name="shipping" value="Ultra" />
                         <p>(1-3 days)</p>
                    </div>
               </div>
               <input type="submit" value="Submit" name="submitInfo" class="cartButton">
          </form>
		<?php } ?>
     </body>
    
 
   </div>
    </div> <!-- end of main div -->
</div> <!-- end of container div -->
<?php include_once('footer.php'); ?>
