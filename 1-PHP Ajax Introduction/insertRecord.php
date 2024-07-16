<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserted data Form</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet" />
</head>
<style>
    /* EDIT BTN*/

    .EditBtn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 10px 15px;
        background: #f5ced0;
        border: none;
        border-radius: 5px;
        color: #111;
        font-size: 22px;
        cursor: pointer;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: background-color 0.3s ease, transform 0.2s ease;
    }

    .EditBtn i {
        margin-right: 5px;
    }

    .EditBtn:hover {
        background-color: green;
    }

    .EditBtn:active {
        transform: scale(0.98);
    }

    #EditSub {
        display: inline-block;
        background-color: #4CAF50;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        font-size: 16px;
        font-weight: bold;
        cursor: pointer;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        transition: background-color 0.3s, transform 0.3s;
    }

    #EditSub:hover {
        background-color: #45a049;
    }

    #EditSub:active {
        transform: scale(0.98);
    }

    #EditSub:focus {
        outline: none;
        box-shadow: 0 0 3px 3px rgba(0, 255, 0, 0.3);
    }


    /* CLOSE BTN*/
    #closeBtn {
        background: red;
        color: white;
        width: 40px;
        font-size: 30px;
        font-weight: 900;
        height: 40px;
        line-height: 30px;
        text-align: center;
        border-radius: 50%;
        position: absolute;
        top: -15px;
        right: -10px;
        cursor: pointer;
    }


    /* MODEL BTN*/

    #model {
        background: rgba(0, 0, 0, 0.7);
        position: fixed;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        z-index: 100;
        display: none;
    }

    #modelForm {
        background: #fff;
        width: 30%;
        position: relative;
        top: 20%;
        left: calc(50% - 15%);
        padding: 15px;
        text-align: center;
        border-radius: 30px;
    }

    #modelForm h2 {
        padding-bottom: 10px;
        border-bottom: 5px solid #000;
    }

    #SearchId input {
        width: 20%;
        position: relative;
        left: 80%;
    }

    #SearchId label {
        position: relative;
        left: 80%;
    }
</style>

<body>

    <table id="main" border="0" width="100%" cellspacing="0">
        <tr>
            <td id="header">
                <h1>LECTURE # 2> INSERT DATA & REMOVE DATA WITH PHP & AJAX</h1>
                <div id="SearchId">
                    <label for="SearchId">Search:</label>
                    <input type="text" id="SearchInput" autocomplete="off">
                </div>
            </td>
        </tr>

        <tr>
            <td id="table-load">
                <form id="addData">
                    <label for="">Name</label><input type="text" id="name">
                    <label for="">Father Name</label><input type="text" id="fathername">
                    <input type="button" value="Save" id="SaveData">
                </form>
            </td>
        </tr>
        <tr>
            <td id="table-data">
            </td>
        </tr>
    </table>
    <div id="successData"></div>
    <div id="errorMsg"></div>

    <div id="model">
        <div id="modelForm">
            <h2>EDIT FORM😍</h2>
            <table width="100%">

            </table>
            <div id="closeBtn">X</div>

        </div>
    </div>
    <script src="JavaScript/jquery.js"></script>
    <script>
        $(document).ready(function() {

            //SHOW DATA CODING
            function loadData() {
                $.ajax({
                    url: 'php/load-data.php',
                    type: 'POST',
                    success: function(data) {
                        $('#table-data').html(data);
                    }
                });
            }
            loadData();
            //SAVE DATA CODING
            $('#SaveData').on('click', function(e) {

                e.preventDefault();
                var name = $('#name').val();
                var fatherName = $('#fathername').val();
                if (name == "" || fatherName == "") {
                    $('#errorMsg').html('All fields Are required').slideDown();
                    $('#successData').slideUp();
                } else {
                    $.ajax({
                        url: 'php/ajax-insert.php',
                        type: 'POST',
                        data: {
                            name: name,
                            fatherName: fatherName
                        },
                        success: function(data) {
                            if (data == 1) {
                                loadData();
                                $('#addData').trigger('reset');
                                $('#successData').html('Data inserted Successfully!').slideDown();
                                $('errorMsg').slideUp();
                            } else {
                                $('#errorMsg').html('Cannot save Record').slideDown();
                                $('#successData').slideUp();
                            }
                        }
                    });
                }
            });
            //DELETE DATA CODING
            $(document).on('click', '.DeleteData', function() {
                if (confirm('Do You really Want to delete data?')) {
                    StuId = $(this).data('id');
                    Element = this;


                    $.ajax({
                        url: 'php/Ajax-delete.php',
                        type: 'POST',
                        data: {
                            id: StuId
                        },
                        success: function(data) {
                            if (data == 1) {
                                $(Element).closest("tr").fadeOut();
                            } else {
                                $('#errorMsg').html("Can't Delete record!").slideDown();
                                $('#successData').slideUp();
                            }

                        }
                    });
                }
            });
            //OPEN MODELBOX
            $(document).on('click', '.EditBtn', function() {
                $('#model').show();
                StuIdEid = $(this).data('eid');

                $.ajax({
                    url: 'php/Ajax-EditFill.php',
                    type: 'POST',
                    data: {
                        eid: StuIdEid
                    },
                    success: function(data) {
                        $('#modelForm table').html(data);
                    }
                });
            });

            //HIDE MODELBOX
            $(document).on('click', '#closeBtn', function() {
                $('#model').hide();
            });

            //SAVE UPDATED DATA
            $(document).on('click', '#EditSub', function() {
                StudentId = $('#Editeid').val();
                StudentName = $('#FnameEdit').val();
                StudentFatherName = $('#FatherNameEdit').val();
                $.ajax({
                    url: 'php/Ajax-updated-Data.php',
                    type: 'POST',
                    data: {
                        id: StudentId,
                        first_name: StudentName,
                        father_name: StudentFatherName
                    },
                    success: function(data) {
                        if (data == 1) {
                            $('#model').hide();
                            loadData();
                        }
                    }
                });
            });

            //LIVE SEARCH DATA 
            $(document).on('keyup', '#SearchInput', function() {

                searchTerm = $(this).val();

                $.ajax({
                    url: 'php/Live_search.php',
                    type: 'POST',
                    data: {
                        search: searchTerm
                    },
                    success: function(data) {
                        $('#table-data').html(data);
                    }

                });
            });
        });
    </script>
</body>

</html>