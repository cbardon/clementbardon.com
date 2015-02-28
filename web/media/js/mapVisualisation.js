var map;
var marker=true;

function initializeMap(latitude,longitude) 
{
	var myLatlng = new google.maps.LatLng(latitude,longitude);

	var myOptions = 
	{
		zoom: 6,
		center: myLatlng,
		mapTypeId: google.maps.MapTypeId.ROADMAP,
		zoomControl: false
	}

	map = new google.maps.Map(document.getElementById("map"), myOptions);

	marker = new google.maps.Marker(
	{
		position: myLatlng, 
		map: map
	});

	google.maps.event.addListener(map, 'zoom_changed', function() 
	{
		zoomLevel = map.getZoom();
	});

	google.maps.event.addListener(marker, 'dblclick', function() 
	{
		zoomLevel = map.getZoom()+1;
		if (zoomLevel == 20) 
		{
			zoomLevel = 10;
		}     
		map.setZoom(zoomLevel);

	});
}

function placeMarker(location) 
{
	var clickedLocation = new google.maps.LatLng(location);
	marker.setPosition(location);
}
