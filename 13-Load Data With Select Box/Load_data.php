<?php

$conn = mysqli_connect("localhost", "root", "", "test") or die("Unsuccessfull!");

$mysql = "SELECT * FROM loadcity WHERE city = '{$_POST["city"]}'";

$res = mysqli_query($conn, $mysql) or die("Unsuccessfull!");

$output = '';

if (mysqli_num_rows($res) > 0) {

    $output .= "<table id='Table' style='width: 70%; margin: 0 auto; padding: 20px;' border='2px solid black' cellpadding='10px'
            cellspacing='0px'>
            <tr>
                <th width='30px'>Id</th>
                <th>Name</th>
                <th>Age</th>
                <th>City</th>
            </tr>";


    while ($row = mysqli_fetch_assoc($res)) {
        $output .= "
                       <tr>
                       <td>{$row['id']}</td>
                       <td>{$row['Name']}</td>
                       <td>{$row['Age']}</td>
                       <td>{$row['City']}</td>
                       </tr>
        ";
    }

    $output .= "</table>";

    echo  $output;
} else {
    echo "No record found!";
}
