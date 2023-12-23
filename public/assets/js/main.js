(function ($) {
 "use strict";
	// Loader
	$('.loader').fadeOut('slow', function () {
        $(this).remove();
    });

	/*----------------------------
	 jQuery MeanMenu
	------------------------------ */
	$('nav#dropdown').meanmenu();
	/*----------------------------
	 jQuery myTab
	------------------------------ */
	$('#myTab a').on('click', function (e) {
		  e.preventDefault()
		  $(this).tab('show')
		});
		$('#myTab3 a').on('click', function (e) {
		  e.preventDefault()
		  $(this).tab('show')
		});
		$('#myTab4 a').on('click', function (e) {
		  e.preventDefault()
		  $(this).tab('show')
		});
		$('#myTabedu1 a').on('click', function (e) {
		  e.preventDefault()
		  $(this).tab('show')
		});

	  $('#single-product-tab a').on('click', function (e) {
		  e.preventDefault()
		  $(this).tab('show')
		});

	$('[data-bs-toggle="tooltip"]').tooltip();

	$('#sidebarCollapse').on('click', function () {
		 $('#sidebar').toggleClass('active');
	 });
	// Collapse ibox function
	$('#sidebar ul li').on('click', function () {
		var button = $(this).find('i.fa.indicator-mn');
		button.toggleClass('fa-plus').toggleClass('fa-minus');

	});
	/*-----------------------------
		Menu Stick
	---------------------------------*/
	// $(".menu-listing").find("a").removeClass("active");
	// $(".menu-listing").find("li").removeClass("active");

	// var current = window.location.pathname;
	// $(".menu-listing li a").filter(function () {
	// var link = $(this).attr("href");
	// if (link) {
	// 	if (current.indexOf(link) != -1) {
	// 	$(this).parents().children("a").addClass("active");
	// 	$(this).parents().parents().children("ul").css("display", "block");
	// 	$(this).addClass("active");
	// 	return false;
	// 	}
	// }
	// });

	// $(".system_menu").find("a").removeClass("active");
	// $(".system_menu").find("li").removeClass("active");

	// var current = window.location.pathname;
	// $(".system_menu li a").filter(function () {
	// var link = $(this).attr("href");
	// if (link) {
	// 	if (current.indexOf(link) != -1) {
	// 	$(this).parents().children("a").addClass("active");
	// 	$(this).parents().parents().children("ul").css("display", "block");
	// 	$(this).addClass("active");
	// 	return false;
	// 	}
	// }
	// });
	/*----------------------------
	 wow js active
	------------------------------ */
	 new WOW().init();
	/*----------------------------
	 owl active
	------------------------------ */
	$("#owl-demo").owlCarousel({
      autoPlay: false,
	  slideSpeed:2000,
	  pagination:false,
	  navigation:true,
      items : 4,
	  /* transitionStyle : "fade", */    /* [This code for animation ] */
	  navigationText:["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
      itemsDesktop : [1199,4],
	  itemsDesktopSmall : [980,3],
	  itemsTablet: [768,2],
	  itemsMobile : [479,1],
	});
	/*----------------------------
	 price-slider active
	------------------------------ */
	  $( "#slider-range" ).slider({
	   range: true,
	   min: 40,
	   max: 600,
	   values: [ 60, 570 ],
	   slide: function( event, ui ) {
		$( "#amount" ).val( "£" + ui.values[ 0 ] + " - £" + ui.values[ 1 ] );
	   }
	  });
	  $( "#amount" ).val( "£" + $( "#slider-range" ).slider( "values", 0 ) +
	   " - £" + $( "#slider-range" ).slider( "values", 1 ) );
	/*--------------------------
	 scrollUp
	---------------------------- */
	$.scrollUp({
        scrollText: '<i class="fa fa-angle-up"></i>',
        easingType: 'linear',
        scrollSpeed: 900,
        animation: 'fade'
    });

})(jQuery);
