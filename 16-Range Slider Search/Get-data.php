<?php

$conn = mysqli_connect("localhost", "root", "", "test") or die("Query unsuccessfull");


if (isset($_POST['r1']) && isset($_POST['r2'])) {
    $min = $_POST['r1'];
    $max = $_POST['r2'];
    $sql = "SELECT * FROM loadcity WHERE Age BETWEEN {$min} AND {$max}";
} else {
    $min = "";
    $max = "";
    $sql = "SELECT * FROM loadcity ORDER BY id ASC";
}

$res = mysqli_query($conn, $sql) or die("Query unsuccessfull");

$output = "";
if (mysqli_num_rows($res) > 0) {
    while ($row = mysqli_fetch_assoc($res)) {

        $output .= "<tr>
        <td>{$row['id']}</td>
        <td>{$row['Name']}</td>
        <td>{$row['Age']}</td>
        <td>{$row['City']}</td>
     </tr>";
    }
} else {
    echo 'No record Found❌';
}

echo $output;
