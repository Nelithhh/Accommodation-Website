<?php

include("connection.php");

if(isset($_POST['submit'])){
    $studentId = $_POST['studentId'];
    $password = $_POST['Password'];

    $sql = "SELECT * FROM student WHERE StudentId='$studentId' AND Password='$password'";
    $result = mysqli_query($conn, $sql);

    if(!$result) {
        die("Query failed: " . mysqli_error($conn));
    }

    $count = mysqli_num_rows($result);

    if($count == 1){
        header("Location: maps.php");
        exit();
    } else {
        echo '<script>
            window.location.href="login.php";
            alert("Login Failed. Invalid Id or Password!");
            </script>';
        exit();
    }

    $conn.close();
}

    
?>
