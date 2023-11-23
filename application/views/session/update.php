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
                    <label for="session" class="form-label">Session</label>
                    <input type="date" class="form-control" id="session" name="session" placeholder="Session" value="<?php echo $session; ?>" />
                </div>
                <div class="mb-3">
                    <label for="postingdate" class="form-label">Session</label>
                    <input type="date" class="form-control" id="postingdate" name="postingdate" placeholder="postingdate" value="<?php echo $postingdate; ?>" />
                </div>
                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <input type="number" class="form-control" id="status" name="status" placeholder="status" value="<?php echo $status; ?>" />
                </div>

                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </body>
</html>
