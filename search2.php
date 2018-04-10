<?php
	include_once 'config.php';

	pg_select_db($db, "website") or die(pg_error());
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
	// you can set minimum length of the query if you want
	if(strlen($query) >= $min_length){ // if query length is more or equal minimum length then
		$query = htmlspecialchars($query);
		// changes characters used in html to their equivalents, for example: < to &gt;
		$raw_results = pg_query($db,"SELECT * FROM adverts
			WHERE (ad_title LIKE '%".$query."%') OR (description LIKE '%".$query."%')") or die(pg_error($db));

		// * means that it selects all fields, you can also write: id, title, text
		// articles is the name of our table

		// '%$query%' is what we're looking for, % means anything, for example if $query is Hello
		// it will match "hello", "Hello man", "gogohello", if you want exact match use title='$query'
		// or if you want to match just full word so "gogohello" is out use '% $query %' ...OR ... '$query %' ... OR ... '% $query'
		if(pg_num_rows($raw_results) > 0){ // if one or more rows are returned do following
			while($results = pg_fetch_array($raw_results)){
			// $results = mysql_fetch_array($raw_results) puts data from database into array, while it's valid it does the loop
				echo "<p><h4>".$results['ad_title']."</h4>".$results['description']."</p>";

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

</body>
</html>
