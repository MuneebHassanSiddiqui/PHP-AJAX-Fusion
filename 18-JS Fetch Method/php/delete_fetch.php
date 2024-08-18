<?php
include "config.php";

$did = $_GET['dId'];

$mySQL = "DELETE FROM student WHERE sid = $did";

if (mysqli_query($conn, $mySQL)) {
    echo json_encode(array('delete' => 'success'));
} else {
    echo json_encode(array('delete' => 'error'));
}
