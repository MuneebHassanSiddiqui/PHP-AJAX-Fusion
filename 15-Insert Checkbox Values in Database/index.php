<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Programming Languages Form</title>
    <link rel="stylesheet" href="style.css">

</head>

<body>

    <div class="form-container">
        <h1>Select Programming Languages</h1>
        <form action="#" id="langForm" method="POST">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" placeholder="Enter your name">
            </div>

            <div class="checkbox-group">
                <label><input type="checkbox" class="lang" name="languages[]" value="JavaScript">JavaScript</label>
                <label><input type="checkbox" class="lang" name="languages[]" value="Python">Python</label>
                <label><input type="checkbox" class="lang" name="languages[]" value="Java">Java</label>
                <label><input type="checkbox" class="lang" name="languages[]" value="C#">C#</label>
                <label><input type="checkbox" class="lang" name="languages[]" value="PHP">PHP</label>
                <label><input type="checkbox" class="lang" name="languages[]" value="C++">C++</label>
                <label><input type="checkbox" class="lang" name="languages[]" value="Ruby">Ruby</label>
                <label><input type="checkbox" class="lang" name="languages[]" value="Swift">Swift</label>
                <label><input type="checkbox" class="lang" name="languages[]" value="Go">Go</label>
            </div>

            <input type="submit" value="Submit">
        </form>
    </div>

    <script src="JavaScript/jquery.js"></script>
    <script>
        $(document).ready(function() {
            $("#langForm").submit(function(e) {
                e.preventDefault();

                var FName = $("#name").val();
                var languages = [];
                $('.lang').each(function() {
                    if ($(this).is(":checked")) {
                        languages.push($(this).val());
                    }
                });
                languages = languages.toString();

                if (FName !== "" && languages.length !== 0) {
                    $.ajax({
                        url: 'Save-Lang.php',
                        type: 'POST',
                        data: {
                            name: FName,
                            lang: languages
                        },
                        success: function(data) {
                            if (data == 1) {
                                $("#langForm").trigger('reset');
                                alert('Data submit successfully');
                            } else {
                                alert("data not Submit!");
                            }
                        }
                    });

                } else {
                    alert("Please Fill the required Form Feilds!");
                }
            });

        });
    </script>
</body>

</html>