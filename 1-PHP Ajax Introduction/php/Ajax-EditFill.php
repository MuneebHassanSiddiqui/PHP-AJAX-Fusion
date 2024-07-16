<?php
include 'config.php';


$student_id = $_POST['eid'];
$_sql = "SELECT * FROM `precticework` WHERE id = {$student_id}";


$res = mysqli_query($conn, $_sql);
$output = "";

if (mysqli_num_rows($res) > 0) {

    while ($row = mysqli_fetch_assoc($res)) {
        $output .= "
                <tr>
                    <td>Name</td>
                    <td><input type='text'  value='{$row["Name"]}' id='FnameEdit'></td>
                    <td><input type='text' hidden value='{$row["id"]}' id='Editeid'></td>

                </tr>
                <tr>
                    <td>F.Name</td>
                    <td><input type='text'  value='{$row["FatherName"]}' id='FatherNameEdit'></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type='submit' id='EditSub' value='Save'></td>
                </tr>";
    }

    echo $output;
} else {
}
