<?php


if ($_POST["name"] != "" && $_POST["age"] != "" &&  $_POST["city"] != "") {
    if (file_exists('json/student_data.json')) {
        $current_data = file_get_contents('json/student_data.json');
        $array_data = json_decode($current_data, true);
        $new_Data = [
            'Name' => $_POST["name"],
            'Age' => $_POST["age"],
            'city' => $_POST["city"]
        ];
        $array_data[] = $new_Data;
        $json_data = json_encode($array_data, JSON_PRETTY_PRINT);
        if (file_put_contents('json/student_data.json', $json_data)) {
            echo "Json Data exist in json/student_data.json ";
        } else {
            echo "Json Data dose not exist in json/student_data.json ";
        }
    } else {
        echo  "CHECK FILE CODE !";
    }
} else {
    echo "<h3>ALL_INPUT_FIELD_REQUIRED!</h3>";
}
