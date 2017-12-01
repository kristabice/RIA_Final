<?php

  //Load the data into the php variables
  $id = $_POST['id'];
  $brand = $_POST['brand'];
  $model = $_POST['model'];
  $size = $_POST['size'];
  $color = $_POST['color'];
  $price = $_POST['price'];
  $stock = $_POST['stock'];

  require_once('variables.php');

  // Build the database connection
  $dbconnection = mysqli_connect(HOST,USER,PASSWORD,DB_NAME) or die ('connection failed');

  // Build the Query
 $query = "UPDATE `inventory` SET `brand`='$brand', `model`='$model', `size`='$size', `color`='$color', `price`='$price', `stock`=$stock WHERE `id`=$id";

  // Store infos to database
  $senddata = mysqli_query($dbconnection, $query) or die ('query failed...');

  // Hang up
  mysqli_close($dbconnection);


?>



<!doctype HTML>
<html>
<head>
    <meta charset="utf-8">
    <link href="scss/reset.css" rel="stylesheet" type="text/css">
    <link href="scss/style.css" rel="stylesheet" type="text/css">

   <!-- link font awesome -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- import google font -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
  <title>Updating Items</title>

 </head>

  <body>

  	<?php include_once('nav.php'); ?>
    <div id="container">



		<div class="content-title">
			<div>
  			<h1>Updating Items</h1>
  		</div>
  	</div>

		<div class="content">
      <h2>Successfully Updated</h2>
      <hr class="header">
      <div>
        <br>
        <center>
          <p>Your updates were successfully sent to database. Check on the <?php echo '<a href="adminDetails.php?id='.$id.'">details page</a>' ?> to make sure everything is correct.</p>
        </center>
      </div>

      <br>

  	</div> <!-- end content -->

    </div> <!-- End container -->

	<?php include_once('footer.php'); ?>

  </body>
</html>
