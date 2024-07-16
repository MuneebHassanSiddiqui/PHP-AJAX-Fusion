<?php


$conn  = mysqli_connect('localhost', 'root', '', 'TEST') or die("Connection Failed!" . mysqli_connect_error());

$LPP = 5;
$page = "";
if (isset($_POST['page_no'])) {
    $page = $_POST['page_no'];
} else {
    $page = 1;
}

//PER PAGE RECORD
$offset = ($page - 1) * $LPP;
$mySQL = "SELECT * FROM `precticework` LIMIT $offset,$LPP ";

$res = mysqli_query($conn, $mySQL) or die("Query Unsuccessful");

$output = "";
if (mysqli_num_rows($res) > 0) {
    $output .= '
      <table width="100%" border="10" width="100%" cellspacing="0" cellpadding="10px">
            <tr>
                <th width="100px">Id</th>
                <th>Name</th>
            </tr>
            ';

    while ($Fetch = mysqli_fetch_assoc($res)) {
        $output .= " <tr>
                <td>{$Fetch["id"]}</td>
                <td>{$Fetch["Name"]}  {$Fetch["FatherName"]}</td>
            </tr>";
    }

    $output .= " </table>";

    //Pagenation work 
    $SQL_Total = "SELECT * FROM `precticework`";
    $records = mysqli_query($conn, $SQL_Total) or ("Query Unsuccesfuly");
    $total_record = mysqli_num_rows($records);
    $total_pages = ceil($total_record / $LPP);
    $output .= '  <div id="pagination">';
    for ($i = 1; $i <= $total_pages; $i++) {

        if ($i == $page) {
            $class_name = "active";
        } else {
            $class_name = "";
        }
        $output .= " <a id='{$i}' class='{$class_name}' href = ''>{$i}</a>";
    }
    $output .= '  </div>';
    echo  $output;
} else {
    echo "No record found!";
}
