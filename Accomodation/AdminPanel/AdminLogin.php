<?php include("connection.php"); 

    if(isset($_POST['submit'])){
        $username = $_POST['uname'];
        $password = $_POST['pass'];

        $sql = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
        $result = mysqli_query($conn, $sql);

        if(!$result) {
            die("Query failed: " . mysqli_error($conn));
        }

        $count = mysqli_num_rows($result);

        if($count == 1){
            session_start();
        
        // Store username in session variable
            $_SESSION['username'] = $username;
            header("Location: AdminPanel.php");
            exit();
        } else {
            echo '<script>
                window.location.href="LandLoardLogin.php";
                alert("Login Failed. Invalid Id or Password!");
                </script>';
            exit();
        }

        $conn.close();
    }


?>

<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" type="text/css" href="css/style.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="style.css">
    </head>
    <body>

        <div class="formclass">

            <h1>Hello Admin</h1>
            <p>Provide username and password.</p>
            <form method="POST" class="adminLoginForm loginForm">
            <input type="text" name="uname" placeholder="username" />
            <input type="text" name="pass" placeholder="Enter Password" />

            <input type="submit" value="login" name="submit">
           
            
       
        </form>
        </div>
    </body>

</html>
