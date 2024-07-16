<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    /* Resetting default margin and padding */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: Arial, sans-serif;
        background-color: #f0f0f0;
        margin: 0;
        padding: 20px;
    }

    .main {
        max-width: 800px;
        margin: 20px auto;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        padding: 20px;
    }

    .header {
        background-color: #007bff;
        color: #fff;
        padding: 10px 0;
        text-align: center;
        border-top-left-radius: 8px;
        border-top-right-radius: 8px;
    }

    .header h1 {
        font-size: 1.5em;
        margin: 0;
    }

    #load-table {
        margin-top: 20px;
        padding: 20px;
        background-color: #f8f9fa;
        border-radius: 8px;
    }

    /* Table styles (example) */
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    table,
    th,
    td {
        border: 1px solid #ccc;
    }

    th,
    td {
        padding: 10px;
        text-align: left;
    }

    th {
        background-color: #007bff;
        color: #fff;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }
</style>
</head>

<body>
    <div class="main">
        <div class="header">
            <h1>PHP with AJAX and JSON</h1>
        </div>
        <div id="load-table" >
            <table id="load-data">
                <tr>
                    <th>Name</th>
                    <th>FatherName</th>
                </tr>

            </table>
            <!-- Example table (replace with your dynamic content) -->

        </div>
    </div>
    <script src="JavaScript/jquery.js"></script>
    <script>
        $(document).ready(function() {
            // $.getJSON(
            //     "json-fetch.php",
            //     function(data) {
            //         $.each(data, function(key, values) {
            //             $("#load-table").append(values.Name + " " + " " + values.FatherName + '<br>');
            //         });
            //         // console.log(data);

            //     }

            // );
            $.ajax({
                url: "json-fetch.php",
                type: "GET",
                dataType: "JSON",
                success: function(data) {
                    $.each(data, function(key, values) {
                        $("#load-data").append("<tr><td>" + values.Name + "</td>" +  "<td>" + values.FatherName + '</td></tr>');
                    });
                    // console.log(data);
                }
            });
        });
    </script>
</body>

</html>