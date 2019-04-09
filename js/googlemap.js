var map;
var geocoder;




// loads the map on start, centered on Helsinki area
function loadMap() {
	var helsinki = {lat: 60.1699, lng: 24.9384};
    map = new google.maps.Map(document.getElementById('map'), {
      zoom: 12,
      center: helsinki
    });

   
		// recieve data from php/mysql 
		var cdata = JSON.parse(document.getElementById('data').innerHTML);
		// request geocoding of location with no lat/lng values
    geocoder = new google.maps.Geocoder();  
    codeAddress(cdata);
		
    var allData = JSON.parse(document.getElementById('allData').innerHTML);
		showAllGyms(allData);
}


// this function displays the markers and their content once clicked.
function showAllGyms(allData) {
	var infoWind = new google.maps.InfoWindow;
	// reading all addresses from database, 
	Array.prototype.forEach.call(allData, function(data){
		var content = document.createElement('div');
		var strong = document.createElement('strong');
		
		// info to be displayed when clicked on marker.
		strong.setAttribute('style', 'white-space: pre;');
		strong.textContent = "id: "+data.id + "\r\n"; 
		strong.textContent += data.name + "\r\n"; 
		strong.textContent += data.address + "\r\n"; 
		strong.textContent += data.keyword + "\r\n";
		strong.textContent += data.lat + "\r\n"; 
		strong.textContent += data.lng + "\r\n"; 
		content.appendChild(strong);
		


	
    // markers on the gyms
		var marker = new google.maps.Marker({
	      position: new google.maps.LatLng(data.lat, data.lng),
	      map: map
	    });
		// once clicked infowindow opens and displays data.
		marker.addListener('click', function(){
	    	infoWind.setContent(content);
				infoWind.open(map, marker);
				
				




	    })
	})
}
// geocoding, center the map on new location
function codeAddress(cdata) {
   Array.prototype.forEach.call(cdata, function(data){
    	var address = data.name + ' ' + data.address;
	    geocoder.geocode( { 'address': address}, function(results, status) {
	      if (status == 'OK') {
	        map.setCenter(results[0].geometry.location);
	        var points = {};
	        points.id = data.id;
	        points.lat = map.getCenter().lat();
	        points.lng = map.getCenter().lng();
					updateGymWithLatLng(points);
					// was neccesary for the page to reload to display new data, however
					// load map function resets the center at Helsinki
					
					window.location.reload(true); 
	      } else {
	        alert('Geocode was not successful for the following reason: ' + status);
	      }
	    });
	});
}
function updateGymWithLatLng(points) {
	$.ajax({
		url:"action.php",
		method:"post",
		data: points,
		success: function(res) {

			console.log(res)
		}
	})
}





