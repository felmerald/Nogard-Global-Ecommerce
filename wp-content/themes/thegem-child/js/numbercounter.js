function countNow(id, start, end, duration) {
	let obj = document.getElementById(id),
	current = start,
	range = end - start,
	increment = end > start ? 1 : -1,
	step = Math.abs(Math.floor(duration / range)),
	timer = setInterval(() => {
		current += increment;
		obj.textContent = current;
		if (current == end) {
 			clearInterval(timer);
		}
	}, step);
}

jQuery(document).ready(function( $ ){
	// script here
	var pageCount = 0;
	var count0 = $('.about-s3 #count0').text();
	var count1 = $('.about-s3 #count1').text();
	var count2 = $('.about-s3 #count2').text();
	var count3 = $('.about-s3 #count3').text();

	var half0 = Math.round((count0/4));
	var half1= Math.round((count1/4));
	var half2 = Math.round((count2/4));
	var half3 = Math.round((count3/4));

	// check if div exist in viewport (desktop/tablet/mobile)
	$.fn.isOnScreen = function(){
	    var win = $(window);
	    var viewport = {
	        top : win.scrollTop(),
	        left : win.scrollLeft()
	    };
	    viewport.right = viewport.left + win.width();
	    viewport.bottom = viewport.top + win.height();

	    var bounds = this.offset();
	    bounds.right = bounds.left + this.outerWidth();
	    bounds.bottom = bounds.top + this.outerHeight();

	    return (!(viewport.right < bounds.left || viewport.left > bounds.right || viewport.bottom < bounds.top || viewport.top > bounds.bottom));
	};

	$(window).scroll(function(){
		if($(".about-s3").is(':visible')){ // condition will load only in about-s3 class
			
			if ($(".about-s3").isOnScreen() === true) {
				// The element is visible
				if (!pageCount) {
					pageCount = 1;
					countNow("count0", half0, count0, 5000);
					countNow("count1", half1, count1, 100);
					countNow("count2", half2, count2, 100);
					countNow("count3", half3, count3, 100);
				}
			}
		}
		
	});

});