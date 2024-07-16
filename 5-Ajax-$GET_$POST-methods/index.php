<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>
<style>
    .response-box {
        max-width: 600px;
        margin: 20px auto;
        padding: 15px;
        border-radius: 8px;
        font-size: 16px;
        display: none;
    }

    .response-box.success {
        background-color: #e7f4e4;
        color: #2e7d32;
        border: 1px solid #2e7d32;
    }

    .response-box.error {
        background-color: #fbe2e5;
        color: #c62828;
        border: 1px solid #c62828;
    }

    .advanced-form button[type="button"] {
        background-color: #4caf50;
        color: #fff;
        padding: 15px 30px;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        font-size: 18px;
        font-weight: bold;
        margin-top: 20px;
        margin-bottom: 10px;
        transition: background-color 0.3s, transform 0.1s;
    }
</style>

<body>
    <form class="advanced-form">
        <h2>Submit Your Details</h2>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" id="name" name="name">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" id="email" name="email">
        </div>
        <div class="form-group">
            <label for="message">Message</label>
            <textarea id="message" name="message"></textarea>
        </div>
        <div class="form-group">
            <label for="city">City</label>
            <select id="city" name="city">
                <option value="karachi">Karachi</option>
                <option value="lahore">Lahore</option>
                <option value="islamabad">Islamabad</option>
            </select>
        </div>
        <div class="form-group">
            <button type="button" id="EditSub">Save</button>
        </div>
        <div class="response-box" id="responseBox"></div>
    </form>
    <script src="JavaScript/jquery.js"></script>
    <script>
        $(document).ready(function() {
            $('#EditSub').click(function() {
                Name = $('#name').val();
                Email = $('#email').val();
                message = $('#message').val();
                if (Name == "" || Email == "" || message == "") {
                    $('.response-box').fadeIn().addClass('error');
                    $('.response-box').html("Please Fill Full form!");
                } else {
                    $.get(
                        "save-data.php",
                        $('.advanced-form').serialize(),
                        function(data) {
                            if (data == 1) {
                                $('.response-box').fadeIn().addClass('success');
                                $('.response-box ').html("Welcome your form submit!");
                                $('.advanced-form').trigger('reset');
                                setTimeout(function() {
                                    $('.response-box').fadeOut().addClass('success');

                                }, 3000);
                            } else {
                                alert('Fall you!');
                            }
                        }
                    );

                }
            });
        });
    </script>
</body>

</html>