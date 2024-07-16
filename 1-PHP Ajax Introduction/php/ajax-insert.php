<?php
include 'config.php';

$name = $_POST['name'];
$fatherName = $_POST['fatherName'];

// Escape user inputs to prevent SQL injection
$name = mysqli_real_escape_string($conn, $name);
$fatherName = mysqli_real_escape_string($conn, $fatherName);

// Attempt to execute the query
$sql = "INSERT INTO `precticework` (`Name`, `FatherName`) VALUES ('$name','$fatherName')";
if (mysqli_query($conn, $sql)) {
    echo 1;
} else {
    echo 0;
    
}

