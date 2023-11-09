<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <!-- modal start -->

        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Add Course
        </button>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Course Form</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form name="myForm" method="post" id="createCityForm" onsubmit="return addCity();">
                            <div class="mb-3">
                                <label for="cshort" class="form-label">Course Short</label>
                                <input type="text" class="form-control" id="cshort" name="cshort"
                                    placeholder="Enter Course Short">
                            </div>
                            <div class="mb-3">
                                <label for="cfull" class="form-label">Course Name</label>
                                <input type="text" class="form-control" id="cfull" name="cfull"
                                    placeholder="Enter Course Name">
                            </div>
                            <div class="mb-3">
                                <label for="cdate" class="form-label">Subject date</label>
                                <input type="date" class="form-control" id="cdate" name="cdate"
                                    placeholder="Enter Subject date">
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

        <!-- Update modal start -->
        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Course Form</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form name="myForm" method="post" id="updateCityForm" onsubmit="return updateCity();">
                            <div class="mb-3">
                                <label for="update_cshort" class="form-label">Course Short</label>
                                <input type="text" class="form-control" id="update_cshort" name="cshort"
                                    placeholder="Enter Course Short">
                            </div>
                            <div class="mb-3">
                                <label for="update_cfull" class="form-label">Course Name</label>
                                <input type="text" class="form-control" id="update_cfull" name="cfull"
                                    placeholder="Enter Course Name">
                            </div>
                            <div class="mb-3">
                                <label for="update_cdate" class="form-label">Subject date</label>
                                <input type="text" class="form-control" id="update_cdate" name="cdate"
                                    placeholder="Enter Subject date">
                            </div>
                            <div class="mb-3">
                                <label for="update_update_date" class="form-label">Update date</label>
                                <input type="date" class="form-control" id="update_update_date" name="update_date"
                                    placeholder="Enter Update date">
                            </div>
                            <input type="hidden" id="update_cid" name="cid" />
                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Update modal end -->





        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Course ID</th>
                    <th scope="col">C Short</th>
                    <th scope="col">C Full</th>
                    <th scope="col">Course Date</th>
                    <th scope="col">Update date</th>
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

    function ajax_del(cid) {
        $.ajax({
            url: "ajax_del/" + cid,
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
        document.getElementById("update_cshort").value = data.cshort;
        document.getElementById("update_cfull").value = data.cfull;
        document.getElementById("update_cdate").value = data.cdate;
        document.getElementById("update_update_date").value = data.update_date;
        document.getElementById("update_cid").value = data.cid;
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