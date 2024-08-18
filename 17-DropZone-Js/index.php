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

    h1 {
        font-size: 2.5rem;
        text-align: center;
        background: linear-gradient(45deg, #5372F0, #FF6F61);
        -webkit-background-clip: text;
        color: transparent;
        padding: 15px;
        margin-bottom: 30px;
        text-transform: uppercase;
        letter-spacing: 2px;
        font-weight: bold;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        transition: all 0.3s ease-in-out;
    }

    h1:hover {
        transform: scale(1.05);
    }

    .imagesupload {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 20px;
        background-color: #f3f4f6;
        border-radius: 10px;
        border: 2px dashed #5372f0;
        width: 100%;
        max-width: 50%;
        margin: 0 auto;
        transition: border-color 0.3s ease;
    }
    .dropzone {
        background-color: #ffffff;
        padding: 30px;
        border-radius: 8px;
        width: 100%;
        max-width: 900px;
        text-align: center;
        font-family: 'Open Sans', sans-serif;
        color: #3d3d3d;
        font-size: 18px;
        font-weight: 500;
        cursor: pointer;
        transition: background-color 0.3s ease;
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
                    setTimeout(function() {
                        $(".success-message").html("Image Upload Successfully!✔").slideUp();
                    }, 2000)
                } else {
                    $(".error-message").html("Image not upload❌").slideDown();
                    setTimeout(function() {
                        $(".error-message").html("Image not upload❌").slideUp();
                    }, 2000)
                }
            }
        });
        $("#Upload_btn").click(function() {
            myDropzone.processQueue();
        });
    </script>


</body>

</html>