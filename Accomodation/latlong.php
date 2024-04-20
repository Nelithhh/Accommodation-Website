<?php

    require 'hosteladd.php';
    $add=new Hosteladd;
    $add->setAddress($_REQUEST['address']);
    $add->setLat($_REQUEST['lat']);
    $add->setLong($_REQUEST['lng']);
    $status=$add->updateAddWithLatLongById();

    if($status==true){
        echo"updated...";
    }else{
        echo"failed";
    }
?> 