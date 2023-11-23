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
                <input type="hidden" name="id" value="<?php echo $id; ?>" />
                <div class="mb-3">
                    <label for="FullName" class="form-label">Full Name</label>
                    <input type="text" class="form-control" id="FullName" name="FullName" placeholder="Enter Full Name" value="<?php echo $FullName; ?>" />
                </div>
                <div class="mb-3">
                    <label for="AdminEmail" class="form-label">Email</label>
                    <input type="email" class="form-control" id="AdminEmail" name="AdminEmail" placeholder="Enter Email" value="<?php echo $AdminEmail; ?>" />
                </div>
                <div class="mb-3">
                    <label for="loginid" class="form-label">Username</label>
                    <input type="text" class="form-control" id="loginid" name="loginid" placeholder="Enter Username" value="<?php echo $loginid; ?>" />
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password" value="<?php echo $password; ?>" />
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </body>
</html>
