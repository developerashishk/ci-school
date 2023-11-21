<?php include "inc/header.php" ?>
<?php include "inc/sidebar.php" ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Session Table Data</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="../dashboard">Home</a></li>
                        <li class="breadcrumb-item active">Session</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
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
                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#exampleModal"> Add Session</button>
                        
                        
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">City Form</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form name="myForm" method="post" id="createCityForm"
                                            onsubmit="return addCity();">
                                            <div class="mb-3">
                                                <label for="name" class="form-label">City Name</label>
                                                <input type="text" class="form-control" id="name" name="name"
                                                    placeholder="Enter City Name">
                                            </div>

                                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- modal end -->

                        <!-- modal start -->
                        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editModalLabel">City Form</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form name="myForm" method="post" id="updateCityForm"
                                            onsubmit="return updateCity();">
                                            <div class="mb-3">
                                                <label for="name" class="form-label">City Name</label>
                                                <input type="text" class="form-control" id="update_name" name="name"
                                                    placeholder="Enter City Name">
                                            </div>

                                            <input type="hidden" id="update_id" name="id" />
                                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- modal end -->


                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">State Code</th>
                                    <th scope="col">Update</th>
                                    <th scope="col">Delete</th>
                                </tr>
                            </thead\>

                            <tbody id="records">
                            </tbody>
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


        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!-- script  -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous"></script>
<script>
    function renderList() {
    $.ajax({
        url: "<?php echo base_url("/session/ajax_records"); ?>",
        success: function(result) {
            result=JSON.parse(result);
            var recordHTML="";
            result.records.forEach(function(row) {
                    recordHTML += `<tr>
                        <td>${row.id}</td>
                        <td>${row.session}</td>
                        <td>${row.postingdate}</td>
                        <td>${row.status}</td>
                        <td><a onclick='update(${JSON.stringify(row)})' class="btn btn-primary">Update</a></td>
                        <td><a onclick='ajax_del(${row.id})' class="btn btn-danger">Delete</a></td>
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
        url: "<?php echo base_url("/session/ajax_del/"); ?>" + id,
        success: function(result) {
            renderList();
        }
    });
}

function addCity() {
    var formdata = $("#createCityForm").serialize();
    $.ajax({
        type: "POST",
        url: "<?php echo base_url("/session/ajax_create"); ?>",
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
    document.getElementById("update_name").value = data.name;
    document.getElementById("update_id").value = data.id;
}

function updateCity() {
    var formdata = $("#updateCityForm").serialize();
    $.ajax({
        type: "POST",
        url: "<?php echo base_url("/session/ajax_update"); ?>",
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