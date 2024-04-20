    <?php include("connection.php");

        if(isset($_GET['deleteid'])){
            $id=$_GET['deleteid'];
            $sql="delete from studentrequest where ID=$id";
            $result=mysqli_query($conn, $sql);
            if($result){
                header("Location: AdminPanel.php");
            }else{
                die(mysqli_error($conn));
            }
        }
    ?>