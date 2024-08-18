<?php
include "config.php";


$stuId = $_GET['EditId'];

$mySQL = "SELECT * FROM student WHERE sid = {$stuId}";
$res = mysqli_query($conn, $mySQL) or die("Query Failed❌");
$output = [];
if (mysqli_num_rows($res) > 0) {
    while ($row = mysqli_fetch_assoc($res)) {
        $output['response'][] = $row;
    }
}

$mySQL1 = "SELECT * FROM studentclass";
$res1 = mysqli_query($conn, $mySQL1) or die("Query Failed❌");
if (mysqli_num_rows($res1) > 0) {
    while ($row1 = mysqli_fetch_assoc($res1)) {
        $output['class'][] = $row1;
    }
}


echo json_encode($output);
