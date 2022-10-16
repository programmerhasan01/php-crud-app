<?php
    $connect = mysqli_connect('localhost', 'root', '', 'crud_app');
   if(isset($_GET['id'])){
     $getid = $_GET['id'];

     $sql = "SELECT * FROM students WHERE id = $getid";
     $query = mysqli_query($connect, $sql);
     $data = mysqli_fetch_assoc($query);
     $id = $data['id'];
     $firstname = $data['firstname'];
     $lastname = $data['lastname'];
     $email = $data['email'];
   }

   if (isset($_POST['update'])) {
        $id = $_POST['id'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];

        $sql1 = "UPDATE students SET firstname='$firstname', lastname='$lastname', email='$email' WHERE id = '$id' ";

        if(mysqli_query($connect, $sql1) == TRUE){
            echo "Data updated successfully...";
            header('location:view.php');
        } else {
            echo "Having problem to update data...";
        }
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
    <h2 class="mt-4 mb-2 text-center fs-1 text-primary">Update & Update</h2>
    <div class="w-25 mx-auto mt-2 bg-info p-5 rounded">
        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
            <label for="fname" class="mb-1">First Name:</label><br>
            <input type="text" name="firstname" id="fname" class="w-100" value="<?php echo $firstname?>"><br><br>

            <label for="lname" class="mb-1">Last Name:</label><br>
            <input type="text" name="lastname" id="lname" class="w-100" value="<?php echo $lastname?>"><br><br>

            <label for="emali" class="mb-1">Email:</label><br>
            <input type="email" name="email" id="email" class="w-100" value="<?php echo $email?>"><br><br>

            <input type="text" name="id" id="id" value="<?php echo $id?>" hidden>
            <input type="submit" value="update" name="update" class="w-50 btn btn-success text-uppercase ">
        </form>
    </div>
</body>
</html>