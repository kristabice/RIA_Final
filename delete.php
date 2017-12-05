<?php
session_start();
require_once('authorize.php');

$id = $_GET['id'];

require_once('variables.php');
if(isset($_POST['delete'])){
//BUILD THE DATABASE CONNECTION WITH host, user, pass, database
$dbconnection = mysqli_connect(HOST,USER,PASSWORD,DB_NAME) or die ('connection failed');

//BUILD THE query
$query = "DELETE FROM inventory WHERE id=$id";

//NOW TRY AND TALK TO THE database
$result = mysqli_query($dbconnection, $query) or die ('query failed');

//RETURN TO THE APPROVE PAGE
header('Location: inventory.php');
}
elseif(isset($_POST['cancel'])){
	header('Location: inventory.php');
}
?>



<?php include_once('header.php')?>
    <title>Delete Item</title>
    
  </head>
  <body >
    <?php include_once('nav.php'); ?>
    <div id="home" class="container">
     <div id="main">
		 
     <h1>Are you sure you want to delete this item?</h1>
		 <div class="deleteItem">
	<form action="delete.php" method="post">
		<input type="submit" name="delete" value="Delete">
		<input type="submit" name="cancel" value="Cancel">
		
			 
	</form>
  		 </div>
    </div> <!-- end of main div -->
</div> <!-- end of container div -->
<?php include_once('footer.php'); ?>
