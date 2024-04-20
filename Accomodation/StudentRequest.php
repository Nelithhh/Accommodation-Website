<?php 
    include("connection.php");
    if(isset($_POST['submit'])){
        $id = $_POST['studentId'];
        $mail = $_POST['studentmail'];

        $sql = "INSERT INTO studentrequest (ID, NsbmMail) VALUES ('$id', '$mail')";
        $result = mysqli_query($conn, $sql);

        if($result){
            header("Location: Thankyou.html");
        } else {
            
            die("Error: " . mysqli_error($conn));
        }
    }
?>
<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" type="text/css" href="css/style.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/nav.css">
    
    </head>

    <body>
    <nav class="container-fluid navbar-small">
    <span><a href="AdminPanel/AdminLogin.php">Admin</a></span>>
        <span><a href="Warden/WardenLogin.php">Warden</a></span>>
    </nav>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
    
    <div class="container-fluid">
        <a class="navbar-brand" href="#">LOGONAME</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="home.php">Home</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="Login.php">Login</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="LandLoardLogin.php">Addvertistment</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="LandLoardLogin.php">Contact Us</a>
            </li>
            

        </ul>
        <button><a href="maps.php">Map</a></button>
        </div>
    </div>
    </nav>

    <div class="formclass">
        <h1>Send Us A Request</h1>
        <p>Password will be sent to your NSBM e-mail.</p>

         <form method="POST" class="studentLoginForm loginForm">
            <input type="text" name="studentId" placeholder="NSBM StudentId" />
            <input type="text" name="studentmail" placeholder="NSBM student e-mail" />
           

            <input style="background-color:#B6EC3D; border:none" type="submit" value="Send" name="submit">
           
            <br>
            <p>Already have an account?<a style="text-decoration:none" href="Login.php"> Log In</a></p>
       
        </form>
        
    </div>
    </body>

</html>
