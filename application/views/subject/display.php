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
            <tbody>
                <?php
                    foreach ($records as $row) {
                        echo "<tr>";
                        echo "<td>" . $row["subid"] . "</td>";
                        echo "<td>" . $row["cshort"] . "</td>";
                        echo "<td>" . $row["cfull"] . "</td>";
                        echo "<td>" . $row["sub1"] . "</td>";
                        echo "<td>" . $row["sub2"] . "</td>";
                        echo "<td>" . $row["sub3"] . "</td>";
                        echo "<td>" . $row["sub4"] . "</td>";
                        echo "<td>" . $row["dt_created"] . "</td>";
                        echo "<td>" . $row["update_date"] . "</td>";
                        echo "<td><a href='update?updateid=" . $row["subid"] . "' class='btn btn-primary'>update</a></td>";
                        echo "<td><a href='delete?deleteid=" . $row["subid"] . "' class='btn btn-danger'>Delete</a></td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
        <button class="btn btn-primary"><a class="link-light text-decoration-none" href="create">Add User</a></button>

    </div>
</body>

</html>