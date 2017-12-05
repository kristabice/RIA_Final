    <header>
		
    <div class="logo"><a href="index.php"><img src="img/water_bottle_r_us.png" alt="logo"></a></div>
		<?php
   			$admin = 'admin';
			$password = 'adminpanel';
		?>
    <nav>
        <ul class="mainMenu">
            <li><a href="index.php" class="active">Home</a></li>
            <li><a href="shopping.php">Shop</a></li>
            <li><a href="contact.php">Contact</a></li>
			<?php 
		
			if(isset($_SESSION['username'])){
			
				if($_SESSION['username']=== $admin ){
					echo '<li><a href="inventory.php">Inventory</a></li>';
					echo '<li><a href="orders.php">Orders</a></li>';
				}
				
				echo '<li><a href="signOut.php">Logout</a></li>';
				}
			
			else{
				echo '<li><a href="signIn.php">Login</a></li>';

				
			}
			?>
            <li><a href="confirmItems.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a></li>
        </ul>
          <div class="keepOpen"></div>
    </nav>
              <div class="keepOpen"></div>

    </header>
