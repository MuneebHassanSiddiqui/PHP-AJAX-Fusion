<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="main">
        <div class="header">
            <h1>Delete Multiple Data with The Help of PHP & AJAX</h1>
        </div>
        <div class="delete">

            <button id="deleteBtn">Delete</button>
        </div>
        <div class="table-data">

        </div>
    </div>

    <div class="errorMessage"></div>
    <div class="successMessage"></div>

    <script src="https://code.jquery.com/jquery-latest.min.js"></script>
    <script>
        $(document).ready(function() {
            function LoadData() {
                $.ajax({
                    url: "loadData.php",
                    type: "POST",
                    success: function(data) {
                        $(".table-data").html(data)
                    }
                });
            }
            LoadData();



        });
    </script>
</body>

</html>