<?php

include "config.php";

$mySQL = "SELECT student.sid,student.sname,student.saddress,student.sphone ,studentclass.cname FROM student LEFT JOIN studentclass ON studentclass.cid = student.sclass";


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
