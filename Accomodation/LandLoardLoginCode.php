<?php include("connection.php"); 

    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM landloard WHERE username='$username' AND password='$password'";
        $result = mysqli_query($conn, $sql);

        if(!$result) {
            die("Query failed: " . mysqli_error($conn));
        }

        $count = mysqli_num_rows($result);

        if($count == 1){
            session_start();
        
        // Store username in session variable
            $_SESSION['username'] = $username;
            header("Location: postAdd.php");
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