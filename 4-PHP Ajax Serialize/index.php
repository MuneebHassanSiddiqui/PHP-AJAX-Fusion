<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<style>
    .response {
        background-color: #f8d7da;
        color: #721c24;
        display: none;
        border: 1px solid #f5c6cb;
        padding: 15px;
        border-radius: 5px;
        margin: 20px 0;
        font-size: 14px;
        font-family: Arial, sans-serif;
        position: relative;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        width: 100%;
        box-sizing: border-box;
    }

    .success {
        background-color: #d1f1b5;
        color: #000000;
        display: none;
        border: 1px solid #89d864;
        padding: 15px;
        border-radius: 5px;
        margin: 20px 0;
        font-size: 14px;
        font-family: Arial, sans-serif;
        position: relative;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        width: 100%;
        box-sizing: border-box;
    }
</style>

<body>
    <div class="main">
        <div class="header">
            <h1>PHP Ajax Serialize Form Data</h1>
        </div>
        <form class="Ajax_call">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control">
            </div>
            <div class="form-group">
                <label for="father-name">Father Name</label>
                <input type="text" name="fname" id="father-name" class="form-control">
            </div>
            <div class="form-group">
                <label>Gender</label>
                <div class="radio-group">
                    <input type="radio" id="male" name="gender" value="male">
                    <label for="male">Male</label>
                    <input type="radio" id="female" name="gender" value="female">
                    <label for="female">Female</label>
                </div>
            </div>
            <div class="form-group">
                <label for="country">Country</label>
                <select id="country" name="country" class="form-control">
                    <option value="pk">Pakistan</option>
                    <option value="ind">India</option>
                    <option value="nep">Nepal</option>
                    <option value="bag">Bangladesh</option>
                </select>
            </div>
            <input type="button" name="submit" id="savebtn" value="Save Data">
        </form>
        <div class="response"></div>
    </div>


    <script src="JavaScript/jquery.js"></script>
    <script>
        $(document).ready(function() {
            $("#savebtn").click(function() {
                Name = $("#name").val();
                FatherName = $("#father-name").val();
                if (Name == "" || FatherName == "" || !$('input:radio[name=gender]').is(':checked')) {
                    $(".response").fadeIn().html("Please Fill all Feilds");
                    setTimeout(function() {
                        $(".response").fadeOut();
                    }, 3000)
                } else {
                    $.ajax({
                        url: 'Sava-data.php',
                        type: 'POST',
                        data: $('.Ajax_call').serialize(),
                        beforeSend: function() {
                            $(".response").addClass("success").fadeIn().html("Wait For submiting the data!");
                        },
                        success: function(data) {
                            $(".response").addClass('success').fadeIn().html(data);
                            $('.Ajax_call').trigger("reset");
                            setTimeout(function() {
                                $(".response").addClass('success').fadeOut();
                            }, 4000);
                        },
                    });
                }
            });
        });
    </script>
</body>

</html>