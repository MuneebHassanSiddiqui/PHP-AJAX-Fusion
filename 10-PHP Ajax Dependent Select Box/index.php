<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select Box UI</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="container">
        <h1>Select Country and State</h1>
        <form id="location-form">
            <div class="select-wrapper">
                <label for="country">Country:</label>
                <select id="country" name="country">
                    <option value="">Select Country</option>

                </select>
            </div>
            <div class="select-wrapper">
                <label for="state">State:</label>
                <select id="state" name="state">
                </select>
            </div>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-latest.min.js"></script>
    <script>
        $(document).ready(function() {
            function LoadCountry(type, category_id) {
                $.ajax({
                    url: "Load-country.php",
                    data: {
                        type: type,
                        id: category_id
                    },
                    type: "POST",
                    success: function(country) {
                        if (type == "State") {
                            $("#state").html(country);
                        } else {
                            $("#country").append(country);
                        }
                    }
                });
            }
            LoadCountry();
            $("#country").on('change', function() {
                var countryV = $("#country").val();
                if (countryV != "") {
                    LoadCountry("State", countryV);
                } else {
                    $("#state").html("");
                }
            })

        });
    </script>

</body>

</html>