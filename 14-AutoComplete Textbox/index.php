<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        /* Reset some default styles */
        body,
        h1,
        ul,
        li,
        table {
            margin: 0;
            padding: 0;
            list-style: none;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .main {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            width: 400px;
            padding: 20px;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header h1 {
            font-size: 24px;
            color: #333;
        }

        .searchbox {
            position: relative;
        }

        .searchbox input[type="search"] {
            width: calc(100% - 12px);
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 4px;
            transition: border-color 0.3s ease;
        }

        .searchbox input[type="search"]:focus {
            border-color: #0066cc;
            outline: none;
        }

        .searchbox input[type="submit"] {
            margin-top: 10px;
            width: 100%;
            padding: 10px;
            font-size: 16px;
            background-color: #0066cc;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .searchbox input[type="submit"]:hover {
            background-color: #005bb5;
        }

        .searchbox ul {
            position: absolute;
            top: 50px;
            left: 0;
            right: 0;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 4px;
            max-height: 150px;
            overflow-y: auto;
            z-index: 1000;
            display: none;
        }

        .searchbox ul li {
            padding: 10px;
            border-bottom: 1px solid #f1f1f1;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .searchbox ul li:hover {
            background-color: #f4f4f9;
        }

        .searchbox input[type="search"]:focus+ul,
        .searchbox ul:hover {
            display: block;
            /* Show suggestions on focus */
        }

        .loadTable {
            margin-top: 30px;
        }

        .loadTable table {
            width: 100%;
            border-collapse: collapse;
        }

        .loadTable table th,
        .loadTable table td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .loadTable table th {
            background-color: #0066cc;
            color: white;
        }

        .loadTable table tr:hover {
            background-color: #f4f4f9;
        }

        .loadTable table tr:nth-child(even) {
            background-color: #f9f9f9;
        }
    </style>
</head>

<body>

    <div class="main">
        <div class="header">
            <h1>Auto Complete Text Box</h1>
        </div>
        <div class="searchbox">
            <input type="search" id="search" placeholder="Start typing...">
            <input type="submit" id="SubBTN" value="Submit">
            <ul id='showCity'>
            </ul>

            <!-- 
            <ul>
                <li>Karachi</li>
                <li>Pakistan</li>
                <li>Lahore</li>
                <li>Islamabad</li>
                <li>Quetta</li>
            </ul> -->
        </div>

        <div class="loadTable" style="display: none;">

        </div>

    </div>

    <script src="JavaScript/jquery.js"></script>
    <script>
        $(document).ready(function() {

            $("#search").keyup(function() {
                var city = $(this).val();
                if (city != "") {
                    $.ajax({
                        url: "show-cities.php",
                        type: "POST",
                        data: {
                            city: city
                        },
                        success: function(data) {
                            $("#showCity").fadeIn("fast").html(data);
                        }
                    });

                } else {
                    $("#showCity").fadeOut("fast");
                }
            });

            //show all text  
            $(document).on('click', '#showCity li', function() {
                $("#search").val($(this).text());
                $("#showCity").fadeOut("fast");
            });

            //Show data according to city 
            $("#SubBTN").on("click", function(e) {
                e.preventDefault();
                var city = $("#search").val();
                if (city == "") {
                    alert("Enter City First!")
                } else {
                    $.ajax({
                        url: "show-data.php",
                        type: "POST",
                        data: {
                            city: city
                        },
                        success: function(data) {
                            $(".loadTable").fadeIn().html(data);
                            // console.log(data);
                        }
                    });
                }
            });


        });
    </script>
</body>

</html>