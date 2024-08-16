<?php

$conn = mysqli_connect("localhost", "root", "", "test") or die("Query Unsuccessful!");

if (!empty($_FILES['file']['name'][0])) {
    $file_names = [];
    $total = count($_FILES['file']['name']);

    for ($i = 0; $i < $total; $i++) {
        $fileName = $_FILES['file']['name'][$i];
        $extension = pathinfo($fileName, PATHINFO_EXTENSION);
        $valid_extension = array("png", "jpg", "jpeg");

        if (in_array($extension, $valid_extension)) {
            $new_name = rand() . "." . $extension;
            $path = "image/" . $new_name;

            if (move_uploaded_file($_FILES['file']['tmp_name'][$i], $path)) {
                $file_names[] = $new_name;
            } else {
                echo 'false';
                exit();
            }
        } else {
            echo 'false';
            exit();
        }
    }

    // Combine all file names into a single string separated by commas
    $file_name_string = implode(",", $file_names);

    $sql = "INSERT INTO `drag-upload` (UploadedFile) VALUES('$file_name_string')";
    if (mysqli_query($conn, $sql)) {
        echo 'true';
    } else {
        echo 'false';
    }
}

