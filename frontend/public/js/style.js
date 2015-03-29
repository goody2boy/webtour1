$(document).ready(function(){

	//navigator
	$(window).scroll(function(){
		if($(this).scrollTop() >= 47){
			$('.navigator').addClass("navigator-fixed");
			$('body').css("padding-top","47px");
		}
		if($(this).scrollTop() < 47){
			$('.navigator').removeClass("navigator-fixed");	
			$('body').css("padding-top","0");
		}
	});
	
	//expand submenu
    $('.btn-submenu').click(function() {
		var grand = $(this).parent().parent();
        if ($(this).hasClass("fa-plus")) {
            $(this).removeClass("fa-plus");
			$(this).addClass("fa-minus");
			$(grand).addClass("active");
			$('ul',$(grand)).slideDown();
        } else {
            $(this).removeClass("fa-minus");
			$(this).addClass("fa-plus");
			$(grand).removeClass("active");
			$('ul',$(grand)).slideUp();
        }
        return false;
    });
	
	//heartslider
	$('#heartslider').owlCarousel({
		items:1,
		loop:true,
		margin:0,
		responsiveClass:false,
		nav:true,
		dots:true,
		autoplay:true,
		autoHeight:false,
		autoplayTimeout:4000,
		autoplayHoverPause:false
	});
	
	//hpslider
	$('#hpslider').owlCarousel({
		loop:true,
		margin:20,
		responsiveClass:true,
		nav:true,
		dots:false,
		autoplay:true,
		autoHeight:false,
		autoplayTimeout:4000,
		autoplayHoverPause:true,
		responsive:{
			0:{
				items:1
			},
			481:{
				items:2
			},
			992:{
				items:3
			}
		}
	});
	
	//news tabs
	$(".news-tabs a").click(function() {
		var parent = $(this).parent();
		var root = $(this).parent().parent().parent().parent().parent();
		$(".news-tabs li",(root)).removeClass("active");
		$(parent).addClass("active");
		$(".hs-content",(root)).removeClass("active");
		var activeTab = $(this).attr("href");
		$(activeTab).addClass("active");
		return false;
	});
	
	//hnslider
	$('.hnslider').owlCarousel({
		loop:true,
		margin:11,
		responsiveClass:true,
		nav:true,
		dots:false,
		autoplay:false,
		autoHeight:false,
		autoplayTimeout:4000,
		autoplayHoverPause:true,
		responsive:{
			0:{
				items:1
			},
			481:{
				items:2
			},
			641:{
				items:3
			},
			992:{
				items:4
			}
		}
	});
	
	//logoslider
	$('#logoslider').owlCarousel({
		loop:true,
		margin:11,
		responsiveClass:true,
		nav:true,
		dots:false,
		autoplay:true,
		autoHeight:false,
		autoplayTimeout:4000,
		autoplayHoverPause:true,
		responsive:{
			0:{
				items:1
			},
			321:{
				items:2
			},
			481:{
				items:3
			},
			641:{
				items:4
			},
			992:{
				items:6
			}
		}
	});
	
	// menu sidebar click
	$('a', $('.menu-sidebar li')).click(function() {
		var id = $(this).attr('href');
		$("html, body").animate({scrollTop: $(id).offset().top - 40}, 700);
		return false;
	});
	
	//Image slider
	$('#imageslider').owlCarousel({
		margin:0,
		responsiveClass:true,
		nav:true,
		dots:false,
		autoplay:false,
		autoHeight:false,
		autoplayTimeout:4000,
		autoplayHoverPause:true,
		responsive:{
			0:{
				items:3
			},
			768:{
				items:3
			},
			992:{
				items:4
			}
		}
	});
	
	//image detail click
    $('.pi-item a').click(function() {
		var parent = $(this).parent();
		var grand = $(this).parent().parent().parent();
		var x = $(this).attr('href');
		$('.pi-item',$(grand)).removeClass("active");
		$(parent).addClass("active");
		$('a',$(grand)).addClass("gallery-group");
		$(this).removeClass("gallery-group");
		$('.zoom-btn-small').attr('href',x);
        return false;
    });
	
	//CloudZoom
	CloudZoom.quickStart();
	
	//view gallery image
	$(".gallery-group").fancybox({
		padding : 10
	});
	
	//animate
	var viewport = $(window).width();
    if (viewport > 768) {
		
		$('.box-about .col-md-4:eq(0)').one('inview', function (event, visible) {
    	if (visible) {   $(this).addClass('animated fadeInUp delayp2');   }});
		$('.box-about .col-md-4:eq(1)').one('inview', function (event, visible) {
    	if (visible) {   $(this).addClass('animated fadeInUp delayp4');   }});
		$('.box-about .col-md-4:eq(2)').one('inview', function (event, visible) {
    	if (visible) {   $(this).addClass('animated fadeInUp delayp6');   }});
		$('.box-video .box').one('inview', function (event, visible) {
    	if (visible) {   $(this).addClass('animated fadeInLeft delayp2');   }});
		$('.box-video .video-thumb').one('inview', function (event, visible) {
    	if (visible) {   $(this).addClass('animated bounceIn delayp4');   }});
		$('#product-id').one('inview', function (event, visible) {
    	if (visible) {   $(this).addClass('animated fadeInUp delayp2');   }});
		$('.box-banner').one('inview', function (event, visible) {
    	if (visible) {   $(this).addClass('animated pulse delayp4');   }});
		$('#app-id').one('inview', function (event, visible) {
    	if (visible) {   $(this).addClass('animated bounceIn delayp6');   }});
		$('#news-id').one('inview', function (event, visible) {
    	if (visible) {   $(this).addClass('animated fadeInUp delayp8');   }});
		$('#guest-id').one('inview', function (event, visible) {
    	if (visible) {   $(this).addClass('animated flipInX delayp2');   }});
		$('.logo-footer, .footer .box-title').one('inview', function (event, visible) {
    	if (visible) {   $(this).addClass('animated fadeInDown delayp2');   }});
		$('.footer .box-content').one('inview', function (event, visible) {
    	if (visible) {   $(this).addClass('animated fadeInUp delayp4');   }});
		$('.fad-p').one('inview', function (event, visible) {
		if (visible) {   $(this).addClass('animated fadeInUp delayp4');   }});
		$('.fad-ul').one('inview', function (event, visible) {
    	if (visible) {   $(this).addClass('animated bounceIn delayp6');   }});
		$('.footer-order').one('inview', function (event, visible) {
    	if (visible) {   $(this).addClass('animated fadeInUp delayp8');   }});
		$('.footer-social').one('inview', function (event, visible) {
    	if (visible) {   $(this).addClass('animated fadeInRight delayp2');   }});
		$('.copyright').one('inview', function (event, visible) {
    	if (visible) {   $(this).addClass('animated fadeInUp delayp4');   }});
		$('.menu-footer ul').one('inview', function (event, visible) {
    	if (visible) {   $(this).addClass('animated fadeInLeft delayp6');   }});
		
	}

});