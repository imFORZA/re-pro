jQuery(document).ready(function() {
(function () {
	var widget = new HomeFinder.Widgets.AdvertiserDirectory({
		container: 'directoryPreview',
		data: {
			profileName: directory_data.affiliate,
			maxCount: directory_data.count
		}
	});
})();

});
