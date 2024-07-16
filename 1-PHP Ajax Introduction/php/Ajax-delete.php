<?php

include 'config.php';


$stuId = $_POST['id'];

$_sql = "DELETE FROM `precticework` WHERE id = {$stuId}";


if (mysqli_query($conn, $_sql)) {
    echo 1;
} else {
    echo 0;
}
