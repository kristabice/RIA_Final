<?php require_once('vendor/autoload.php');
		session_start();

			
				use Cart\CartItem;
				use Cart\Cart;
				use Cart\Storage\SessionStore;
				use Cart\Store;
			

			//require_once('cart.php');
				$id = 'cart-01';
				$cartSessionStore = new SessionStore();

				$cart = new Cart($id, $cartSessionStore);

			if(isset($_POST['addCart'])){
					
				$name = $_POST['model'];
				$brand = $_POST['brand'];
				$size = $_POST['getSize'];
				$color = $_POST['getColor'];
				//$id = $_POST['id'];
				$price = $_POST['price'];

					
					$item = new CartItem;
					$item->name = $name;
					$item->brand = $brand;
					$item->size = $size;
					$item->color = $color;
					//$item->price = $price;
					$item->tax = 200;
					$item->id = $id;
					
					
					$item['name'] = $name;
					$item['brand'] = $brand;
					$item['size'] = $size;
					$item['color'] = $color;
					$item['price'] = 1200;
					$item['tax'] = 200;
					
						
					$cart->add($item);
					
					//print_r($cart->totalItems());
						
					
			
	}// end of add cart


				$cartData = $cart->toArray();
				
				$cart->save();
				$cart->restore();
				echo '<pre>';
				print_r($cartData);
		 		print_r($cart->getStore());
		 		echo '</pre>';
				




		
?>