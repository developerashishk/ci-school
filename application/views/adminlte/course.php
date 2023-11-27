<?php include "inc/header.php" ?>
<?php include "inc/sidebar.php" ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Course Table Data</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="../dashboard">Home</a></li>
                        <li class="breadcrumb-item active">Course</li>
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
                                    data-target="#exampleModal">Add Course</button>
                                <div class="modal fade" id="exampleModal">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Course Form</h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form name="myForm" method="post" id="createCityForm"
                                                    onsubmit="return addCity();">
                                                    <div class="mb-3">
                                                        <label for="cshort" class="form-label">Course Short</label>
                                                        <input type="text" class="form-control" id="cshort"
                                                            name="cshort" placeholder="Enter Course Short" />
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="cfull" class="form-label">Course Name</label>
                                                        <input type="text" class="form-control" id="cfull" name="cfull"
                                                            placeholder="Enter Course Name" />
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="cdate" class="form-label">Subject date</label>
                                                        <input type="date" class="form-control" id="cdate" name="cdate"
                                                            placeholder="Enter Subject date" />
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
                                                <h4 class="modal-title">Course Form</h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form name="myForm" method="post" id="updateCityForm"
                                                    onsubmit="return updateCity();">
                                                    <div class="mb-3">
                                                        <label for="update_cshort" class="form-label">Course
                                                            Short</label>
                                                        <input type="text" class="form-control" id="update_cshort"
                                                            name="cshort" placeholder="Enter Course Short" />
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="update_cfull" class="form-label">Course Name</label>
                                                        <input type="text" class="form-control" id="update_cfull"
                                                            name="cfull" placeholder="Enter Course Name" />
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="update_cdate" class="form-label">Subject
                                                            date</label>
                                                        <input type="text" class="form-control" id="update_cdate"
                                                            name="cdate" placeholder="Enter Subject date" />
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="update_update_date" class="form-label">Update
                                                            date</label>
                                                        <input type="date" class="form-control" id="update_update_date"
                                                            name="update_date" placeholder="Enter Update date" />
                                                    </div>
                                                    <input type="hidden" id="update_cid" name="cid" />
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
                                            <th scope="col">Course ID</th>
                                            <th scope="col">C Short</th>
                                            <th scope="col">C Full</th>
                                            <th scope="col">Course Date</th>
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
<script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script>

    function ajax_del(cid) {
        if (confirm("Are you sure?") == false) {
            return
        }
        $.ajax({
            url: "<?php echo base_url("/course/ajax_del/"); ?>" + cid,
            success: function(result) {
                mydatatable.ajax.reload();
            }
        });
    }

    function addCity() {
        var formdata = $("#createCityForm").serialize();
        $.ajax({
            type: "POST",
            url: "<?php echo base_url("/course/ajax_create"); ?>",
            data: formdata,
            success: function(result) {
                result = JSON.parse(result);
                if (result.status == true) {
                    mydatatable.ajax.reload();
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
            url: "<?php echo base_url("/course/ajax_update"); ?>",
            data: formdata,
            success: function(result) {
                mydatatable.ajax.reload();
                edit_modal.hide();
                // document.getElementById("updateCityForm").style.display="none";
            }
        });
        return false;
    }
    var add_modal = null;
    var edit_modal = null;
    var mydatatable =null;
    $(document).ready(function() {
        mydatatable=$('#example2').DataTable( {
            "ajax": {
                "url": "<?php echo base_url("/course/ajax_records"); ?>",
                "dataSrc": "records"
            },
            "columns": [
                { "data": "cid" },
                { "data": "cshort" },
                { "data": "cfull" },
                { "data": "cdate" },
                { "data": "update_date" },
                { "data": "update" },
                { "data": "del" },
            ]
        } );
        add_modal = new bootstrap.Modal(document.getElementById('exampleModal'));
        edit_modal = new bootstrap.Modal(document.getElementById('editModal'));
    });
    </script>
<!-- script -->
<?php include "inc/footer.php" ?>