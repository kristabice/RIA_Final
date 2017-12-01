<?php
session_start();
				use Cart\CartItem;
				
/*				
				$name = $_POST['model'];
				$brand = $_POST['brand'];
				$size = $_POST['getSize'];
				$color = $_POST['getColor'];
				$id = $_POST['id'];
				$price = $_POST['price'];



					$item = new CartItem;
					$item->name = $name;
					$item->brand = $brand;
					$item->size = $size;
					$item->color = $color;
					//$item->price = $price;
					$item->tax = 200;
					$item->id = $id;
			
				if(isset($_POST['addCart'])){
					
					$item = new CartItem;
					$item->name = $name;
					$item->brand = $brand;
					$item->size = $size;
					$item->color = $color;
					//$item->price = $price;
					$item->tax = 200;
					$item->id = $id;
			
						
					$cart->add($item);
					$cart->save();
					//print_r($cart->totalItems());
						
					
			
	}
*/


?>
<?php include_once('header.php')?>
<?php require_once('cartStuff.php');?>

    <title>Checkout - Shipping</title>
 
    
  </head>
  <body >
    <?php include_once('nav.php'); ?>
    <div id="Shipping" class="container">
     <div id="main">
     <div class="nameInfo">
    <h2><span>CHECKOUT</span></h2>
    <div class="progress">
    	<img src="img/progress1@72x.png" alt="progressBar">
    </div>
  
    
     
     
				<div class="headerDisplay">
		 		<p class="title">Name:</p>
				<p class="title">Price:</p>
				<p class="title">quantitiy:</p>
				<div class="keepOpen"></div>
		 		</div>
				<hr class="fullscreen">
	 
		<?php
				
		 		echo '<pre>';
		 		print_r($cart->totalItems());
		 		print_r($item);
		 		
		 		echo '</pre>';
		 		

				$cartItems = $cart->all();
		 		$cart->getStore();
		 		echo '<pre>';
		 		print_r($cart->getStore());
		 		echo '</pre>';
				if (count($cartItems) > 0) {
					foreach ($cartItems as $item) {
						print_r($item->name); echo '<br/>';
						print_r($cart->totalUniqueItems());
					}
}
		 
		 ?>
		 
 
     <div><a href="form.php" class="cartButton">Continue &nbsp;</a></div>

     </body>
    
 
   </div>
    </div> <!-- end of main div -->
</div> <!-- end of container div -->
<?php include_once('footer.php'); ?>

</html>