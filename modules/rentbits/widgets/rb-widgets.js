function makeRbFrame() {
	rb_data.forEach(function(rb_widget, index) {
		var rb_ifrm = document.createElement( "IFRAME" );
		var rb_src_domain = "&srcd=" + document.location.href.replace( /^[a-z:]+\/\//,"" ).replace( /\/.*/,"" );
		rb_ifrm.setAttribute( "src", rb_widget.url + rb_src_domain );
		rb_ifrm.style.width = rb_widget.width;
		rb_ifrm.style.height = rb_widget.height;
		rb_ifrm.style.border = "none";
		rb_ifrm.frameBorder = "0px";
		document.getElementById( 'rb-widget-' + index ).appendChild( rb_ifrm );
	});
}
makeRbFrame();
