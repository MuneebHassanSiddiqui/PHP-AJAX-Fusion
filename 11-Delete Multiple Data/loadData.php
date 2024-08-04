<?php
$conn = mysqli_connect("localhost", "root", "", "deletedata") or die("unsuccessfull Query" . mysqli_connect_error());

$mysql = "SELECT * FROM `info`";


$query = mysqli_query($conn, $mysql) or die("unsuccessfull Query" . mysqli_connect_error());

$output = "";
if (mysqli_num_rows($query) > 0) {
    $output .= "<table border='1px solid black' width='100%' class='table table-dark table-striped'>
            <thead>
                <tr>
                    <th scope='col'></th>
                    <th scope='col'>S#No</th>
                    <th scope='col'>Name</th>
                    <th scope='col'>Age</th>
                    <th scope='col'>City</th>
                </tr>
            </thead>
            ";

    while ($row = mysqli_fetch_assoc($query)) {
        $output .= "<tbody>
                    <tr>
                        <th width='30px' scope='row'><input type='checkbox' value='{$row['id']}'></th>
                        <th width='30px' scope='row'>{$row['id']}</th>
                        <td width='70px'>{$row['Name']}</td>
                        <td width='40px'>{$row['Age']}</td>
                        <td width='40px'>{$row['City']}</td>
                    </tr>
                   </tbody>";
    }
    $output .= "</table>";

    echo $output;
} else {
    echo "No Record in dataBase";
}
