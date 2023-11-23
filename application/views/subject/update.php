<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>CRUD</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    </head>

    <body>
        <div class="container">
            <h1>Update Form</h1>
            <form method="post">
                <input type="hidden" name="subid" value="<?php echo $subid; ?>" />
                <div class="mb-3">
                    <label for="cshort" class="form-label">Course Short</label>
                    <input type="text" class="form-control" id="cshort" name="cshort" placeholder="Enter Course Short" value="<?php echo $cshort; ?>" />
                </div>
                <div class="mb-3">
                    <label for="cfull" class="form-label">Country Name</label>
                    <input type="text" class="form-control" id="cfull" name="cfull" placeholder="Enter Country Name" value="<?php echo $cfull; ?>" />
                </div>
                <div class="mb-3">
                    <label for="sub1" class="form-label">Subject first</label>
                    <input type="text" class="form-control" id="sub1" name="sub1" placeholder="Enter Country Subject" value="<?php echo $sub1; ?>" />
                </div>
                <div class="mb-3">
                    <label for="sub2" class="form-label">Subject second</label>
                    <input type="text" class="form-control" id="sub2" name="sub2" placeholder="Enter Country Subject" value="<?php echo $sub2; ?>" />
                </div>
                <div class="mb-3">
                    <label for="sub3" class="form-label">Subject third</label>
                    <input type="text" class="form-control" id="sub3" name="sub3" placeholder="Enter Country Subject" value="<?php echo $sub3; ?>" />
                </div>
                <div class="mb-3">
                    <label for="sub4" class="form-label">Subject fourth</label>
                    <input type="text" class="form-control" id="sub4" name="sub4" placeholder="Enter Country Subject" value="<?php echo $sub4; ?>" />
                </div>
                <div class="mb-3">
                    <label for="update_date" class="form-label">Date Create</label>
                    <input type="date" class="form-control" id="update_date" name="update_date" placeholder="Enter Date" value="<?php echo $update_date; ?>" />
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </body>
</html>
