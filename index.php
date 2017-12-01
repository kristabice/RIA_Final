<?php
session_start();
require_once('variables.php');

  //BUILD THE DATABASE CONNECTION WITH host, user, pass, database
//$dbconnection = mysqli_connect(HOST,USER,PASSWORD,DB_NAME) or die ('connection failed');

//BUILD THE query
//$query = "SELECT * FROM checkout";

//NOW TRY AND TALK TO THE database
//$result = mysqli_query($dbconnection, $query) or die ('query failed');
?>

<?php include_once('header.php')?>
    <title>Home</title>

  	</head>
  	<body >
    <?php include_once('nav.php'); ?>
    <div id="home" class="container">
     <div id="main">
      <div class="hero">
        <a href="shopping.php"><div class="btn shop">
          Shop Now
        </div></a>
      </div>
      <div class="about">
        <h2><span>ABOUT US</span></h2>
        <div class="content">
          <div>
            <p> Mission statement: Sell products that have a positive, long-term, impact on the lives of our customers and the health of our planet; support our employees and community, and those of our suppliers, by keeping our manufacturing in Colorado and sourcing USA-Made materials for our products.</p>
            <p>At Water Bottles R Us, we want to make sure the products you buy are top-notch. We understand that people from all walks of life have varying needs and our bottles have been designed with this in mind. Whether it's on the go, at home, or in the mountains, waterBottlesRUs has you covered.</p>
          </div>
          <img src="img/main-bottle.png" />
        </div>
      </div>
    </div> <!-- end of main div -->
</div> <!-- end of container div -->
<?php include_once('footer.php'); ?>
