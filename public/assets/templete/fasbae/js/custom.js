$(document).ready(function() {
	$(".cart__dropdown-icon").click(function() {
		$(".cart__dropdown").slideToggle(400);
	});
	$(".product__slider").owlCarousel({
		loop: true,
		margin: 30,
		nav: true,
		responsive: {
			0: {
				items: 1
			},
			600: {
				items: 4
			}
		}
	});
	$(".six__slider").owlCarousel({
		loop: true,
		margin: 30,
		nav: true,
		responsive: {
			0: {
				items: 1
			},
			600: {
				items: 4
			},
			1000: {
				items: 6
			}
		}
	});
	$(".container").imagesLoaded(function() {
		$("#exzoom").exzoom({
			autoPlay: false
		});
		$("#exzoom").removeClass("hidden");
	});
	$(".slider__banner").owlCarousel({
		loop: false,
		margin: 10,
		nav: false,
		dots: false,
		items: 1
	});
});

jQuery("button.scroltop").on("click", function() {
	jQuery("html, body").animate(
		{
			scrollTop: 0
		},
		300
	);
	return false;
});

jQuery(window).on("scroll", function() {
	var scroll = jQuery(window).scrollTop();
	console.log(scroll);
	if (scroll > 119) {
		jQuery("button.scroltop").fadeIn();
	} else {
		jQuery("button.scroltop").fadeOut();
	}
});
