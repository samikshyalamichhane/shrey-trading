$(document).ready(function() {
	$(".cart-list-menu").click(function() {
		$(".cart__dropdown").slideToggle(400);
	});
	$(".product__slider").owlCarousel({
		loop: true,
		autoplay:true,
		autoplayTimeout: 7000,
		  smartSpeed: 800,
		  autoplayHoverPause: true,
		nav: true,
		responsive: {
			0: {
				items: 1
			},

			480:{
				items: 2
			},
			767: {
				items: 3
			},
			993: {

				items: 5

			}
		}
	});
	$(".six__slider").owlCarousel({
		loop: true,
		autoplay:true,
		autoplayTimeout: 7000,
		  smartSpeed: 800,
		  autoplayHoverPause: true,
		nav: true,
		responsive: {
			0: {
				items: 1
			},

			480:{
				items: 2
			},
			767: {
				items: 3
			},
			992: {

				items: 4
				
			},
			1000: {
				items: 4
			},

			1200: {

				items: 5
			}
		}
	});
	$(".container").imagesLoaded(function() {
		$("#exzoom").exzoom({
			autoPlay: false,
			"navItemNum": 5,
		});
		$("#exzoom").removeClass("hidden");
	});
     $(".slider__banner").owlCarousel({
    		loop: true,
    		margin: 10,
    		nav: true,
    		dots: false,
    		autoplay:true,
    		autoplayTimeout: 12000,
    		smartSpeed: 2000,
    		items: 1
    	});
});




jQuery("button.scroltop").on("click", function() {
	jQuery("html, body").animate(
		{
			scrollTop: 0
		},
		3000
	);
	return false;
});

// jQuery(window).on("scroll", function() {
// 	var scroll = jQuery(window).scrollTop();
 
// 	if (scroll > 500) {
// 		jQuery("button.scroltop").fadeIn();
// 		$('.cart').addClass('d-none');
// 	} else {
// 		jQuery("button.scroltop").fadeOut();
// 		$('.cart').removeClass('d-none');
// 	}
// });
// backend part

function FailedResponseFromDatabase(message){
        html_error = "";
        $.each(message, function(index, message){
            html_error += '<p class ="error_message text-left"> <span class="fa fa-times"></span> '+message+ '</p>';
        });
        Swal.fire({
            type: 'error',
            title: 'Oops...',
            html:html_error ,
            confirmButtonText: 'Close',
            // timer: 10000
        });
    }
    function DataSuccessInDatabase(message){
        Swal.fire({
            // position: 'top-end',
            type: 'success',
            title: 'Success',
            html: message ,
            confirmButtonText: 'Close',
            timer: 10000
        });
    }



	
$(document).ready(function() {
    $(window).scroll(function() {
      var scroll = $(window).scrollTop();
    //   if (scroll >= 10) {
    //     // $(".navbar").addClass("sticky");
    //     $(".whole-header").addClass("sticky");
    //   } else {
    //     // $(".navbar").removeClass("sticky");
    //     $(".whole-header").removeClass("sticky");
    //   }
      if (scroll > 300) {
        $(".scroll-to-top").fadeIn();
      } else {
        $(".scroll-to-top").fadeOut();
      }
    });
   
  });
  
  document.documentElement.style.setProperty('--nav-height', document.getElementById("whole-header").offsetHeight);
