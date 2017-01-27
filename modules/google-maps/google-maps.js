
jQuery(document).ready(function() {
	if( typeof idxfListing !== 'undefined' ){
		google.maps.event.addDomListener(window, 'load', initialize_map );
	}
});

// Initialize map
function initialize_map() {
	var mapCanvas = document.getElementById('map-canvas');
	var myLatLng = new google.maps.LatLng( idxfListing.lat , idxfListing.lng );
	var map_style = JSON.parse(idxfListing.style);

	var mapOptions = {
		center: myLatLng,
		zoom: 14,
		mapTypeId: google.maps.MapTypeId.ROADMAP,
		styles: map_style
	}

	var marker = new google.maps.Marker({
		position: myLatLng,
		icon: '//s3.amazonaws.com/ae-plugins/wp-listings/images/active.png'
	});

	var infoContent =  idxfListing.map_info_content;
	var infowindow = new google.maps.InfoWindow({
		content: infoContent
	});

	var map = new google.maps.Map(mapCanvas, mapOptions);
	marker.setMap(map);
	infowindow.open(map, marker);
}
