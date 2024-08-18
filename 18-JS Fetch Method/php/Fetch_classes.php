<?php

include 'config.php';


$sql = "SELECT * FROM studentclass";


$res = mysqli_query($conn, $sql) or die("Query Failed❌");

$output = [];

if (mysqli_num_rows($res) > 0) {
    while ($row = mysqli_fetch_assoc($res)) {
        $output[] = $row;
    }
} else {
    $output['empty'] = ['empty'];
}
echo json_encode($output);
