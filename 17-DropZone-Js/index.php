<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone-min.js"></script>
    <link href="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone.css" rel="stylesheet" type="text/css" />
    <title>DropZone Js - Drag & Drop Images</title>
</head>
<style>
    .success-message {
        padding: 20px;
        position: absolute;
        border-radius: 10px;
        background: rgb(190, 237, 190);
        right: 5%;
        display: none;
    }

    .error-message {
        padding: 20px;
        position: absolute;
        border-radius: 10px;
        background: pink;
        right: 5%;
        display: none;
    }
</style>

<body>
    <h1>DropZone Js - Drag & Drop Images</h1>
    <div class="imagesupload">
        <form id="submitGroup" class="dropzone">
        </form>
    </div>
    <br><br>
    <button id="Upload_btn">Upload</button>
    </div>
    <div class="success-message"></div>
    <div class="error-message"></div>



    <script src="https://code.jquery.com/jquery-latest.min.js"></script>
    <script>
        let myDropzone = new Dropzone("#submitGroup", {
            url: "uploadimg.php",
            parallelUploads: 3,
            uploadMultiple: true,
            acceptedFiles: ".png,.jpeg,.jpg",
            autoProcessQueue: false,
            success: function(file, response) {
                if (response == 'true') {
                    $(".success-message").html("Image Upload Successfully!✔").slideDown();
                } else {
                    $(".error-message").html("Image Not Upload Successfully!❌").slideDown();
                }
            }
        });
        $("#Upload_btn").click(function() {
            myDropzone.processQueue();
        });
    </script>


</body>

</html>