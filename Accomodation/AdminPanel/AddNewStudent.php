<?php
    include("connection.php");

    if(isset($_POST['submit'])){
        $studentId = $_POST['studentId'];
        $password = $_POST['password'];

        $sql = "INSERT INTO student (StudentId, Password) VALUES ('$studentId', '$password')";
        $result = mysqli_query($conn, $sql);

        if($result){
            echo "Data inserted successfully"; 
        } else {
            die("Error: " . mysqli_error($conn));
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" type="text/css" href="css/form.css" asp-append-version="true" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/form.css"/>
    </head>
    <body class="container">
    <br>
        <h1>Add new Student</h1>
        <br>
    <form method="POST" >
        <div class="mb-3">
            <label for="" class="form-label">Student ID</label>
            <input type="text" class="form-control" name="studentId"id="" aria-describedby="emailHelp">
            
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Password</label>
            <input type="text" name="password" class="form-control" id="">
        </div>

        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
   
    </body>

</html>