<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Multiple Data with The Help of PHP & AJAX</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<style>
    body {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: "Courier New", Courier, monospace;
        background-color: rgb(192, 189, 186);

    }

    .delete {
        position: fixed;

        margin-bottom: 100px;
        z-index: 1000;
    }

    .table-data {
        position: relative;
        bottom: -30px;
    }

    .errorMessage {
        background: maroon;
        padding: 10px;
        position: absolute;
        display: none;
        top: 80px;
        right: 70px;
        color: white;
        font-weight: 800;
    }

    .successMessage {
        background: lightgreen;
        padding: 10px;
        display: none;
        position: absolute;
        top: 80px;
        right: 70px;
    }
</style>

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

    <div class="errorMessage">Data Delete Unsuccessfully!❌</div>
    <div class="successMessage">Data delete successfully✔</div>

    <script src="JavaScript/jquery.js"></script>
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

            $('#deleteBtn').on('click', function() {
                id = [];
                $(':checkbox:checked').each(function(key) {
                    id[key] = $(this).val();

                });
                // console.log(id)
                if (id.length === 0) {
                    $('.errorMessage').html("Please Select atleast one checkbox❌").slideDown();
                    $('.successMessage').slideUp();
                    setTimeout(function() {
                        $(".errorMessage").fadeOut();
                    }, 2000);
                } else {
                    if (confirm('Do you really want to delete!')) {
                        $.ajax({
                            url: 'delete-data.php',
                            type: 'POST',
                            data: {
                                sid: id
                            },
                            success: function(data) {
                                if (data == 1) {
                                    $('.successMessage').html("Data Delete Successfully✔").slideDown();
                                    $('.errorMessage').slideUp();
                                    setTimeout(function() {
                                        $(".successMessage").fadeOut();
                                    }, 2000);
                                    LoadData();
                                } else {
                                    $('.errorMessage').html("Can't Delete Data❌").slideDown();
                                    $('.successMessage').slideUp();
                                }
                            }
                        });
                    }
                }
            });
        });
    </script>
</body>

</html>