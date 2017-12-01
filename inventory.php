<?php
require_once('authorize.php');
require_once('variables.php');


// Build the database connection
$dbconnection = mysqli_connect(HOST,USER,PASSWORD,DB_NAME) or die ('connection failed');
//BUILD THE query
$brand_query = "SELECT * FROM `inventory` ORDER BY stock asc";

//NOW TRY AND TALK TO THE database
$result = mysqli_query($dbconnection, $brand_query) or die ('query failed');

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

		
		<?php 
			
			while($row = mysqli_fetch_array($result)){
				echo '<div class="inventory">';
				echo '<h1>'.$row['brand'].'</h1>';
				echo '<h3>'.$row['model'].'</h3>';
				echo '<p>'.$row['size'].'</p>';
				echo '<p>'.$row['color'].'</p>';
				
				echo '<br><p>Left in stock:  '.$row['stock'].'</p>';
				echo '<div class="buttons">';
				echo '<a class="update" href="updateItem.php?id='.$row['id'].'">Update Item</a>';
				echo '<a class="delete" href="delete.php?id='.$row['id'].'">Delete Item</a>';
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
