<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subject</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <!-- modal start -->

        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Add Subject
        </button>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Subject Form</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form name="myForm" method="post" id="createCityForm" onsubmit="return addCity();">
                            <div class="mb-3">
                                <label for="cshort" class="form-label">Course Short Number</label>
                                <input type="number" class="form-control" id="cshort" name="cshort"
                                    placeholder="Enter Course Short">
                            </div>
                            <div class="mb-3">
                                <label for="cfull" class="form-label">Course Name</label>
                                <input type="text" class="form-control" id="cfull" name="cfull"
                                    placeholder="Enter Course Name">
                            </div>
                            <div class="mb-3">
                                <label for="sub1" class="form-label">Subject first</label>
                                <input type="text" class="form-control" id="sub1" name="sub1"
                                    placeholder="Enter Course Subject">
                            </div>
                            <div class="mb-3">
                                <label for="sub2" class="form-label">Subject second</label>
                                <input type="text" class="form-control" id="sub2" name="sub2"
                                    placeholder="Enter Course Subject">
                            </div>
                            <div class="mb-3">
                                <label for="sub3" class="form-label">Subject third</label>
                                <input type="text" class="form-control" id="sub3" name="sub3"
                                    placeholder="Enter Course Subject">
                            </div>
                            <div class="mb-3">
                                <label for="sub4" class="form-label">Subject fourth</label>
                                <input type="text" class="form-control" id="sub4" name="sub4"
                                    placeholder="Enter Course Subject">
                            </div>
                            <div class="mb-3">
                                <label for="dt_created" class="form-label">Date </label>
                                <input type="date" class="form-control" id="dt_created" name="dt_created"
                                    placeholder="Enter Date">
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
                        <h5 class="modal-title" id="editModalLabel">Subject Form</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form name="myForm" method="post" id="updateCityForm" onsubmit="return updateCity();">
                            <div class="mb-3">
                                <label for="update_cfull" class="form-label">Course Name</label>
                                <input type="text" class="form-control" id="update_cfull" name="cfull"
                                    placeholder="Enter Course Name">
                            </div>
                            <div class="mb-3">
                                <label for="update_sub1" class="form-label">Subject first</label>
                                <input type="text" class="form-control" id="update_sub1" name="sub1"
                                    placeholder="Enter Course Subject">
                            </div>
                            <div class="mb-3">
                                <label for="update_sub2" class="form-label">Subject second</label>
                                <input type="text" class="form-control" id="update_sub2" name="sub2"
                                    placeholder="Enter Course Subject">
                            </div>
                            <div class="mb-3">
                                <label for="update_sub3" class="form-label">Subject third</label>
                                <input type="text" class="form-control" id="update_sub3" name="sub3"
                                    placeholder="Enter Course Subject">
                            </div>
                            <div class="mb-3">
                                <label for="update_sub4" class="form-label">Subject fourth</label>
                                <input type="text" class="form-control" id="update_sub4" name="sub4"
                                    placeholder="Enter Course Subject">
                            </div>

                            <input type="hidden" id="update_subid" name="subid" />
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
                    <th scope="col">Sub ID</th>
                    <th scope="col">C Short</th>
                    <th scope="col">C Full</th>
                    <th scope="col">Sub 1</th>
                    <th scope="col">Sub 2</th>
                    <th scope="col">Sub 3</th>
                    <th scope="col">Sub 4</th>
                    <th scope="col">Dt Created</th>
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

    function ajax_del(subid) {
        if (confirm("Are you sure?") == false) {return}
        $.ajax({
            url: "ajax_del/" + subid,
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
        document.getElementById("update_cfull").value = data.cfull;
        document.getElementById("update_sub1").value = data.sub1;
        document.getElementById("update_sub2").value = data.sub2;
        document.getElementById("update_sub3").value = data.sub3;
        document.getElementById("update_sub4").value = data.sub4;
        document.getElementById("update_subid").value = data.subid;
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