  var map;
  var geocoder;

  function myMap() {
  
    var mapProp= {
      center:new google.maps.LatLng(6.8213,80.0416),
      zoom:50,
    };
    map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
    
     

    

    var cdata=JSON.parse(document.getElementById('data').innerHTML);
    console.log(cdata); 
    geocoder=new google.maps.Geocoder();
    codeAddress(cdata);
    
    var allData=JSON.parse(document.getElementById('allData').innerHTML); 
    showAllAdds(allData)
  }
  
  function showAllAdds(allData){
    var infoWind=new google.maps.InfoWindow;
    Array.prototype.forEach.call(allData,function(data){
      var content = document.createElement('div'); // Create a new content element for each marker
      var strong = document.createElement('strong');
      var img = document.createElement('img');
      var address = document.createElement('address');
      var price = document.createElement('price');
      var contact = document.createElement('contact');
      var description = document.createElement('description');
      var owner = document.createElement('owner');

      let imagePath = "uploads/" + data.image;
      img.src = imagePath;
      img.style.width = '200px';

      strong.textContent = data.heading;
      address.textContent = 'Address: ' + data.address;
      price.textContent = 'Price: ' + data.price;
      contact.textContent = 'Contact: ' + data.contact;
      description.textContent = 'Description: ' + data.description;
      
      content.appendChild(strong);
      content.appendChild(img);
      content.appendChild(address);
      content.appendChild(price);
      content.appendChild(description);
      content.appendChild(contact);

      infoWind.setContent(content);
      infoWind.open(map, marker);

      content.style.width = '300px'; // Set the width to 300px
      content.style.height = '200px'; // Set the height to 200px
      content.style.display = 'flex';
      content.style.flexDirection = 'column'; // Stack elements vertically
      content.style.alignItems = 'center';
      contact.style.color = 'blue';


      console.log(allData);
      var marker = new google.maps.Marker({
        position:new google.maps.LatLng(data.latitude,data.longitude),
        map:map
      });
      marker.setMap(map);
      marker.addListener('click',function(){
        infoWind.setContent(content);
        infoWind.open(map,marker);
      })
      
    });
  }
  
     

  function codeAddress(cdata) {
    
    Array.prototype.forEach.call(cdata, function(data){
      var address = data.name + ' ' + data.address;
      geocoder.geocode( { 'address': address}, function(results, status) {
        if (status == 'OK') {
          map.setCenter(results[0].geometry.location);
    
          var points = {};
          points.address = data.address;
          points.lat = map.getCenter().lat();
          points.lng = map.getCenter().lng(); // Corrected variable name
          updateAddWithLatLong(points); // Pass the points object to the function
          
        } else {
          alert('Geocode was not successful for the following reason: ' + status);
        }
      });
  });
  }

  function updateAddWithLatLong(points) {
    $.ajax({
      url:"latlong.php",
      method:"post",
      data:points,
      success: function(res){
        console.log(res);
      }
    })
    console.log(points);
  }

