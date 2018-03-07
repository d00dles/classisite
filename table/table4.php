<?php

include 'config.php';


$resultTbl = mysqli_query(SELECT ad_id FROM adverts);
$ids = array();

while($ad_id = mysql_fetch_row($resultTbl)){
    $ids[] = $ad_id[0];
}

// we now have all the ids stored in an array which we'll loop through.

foreach($ids as $ad_id){
    $resultTbl = mysqli_query(SELECT * FROM adverts  WHERE ad_id= . $ad_id);
    $row = mysql_fetch_assoc();

    // process
}
?>
