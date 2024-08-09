<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<style>
    .preview #deleteBtn {
        background: #db2f2f;
        color: #fff;
        position: relative;
        bottom: 10px;
        border: none;
        border-radius: 5px;
        padding: 10px 20px;
        cursor: pointer;
        transition: background 0.3s;
    }

    .preview #deleteBtn:hover {
        background: #fe9b94;
    }
</style>

<body>
    <h1>Images Upload & Remove</h1>
    <div class="imagesupload">
        <form id="submitGroup">
            Select Images : <input type="file" id="File_uploaded" name="file">
            <span class="helpBox">Allowed File Type - Jpeg, jpg, png, gif</span>
            <br>
            <input type="submit" value="uploaded">
        </form>
    </div>
    <div class="prePhoto">
        <H1>Check Your uploaded Images Here</H1>
        <div class="preview">
            <!-- <img src='' alt=''>
            <input type='submit' value='delete'> -->
        </div>
    </div>

    <script src="JavaScript/jquery.js"></script>
    <script>
        $(document).ready(function() {
            $("#submitGroup").on('submit', function(e) {
                e.preventDefault();

                var formData = new FormData(this);

                $.ajax({
                    url: "Upload.php",
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        $(".prePhoto").show();
                        $(".preview").html(data);
                        $('#File_uploaded').val('');
                    }
                });
            })
            //Delete button
            $(document).on("click", "#deleteBtn", function() {
                var path = $("#deleteBtn").data('path');

                $.ajax({
                    url: "Delete.php",
                    type: "POST",
                    data: {
                        path: path
                    },
                    success: function(data) {
                        if (data != "") {
                            $(".prePhoto").hide();
                            $(".preview").html('');
                        }
                    }

                });
            })
        });
    </script>
</body>

</html>