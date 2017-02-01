jQuery(document).ready(function() {
	if( typeof wpapi_gmaps !== 'undefined' ){
		google.maps.event.addDomListener(window, 'load', initialize_map );
	}
});

// Initialize map
function initialize_map() {
	wpapi_gmaps.forEach(function(single_gmap, index){
		var mapCanvas = document.getElementById('wpapi-gmap-' + index);
		var myLatLng = new google.maps.LatLng( single_gmap.lat , single_gmap.lng );
		var map_style = JSON.parse(single_gmap.style);

		var mapOptions = {
			center: myLatLng,
			zoom: Number(single_gmap.zoom),
			mapTypeId: google.maps.MapTypeId.ROADMAP,
			styles: map_style
		}

		var marker = new google.maps.Marker({
			position: myLatLng
		});

		var infoContent =  single_gmap.info;
		var infowindow = new google.maps.InfoWindow({
			content: infoContent
		});

		var map = new google.maps.Map(mapCanvas, mapOptions);
		marker.setMap(map);
		infowindow.open(map, marker);
	});
}
