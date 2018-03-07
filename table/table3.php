<?php
include 'config.php';
//Select Database
$queryTbl = "SELECT * FROM adverts";
//$result = $conn->query($queryTbl);
$result = mysqli_query($db,$queryTbl);
?>
<!doctype html>
<html>
<body>
<h1 align="center">Employee Details</h1>
<table border="1" align="center" style="line-height:25px;">
<tr>
<th>Employee ID</th>
<th>Name</th>
<th>Gender</th>
<th>Department</th>
<th>Address</th>
<th>Mobile Number</th>
<th>Email</th>
</tr>
<?php
//Fetch Data form database
if($result->num_rows > 0){
 while($row = $result->fetch_assoc()){
 ?>
 <tr>
 <td><?php echo $row['empid']; ?></td>
 <td><?php echo $row['name']; ?></td>
 <td><?php echo $row['gender']; ?></td>
 <td><?php echo $row['department']; ?></td>
 <td><?php echo $row['address']; ?></td>
 <td><?php echo $row['mobile']; ?></td>
 <td><?php echo $row['email']; ?></td>
 </tr>
 <?php
 }
}
else
{
 ?>
 <tr>
 <th colspan="2">There's No data found!!!</th>
 </tr>
 <?php
}
?>
</table>
</body>
</html>
