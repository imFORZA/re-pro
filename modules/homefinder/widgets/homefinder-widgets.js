(function () {
	hf_data.forEach(function(data, index) {
		if ( data.type === 'directory' ) {
			var widget = new HomeFinder.Widgets.AdvertiserDirectory({
				container: 'directoryPreview-' + index,
				data: {
					profileName: data.affiliate,
					maxCount: data.count
				}
			});
		} else if ( data.type === 'search' ) {
			var widget = new HomeFinder.Widgets.Search({
				container: 'searchPreview-' + index,
				data: {
					affiliate: { name: data.affiliate },
					area: { city: data.primary_city, state: data.primary_state },
					nearbyAreas: [
						{ city: data.nearby_city_1, state: data.nearby_state_1 },
						{ city: data.nearby_city_2, state: data.nearby_state_2 },
						{ city: data.nearby_city_3, state: data.nearby_state_3 },
						{ city: data.nearby_city_4, state: data.nearby_state_4 }
					]
				}
			});
		} else {
			var hfWidget = [{
				type: data.type,
				container: data.container + '-' + index
			}];
			HomeFinder.widgetLoader.getWidgets( hfWidget );
		}
	});
})();
