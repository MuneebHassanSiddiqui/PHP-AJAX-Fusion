<?php

include "config.php";

$search_term = $_GET['search'];
$mySQL = "SELECT 
  student.sid, 
  student.sname, 
  student.saddress, 
  student.sphone, 
  studentclass.cname 
FROM 
  student 
  LEFT JOIN studentclass ON studentclass.cid = student.sclass 
WHERE 
  student.sname LIKE CONCAT('%', '$search_term', '%')";

$res = mysqli_query($conn, $mySQL) or die("Query Failed❌");
$output = [];
if (mysqli_num_rows($res) > 0) {
    while ($row = mysqli_fetch_assoc($res)) {
        $output[] = $row;
    }
} else {
    $output['empty'] = ['empty'];
}

echo json_encode($output);
