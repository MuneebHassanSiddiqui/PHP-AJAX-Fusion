
//Fetch All Data
function FetchData() {
    fetch("php/read_data.php").
        then((response) => response.json()).then((data) => {
            var tbody = document.getElementById('tbody');
            if (data['empty']) {
                tbody.innerHTML = "<tr><td colspan='6' align='center'><h3>No Record Found!</h3></td></tbody>";
            } else {
                var tr = '';
                for (var i in data) {
                    tr += `<tr>
                            <td>${data[i].sid}</td>
                            <td>${data[i].sname}</td>
                            <td>${data[i].cname}</td>
                            <td>${data[i].saddress}</td>
                            <td>${data[i].sphone}</td>
                            <td>
                                <button id="editBtn" onclick="editBtn(${data[i].sid})" class="btn btn-outline-primary" data-bs-toggle="modal"
                                    data-bs-target="#editRecordModal">
                                    <i class="ri-edit-2-fill"></i>
                                </button>
                                <button id="deleteBtn"  onclick="deleteBtn(${data[i].sid})" class="btn btn-outline-danger">
                                    <i class="ri-delete-bin-5-line"></i>
                                </button>
                            </td>
                        </tr>`;
                }
                tbody.innerHTML = tr;
            }
        })
        .catch((error) => {
            show_message("error", "Can't Fetch Data❌")
        })
}
//FETCH CLASS LIST
function addNewRecord() {
    fetch("php/Fetch_classes.php").
        then((response) => response.json()).
        then((data) => {
            var select = document.getElementById('class-list');
            var option = "<option value='0'; disabled selected>select class</option>";
            for (var i = 0; i < data.length; i++) {
                option += `<option value='${data[i].cid}'; >${data[i].cname}</option>`;
            }
            select.innerHTML = option;
        })
        .catch((error) => {
            show_message("error", "Can't Fetch Classes❌")
        })

}
//Submit new Record
function submitNewRecord() {
    var name = document.getElementById('name').value;
    var sclass = document.getElementById('class-list').value;
    var sphone = document.getElementById('phone').value;
    var saddress = document.getElementById('address').value;

    if (name == '' || sclass == '0' || sphone == '' || saddress == '') {
        alert("please Fill All Information");
        return false();
    } else {
        var formdata = {
            name: name,
            class: sclass,
            phone: sphone,
            address: saddress
        };
        json = JSON.stringify(formdata);
        fetch("php/new_record.php", {
            method: 'POST',
            body: json,
            headers: {
                'Content-type': 'application/json',
            },

        }).then((response) => response.json()).then((result) => {
            if (result.insert == "success") {
                FetchData();
                hideModal();
                show_message('success', 'Data Inserted Successfully!');
                document.getElementById('recordForm').reset();
            } else {
                show_message('error', "Data can't inserted!");
                hideModal();
            }
        })
            .catch((error) => {
                show_message("error", "Can't Insert Data❌")
            })
    }
}
//Edit reord 
function editBtn(id) {
    fetch("php/Fetch_edit.php?EditId=" + id, {
        method: "PUT",
        body: JSON,
        headers: {
            'Content-type': 'application/json',
        },
    }).
        then((response) => response.json())
        .then((data) => {
            var option = '';
            for (var i in data['response']) {
                document.getElementById('editFrom').value = data['response'][i].sid;
                document.getElementById('edit_name').value = data['response'][i].sname;
                document.getElementById('edit_address').value = data['response'][i].saddress;
                document.getElementById('edit_phone').value = data['response'][i].sphone;
                for (var j in data['class']) {
                    var selected = data['class'][j].cid == data['response'][i].sclass ? 'selected' : '';
                    option += `<option ${selected} value="${data['class'][j].cid}">${data['class'][j].cname}</option>`;
                }
            }
            document.getElementById('edit-class').innerHTML = option;


        })
        .catch((error) => {
            show_message("error", "Can't Fetch Data❌")
        })

}
//Modify Data
function updateRecord() {
    let id = document.getElementById('editFrom').value;
    let EName = document.getElementById('edit_name').value;
    let EAdress = document.getElementById('edit_address').value;
    let EClass = document.getElementById('edit-class').value;
    let EPhone = document.getElementById('edit_phone').value;

    if (EName == '' || EAdress == '' || EClass == '0' || EPhone == '') {
        alert('please Fill all Field✔')
        return false;
    } else {
        let formdata = {
            id: id,
            name: EName,
            Adress: EAdress,
            class: EClass,
            phone: EPhone
        };
        let json = JSON.stringify(formdata);

        fetch('php/Modify_data.php', {
            method: 'POST',
            body: json,
            headers: {
                'Content-type': 'application/json',
            }
        })
            .then((response) => response.json())
            .then((data) => {
                if (data.insert == 'success') {
                    FetchData();
                    hideModalE();
                    show_message('success', 'Data Updated Successfully!');
                } else {
                    show_message('error', 'Data Cant Updated!');
                }
            })
            .catch((error) => {
                show_message("error", "Can't Fetch Data❌")
            });
    }
}
//Show messages
function show_message(type, text) {
    if (type == "error") {
        var messsage_box = document.getElementById('errorMessage');
    } else {
        var messsage_box = document.getElementById('successMessage');
    }
    messsage_box.innerHTML = text;
    messsage_box.style.display = "block";
    setTimeout(function () {

        messsage_box.style.display = "none";
    }, 2000);
}
//Hide Modal
function hideModal() {
    bootstrap.Modal.getInstance('#addRecordModal').hide();
    // var editRecordModal = new bootstrap.Modal(document.getElementById('editRecordModal'));
    // editRecordModal.hide();
}
//Delete Record 
function deleteBtn(id) {
    if (confirm('Are You really want to delete!')) {
        fetch(`php/delete_fetch.php?dId=${id}`, {
            method: 'DELETE'
        })
            .then((response) => response.json())
            .then((result) => {
                if (result.delete == 'success') {
                    FetchData();
                    show_message('success', 'Record Delete Successfully✔')
                } else {
                    show_message('error', 'Record Not delete❌')
                }
            }).catch((error) => {
                show_message('error', 'Record Not delete❌');
            })
    }
}


function hideModalE() {
    var editRecordModal = bootstrap.Modal.getInstance(document.getElementById('editRecordModal'));
    editRecordModal.hide();
}



addNewRecord();
FetchData();