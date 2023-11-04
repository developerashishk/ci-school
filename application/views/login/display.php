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
        <h1>CRUD Form</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Full Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Username</th>
                    <th scope="col">Password</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach ($records as $row) {
                        echo "<tr>";
                        echo "<td>" . $row["id"] . "</td>";
                        echo "<td>" . $row["FullName"] . "</td>";
                        echo "<td>" . $row["AdminEmail"] . "</td>";
                        echo "<td>" . $row["loginid"] . "</td>";
                        echo "<td>" . $row["password"] . "</td>";
                        echo "<td><a href='update?updateid=" . $row["id"] . "' class='btn btn-primary'>update</a></td>";
                        echo "<td><a href='delete?deleteid=" . $row["id"] . "' class='btn btn-danger'>Delete</a></td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
        <button class="btn btn-primary"><a class="link-light text-decoration-none" href="create">Add User</a></button>

    </div>
</body>

</html>