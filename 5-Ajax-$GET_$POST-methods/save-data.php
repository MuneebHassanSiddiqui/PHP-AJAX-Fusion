<?php
$conn = mysqli_connect("localhost", "root", "", "test") or die('unsuccessful query!');


$Name = $_POST['name'];
$email = $_POST['email'];
$Message = $_POST['message'];
$city  = $_POST['city'];

$mySQL = "INSERT INTO `savedata`(`Name`, `email`, `message`, `city`) VALUES ('$Name','$email','$Message','$city')";

if (mysqli_query($conn, $mySQL)) {
    echo 1;
} else {
    echo 0;
}
