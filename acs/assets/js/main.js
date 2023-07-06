 // Developed By: http://binary6.pk/ 
 //  Email: sami@binary6.pk, rehman@binary6.pk
 //  Mobile Number: +92335 6050509
 //  Mobile Number: +92331 8207979

var swiper = new Swiper('.hero-container', {
  slidesPerView: 1,
  spaceBetween: 5,
  centeredSlides: false,
  loop: true,
  grabCursor: true,
 speed: 3000,
 paginationClickable: true,
 parallax: true,
 autoplay: false,
 effect: "slide",
 mousewheelControl: 1,
  // direction: 'vertical',
  autoplay: {
    delay: 2500,
    disableOnInteraction: false,
  },
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },
  pagination: {
    el: '.hero-pagination',
    clickable: true,
  },
  breakpoints: {
    320: {
      slidesPerView: 1,
      spaceBetween: 20,
    },
    640: {
      slidesPerView: 1,
      spaceBetween: 10,
    },
    768: {
      slidesPerView: 1,
      spaceBetween: 10,
    },
    1024: {
      slidesPerView: 1,
      spaceBetween: 10,
    },
    1300: {
      slidesPerView: 1,
      spaceBetween: 10,
    },
    1600: {
      slidesPerView: 1,
      spaceBetween: 5,
    },
    1700: {
      slidesPerView: 1,
      spaceBetween: 10,
    }
  }
});


var swiper = new Swiper('.testimonial-container', {
  slidesPerView: 3,
  spaceBetween: 5,
  centeredSlides: false,
  loop: true,
  grabCursor: true,
 speed: 1000,
 paginationClickable: true,
 parallax: true,
 autoplay: false,
 effect: "slide",
 mousewheelControl: 1,
  // direction: 'vertical',
  // autoplay: {
  //   delay: 2500,
  //   disableOnInteraction: false,
  // },
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },
  pagination: {
    el: '.testimonial-pagination',
    clickable: true,
  },
  breakpoints: {
    320: {
      slidesPerView: 1,
      spaceBetween: 20,
    },
    640: {
      slidesPerView: 1,
      spaceBetween: 10,
    },
    768: {
      slidesPerView: 1,
      spaceBetween: 10,
    },
    1024: {
      slidesPerView: 2,
      spaceBetween: 10,
    },
    1300: {
      slidesPerView: 3,
      spaceBetween: 10,
    },
    1600: {
      slidesPerView: 3,
      spaceBetween: 5,
    },
    1700: {
      slidesPerView: 3,
      spaceBetween: 10,
    }
  }
});



$(document).ready(function(){
	$(window).bind('scroll', function() {
		var navHeight = $('#header').height();
		if ($(window).scrollTop() > navHeight) {
			$('.navbar').addClass('fixed');
			// $('.nav').addClass('toleft');
		 }
		else {
			$('.navbar').removeClass('fixed');
			// $('.nav').removeClass('toleft');
		 }
	});
});


$('.counter').counterUp({
  delay: 10,
  time: 2000
});
$('.counter').addClass('animated fadeInDownBig');
$('.count-text').addClass('animated fadeIn');




(function($) { "use strict";

	$(document).ready(function(){"use strict";

		//Scroll back to top

		var progressPath = document.querySelector('.progress-wrap path');
		var pathLength = progressPath.getTotalLength();
		progressPath.style.transition = progressPath.style.WebkitTransition = 'none';
		progressPath.style.strokeDasharray = pathLength + ' ' + pathLength;
		progressPath.style.strokeDashoffset = pathLength;
		progressPath.getBoundingClientRect();
		progressPath.style.transition = progressPath.style.WebkitTransition = 'stroke-dashoffset 10ms linear';
		var updateProgress = function () {
			var scroll = $(window).scrollTop();
			var height = $(document).height() - $(window).height();
			var progress = pathLength - (scroll * pathLength / height);
			progressPath.style.strokeDashoffset = progress;
		}
		updateProgress();
		$(window).scroll(updateProgress);
		var offset = 50;
		var duration = 550;
		jQuery(window).on('scroll', function() {
			if (jQuery(this).scrollTop() > offset) {
				jQuery('.progress-wrap').addClass('active-progress');
			} else {
				jQuery('.progress-wrap').removeClass('active-progress');
			}
		});
		jQuery('.progress-wrap').on('click', function(event) {
			event.preventDefault();
			jQuery('html, body').animate({scrollTop: 0}, duration);
			return false;
		})


	});

})(jQuery);

// Hamburger menu
$(document).ready(function(){
  $('.navbar-menu').click(function(){
      $(this).toggleClass('open');
  });
});


// Upload file
// $(document).ready(function() {
// 	$('.file_input[type=file]').change(function() {
// 			//console.log(this.files);
// 			var f = this.files;
// 			var el = $(this).parent();
// 			if (f.length > 1) {
// 					console.log(this.files, 1);
// 					el.text('Sorry, multiple files are not allowed');
// 					return;
// 			}
// 			// el.removeClass('focus');

// 			el.html(f[0].name + '<br>' +
// 					'<span class="sml">' +
// 					'type: ' + f[0].type + ', ' +
// 					Math.round(f[0].size / 1024) + ' KB</span>');
// 	});

// 	$('.file_input[type=file]').on('focus', function() {
// 			$(this).parent().addClass('focus');
// 	});

// 	$('.file_input[type=file]').on('blur', function() {
// 			$(this).parent().removeClass('focus');
// 	});

// });


// loader
// $(window).load(function() {
//   var rnd = Math.random() * (5000 - 2000) + 2000;
//   setTimeout(function() {
//     $('#loading').slideUp("slow");
//     // $('#page').removeClass('hidden');
//   }, rnd);

// });

// loader
// $(window).load(function(max, min) {
  let min = 2;
  let max= 5;
// var rnd = Math.random() * (8000 - 2000) + 4500;
var rnd = Math.random() * (max - min) + min;;
var counter = 0;
var c = 0;
var i = setInterval(function(){
$(".loading-page .counter_load h1").html(c + "%");
$(".loading-page .counter_load hr").css("width", c + "%");
counter++;
c++;

if(counter == 101) {
clearInterval(i);
setTimeout(function() {
$('.loading-page').slideUp("slow");
}, rnd);
// console.log(rnd);
}
}, 50);


// });

// Effect animation
AOS.init();