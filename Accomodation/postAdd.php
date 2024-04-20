<?php 
include("connection.php");
session_start(); // Make sure to start the session on every page where you want to access session variables

// Check if the username session variable is set
if(isset($_SESSION['username'])) {
    // Retrieve the username from the session variable
    $username = $_SESSION['username'];
    
    // Now you can use $username as the logged-in username
   
    echo '<script>
    alert("Wellcome!");
    </script>';
} else {
    // Redirect the user to the login page if not logged in
    echo '<script>
    window.location.href="login.php";
    alert("Please LogIn first!");
    </script>';
    exit();
}

if(isset($_POST['submit'])) {
    $addHeading = $_POST['addHeading'];
    $address = $_POST['address'];
    $latitude = $_POST['latitude'];
    $longitude = isset($_POST['longitude']) ? $_POST['longitude'] : '';
    $price = $_POST['price'];
    $contact = $_POST['contact'];
    $description = $_POST['description'];

    if(isset($_FILES['image'])){
        
        $img_name=$_FILES['image']['name'];
        $img_size=$_FILES['image']['size'];
        $tmp_name=$_FILES['image']['tmp_name'];
        $error=$_FILES['image']['error'];

        if($error===0){
            if($img_size>125000){
            $em="Image file is too large";
            }else{
                $img_ex=pathinfo($img_name, PATHINFO_EXTENSION);
                $img_ex_lc=strtolower($img_ex);

                $allowed_exs=array("jpg","jpeg","png");

                if(in_array($img_ex_lc, $allowed_exs)){
                    $new_img_name=uniqid("IMG-",true).'.'.$img_ex_lc;
                    $img_ipload_path='uploads/'.$new_img_name;
                    move_uploaded_file($tmp_name,$img_ipload_path);

                    $target_file=$new_img_name;

                    
                }else{
                    $em="Cannot upload a file in this size";
                }
            }

        }else{
            $em="unknow error";
        }

    }else{
        
    }

    if(empty($username)){
        echo"Please log in First !";
    }else{
       
        $sql = "INSERT INTO hosteladd (heading, address, latitude, longitude, price, contact, description, addStatus, landloardUsername, image) 
        VALUES ('$addHeading', '$address', '$latitude', '$longitude', '$price', '$contact', '$description', '', '$username', '$target_file')";
        
        if(mysqli_query($conn, $sql)) {
        echo "Record inserted successfully.";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }

    //Insert data into the database
   

    //Close the database connection
    mysqli_close($conn);
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/nav.css">
    <title>Document</title>
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
        <h1>Complete the details</h1>
        <p>Provide the username and password given by NSBM administrators.</p>
        <form method="post" class="loginForm" enctype="multipart/form-data">
            <input type="text" name="addHeading" placeholder="Addvertistment Heading" />
            <input type="text" name="address" placeholder="Prperty Address" />
           
            <input type="text" name="price" placeholder="Rental price" />
            <input type="text" name="contact" placeholder="Contact Number" />
            
            <div>
                
                <input style="border: none;"type="file" id="imageUpload" name="image" accept="image/*">
            
            </div>
            <br>
            <textarea typ="text" name="description" placeholder="Description"></textarea>
        

            <input style="background-color:#B6EC3D; border:none" type="submit" class="btn" value="submit" name="submit">

        </form>
    </div>
</body>
</html>