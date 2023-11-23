<?php include "inc/header.php" ?>
<?php include "inc/sidebar.php" ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Subject Table Data</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="../dashboard">Home</a></li>
                        <li class="breadcrumb-item active">Subject</li>
                    </ol>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- table start -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">DataTable with minimal features & hover style</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="container">
                                <!-- modal start -->

                                <button type="button" class="btn btn-default" data-toggle="modal"
                                    data-target="#exampleModal">Add Subject</button>
                                <div class="modal fade" id="exampleModal">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Country Form</h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form name="myForm" method="post" id="createCityForm"
                                                    onsubmit="return addCity();">
                                                    <div class="mb-3">
                                                        <label for="cshort" class="form-label">Course Short
                                                            Number</label>
                                                        <input type="number" class="form-control" id="cshort"
                                                            name="cshort" placeholder="Enter Course Short" />
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="cfull" class="form-label">Course Name</label>
                                                        <input type="text" class="form-control" id="cfull" name="cfull"
                                                            placeholder="Enter Course Name" />
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="sub1" class="form-label">Subject first</label>
                                                        <input type="text" class="form-control" id="sub1" name="sub1"
                                                            placeholder="Enter Course Subject" />
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="sub2" class="form-label">Subject second</label>
                                                        <input type="text" class="form-control" id="sub2" name="sub2"
                                                            placeholder="Enter Course Subject" />
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="sub3" class="form-label">Subject third</label>
                                                        <input type="text" class="form-control" id="sub3" name="sub3"
                                                            placeholder="Enter Course Subject" />
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="sub4" class="form-label">Subject fourth</label>
                                                        <input type="text" class="form-control" id="sub4" name="sub4"
                                                            placeholder="Enter Course Subject" />
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="dt_created" class="form-label">Date </label>
                                                        <input type="date" class="form-control" id="dt_created"
                                                            name="dt_created" placeholder="Enter Date" />
                                                    </div>
                                                    <button type="submit" name="submit"
                                                        class="btn btn-primary">Submit</button>
                                                </form>
                                            </div>
                                            <div class="modal-footer justify-content-right">
                                                <button type="button" class="btn btn-default"
                                                    data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                                <!-- /.modal -->

                                <!-- Update modal start -->

                                <div class="modal fade" id="editModal">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Country Form</h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form name="myForm" method="post" id="updateCityForm"
                                                    onsubmit="return updateCity();">
                                                    <div class="mb-3">
                                                        <label for="update_cfull" class="form-label">Course Name</label>
                                                        <input type="text" class="form-control" id="update_cfull"
                                                            name="cfull" placeholder="Enter Course Name" />
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="update_sub1" class="form-label">Subject
                                                            first</label>
                                                        <input type="text" class="form-control" id="update_sub1"
                                                            name="sub1" placeholder="Enter Course Subject" />
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="update_sub2" class="form-label">Subject
                                                            second</label>
                                                        <input type="text" class="form-control" id="update_sub2"
                                                            name="sub2" placeholder="Enter Course Subject" />
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="update_sub3" class="form-label">Subject
                                                            third</label>
                                                        <input type="text" class="form-control" id="update_sub3"
                                                            name="sub3" placeholder="Enter Course Subject" />
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="update_sub4" class="form-label">Subject
                                                            fourth</label>
                                                        <input type="text" class="form-control" id="update_sub4"
                                                            name="sub4" placeholder="Enter Course Subject" />
                                                    </div>

                                                    <input type="hidden" id="update_subid" name="subid" />
                                                    <button type="submit" name="submit"
                                                        class="btn btn-primary">Submit</button>
                                                </form>
                                            </div>
                                            <div class="modal-footer justify-content-right">
                                                <button type="button" class="btn btn-default"
                                                    data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                                <!-- /.modal -->




                                <table id="example2" class="table table-bordered table-hover">
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
                                    <tbody id="records"></tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- table end -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!-- script  -->
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous"></script>
<script>
function renderList() {
    $.ajax({
        url: "<?php echo base_url("/subject/ajax_records"); ?>",
        success: function(result) {
            result = JSON.parse(result);
            var recordHTML = "";
            result.records.forEach(function(row) {
                recordHTML += `<tr>
                            <td>${row.subid}</td>
                            <td>${row.cshort}</td>
                            <td>${row.cfull}</td>
                            <td>${row.sub1}</td>
                            <td>${row.sub2}</td>
                            <td>${row.sub3}</td>
                            <td>${row.sub4}</td>
                            <td>${row.dt_created}</td>
                            <td>${row.update_date}</td>
                            <td><a onclick='update(${JSON.stringify(row)})' class="btn btn-primary">Update</a></td>
                            <td><a onclick='ajax_del(${row.subid})' class="btn btn-danger">Delete</a></td>
                        </tr>`;
            });
            $("#records").html(recordHTML);
        }
    });
}


function ajax_del(id) {
    if (confirm("Are you sure?") == false) {
        return
    }
    $.ajax({
        url: "<?php echo base_url("/subject/ajax_del/"); ?>" + id,
        success: function(result) {
            renderList();
        }
    });
}

function addCity() {
        var formdata = $("#createCityForm").serialize();
        $.ajax({
            type: "POST",
            url: "<?php echo base_url("/subject/ajax_create"); ?>",
            data: formdata,
            success: function(result) {
                result = JSON.parse(result);
                if (result.status == true) {
                    renderList();
                    document.getElementById("createCityForm").reset();
                    $("#exampleModal").modal('hide');
                    // add_modal.hide();
                } else {
                    alert(result.msg);
                }
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
        url: "<?php echo base_url("/subject/ajax_update"); ?>",
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
<!-- script -->
<?php include "inc/footer.php" ?>