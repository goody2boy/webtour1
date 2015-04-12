$(document).ready(function(){

	//heartslider
	$('#heartslider').owlCarousel({
		loop:true,
		margin:0,
		responsiveClass:true,
		nav:true,
		dots:false,
		autoplay:true,
		autoHeight:false,
		autoplayTimeout:4000,
		autoplayHoverPause:false,
		responsive:{
			0:{
				items:1
			},
			534:{
				items:2
			},
			768:{
				items:3
			}
		}
	});
	
	//commentslider
	$('#commentslider').owlCarousel({
		loop:true,
		margin:0,
		responsiveClass:true,
		nav:false,
		dots:true,
		autoplay:true,
		autoHeight:false,
		autoplayTimeout:4000,
		autoplayHoverPause:false,
		responsive:{
			0:{
				items:1
			},
			768:{
				items:2
			}
		}
	});
	
	//infoslider
	$('#infoslider').owlCarousel({
		loop:true,
		items:1,
		margin:0,
		responsiveClass:false,
		nav:false,
		dots:true,
		autoplay:true,
		autoHeight:false,
		autoplayTimeout:4000,
		autoplayHoverPause:false,
	});
	
	//tdslider
	$('#tdslider').owlCarousel({
		loop:false,
		margin:0,
		responsiveClass:true,
		nav:true,
		dots:false,
		autoplay:false,
		autoHeight:false,
		autoplayTimeout:4000,
		autoplayHoverPause:false,
		responsive:{
			0:{
				items:1
			},
			534:{
				items:2
			},
			768:{
				items:3
			}
		}
	});

});