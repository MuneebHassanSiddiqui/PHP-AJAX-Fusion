<?php

$conn = mysqli_connect("localhost", "root", "", "countries") or die("Unsuccessfull Query" . mysqli_connect_error());

if ($_POST['type'] == "") {

    $mySQL = "SELECT * FROM `country_name`";
    $query = mysqli_query($conn, $mySQL) or die("Unsuccessfull Query" . mysqli_connect_error());

    while ($row = mysqli_fetch_assoc($query)) {
        $str .= "<option value='{$row['id']}'>{$row['CityName']}</option>";
    }

    echo $str;
} else if ($_POST['type'] == "State") {
    $mySQL = "SELECT * FROM `country_states` WHERE CountryCode = {$_POST['id']}";
    $query = mysqli_query($conn, $mySQL) or die("Unsuccessfull Query" . mysqli_connect_error());

    $str = "";

    while ($row = mysqli_fetch_assoc($query)) {
        $str .= "<option value='{$row['sid']}'>{$row['States']}</option>";
    }

    echo $str;
}
