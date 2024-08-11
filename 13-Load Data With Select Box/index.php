<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Load Data with The help of Select Box</title>
</head>

<body>

    <div class="main">
        <div class="header">
            <h1>Load Data with the Help of select Box</h1>
        </div>
        <div class="select_city">
            <form action="">
                <select id="Select-city">
                    <option value="Select City">Select City</option>
                </select>
            </form>
        </div>
        <div class="Load_table">

        </div>
        <!-- <table id="Table" style="width: 70%; margin: 0 auto; padding: 20px;" border="2px solid black" cellpadding="10px"
            cellspacing="0px">
            <tr>
                <th width="30px">Id</th>
                <th>Name</th>
                <th>Age</th>
                <th>City</th>
            </tr>
            <tr id="Table_data">
            </tr>
        </table> -->

    </div>

    <script src="JavaScript/jquery.js"></script>
    <script>
        $(document).ready(function() {
            $.ajax({
                url: "load-city.php",
                type: "POST",
                dataType: "JSON",
                success: function(data) {
                    $.each(data, function(key, value) {
                        $('#Select-city').append("<option value = '" + value.city + "'>" + value.city + "</option>");
                    });
                }

            });

            //Load Data
            $('#Select-city').change(function() {
                var city = $(this).val();
                if (city == "") {
                    $(".Load_table").html('PLease Select city First').fadeIn();
                } else {

                    $.ajax({
                        url: "Load_data.php",
                        type: "POST",
                        data: {
                            city: city
                        },
                        success: function(data) {
                            $(".Load_table").html(data);
                        }
                    });


                }
            });
        });
    </script>
</body>

</html>