<?php
require_once('authorize.php');
require_once('variables.php');


// Build the database connection
$dbconnection = mysqli_connect(HOST,USER,PASSWORD,DB_NAME) or die ('connection failed');
//BUILD THE query
$order_query = "SELECT DISTINCT(user_id) FROM orders WHERE filled = '1' ORDER BY filled ASC";
$order_items = "SELECT * FROM orders WHERE filled = '1'";

//NOW TRY AND TALK TO THE database
$result = mysqli_query($dbconnection, $order_query) or die ('query failed');
$display = mysqli_query($dbconnection, $order_items) or die ('query failed');

//$items = mysqli_fetch_array($display);

if(isset($_GET['filled'])){
	$user = $_GET['filled'];

	$update = "UPDATE orders SET filled='2' WHERE user_id='$user'";
	
	$update_user = mysqli_query($dbconnection, $update) or die('filled query not working');
}
?>



<?php include_once('header.php'); ?>
  <title>Home</title>

</head>
  <body>

    <?php include_once('nav.php'); ?>
    <div id="container">
		<div class="shop-container">
			<div class="content-title">
				<div>
	      			<h1>List of Items</h1>
	      		</div>
	      	</div>

			<div class="content">
			
			<a href="filled.php">Filled Orders</a>
		
		<?php 
			
			while($row = mysqli_fetch_array($result)){
				
				echo '<div class="inventory">';
				
				echo '<h1>'.$row['user_id'].'</h1>';
				while($items = mysqli_fetch_array($display)){
				echo '<h3>'.$items['order_items'].'</h3>';
				
				}
				//echo '<br><p>Left in stock:  '.$row['stock'].'</p>';
				echo '<div class="buttons">';
				echo '<a class="update" href="orders.php?filled='.$row['user_id'].'">Fill</a>';
				echo '</div>';//end buttons div
				echo '</div>';//end inventory div
			}
				?>
		
			</div> <!-- end content -->
		</div>
    </div> <!-- End container -->

	<?php include_once('footer.php'); ?>

  </body>
</html>
