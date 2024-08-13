<?php
$conn = mysqli_connect("localhost", "root", "", "test") or die("unsuccessfull query");

$search_term = $_POST['city'];

$mySQL = "SELECT DISTINCT(city) from  loadcity Where city Like '%{$search_term}%'";

$res = mysqli_query($conn, $mySQL) or die("unsuccessfull query");

$output = "";
if (mysqli_num_rows($res) > 0) {
    while ($row = mysqli_fetch_assoc($res)) {
        $output .= "<li>{$row['city']}</li>";
    }
} else {
    $output .= "<li>City not Found!</li>";
}


echo $output;
