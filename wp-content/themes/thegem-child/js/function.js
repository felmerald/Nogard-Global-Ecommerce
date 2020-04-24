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
	$(".wpsisac-slick-slider .wpsisac-readmore a").each(function(){
		var text = $(this).text();
		$(this).text(text.replace('Read More','View Category'));
	});

	var count0 = $('.about-s3 #count0').text();
	var count1 = $('.about-s3 #count1').text();
	var count2 = $('.about-s3 #count2').text();
	var count3 = $('.about-s3 #count3').text();

	var half0 = (count0/2);
	var half1= (count1/2);
	var half2 = (count2/2);
	var half3 = (count3/2);

	$(window).scroll(function(){
		if ($(".about-s3").is(":visible")) {
			// The element is visible
			countNow("count0", half0, count0, 100);
			countNow("count1", half1, count1, 100);
			countNow("count2", half2, count2, 100);
			countNow("count3", half3, count3, 100);
		} else {
		    // nothing element not visible
		}
	});

});