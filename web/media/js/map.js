var map;
var marker=true;
function initialize() {
  var myLatlng = new google.maps.LatLng(48.855245,2.351866);
  
  var myOptions = {
    zoom: 6,
    center: myLatlng,
    mapTypeId: google.maps.MapTypeId.ROADMAP,
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
  
  document.getElementById("lat").innerHTML = 48.855245;
  document.getElementById("lon").innerHTML = 2.351866;
}
  
function placeMarker(location) {
  var clickedLocation = new google.maps.LatLng(location);
  document.getElementById("lat").innerHTML = location.lat();
	document.getElementById("lon").innerHTML = location.lng();
  marker.setPosition(location);
}