
<?php


include 'config.php';


$stuId = $_POST['id'];
$FName = $_POST['first_name'];
$FFname = $_POST['father_name'];

$_sql = "UPDATE precticework SET Name = '{$FName}' ,FatherName = '{$FFname}' WHERE id = {$stuId}";


if (mysqli_query($conn, $_sql)) {
    echo 1;
} else {
    echo 0;
}
