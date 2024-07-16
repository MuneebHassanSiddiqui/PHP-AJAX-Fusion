<?php

$conn = mysqli_connect("localhost", "root", "", "test") or die("Query failed");


$name = $_POST['name'];
$FName = $_POST['fname'];
$gender = $_POST['gender'];
$country = $_POST['country'];

$mySQL = "INSERT INTO `formdata`( `Name`, `FatherName`, `Gender`, `Country`) VALUES ('[$name]','[$FName]','[$gender]','[$country]')";


if (mysqli_query($conn, $mySQL)) {
    echo "Hello 😍  " . $name . " Your record save Now ✔";
} else {
    echo "Can't record Data ";
}
