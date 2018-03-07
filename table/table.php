<?php

include 'session.php';
include 'config.php';

$result = mysqli_query($db,"SELECT * FROM adverts");

echo "<table border='1'>
<tr>
<th>Title</th>
<th>Location</th>
<th>Contact</th>
<th>Price</th>
<th>Description</th>
<th>Seller</th>
</tr>";

while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['Title'] . "</td>";
echo "<td>" . $row['Location'] . "</td>";
echo "<td>" . $row['Contact'] . "</td>";
echo "<td>" . $row['Price'] . "</td>";
echo "<td>" . $row['Description'] . "</td>";
echo "<td>" . $row['Seller'] . "</td>";
echo "</tr>";
}
echo "</table>";

mysqli_close($con);
?>
