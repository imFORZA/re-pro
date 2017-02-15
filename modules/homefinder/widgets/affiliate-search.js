jQuery(document).ready(function() {
(function () {
	var widget = new HomeFinder.Widgets.Search({
	container: 'searchPreview',
	data: {
		affiliate: { name: widget_data.affiliate },
		area: { city: widget_data.primary_city, state: widget_data.primary_state },
		nearbyAreas: [
			{ city: widget_data.nearby_city_1, state: widget_data.nearby_state_1 },
			{ city: widget_data.nearby_city_2, state: widget_data.nearby_state_2 },
			{ city: widget_data.nearby_city_3, state: widget_data.nearby_state_3 },
			{ city: widget_data.nearby_city_4, state: widget_data.nearby_state_4 }
		]
	}
});
})();

});
