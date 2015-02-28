window.onload = function()
{	
    var resetButton = document.getElementById('reset');
    resetButton.onclick = function()
    {
        document.getElementById("lat").setAttribute("value",'');
        document.getElementById("lon").setAttribute("value",'');
    }
	
    initialize();
     
};


// MAP

function initialize() {
    var myLatlng = new google.maps.LatLng(46.87145819560722,2.4169921875);
    
    var myOptions = {
        zoom: 6,
        center: myLatlng,
        mapTypeId: google.maps.MapTypeId.TERRAIN,
        zoomControl: false
    }
    
    map = new google.maps.Map(document.getElementById("gmap"), myOptions);
    
    marker = new google.maps.Marker({
      	position: myLatlng, 
      	map: map
    });
	
    google.maps.event.addListener(map, 'click', function(e) {
    var location = placeMarker(e.latLng, map);
    
    placeMarker(location);
    });
	
	
 /* google.maps.event.addListener(map, 'center_changed', function() {
  	var location = map.getCenter();
	document.getElementById("lat").innerHTML = location.lat();
	document.getElementById("lon").innerHTML = location.lng();
    placeMarker(location);
  });*/
  
  google.maps.event.addListener(map, 'zoom_changed', function() {
  	zoomLevel = map.getZoom();
  });
  
  google.maps.event.addListener(marker, 'dblclick', function() {
    zoomLevel = map.getZoom()+1;
    if (zoomLevel == 20) {
        zoomLevel = 10;
   	}    
	map.setZoom(zoomLevel);
	 
  });
  
  document.getElementById("lat").setAttribute("value",'');
  document.getElementById("lon").setAttribute("value",'');
}
  
function placeMarker(location) {
    var clickedLocation = new google.maps.LatLng(location);
    document.getElementById("lat").setAttribute("value",location.lat());
	document.getElementById("lon").setAttribute("value",location.lng());
    marker.setPosition(location);
}