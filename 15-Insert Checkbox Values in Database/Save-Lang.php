<?php

$conn = mysqli_connect("localhost", "root", "", "test") or die("Unsuccessfull Query Failed!");

$name = $_POST['name'];
$lang = $_POST['lang'];

$mySQL = "INSERT INTO `languages`( `Name`, `Languages`) VALUES ('$name','$lang')";

if (mysqli_query($conn, $mySQL)) {
    echo 1;
} else {
    echo 0;
}
