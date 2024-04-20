<?php include("connection.php");

if(isset($_GET['deletecontact'])){
    $id=$_GET['deletecontact'];
    $sql="delete from landloardrequest where number=$id ";
    $result=mysqli_query($conn, $sql);
    if($result){
        header("Location: AdminPanel.php");
    }else{
        die(mysqli_error($conn));
    }
}
?>