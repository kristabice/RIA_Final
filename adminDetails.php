<?php

$temp_id = $_GET['id'];

require_once('variables.php');

// Build the database connection
$dbconnection = mysqli_connect(HOST,USER,PASSWORD,DB_NAME) or die ('connection failed');

// Select members from database
$query = "SELECT * FROM `inventory` WHERE `id`=$temp_id";

// Connect to database
$result = mysqli_query($dbconnection, $query) or die ('query failed');

// Put the result in an array
$found = mysqli_fetch_array($result);

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
      <br>

      <div class="item-details">
        <form action="updateToDatabase.php" method="POST" enctype="multipart/form-data" name="Infos">

            <fieldset>
                <legend>Item Details</legend>
            <br>
            <div class="image-container">
              <?php echo '<img src="img/'.$found['image'].'">'; ?>
            </div>
            <div class="details-container">
            <br>
              <label>Image:
              <input type="" value="<?php echo $found['image']; ?>" name="image" readonly> <br>
                <label>Brand: </label> <input type="text" name="brand" value="<?php echo $found['brand']; ?>" required readonly/><br>
                <label>Model: <label> <input type="text" name="model" value="<?php echo $found['model']; ?>" required readonly/><br>
              <label>Size: </label> <input type="text" name="size" value="<?php echo $found['size']; ?>" readonly /><br>
              <label>Color: </label> <input type="text" name="color" value="<?php echo $found['color']; ?>" required readonly /><br>
                <label>Price: <label> <input type="text" name="price" value="<?php echo $found['price']; ?>" required readonly /><br>
              <label>Stock: </label> <input type="text" name="stock" value="<?php echo $found['stock']; ?>" readonly /><br>

        <br>
          </div>

        </form>
      </div>

    </div> <!-- end content -->

    </div> <!-- End container -->

  <?php include_once('footer.php'); ?>

  </body>
</html>
