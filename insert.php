<?php
    $connect = mysqli_connect('localhost', 'root', '', 'crud_app');

    if(isset($_POST['submit'])){
        $fistname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];

        $sql = "INSERT INTO students(firstname, lastname, email) VALUES('$fistname', '$lastname', '$email')";
        if(mysqli_query($connect, $sql) == TRUE){
            echo "Data inserted";
            header('location:insert.php');
        } else {
            echo "Not Insert";
        }
    }

    if(isset($_POST['view'])){
        header('location:view.php');
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
    <title>PHP-CRUD-APP</title>
</head>
<body>
    <h2 class="mt-4 mb-2 text-center fs-1 text-primary">Student Database</h2>
    <div class="w-25 mx-auto mt-2 bg-info p-5 rounded">
        <form action="insert.php" method="post">
            <label for="fname" class="mb-1">First Name:</label><br>
            <input type="text" name="firstname" id="fname" class="w-100"><br><br>

            <label for="lname" class="mb-1">Last Name:</label><br>
            <input type="text" name="lastname" id="lname" class="w-100"><br><br>

            <label for="emali" class="mb-1">Email:</label><br>
            <input type="email" name="email" id="email" class="w-100"><br><br>

            <div class="w-100 d-flex">
                <input type="submit" value="submit" name="submit" class="w-50 btn btn-success text-uppercase ">
                <input type="submit" value="ViewInfo" name="view" class="w-50 ms-auto btn btn-link fw-bold">
            </div>
        </form>
    </div>
</body>
</html>