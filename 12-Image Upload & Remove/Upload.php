<?php
if ($_FILES['file']['name'] != '') {
    $fileName = $_FILES['file']['name'];
    $extension = pathinfo($fileName, PATHINFO_EXTENSION);
    $valid_extension = array("jpg", "png", "jpeg", "gif");

    if (in_array($extension, $valid_extension)) {
        $new_name = rand() . "." . $extension;
        $path = "images/" . $new_name;
        if (move_uploaded_file($_FILES['file']['tmp_name'], $path)) {
            echo "<img src=" . $path . " alt=''><button data-path=" . $path . " id='deleteBtn'>Delete</button>";
        }
    } else {
        echo "<script>alert('Invalid File Format!')</script>";
    }
} else {
    echo "<script>alert('please Select iamges first;')</script>";
}
