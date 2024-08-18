<?php
include "config.php";


$input = file_get_contents("php://input");
$json_decode =  json_decode($input, true);


$fname = $json_decode['name'];
$sclass =  $json_decode['class'];
$phone =  $json_decode['phone'];
$address =  $json_decode['address'];

$mySQL = "INSERT INTO `student`(`sname`, `sclass`, `saddress`, `sphone`) VALUES ('$fname','$sclass','$address','$phone')";

if (mysqli_query($conn, $mySQL)) {
    echo json_encode(array("insert" => "success"));
} else {
    echo json_encode(array("insert" => "error"));
}
