<?php
	include_once 'session.php';
?>
<html>
	<head>
		<title>Create an advert!</title>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>


	<body>
<div id="main">
	<h1>So what are you here to sell <em><?php echo $user_check; ?></em></h1>

</div>

<div id="login">
	<h2>Please fill in the form below</h2>
<hr/>
<form action="" method="post">
	<label>Advert Title :</label>
		<input type="text" name="ad_title" id="ad_title" required="required" placeholder="Enter Advert Title"/><br/><br/>
	<label>Location of sale :</label>
		<input type="text" name="location" id="location" required="required" placeholder="Enter the location of sale"/><br/><br/>
	<label>Contact details :</label>
		<input type="text" name="contact" id="contact" required="required" placeholder="Contact details (Email addr. or Phone Number)"/><br/><br/>
	<label>Advert Price :</label>
		<input type="number" name="ad_price" id="ad_price" required="required" placeholder="Price"/><br/><br/>
	<label>Description :</label>
		<textarea name="description" rows="10" cols="50" id="description" required="required" placeholder="Description of sale"/></textarea>
		<input type="submit" value=" Submit " name="submit"/><br/>
</form>

</div>

<?php

include_once 'config.php';
//include_once 'session.php';

session_start();

if(isset($_POST["submit"])){

//Create the DB connection by calling the sql creds from config
$conn = $db;

// Check connection
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}


$sql = "INSERT INTO adverts (ad_title,location,contact,ad_price,description,user_s) VALUES ('".$_POST["ad_title"]."','".$_POST["location"]."','".$_POST["contact"]."','".$_POST["ad_price"]."','".$_POST["description"]."','".$_SESSION['login_user']."')";

$inst = mysqli_query($conn, $sql);

//if (mysqli_query($conn, $sql)) {
if ($inst) {
	echo '<script type="text/javascript">alert("New ad created successfully");</script>';
	}else{
	echo '<script type="text/javascript">alert("Error: " . $sql . "<br>" . $conn->error.);</script>';
	}

session_destroy();
}
mysqli_close($conn);

?>

	</body>
</html>
