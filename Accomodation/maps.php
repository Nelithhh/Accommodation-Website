<!DOCTYPE html>
<html>
    <head>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <style>
          #data{
            display:none;
          }
          #allData{
            display:none;
          }
        </style>
    </head>
<body>


<?php 
  require 'hosteladd.php';
  $add=new Hosteladd;
  $coll=$add->getNullLatLong();
  $coll=json_encode($coll, true);
  echo '<div id="data">'.$coll.'</div>';

  $allData=$add->getAllAdds();
  $allData=json_encode($allData, true);
  echo '<div id="allData">'.$allData.'</div>';
?>

<div id="googleMap" style="width:100%;height:800px;"></div>



<script type="text/javascript" src="googlemap.js"></script>
<script  async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAHpyREGsOXhFrdHxulbfAukAlx3Sr3CGU&callback=myMap"></script>

</body>
</html>