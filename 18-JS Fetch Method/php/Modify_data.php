<?php

include "config.php";

$input = file_get_contents("php://input");
$decode = json_decode($input, true);

$stuId = $decode['id'];
$Ename = $decode['name'];
$class_name = $decode['class'];
$address = $decode['Adress'];
$phone = $decode['phone'];

// Update the student record
$query = "UPDATE `student` SET `sname`='$Ename', `sclass`='$class_name', `saddress`='$address', `sphone`='$phone' WHERE `sid`=$stuId";

if (mysqli_query($conn, $query)) {
    echo json_encode(array('insert' => 'success'));
} else {
    echo json_encode(array('insert' => 'error'));
    // Log the error
    error_log("Error updating student: " . mysqli_error($conn));
}

// Close the connection
mysqli_close($conn);
