$(document).ready(function(){
	
	//expand menu
    $('.menu-expand').click(function() {
        if ($('.menu').hasClass("menu-tiny")) {
			$(this).removeClass("active")
            $('.menu').removeClass("menu-tiny");
			$('.menu').slideUp();
			$('.header').addClass("header-pc");
        } else {
			$(this).addClass("active");
            $('.menu').addClass("menu-tiny");
			$('.menu').slideDown();
			$('.header').removeClass("header-pc");
        }
        return false;
    });
	
	//expand submenu
    $('.menu > ul > li > a > .btn-submenu').click(function() {
		var grand = $(this).parent().parent();
		var root = $(this).parent().parent().parent();
        if ($(this).hasClass("fa-plus")) {
            $(this).removeClass("fa-plus");
			$(this).addClass("fa-minus");
			$('li.mobile-active > .submenu',$(root)).slideUp();
			$('li.mobile-active > a > .btn-submenu',$(root)).removeClass("fa-minus");
			$('li.mobile-active > a > .btn-submenu',$(root)).addClass("fa-plus");
			$('li',$(root)).removeClass("mobile-active");
			$(grand).addClass("mobile-active");
			$('.submenu',$(grand)).slideDown();
			$('.menu').addClass("menu-pc");
        } else {
            $(this).removeClass("fa-minus");
			$(this).addClass("fa-plus");
			$(grand).removeClass("mobile-active");
			$('.submenu',$(grand)).slideUp();
			$('.menu').removeClass("menu-pc");
        }
        return false;
    });
	
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
	
	//request click
    $('.option-title .fa').click(function() {
		var parent = $(this).parent();
		var grand = $(this).parent().parent();
        if ($(this).hasClass("fa-plus")) {
            $(this).removeClass("fa-plus");
			$(this).addClass("fa-minus");
			$('.tr-form',$('.tr-option .active')).slideUp();
			$('.fa',$('.tr-option .active')).removeClass("fa-minus").addClass("fa-plus");
			$('.option-item',$('.tr-option')).removeClass("active");
			$(grand).addClass("active");
			$('.tr-form',$(grand)).slideDown();
        } else {
            $(this).removeClass("fa-minus");
			$(this).addClass("fa-plus");
			$(grand).removeClass("active");
			$('.tr-form',$(grand)).slideUp();
        }
        return false;
    });
	
	//footer menu mobile click
    $('.footer-lb .fa').click(function() {
		var grand = $(this).parent().parent();
        if ($(this).hasClass("fa-plus")) {
            $(this).removeClass("fa-plus");
			$(this).addClass("fa-minus");
			$('.footer-content',$(grand)).slideDown();
        } else {
            $(this).removeClass("fa-minus");
			$(this).addClass("fa-plus");
			$('.footer-content',$(grand)).slideUp();
        }
        return false;
    });

});