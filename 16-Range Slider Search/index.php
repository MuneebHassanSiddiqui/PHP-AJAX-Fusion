<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP AJAX Range Slider</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.14.0/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">

</head>

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: "Open Sans", sans-serif;
    }

    .DataLoad {
        margin-top: 20px;
        max-height: 300px;
        /* Adjust the height as needed */
        overflow-y: auto;
        /* Enables vertical scrollbar */
    }

    .DataLoad table {
        width: 100%;
        border-collapse: collapse;
    }

    .DataLoad table th,
    .DataLoad table td {
        padding: 12px 15px;
        text-align: center;
        border-bottom: 1px solid #ddd;
    }

    .DataLoad table th {
        background-color: #5372f0;
        color: #fff;
    }

    .DataLoad table tr:hover {
        background-color: #f1f1f1;
    }
</style>

<body>
    <div class="main">
        <div class="header">
            <h1>PHP AJAX RANGE SLIDER</h1>
        </div>
        <div id="age">
            <label style="font-size: 20px;">Student Age Between : </label>
            <span id="ShowAge"></span>

        </div>
        <div class="rangeSlider">
        </div>
        <div class="DataLoad">
            <table id="LoadD">
                <thead>
                    <th width="10%">Id</th>
                    <th>Name</th>
                    <th>Age</th>
                    <th>City</th>
                </thead>

                <tbody>

                </tbody>
            </table>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://code.jquery.com/ui/1.14.0/jquery-ui.js"></script>
    <script>
        $(document).ready(function() {
            var v1 = 9;
            var v2 = 15;

            // Initialize slider
            $(".rangeSlider").slider({
                range: true,
                min: 6,
                max: 50,
                values: [v1, v2],
                slide: function(event, ui) {
                    // Display the selected range
                    $("#ShowAge").html(ui.values[0] + " - " + ui.values[1]);

                    // Update the variables
                    v1 = ui.values[0];
                    v2 = ui.values[1];

                    // Load the table with the new range
                    LoadTable(v1, v2);
                }
            });

            // Display initial range
            $("#ShowAge").html($(".rangeSlider").slider("values", 0) + " - " + $(".rangeSlider").slider("values", 1));

            // Function to load data into the table
            function LoadTable(range1, range2) {
                $.ajax({
                    url: "Get-data.php",
                    type: "POST",
                    data: {
                        r1: range1,
                        r2: range2
                    },
                    success: function(data) {
                        // Populate the table with received data
                        $("#LoadD tbody").html(data).fadeIn("slow");
                    }
                });
            }

            // Initial table load
            LoadTable(v1, v2);

        });
    </script>
</body>

</html>