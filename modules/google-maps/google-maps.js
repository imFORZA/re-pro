jQuery(document).ready(function() {
	if( typeof wpapi_gmaps !== 'undefined' ){
		google.maps.event.addDomListener(window, 'load', initialize_map );
	}
});

// Initialize map
function initialize_map() {
	var mapCanvas = document.getElementById('map-canvas');
	var myLatLng = new google.maps.LatLng( wpapi_gmaps.lat , wpapi_gmaps.lng );
	var map_style = JSON.parse(wpapi_gmaps.style);

	var mapOptions = {
		center: myLatLng,
		zoom: 14,
		mapTypeId: google.maps.MapTypeId.ROADMAP,
		styles: map_style
	}

	var marker = new google.maps.Marker({
		position: myLatLng
	});

	var infoContent =  wpapi_gmaps.info;
	var infowindow = new google.maps.InfoWindow({
		content: infoContent
	});

	var map = new google.maps.Map(mapCanvas, mapOptions);
	marker.setMap(map);
	infowindow.open(map, marker);
}
