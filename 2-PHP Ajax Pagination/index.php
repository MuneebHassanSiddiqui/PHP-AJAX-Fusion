<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>
<body>
    <div id="main">
        <div id="header">
            <H1>PHP & AJAX Pagination</H1>
        </div>
        <div id="table-data">
        </div>
    </div>

    <script src="JavaScript/jquery.js"></script>
    <script>
        $(document).ready(function() {
            function loadtable(page) {
                $.ajax({
                    url: 'ajax-pagination.php',
                    type: 'POST',
                    data: {
                        page_no: page
                    },
                    success: function(data) {
                        $('#table-data').html(data);
                    }
                });
            }
            loadtable(1); // Load the first page by default

            $(document).on('click', '#pagination a', function(e) {
                e.preventDefault();
                page_id = $(this).attr("id");
                loadtable(page_id);
            });
        });
    </script>
</body>
</html>