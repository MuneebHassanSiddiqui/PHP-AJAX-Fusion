<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet" />
    <title>JavaScript Fetch Method</title>
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }

        .errorMessage,
        .successMessage {
            width: 100%;
            padding: 15px;
            margin-top: 10px;
            border-radius: 5px;
            font-size: 1.1rem;
            text-align: center;
            font-weight: bold;
            display: none;
        }

        .errorMessage {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        .successMessage {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        h1 {
            font-size: 2.5rem;
            text-align: center;
            background: linear-gradient(45deg, #5372f0, #ff6f61);
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

        .main {
            max-width: 900px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        #New_Record_btn {
            display: block;
            width: 100%;
            margin-top: 10px;
        }

        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }

        th,
        td {
            text-align: left;
            padding: 12px;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #5372f0;
            color: white;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .modal-content {
            border-radius: 10px;
        }

        #editBtn,
        #deleteBtn {
            background-color: #5372f0;
            border: none;
            color: white;
            padding: 8px 12px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s ease-in-out;
            margin-right: 5px;
        }

        #deleteBtn {
            background-color: #ff6f61;
        }

        #editBtn:hover {
            background-color: #3d56b2;
        }

        #deleteBtn:hover {
            background-color: #e14b42;
        }

        #editBtn i,
        #deleteBtn i {
            margin-right: 4px;
        }

        #editBtn:focus,
        #deleteBtn:focus {
            outline: none;
            box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.2);
        }

        .modal-header,
        .modal-footer {
            border: none;
        }

        .form-control {
            border-radius: 5px;
        }

        .btn-primary {
            background-color: #5372f0;
            border: none;
            transition: background-color 0.3s ease-in-out;
        }

        .btn-primary:hover {
            background-color: #3d56b2;
        }

        div::-webkit-scrollbar {
            display: none;
            /* for Chrome, Safari, and Opera */
        }
    </style>
</head>

<body>
    <h1>JavaScript Fetch Method</h1>
    <div class="main">
        <input type="search" name="Search" id="search_data" class="form-control mb-3" placeholder="Search records...">
        <button id="New_Record_btn" class="btn btn-primary" onclick="addNewRecord()" data-bs-toggle="modal" data-bs-target="#addRecordModal">Add
            New Record</button>

        <div id="loadTable" style="overflow-y: auto; height: 300px;">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Class</th>
                        <th>Address</th>
                        <th>Phone Number</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="tbody">

                </tbody>
            </table>
        </div>
    </div>
    <div class="errorMessage" id="errorMessage"></div>
    <div class="successMessage" id="successMessage"></div>

    <!-- Add Record Modal -->
    <div class="modal fade" id="addRecordModal" tabindex="-1" aria-labelledby="addRecordModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addRecordModalLabel">Add New Record</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="recordForm">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="class" class="form-label" id="class">Class</label>
                            <select class="form-control" id="class-list" name="class" required>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" class="form-control" id="address" name="address" required>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone Number</label>
                            <input type="text" class="form-control" id="phone" name="phone" required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="new_submit" onclick="submitNewRecord()">Save Record</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Record Modal -->
    <div class="modal fade" id="editRecordModal" tabindex="-1" aria-labelledby="editRecordModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editRecordModalLabel">Edit Record</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editForm">
                        <div class="mb-3">
                            <label for="edit_name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="edit_name" name="name" required>
                            <input type="text" name="id" id="editFrom" hidden>
                        </div>
                        <div class="mb-3">
                            <label for="class" class="form-label">Class</label>
                            <select class="form-control" id="edit-class" name="class" required>
                                <option value="" disabled selected>Select Class</option>

                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="edit_address" class="form-label">Address</label>
                            <input type="text" class="form-control" id="edit_address" name="address" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit_phone" class="form-label">Phone Number</label>
                            <input type="text" class="form-control" id="edit_phone" name="phone" required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" onclick="updateRecord()">Update Record</button>
                </div>
            </div>
        </div>
    </div>
    <script src="js/fetch_data.js"></script>
</body>

</html>