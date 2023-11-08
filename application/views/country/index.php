<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Country </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="container">

        <!-- modal start -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Add City
        </button>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">City Form</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form name="myForm" method="post" id="createCityForm" onsubmit="return addCity();">
                            <div class="mb-3">
                                <label for="name" class="form-label">Country Name</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="Enter Country Name">
                            </div>
                            <div class="mb-3">
                                <label for="roll" class="form-label">Short Country Code</label>
                                <input type="text" class="form-control" id="roll" name="sortname"
                                    placeholder="Enter Short Code">
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
                        <h5 class="modal-title" id="editModalLabel">City Form</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form name="myForm" method="post" id="updateCityForm" onsubmit="return updateCity();">
                            <div class="mb-3">
                                <label for="name" class="form-label">Country Name</label>
                                <input type="text" class="form-control" id="update_name" name="name"
                                    placeholder="Enter Country Name">
                            </div>
                            <div class="mb-3">
                                <label for="roll" class="form-label">Short Country Code</label>
                                <input type="text" class="form-control" id="update_roll" name="sortname"
                                    placeholder="Enter Short Code">
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
                    <th scope="col">Name</th>
                    <th scope="col">Short Code</th>
                    <th scope="col">Update</th>
                    <th scope="col">Delete</th>
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
            }
        });
        return false;
    }

    function update(data) {
        new bootstrap.Modal(document.getElementById('editModal')).show();
        // document.getElementById("updateCityForm").style.display="block";
        document.getElementById("update_name").value = data.name;
        document.getElementById("update_roll").value = data.sortname;
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
                new bootstrap.Modal(document.getElementById('editModal')).hide();
                // document.getElementById("updateCityForm").style.display="none";
            }
        });
        return false;
    }

    $(document).ready(function() {
        renderList();
    });
    </script>
</body>

</html>