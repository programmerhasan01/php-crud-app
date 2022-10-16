<?php
    $connect = mysqli_connect('localhost', 'root', '', 'crud_app');

    if(isset($_GET['deleteid'])){
        $delete_id = $_GET['deleteid'];

        $sql = "DELETE FROM students WHERE id = $delete_id";

        if(mysqli_query($connect, $sql) == TRUE){
            header('location:view.php');
        }
    }

    if(isset($_POST['home'])){
        header('location:insert.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>PHP-CRUD-VIEW</title>
    <style>
        a{
            text-decoration: none;
        }
    </style>
</head>
<body>
    <h2 class="text-center mt-4">Students Information</h2>
    <table class="table w-50 mx-auto mt-5 border">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Email</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
    <tbody class="table-group-divider">
            <?php 
                $sql = "SELECT * FROM students";
                $query = mysqli_query($connect, $sql);

                while($data = mysqli_fetch_assoc($query)){
                    $id = $data['id'];
                    $fname = $data['firstname'];
                    $lname = $data['lastname'];
                    $email = $data['email'];

                    echo "<tr>
                            <td>$id</td>
                            <td>$fname</td>
                            <td>$lname</td>
                            <td>$email</td>
                            <td>
                                <a href='edit.php?id=$id'>
                                    <button type='button' class='btn btn-primary btn-sm'>Edit</button>
                                </a>
                                <a href='view.php?deleteid=$id'>
                                    <button type='button' class='btn btn-danger btn-sm'>Delete</button>
                                </a>
                            </td>
                        </tr>
                    ";
                };
            ?>
    </tbody>
    </table>
    <div class="w-50 mx-auto">
        <form action="view.php" method="post">
            <input type="submit" value="Go-Home" name="home" class="btn btn-success btn-sm">
        </form>
    </div>
</body>
</html>