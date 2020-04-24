jQuery(document).ready(function( $ ){
	// script here
	$(".wpsisac-slick-slider .wpsisac-readmore a").each(function(){
		var text = $(this).text();
		$(this).text(text.replace('Read More','View Category'));
	});

});