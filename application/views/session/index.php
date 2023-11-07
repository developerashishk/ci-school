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
        <h1>Country Form </h1>
        <form name="myForm" method="post" id="createCityForm" onsubmit="return addCity();">
            <div class="mb-3">
                <label for="session" class="form-label">Session</label>
                <input type="date" class="form-control" id="session" name="session" placeholder="Session">
            </div>
            <div class="mb-3">
                <label for="postingdate" class="form-label">Post Date</label>
                <input type="date" class="form-control" id="postingdate" name="postingdate" placeholder="postingdate">
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <input type="number" class="form-control" id="status" name="status" placeholder="status">
            </div>

            <button type="submit" name="submit" class="btn btn-primary">Submit</button>

        </form>

        <form name="myForm" method="post" id="updateCityForm" style="display:none" onsubmit="return updateCity();">
            <div class="mb-3">
                <label for="name" class="form-label">Session</label>
                <input type="text" class="form-control" id="update_session" name="session" placeholder="Enter Session">
            </div>
            <div class="mb-3">
                <label for="roll" class="form-label">Post Date</label>
                <input type="text" class="form-control" id="update_postingdate" name="postingdate" placeholder="Post Date">
            </div>
            <div class="mb-3">
                <label for="roll" class="form-label">Status</label>
                <input type="text" class="form-control" id="update_status" name="status" placeholder="Status">
            </div>
            <input type="hidden" id="update_id" name="id" />
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Session</th>
                    <th scope="col">Posting Date</th>
                    <th scope="col">Status</th>
                    <th scope="col">Update</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody id="records">
            </tbody>
        </table>
    </div>
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
            url: "ajax_del/"+id,
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

    function update(data){
        document.getElementById("updateCityForm").style.display="block";
        document.getElementById("update_session").value=data.session;
        document.getElementById("update_postingdate").value=data.postingdate;
        document.getElementById("update_status").value=data.status;
        document.getElementById("update_id").value=data.id;
    }

    function updateCity(){
        var formdata = $("#updateCityForm").serialize();
        $.ajax({
            type: "POST",
            url: "ajax_update",
            data: formdata,
            success: function(result) {
                renderList();
                document.getElementById("updateCityForm").style.display="none";
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