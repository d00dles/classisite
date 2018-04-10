<?php
//$servername = "localhost";
//$username = "root";
//$password = "Mal09c13";
//$dbname = "website";


include 'config.php';
include 'session.php';

session_start();

// Create connection
//$conn = new mysqli($servername, $username, $password, $dbname);
$conn = $db;
// Check connection
//if ($conn->connect_error) {
//   die("Connection failed: " . $conn->connect_error);
//} 

if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["user_id"]. " - Name: " . $row["username"]. " - Password " . $row["password"]. "<br>";
//This is use to call the user session id
//	echo $user_check;
//this is used to print the user session
//	echo ($_SESSION['login_user']);

    }
} else {
    echo "0 results";
}
$conn->close();
?>
