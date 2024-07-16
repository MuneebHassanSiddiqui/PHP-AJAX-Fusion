<?php

$conn = mysqli_connect("localhost", "root", "", "test") or die("Connection failed!");

$mysql = "SELECT * FROM precticework";

$query = mysqli_query($conn, $mysql) or die("Connection failed!");

$output  = mysqli_fetch_all($query, MYSQLI_ASSOC);

$json_data = json_encode($output, JSON_PRETTY_PRINT);

$file_name = "my" . date("d-m-Y") . ".json";

if (file_put_contents("json/{$file_name}", $json_data)) {
    echo $file_name . "created";
} else {
    echo "ERROR_OCCURS!";
}
