(function () {
	var widget = new HomeFinder.Widgets.Search({
	container: 'searchPreview',
	data: {
		affiliate: { name: search_data.affiliate },
		area: { city: search_data.primary_city, state: search_data.primary_state },
		nearbyAreas: [
			{ city: search_data.nearby_city_1, state: search_data.nearby_state_1 },
			{ city: search_data.nearby_city_2, state: search_data.nearby_state_2 },
			{ city: search_data.nearby_city_3, state: search_data.nearby_state_3 },
			{ city: search_data.nearby_city_4, state: search_data.nearby_state_4 }
		]
	}
});
})();
