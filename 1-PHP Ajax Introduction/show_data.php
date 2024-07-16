<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Data</title>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet" />
</head>
<style>
    body {
        font-family: 'Courier New', Courier, monospace;
        display: flex;
        justify-content: center;
        margin: 0;
    }

    h1 {
        text-align: center;
        width: 100%;
        background: pink;
    }

    .DeleteData {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 10px 15px;
        background-color: #ff6b6b;
        border: none;
        border-radius: 5px;
        color: #fff;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s ease, transform 0.2s ease;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .DeleteData:hover {
        background-color: #ff4747;
    }

    .DeleteData:active {
        transform: scale(0.95);
    }

    .DeleteData i {
        margin-right: 5px;
        font-size: 18px;
    }

    #Load-Button {
        background-color: #15171a;
        color: white;
        border: none;
        padding: 10px 20px;
        font-size: 16px;
        display: block;
        margin: 20px auto;
        font-weight: bold;
        border-radius: 5px;
        cursor: pointer;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        transition: background-color 0.3s, transform 0.3s;
    }

    #Load-Button:hover {
        background-color: #2c343d;
        transform: scale(1.05);
    }

    #Load-Button:active {
        background-color: #0b1e34;
        transform: scale(0.95);
    }
</style>

<body>
    <table id="main" border="0" width="100%" cellspacing="0">
        <tr>
            <td id="header">
                <h1>LECTURE # 1> PHP WITH AJAX</h1>
            </td>
        </tr>
        <td id="table-load">
            <input type="button" value="Load-Button" id="Load-Button">
        </td>
        <tr>
            <td id="table-data">

            </td>
        </tr>
    </table>

    <script src="JavaScript/jquery.js"></script>
    <script>
        $(document).ready(function() {
            $('#table-load').on("click", function(e) {
                $.ajax({
                    url: 'php/load-data.php',
                    type: 'POST',
                    success: function(data) {
                        $('#table-data').html(data);
                    }
                });
            });
        });
    </script>
</body>

</html>