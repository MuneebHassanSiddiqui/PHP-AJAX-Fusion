<?php
include 'config.php';




$search_term = $_POST['search'];
$_sql = "SELECT * FROM `precticework` WHERE Name LIKE '%{$search_term}%' OR  FatherName LIKE '%{$search_term}%'";


$res = mysqli_query($conn, $_sql);
$output = "";

if (mysqli_num_rows($res) > 0) {
    $output = '<table border="10px" width="100%" align="center" cellspacing="0" cellpadding="5px">

    <tr>
    <th><h2> Id </h2></th>
    <th><h2> Name</h2> </th>
    <th><h2> Father Name </h2></th>
    <th><h2> Delete </h2></th>
    <th><h2> Edit </h2></th>



    </tr>';

    while ($row = mysqli_fetch_assoc($res)) {
        $output .= "<tr>
        <td align='center'>{$row["id"]}</td> 
        <td>{$row["Name"]}</td> 
        <td>{$row["FatherName"]}</td> 
        <td align='center'>
            <button class='DeleteData' data-id='{$row["id"]}'><i class='ri-delete-bin-6-line'> </i></button>
        </td>
        <td align='center'>
            <button class='EditBtn' data-eid='{$row["id"]}'><i class='ri-edit-box-fill'></i> </i></button>
        </td>
    </tr>";
    }
    $output .= "</table>";


    echo $output;
} else {
    echo "<h1><b>No Record Found</h1></b>";
}
