<?php
include("connection.php");

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];

    $sql = "INSERT INTO warden (name, username, password, contact, email) VALUES ('$name', '$username', '$password', '$contact', '$email')";
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
        <h1>Add new Warden</h1>
        <br>
    <form method="POST" >
        <div class="mb-3">
            <label for="" class="form-label">Name</label>
            <input type="text" class="form-control" name="name"id="" aria-describedby="">
            
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Username</label>
            <input type="text" class="form-control" name="username"id="" aria-describedby="">
            
        </div<div class="mb-3">
            <label for="" class="form-label">Password</label>
            <input type="text" class="form-control" name="password"id="" aria-describedby="">
            
        </div><div class="mb-3">
            <label for="" class="form-label">Contact Number</label>
            <input type="text" class="form-control" name="contact"id="" aria-describedby="">
            
        </div><div class="mb-3">
            <label for="" class="form-label">E-mail</label>
            <input type="text" class="form-control" name="email"id="" aria-describedby="">
            
        </div>

        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
   
    </body>

</html>