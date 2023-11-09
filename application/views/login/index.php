<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <!-- modal start -->

        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Add Login
        </button>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Login Form</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form name="myForm" method="post" id="createCityForm" onsubmit="return addCity();">
                            <div class="mb-3">
                                <label for="FullName" class="form-label">Full Name</label>
                                <input type="text" class="form-control" id="FullName" name="FullName"
                                    placeholder="Enter Full Name">
                            </div>
                            <div class="mb-3">
                                <label for="AdminEmail" class="form-label">Email</label>
                                <input type="email" class="form-control" id="AdminEmail" name="AdminEmail"
                                    placeholder="Enter Email">
                            </div>
                            <div class="mb-3">
                                <label for="loginid" class="form-label">Username</label>
                                <input type="text" class="form-control" id="loginid" name="loginid"
                                    placeholder="Enter Username">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="Enter Password">
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>

                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- modal end -->

        <!-- modal start -->
        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Login Form</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form name="myForm" method="post" id="updateCityForm" onsubmit="return updateCity();">
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="update_FullName" name="FullName"
                                    placeholder="Enter FullName Name">
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Email</label>
                                <input type="email" class="form-control" id="update_AdminEmail" name="AdminEmail"
                                    placeholder="Enter Email">
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Username</label>
                                <input type="text" class="form-control" id="update_loginid" name="loginid"
                                    placeholder="Enter Username">
                            </div>
                            <div class="mb-3">
                                <label for="roll" class="form-label">Password</label>
                                <input type="password" class="form-control" id="update_password" name="password"
                                    placeholder="Enter Password">
                            </div>
                            <input type="hidden" id="update_id" name="id" />
                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- modal end -->




        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Full Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Username</th>
                    <th scope="col">Password</th>
                </tr>
            </thead>
            <tbody id="records">
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script>
    function renderList() {
        $.ajax({
            url: "ajax_records",
            success: function(result) {
                $("#records").html(result);
            }
        });
    }

    function ajax_del(id) {
        $.ajax({
            url: "ajax_del/" + id,
            success: function(result) {
                renderList();
            }
        });
    }

    function addCity() {
        var formdata = $("#createCityForm").serialize();
        $.ajax({
            type: "POST",
            url: "ajax_create",
            data: formdata,
            success: function(result) {
                renderList();
                document.getElementById("createCityForm").reset();
                add_modal.hide();
            }
        });
        return false;
    }


    function update(data) {
        edit_modal.show();
        // document.getElementById("updateCityForm").style.display="block";
        document.getElementById("update_FullName").value = data.FullName;
        document.getElementById("update_AdminEmail").value = data.AdminEmail;
        document.getElementById("update_loginid").value = data.loginid;
        document.getElementById("update_password").value = data.password;
        document.getElementById("update_id").value = data.id;
    }

    function updateCity() {
        var formdata = $("#updateCityForm").serialize();
        $.ajax({
            type: "POST",
            url: "ajax_update",
            data: formdata,
            success: function(result) {
                renderList();
                edit_modal.hide();
                // document.getElementById("updateCityForm").style.display="none";
            }
        });
        return false;
    }
    var add_modal = null;
    var edit_modal = null;
    $(document).ready(function() {
        renderList();
        add_modal = new bootstrap.Modal(document.getElementById('exampleModal'));
        edit_modal = new bootstrap.Modal(document.getElementById('editModal'));
    });
    </script>
</body>

</html>