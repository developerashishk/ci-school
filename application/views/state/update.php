
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1>Update Form</h1>
        <form method="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="mb-3">
                <label for="name" class="form-label">State Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter Your Name" value="<?php echo $name; ?>">
            </div>
            <div class="mb-3">
                <label for="country_id" class="form-label">Country Id</label>
                <input type="text" class="form-control" id="country_id" name="country_id" placeholder="country_id" value="<?php echo $country_id; ?>">
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>
