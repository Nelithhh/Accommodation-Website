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
           <br>
            
            <br>
            <h1>New Adds</h1>
            <br>
            <br>
            <table class="table">
                <thead>
                    
                    <tr>
                    <th scope="col">Heading</th>
                    <th scope="col">Address</th>
                    <th scope="col">price</th>
                    <th scope="col">contact</th>
                    <th scope="col">description</th>
                    <th scope="col">owner</th>
                    <th scope="col">image</th>
                    
                    
                    </tr>
                </thead>
                <tbody>
                    <?php 

                    $sql="select * from hosteladd where addStatus='' ";
                    $result=mysqli_query($conn,$sql);
                    if($result){
                        while ($row=mysqli_fetch_assoc($result)) {
                            $heading=$row['heading'];
                            $address=$row['address'];
                            $price=$row['price'];
                            $contact=$row['contact'];
                            $description=$row['description'];
                            $owner=$row['landloardUsername'];
                            $image=$row['image'];

                            echo '<tr>
                            <th scope="row">' . $heading . '</th>
                        
                            <td>' . $address . '</td>
                            <td>' . $price . '</td>
                            <td>' . $contact . '</td>
                            <td>' . $description . '</td>
                            <td>' . $owner . '</td>
                            <td><img src="uploads/' . $image . '" alt="Image" style="max-width: 100px;"></td>
                            <td><button class="btn btn-danger"><a href="deleteAdd.php? address='.$address.' "class="text-light">Delete</a></button></td>
                            <td><button class="btn btn-success"><a href="addToMap.php? acceptaddress='.$address.' "class="text-light">Accept</a></button></td>
                            
                            </tr> ';
                        }
                    }
                    
                    ?>
                    
                </tbody>
            </table>
        </div>
    </body>

</html>
