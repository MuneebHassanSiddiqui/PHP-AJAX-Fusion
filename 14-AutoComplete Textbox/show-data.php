

<?php
$conn = mysqli_connect("localhost", "root", "", "test") or die("unsuccessfull query");



$mySQL = "SELECT * FROM loadcity WHERE City = '{$_POST['city']}'";

$res = mysqli_query($conn, $mySQL) or die("unsuccessfull query");

$output = "<table>";
if (mysqli_num_rows($res) > 0) {
    $output .= "
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Age</th>
        <th>City</th>
               </tr>
      ";
    while ($row = mysqli_fetch_assoc($res)) {
        $output .= "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['Name']}</td>
                        <td>{$row['Age']}</td>
                        <td>{$row['City']}</td>
                    </tr>
                   ";
    }
} else {
    $output .= "Data Not Founded!";
}
$output .= "</table>";



echo $output;
