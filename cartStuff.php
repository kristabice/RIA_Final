<?php require_once('vendor/autoload.php');
	
				use Cart\CartItem;
				use Cart\Cart;
				use Cart\Storage\SessionStore;
				use Cart\Storage\Store;
			

			//require_once('cart.php');
				$id = 'cart-01';
				//echo $_SESSION['username'];
				$cartSessionStore = new SessionStore();

				$cart = new Cart($id, $cartSessionStore);
 				$cart->getId();
				//print_r($cart->getId());
				if($_SESSION['counted'] >= 1){
					$cart->restore($id);
				}
				
				
				
				

				if(isset($_POST['addCart'])){
					
					
				
						
					
				
					//$cart->restore($id);
					$name = $_POST['model'];
					$brand = $_POST['brand'];
					$size = $_POST['getSize'];
					$color = $_POST['getColor'];
					$photo = $_POST['photo'];
					$idItem = $_POST['id'];
					$price = $_POST['price'];

			
			

					
					$item = new CartItem;
					
				
					$item->name = $name;
					$item->brand = $brand;
					$item->size = $size;
					$item->color = $color;
					$item->photo = $photo;
					$item->price = $price;
					$addTax = $item->price * .20;
					$item->tax = $addTax;
					//$item->id = $id;
					$item->quantity = 1; 
					$item ->findItem = $idItem;
					
					
					//echo $item->tax;
					
					 
					
						
					$cart->add($item);
					$cart->save();
					
				
					
					//print_r($counted);
					
					//print_r($cart->totalItems());
					
					
					//header('Location: confirmItems.php');
				}// end of add cart
					
			

				
				?>