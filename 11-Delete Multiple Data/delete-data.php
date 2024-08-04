<?php

$student_id = $_POST['sid'];

$str = join(",", $student_id);

$conn = mysqli_connect("localhost", "root", "", "deletedata") or die("unsuccessfull Query" . mysqli_connect_error());

$mysql = "DELETE FROM `info` WHERE id IN($str)";


if (mysqli_query($conn, $mysql)) {
    echo 1;
} else {
    echo 0;
}
