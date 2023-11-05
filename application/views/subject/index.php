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
                <label for="cshort" class="form-label">Course Short</label>
                <input type="text" class="form-control" id="cshort" name="cshort" placeholder="Enter Course Short">
            </div>
            <div class="mb-3">
                <label for="cfull" class="form-label">Course Name</label>
                <input type="text" class="form-control" id="cfull" name="cfull" placeholder="Enter Course Name">
            </div>
            <div class="mb-3">
                <label for="sub1" class="form-label">Subject first</label>
                <input type="text" class="form-control" id="sub1" name="sub1" placeholder="Enter Country Subject">
            </div>
            <div class="mb-3">
                <label for="sub2" class="form-label">Subject second</label>
                <input type="text" class="form-control" id="sub2" name="sub2" placeholder="Enter Country Subject">
            </div>
            <div class="mb-3">
                <label for="sub3" class="form-label">Subject third</label>
                <input type="text" class="form-control" id="sub3" name="sub3" placeholder="Enter Country Subject">
            </div>
            <div class="mb-3">
                <label for="sub4" class="form-label">Subject fourth</label>
                <input type="text" class="form-control" id="sub4" name="sub4" placeholder="Enter Country Subject">
            </div>
            <div class="mb-3">
                <label for="dt_created" class="form-label">Date </label>
                <input type="date" class="form-control" id="dt_created" name="dt_created" placeholder="Enter Date">
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>

        </form>
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