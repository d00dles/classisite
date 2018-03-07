<?php

include 'config.php';
include 'session.php';

session_start();

$mysqli = $db;

if (!$mysqli){
	die("Connection Failed: %s\n" . mysqli_connect_error());
}

$sql = "SELECT * FROM adverts ";
$result = $mysqli->query($sql);

$mrow = array();
		

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {array_push($mrow, $row);
    //    echo "Title: " . $row["ad_title"]. " - Name: " . $row["location"]. " - Contact " . $row["contact"]. " - Price " . $row["ad_price"]. " - Description " . $row["description"]. " - Seller " . $row["user"].  "<br>";

  }
} else {
    echo "0 results";
}
$mysqli->close();

//var_dump($mrow);

?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Home Page - Classified ads</title>

    <!-- Bootstrap core CSS -->
    <link href="startbootstrap-shop-item/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="startbootstrap-shop-item/css/shop-item.css" rel="stylesheet">

  </head>

  <body>

  <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#">Classifieds</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
  	   <div class="topnav">
    	   <!-- <a class="active" href="#home">Home</a>
  	    <a href="#about">About</a>
 	    <a href="#contact">Contact</a> -->
 	    <form action="search.php" method="GET">
	      <input type="text" name="query" placeholder=" Search here">
	      <input type="submit" name="Submit" value="Search">
	    </form>
	</div>



<!--            <li class="nav-item active">
              <a class="nav-link" href="#">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">form.php</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">logout.php</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Contact</a>
            </li>-->
          </ul>
        </div>
      </div>
    </nav>
 <!-- Page Content -->
    <div class="container">

      <div class="row">

        <div class="col-lg-3">
          <h2 class="my-4">Items for Sale</h2>
          <div class="list-group">
            <a href="form.php" class="list-group-item active">Post new Ad</a>
            <a href="logout.php" class="list-group-item">Logout</a>
            <!--<a href="#" class="list-group-item">Category 3</a>-->
          </div>
        </div>
        <!-- /.col-lg-3 -->

        <div class="col-lg-9">

          <div class="card mt-4">
            <!--<img class="card-img-top img-fluid" src="http://placehold.it/900x400" alt="">-->
            <!--<div class="card-body">
              <h3 class="card-title"> <?php echo $mrow[0]["ad_title"]; ?></h3>
              <h4> £ <?php echo $mrow[0]["ad_price"]; ?></h4>
              <p class="card-text"> <?php echo $mrow[0]["description"]; ?></p>
            </div>-->
          </div><?php foreach($mrow as $product){ ?>
           <div class="card mt-4">
            <div class="card-body">
	      <h2 class="card-title"> <?php echo $product["ad_title"]; ?></h2>
              <h3> £ <?php echo $product["ad_price"]; ?></h3>
              <p class="card-text"> <?php echo $product["description"]; ?></p>
              <h4> Contact by : <?php echo $product["contact"]; ?></h4>
	      <h5> Location : <?php echo $product["location"]; ?></h5>
	      <h5> Seller : <?php echo $product["user"]; ?></h5>
	    </div>
          </div><?php }	?>
          <!-- /.card -->

        </div>
        <!-- /.col-lg-9 -->

      </div>

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2017</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>

