<?php include("connection.php");

if(isset($_GET['acceptaddress'])){
    $address=$_GET['address'];
    $sql="update hosteladd set addStatus='approved' ";
    $result=mysqli_query($conn, $sql);
    if($result){
        header("Location: WardenDashboard.php");
    }else{
        die(mysqli_error($conn));
    }
}
?>