$(document).ready(function(){
	
	//sticky nav
	$(".navbar").sticky({topSpacing:0});
	
	//bxslider
	$('.bxslider').bxSlider({
		mode: 'fade',
		easing: 'ease-in-out',
		speed: 100,  
	});
	
	//wow.js for animation.css
	new WOW().init();
	
	//parallax
	$('.parallax-slider').parallax("50%", 0.5);
	$('.parallax-bg-1').parallax("50%", 0.4);
	$('.parallax-bg-2').parallax("50%", 0.4);
	$('.parallax-bg-3').parallax("50%", 0.4);
	$('.parallax-bg-4').parallax("50%", 0.4);
	$('.parallax-bg-5').parallax("50%", 0.4);
	$('.parallax-bg-6').parallax("50%", 0.4);
	$('.parallax-bg-7').parallax("50%", 0.4);
	$('.parallax-bg-8').parallax("50%", 0.4);
	$('.parallax-bg-9').parallax("50%", 0.4);
	$('.parallax-bg-10').parallax("50%", 0.4);
	$('.parallax-bg-11').parallax("50%", 0.4);
	$('.parallax-bg-12').parallax("50%", 0.4);
	
	//skills
	setTimeout(function(){
		$('.progress .progress-bar').each(function() {
			var me = $(this);
			var perc = me.attr("data-percentage");

			//TODO: left and right text handling

			var current_perc = 0;

			var progress = setInterval(function() {
				if (current_perc>=perc) {
					clearInterval(progress);
				} else {
					current_perc +=1;
					me.css('width', (current_perc)+'%');
				}
				var meandclass = me.find(".skills-percentage");
				meandclass.text((current_perc)+'%');

			}, 50);

		});

	},50);
	
	//jQuery to collapse the navbar on scroll
	$(window).scroll(function() {
		if ($(".navbar").offset().top > 10) {
			$(".zetta-menu").addClass("top-nav-collapse");
		} else {
			$(".zetta-menu").removeClass("top-nav-collapse");
		}
	});
	
	//==================
	//COUNT TO==========
	//==================
	$('.timer').countTo();
	
	
	//=================
	//OWL CAROUSELS====
	//=================
	
	//owl slider
	$(".slider").owlCarousel({
    	autoPlay: 5000,
		singleItem:true,
		stopOnHover:true
  	});
  	
  	$(".slider2").owlCarousel({
    	autoPlay: 10000,
		singleItem:true,
		stopOnHover:true
  	});
	
	//owl carousel
	$(".partners").owlCarousel({
    	autoPlay: 8000,
    	items : 6,
    	itemsDesktop : [1199,5],
    	itemsDesktopSmall : [979,3]
  	});
  	
  	// carousel servizi
  	$(".services").owlCarousel({
    	autoPlay: 8000,
    	items : 4,
    	itemsDesktop : [1199,3],
    	itemsDesktopSmall : [979,2]
  	});
	
	//placeholder
	$(':input[placeholder]').placeholder();
	
});

//half object
var width = ($(".product-button").width() / 2);
var height = ($(".product-button").height() / 2);
$(".product-button").css({
	'margin-top': -height+'px',
	'margin-left': -width+'px',
});

