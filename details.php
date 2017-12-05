
<?php
session_start();
//require_once('cartStuff.php');
require_once('variables.php');
$model = $_GET['model'];

//BUILD THE DATABASE CONNECTION WITH host, user, pass, database
$dbconnection = mysqli_connect(HOST,USER,PASSWORD,DB_NAME) or die ('connection failed');

//BUILD THE query
$query = "SELECT * FROM inventory WHERE model = '$model'";
$size_query = "SELECT DISTINCT(size) FROM inventory WHERE model = '$model'";
$color_query = "SELECT DISTINCT(color) FROM inventory WHERE model ='$model'";

//NOW TRY AND TALK TO THE database
$result = mysqli_query($dbconnection, $query) or die ('select query failed');
$size_result = mysqli_query($dbconnection, $size_query) or die ('size query failed');
$color_result = mysqli_query($dbconnection, $color_query) or die ('size query failed');

$row = mysqli_fetch_array($result);
print_r($row['brand']);
$name = $row['model'];
$price = $row['price'];
?>
	<?php include_once('header.php');?>
	<?php //require_once('cartStuff.php');?>

	<title>Details</title>
</head>
<body>
	<?php include_once('nav.php'); ?>
	<div id="details">
		<a href="shopping.php"><div class="btn back">
			Back to Shop
		</div></a>
		<img src="img/<?php echo $row['image'] ?>"  />
		<form method="post" action="confirmItems.php" enctype="multipart/form-data">
			<h1><?php echo $row['brand'] ?></h1>
	
			<h2><?php echo $row['model'] ?></h2>
			<h2 class="yo">Size</h2>
			<select name="getSize">
				<?php
				while($row2 = mysqli_fetch_array($size_result)) {
					echo '<option name="size" value="'.$row2['size'].'">' . $row2[size] . '</option>';
					
				}
				?>
			</select>
			
		
			<h2 class="yo">Color</h2>
			<select name="getColor">
				<?php
				while($row2 = mysqli_fetch_array($color_result)) {
					echo '<option name="color" value = "'.$row2['color'].'">' . $row2['color'] . '</option>';
				
				
				    
		
			
				}
?>
				
			</select>
			<input type="hidden" name="brand" value="<?php echo $row['brand']; ?>">
			<input type="hidden" name="model" value="<?php echo $row['model']; ?>">
			<input type="hidden" name="id" value="<?php echo $row['id']; ?>">
			<input type="hidden" name="price" value="<?php echo $row['price']; ?>">
			<input type="hidden" name="photo" value="<?php echo $row['image']; ?>">
		   


			<p>
				<?php 
					
				
	
	
		
			//$brand = $row['brand'];
			//$models = $row['model'];
			
			//$_SESSION['model'] = $model;
			//$_SESSION['brand']= $brand;
			
			//header('Location: confirmItems.php'); ?>
			</p>

			<p>In stock.</p>
			<!-- <div class="description">
				<p>Cras ultricies ligula sed magna dictum porta. Proin eget tortor risus. Donec rutrum congue leo eget malesuada. Pellentesque in ipsum id orci porta dapibus. Pellentesquuris blandit aliquet elit, eget tincidunt nibh pulvinar a. Donec sollicitudin molestie malesuada.</p>
			</div> -->
			<input type="submit" class="btn addCart" name="addCart"	value="Add to Cart">

		</form>
	</div>
</body>
</html>
