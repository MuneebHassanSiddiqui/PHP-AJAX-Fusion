<?php



$conn = mysqli_connect("localhost", "root", "", "test") or die("unsuccessfull query");

$mySQL = "SELECT * FROM precticework";

$res = mysqli_query($conn, $mySQL) or die("unsuccessfull query");

$output = mysqli_fetch_all($res, MYSQLI_ASSOC);

echo json_encode($output);
// echo "<pre>";
// print_r($output);
// echo "</pre>";
