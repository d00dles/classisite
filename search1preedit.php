<?php
	include 'config.php';
	mysqli_select_db($db, "website") or die(mysqli_error());
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Search results</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="style.css"/>
</head>
<body>
<?php
	$query = $_GET['query']; 
	// gets value sent over search form
	$min_length = 3;
	
	$product = array();
	// you can set minimum length of the query if you want
	if(strlen($query) >= $min_length){ // if query length is more or equal minimum length then
		$query = htmlspecialchars($query); 
		// changes characters used in html to their equivalents, for example: < to &gt;
		$raw_results = mysqli_query($db,"SELECT * FROM adverts
			WHERE (`ad_title` LIKE '%".$query."%') OR (`description` LIKE '%".$query."%')") or die(mysqli_error($db));

		// * means that it selects all fields, you can also write: `id`, `title`, `text`
		// articles is the name of our table

		// '%$query%' is what we're looking for, % means anything, for example if $query is Hello
		// it will match "hello", "Hello man", "gogohello", if you want exact match use `title`='$query'
		// or if you want to match just full word so "gogohello" is out use '% $query %' ...OR ... '$query %' ... OR ... '% $query'
		if(mysqli_num_rows($raw_results) > 0){ // if one or more rows are returned do following
			while($results = mysqli_fetch_array($raw_results)){
			// $results = mysql_fetch_array($raw_results) puts data from database into array, while it's valid it does the loop
				//echo "<p><h3>".$results['ad_title']."</h3>".$results['description']."</p>";
				
				// posts results gotten from database(title and text) you can also show id ($results['id'])
			}
		}
		else{ // if there is no matching rows do following
			echo "No results";
		}
	}
	else{ // if query length is less than minimum
		echo "Minimum length is ".$min_length;
	}
?>

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
         </ul>
        </div>
      </div>
    </nav>
    <div class="container">
      <div class="row">
        <div class="col-lg-3">
          <h2 class="my-4">Items for Sale</h2>
          <div class="list-group">
            <a href="form.php" class="list-group-item active">Post new Ad</a>
            <a href="logout.php" class="list-group-item">Logout</a>
          </div>
        </div>
	
	<div class="col-lg-9">
          <div class="card mt-4">
          </div><?php foreach($product as $result){ ?>
           <div class="card mt-4">
            <div class="card-body">
              <h2 class="card-title"> <?php echo $result["ad_title"]; ?></h2>
              <h3> £ <?php echo $result["ad_price"]; ?></h3>
              <p class="card-text"> <?php echo $product["description"]; ?></p>
          <!--<h4> Contact by : <?php echo $product["contact"]; ?></h4>
              <h5> Location : <?php echo $product["location"]; ?></h5>
              <h5> Seller : <?php echo $product["user"]; ?></h5>-->
            </div>
          </div><?php } ?>
          <!-- /.card -->

        </div>
      </div>
</body>
</html>
