<?php
session_start();
		//use Cart\CartItem;
require_once('cartStuff.php');
	$cartItems = $cart->all();
					
					$counted = count($cartItems);
					
					$_SESSION['counted']=$counted;			
				
		
				
				
			


?>
<?php include_once('header.php')?>
<?php //require_once('cartStuff.php');?>

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
		 	if(isset($_GET['item'])){
				
				$cartItems = $cart->all();
				foreach ($cartItems as $item) {
					$clear = $_GET['item'];
					require_once('variables.php');
							//BUILD THE DATABASE CONNECTION WITH host, user, pass, database
					$ItemConnection = mysqli_connect(HOST,USER,PASSWORD,DB_NAME) or die ('connection failed');

					//BUIld query
					$user = $_SESSION['username'];
					echo $user;
					
					$itemAdd = "INSERT INTO orders(order_items, address, user_id) VALUES ('$item->name $item->model $item->color $item->size $item->quantitiy','123', '$user')";

					$itemResults = mysqli_query($ItemConnection, $itemAdd) or die ('item add is not working');
					$cart->remove($item->id);
					$cart->total(0);
					$cart->save();
					header("Location: form.php");
				
				}
				
			}
		 
		  	if(isset($_GET['item_id'])){
				$item_id = $_GET['item_id'];
				$cart->remove($item_id);
				$cart->save();
			}
		 if(isset($_GET['add_id'])){
			 
				$item_id = $_GET['add_id'];
			 	$item = $cart->get($item_id);
			 	$itemAdd =  $item->quantity;
			 	$itemAdd = $itemAdd +1;

				$newId = $cart->update($item_id, 'quantity', $itemAdd);
				$cart->save();
			 	header('Location: confirmItems.php');
			}
		 if(isset($_GET['minus_id'])){
			 
				$item_id = $_GET['minus_id'];
			 	$item = $cart->get($item_id);
			 	$itemSub =  $item->quantity;
			 	$itemSub = $itemSub -1;
			 	header('Location: confirmItems.php');
			 	if($itemSub <= 0){
					$cart->remove($item_id);
					$cart->save();
					header("Location: confirmItems.php");
				
				}
			 	
			

				$newId = $cart->update($item_id, 'quantity', $itemSub);
				$cart->save();
			 	
			}
		
				
		 		//$cart->clear();
		 		

				$cartItems = $cart->all();
		 		$cart->restore();
				if (count($cartItems) > 0) {
					
					//$cart->restore($id);
					foreach ($cartItems as $item) {
		 			 ?>
						
					<?php	echo '<div class="cartDisplay">';
							
						
						echo '<div class="remove">';
						echo '<a name="remove" href="confirmItems.php?item_id='.$item->id.'"><i class="fa fa-trash" aria-hidden="true"></i></a>';
												   
						echo '<a name="edit" href="editOrder.php?findItem='.$item ->findItem.'"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>'; 
						echo '</div>';
						
						
						echo '<img src="img/'.$item->photo.'" alt="product photo"'; 
						
						?>
		 				<div class="itemsInfo"><div class="row" id="end"><?php
						echo '<h1>'.$item->name.'</h1>'; 
						echo '<h1>'.$item->brand.'</h1>'; 
						echo '<h1>'.$item->color.'</h1>'; 
						echo '<h1>'.$item->size.'</h1>'; 
						echo '</div>'/*end of row 1 */.'<div class="row">';
						echo  '<p id="Price">'.$item->price.'</p>'; 
						echo '</div>'; // end of row 2 
						
						echo '<div class="row quantitiy">';
						echo '<span><a name="minus" href="confirmItems.php?minus_id='.$item->id.'"><i class="fa fa-minus-circle" aria-hidden="true"></i><a></span>';
						echo '<h1 id="quanitityH1">'.$item->quantity.'</h1>'; 
						echo '<span><a name="add" href="confirmItems.php?add_id='.$item->id.'"><i class="fa fa-plus-circle" aria-hidden="true"></i></a></span>';
						//echo $item ->findItem;
						echo '</div>'; //end of row 3?>
							
							
							<?php 
						echo '</div>'; // end of items info
						?>
							<div class="keepOpen"></div>
							<?php
					}
				
					}// end of if statement
		 else{
						echo 'Sorry your cart appears to be empty!';
		 	}	?>	
		 
						<div class="row totalDisplay">
							
							
							<p id="total">Subtotal: <?php echo round( $cart->total(), 2); ?></p>

						</div>	
							
		<?php $_SESSION['price'] = round( $cart->total(), 2);	if (count($cartItems) > 0) {	?>
							
				
							
				
					
			<div><a href="confirmItems.php?item=<?php echo $item->id; ?>" class="cartButton">Continue &nbsp;</a></div>
			
 
			<?php } else{?>
				<div><a href="shopping.php" class="cartButton">Back to Shopping &nbsp;</a></div>
				
<?php } ?>
     </body>
    
 
   </div>
    </div> <!-- end of main div -->
</div> <!-- end of container div -->
<?php include_once('footer.php'); ?>

</html>