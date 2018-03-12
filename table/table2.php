<?php
require('connection.php');

$sql = "SELECT * FROM adverts";

$result = mysqli_query($conn,$sql)or die(mysqli_error());

echo "<table>";
echo "<tr><th>Date</th><th>Comment</th><th>Amount</th></tr>";

while($row = mysqli_fetch_array($result)) {
    $ad_title = $row['Title'];
    $location = $row['Location'];
    $contact = $row['Contact'];
    $ad_price = $row['Price'];
    $description = $row['Description'];
    $user = $row['Seller'];
    echo "<tr><td style='width: 200px;'>".$ad_title."</td><td style='width: 600px;'>".$location."</td><td>".$amount."</td></tr>";
} 

echo "</table>";
mysqli_close($conn);
?>
