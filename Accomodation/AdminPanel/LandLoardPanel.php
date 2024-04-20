<?php  include("connection.php") ?>
<!DOCTYPE html>
<html>
    <head>
    <style>
           .container button a{
            text-decoration:none;
           }
        </style>
    <link rel="stylesheet" type="text/css" href="css/form.css" asp-append-version="true" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/form.css"/>
    </head>
    <body>
        <div class="container">
            <button class="btn btn-primary my-5"><a href="AddNewLandLoard.php" class="text-light">Add Landloard</a></button><br>

            <button class="btn btn-primary my-5"><a href="AdminPanel.php" class="text-light">Student</a></button>
            <button class="btn btn-success my-5"><a href="LandLoardPanel.php" class="text-light">Landloard</a></button>
            <button class="btn btn-primary my-5"><a href="AddNewWarden.php" class="text-light">Warden</a></button>

            <h1>New Landloard Requests</h1>
            <br>
            <table class="table">
                <thead>
                    
                    <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Contact</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Address</th>
                    <th scope="col"></th>
                    
                    </tr>
                </thead>
                <tbody>
                    <?php 

                    $sql="select * from landloardRequest";
                    $result=mysqli_query($conn,$sql);
                    if($result){
                        while ($row=mysqli_fetch_assoc($result)) {
                            $name=$row['name'];
                            $contact=$row['number'];
                            $email=$row['email'];
                            $address=$row['address'];

                            echo '<tr>
                            <th scope="row">' . $name . '</th>
                            <td>' . $contact . '</td>
                            <td>' . $email . '</td>
                            <td>' . $address . '</td>
                            <td><button class="btn btn-danger"><a href="DeleteLandloard.php? deletecontact='.$contact.' "class="text-light">Delete Request</a></button></td>
                            </tr> ';
                        }
                    }
                    
                    ?>
                    
                </tbody>
            </table>
        </div>
    </body>

</html>
