<?php

$conn = mysqli_connect("localhost", "root", "", "test") or die("Unsuccessfull!");

$mysql = "SELECT distinct(city) FROM loadcity";

$res = mysqli_query($conn, $mysql) or die("Unsuccessfull!");


if (mysqli_num_rows($res) > 0) {
    $output = mysqli_fetch_all($res, MYSQLI_ASSOC);
    echo json_encode($output);
} else {
    echo "NO RECORD FOUND!";
}
