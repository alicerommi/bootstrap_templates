/*====================================================================
Navbar Smooth Scroll
======================================================================*/
$(function() {
    $(window).scroll(function() {
        if ($(window).scrollTop() >= 100) {
            $('.navbar-expand-lg').addClass('scrolled');
        } else {
            $('.navbar-expand-lg').removeClass('scrolled');
        }
    });
});

/*====================================================================
Back to Top
======================================================================*/
$(document).ready(function() {
    // Show or hide the sticky footer button
    $(window).scroll(function() {
        if ($(this).scrollTop() > 200) {
            $('.go-top').fadeIn(200);
        } else {
            $('.go-top').fadeOut(200);
        }
    });

    // Animate the scroll to top
    $('.go-top').click(function(event) {
        event.preventDefault();

        $('html, body').animate({
            scrollTop: 0
        }, 300);
    })
});

/*====================================================================
Counter Duration
======================================================================*/
$('.counter').each(function() {
    var $this = $(this),
        countTo = $this.attr('data-count');

    $({
        countNum: $this.text()
    }).animate({
            countNum: countTo
        },

        {

            duration: 8000,
            easing: 'linear',
            step: function() {
                $this.text(Math.floor(this.countNum));
            },
            complete: function() {
                $this.text(this.countNum);
                //alert('finished');
            }

        });

});

/*====================================================================
FancyBox Image Gallery
======================================================================*/
$(".fancybox").fancybox();

(function($) {

    var Slider = (function() {

        function _Slider(element, settings) {
            this.defaults = {
                slideDuration: '3000',
                speed: 500
                /*
                ,
                arrowRight: '.right-arrow',
                arrowLeft: '.left-arrow'
                */
            };

            this.settings = $.extend({}, this.defaults, settings);

            this.initials = {
                currentSlide: 0,
                $currentSlide: null,
                totalSlides: false,
                cssTransitions: false
            };

            $.extend(this, this.initials);

            this.$el = $(element);

            this.changeSlide = $.proxy(this.changeSlide, this);

            this.init();

        }

        return _Slider;

    })();

    /*====================================================================
    Testimonial Slider
    ======================================================================*/
    Slider.prototype.init = function() {
        this.cssTransitionTest();
        this.$el.addClass('slider');
        this.build();
        this.events();
        this.activate();
        this.initTimer();
    };

    Slider.prototype.cssTransitionTest = function() {
        var elem = document.createElement('modernizr');

        var props = ['transition', 'WebkitTransition', 'MozTransition', 'OTransition', 'msTransition'];

        for (var i in props) {
            var prop = props[i];
            var result = elem.style[prop] !== undefined ? prop : false;
            if (result) {
                this.cssTransitions = result;
                break;
            }
        }
    };

    Slider.prototype.addCSSDuration = function() {
        var sliderModule = this;

        sliderModule.$el.find('.testimonial-slide').each(function() {

            this.style[sliderModule.cssTransitions + 'Duration'] = sliderModule.settings.speed + 'ms';
        });
    };

    Slider.prototype.removeCSSDuration = function() {
        var sliderModule = this;

        //here we are using 'this' but we can also write sliderModule
        //since we are refering to the same element...shorter and cleaner
        this.$el.find('.testimonial-slide').each(function() {
            this.style[sliderModule.cssTransitions + 'Duration'] = '';
        });
    };


    //create indicator dots below which also have the functionality
    //as the arrows
    Slider.prototype.build = function() {
        var $indicators = this.$el.append("<ul class='dots-wrapper'>").find('.dots-wrapper');
        this.totalSlides = this.$el.find('.testimonial-slide').length;
        for (var i = 0; i < this.totalSlides; i++) {
            $indicators.append("<li data-index=" + i + ">");
        }
    };

    Slider.prototype.activate = function() {
        this.$currentSlide = this.$el.find('.testimonial-slide').eq(0);
        this.$el.find('.dots-wrapper li').eq(0).addClass('active');
    };

    Slider.prototype.events = function() {
        $('body')
            .on('click', this.settings.arrowRight, {
                direction: 'right'
            }, this.changeSlide)
            .on('click', this.settings.arrowLeft, {
                direction: 'left'
            }, this.changeSlide)
            .on('click', '.dots-wrapper li', this.changeSlide);
    };

    Slider.prototype.clearTimer = function() {
        if (this.timer) {
            clearInterval(this.timer);
        }
    };

    Slider.prototype.initTimer = function() {
        this.timer = setInterval(
            this.changeSlide, this.settings.slideDuration);
    };

    Slider.prototype.startTimer = function() {
        this.initTimer();
        this.throttle = false;
    };

    Slider.prototype.changeSlide = function(e) {
        if (this.throttle) {
            return;
        }
        this.throttle = true;

        this.clearTimer();

        var direction = this._direction(e);

        var animate = this._next(e, direction);
        if (!animate) {
            return;
        }

        var $nextSlide = this.$el.find('.testimonial-slide').eq(this.currentSlide).addClass(direction + ' active');

        if (!this.csstransitions) {
            this._jsAnimation($nextSlide, direction);
        } else {
            this._cssAnimation($nextSlide, direction);
        }
    };

    Slider.prototype._direction = function(e) {
        var direction;
        if (typeof e !== 'undefined') {
            direction = (typeof e.data === 'undefined' ? 'right' : e.data.direction);
        } else {
            direction = 'right';
        }
        return direction;
    };

    Slider.prototype._next = function(e, direction) {
        var index = (typeof e !== 'undefined' ? $(e.currentTarget).data('index') : undefined);
        switch (true) {
            case (typeof index !== 'undefined'):
                if (this.currentSlide == index) {
                    this.startTimer();
                    return false;
                }
                this.currentSlide = index;
                break;
            case (direction == 'right' && this.currentSlide < (this.totalSlides - 1)):
                this.currentSlide++;
                break;
            case (direction == 'right'):
                this.currentSlide = 0;
                break;
            case (direction == 'left' && this.currentSlide === 0):
                this.currentSlide = (this.totalSlides - 1);
                break;
            case (direction == 'left'):
                this.currentSlide--;
                break;
        }
        return true;
    };

    Slider.prototype._cssAnimation = function($nextSlide, direction) {
        setTimeout(function() {
            this.$el.addClass('transition');
            this.addDuration();
            this.$currentSlide.addClass('shift' + direction);
        }.bind(this), 100);

        setTimeout(function() {
            this.$el.removeClass('transition');
            this.removeCSSDuration();
            this.$currentSlide.removeClass('active shift-left shift-right');
            this.$currentSlide = $nextSlide.removeClass(direction);
            this._updateIndicators();
            this.startTimer();
        }.bind(this), 100 + this.settings.speed);
    };

    Slider.prototype._jsAnimation = function($nextSlide, direction) {
        var sliderModule = this;

        if (direction == 'right') {
            sliderModule.$currentSlide.addClass('js-reset-left');
        }
        var animation = {};
        animation[direction] = '0%';

        var animationPrev = {};
        animationPrev[direction] = '100%';

        this.$currentSlide.animate(animationPrev, this.settings.speed);

        $nextSlide.animate(animation, this.settings.speed, 'swing', function() {
            sliderModule.$currentSlide.removeClass('active js-reset-left').attr('style', '');
            sliderModule.$currentSlide = $nextSlide.removeClass(direction).attr('style', '');
            sliderModule._updateIndicators();
            sliderModule.startTimer();
        });
    };

    Slider.prototype._updateIndicators = function() {
        this.$el.find('.dots-wrapper li').removeClass('active').eq(this.currentSlide).addClass('active');
    };

    $.fn.Slider = function(options) {
        return this.each(function(index, el) {
            el.Slider = new Slider(el, options);
        });
    };

var args = {
    arrowRight: '.right-arrow',
    arrowLeft: '.left-arrow',
    speed: 500,
    slideDuration: 3000
};

$('.testimonial').Slider(args);
})(jQuery);

/*====================================================================
Filter Area
======================================================================*/
$(document).ready(function() {
    $(".filter-tech").click(function() {
        $(".arch, .nature").fadeOut(200);
        $(".tech").fadeIn(200);
    });
    $(".filter-arch").click(function() {
        $(".tech, .nature").fadeOut(200);
        $(".arch").fadeIn(200);
    });
    $(".filter-nature").click(function() {
        $(".tech, .arch").fadeOut(200);
        $(".nature").fadeIn(200);
    });
    $(".filter-all").click(function() {
        $(".tech, .arch, .nature").fadeIn(200);
    });
});

/*====================================================================
Google Map
======================================================================*/
// // map center
// var center = new google.maps.LatLng(40.589500, -8.683542);
//
// // marker position
// var factory = new google.maps.LatLng(40.589500, -8.683542);
//
// function initialize() {
// var mapOptions = {
//   center: center,
//   zoom: 16,
//   mapTypeId: google.maps.MapTypeId.ROADMAP
// };
//
// var map = new google.maps.Map(document.getElementById("map-canvas"),mapOptions);
//
// // InfoWindow content
// var content = '<div id="iw-container">' +
//                   '<div class="iw-title">Porcelain Factory of Vista Alegre</div>' +
//                   '<div class="iw-content">' +
//                     '<div class="iw-subTitle">History</div>' +
//                     '<img src="http://maps.marnoto.com/en/5wayscustomizeinfowindow/images/vistalegre.jpg" alt="Porcelain Factory of Vista Alegre" height="115" width="83">' +
//                     '<p>Founded in 1824, the Porcelain Factory of Vista Alegre was the first industrial unit dedicated to porcelain production in Portugal. For the foundation and success of this risky industrial development was crucial the spirit of persistence of its founder, José Ferreira Pinto Basto. Leading figure in Portuguese society of the nineteenth century farm owner, daring dealer, wisely incorporated the liberal ideas of the century, having become "the first example of free enterprise" in Portugal.</p>' +
//                     '<div class="iw-subTitle">Contacts</div>' +
//                     '<p>VISTA ALEGRE ATLANTIS, SA<br>3830-292 Ílhavo - Portugal<br>'+
//                     '<br>Phone. +351 234 320 600<br>e-mail: geral@vaa.pt<br>www: www.myvistaalegre.com</p>'+
//                   '</div>' +
//                   '<div class="iw-bottom-gradient"></div>' +
//                 '</div>';
//
// // A new Info Window is created and set content
// var infowindow = new google.maps.InfoWindow({
//   content: content,
//
//   // Assign a maximum value for the width of the infowindow allows
//   // greater control over the various content elements
//   maxWidth: 350
// });
//
// // marker options
// var marker = new google.maps.Marker({
//   position: factory,
//   map: map,
//   title:"Porcelain Factory of Vista Alegre"
// });
//
// // This event expects a click on a marker
// // When this event is fired the Info Window is opened.
// google.maps.event.addListener(marker, 'click', function() {
//   infowindow.open(map,marker);
// });
//
// // Event that closes the Info Window with a click on the map
// google.maps.event.addListener(map, 'click', function() {
//   infowindow.close();
// });
//
// // *
// // START INFOWINDOW CUSTOMIZE.
// // The google.maps.event.addListener() event expects
// // the creation of the infowindow HTML structure 'domready'
// // and before the opening of the infowindow, defined styles are applied.
// // *
// google.maps.event.addListener(infowindow, 'domready', function() {
//
//   // Reference to the DIV that wraps the bottom of infowindow
//   var iwOuter = $('.gm-style-iw');
//
//   /* Since this div is in a position prior to .gm-div style-iw.
//    * We use jQuery and create a iwBackground variable,
//    * and took advantage of the existing reference .gm-style-iw for the previous div with .prev().
//   */
//   var iwBackground = iwOuter.prev();
//
//   // Removes background shadow DIV
//   iwBackground.children(':nth-child(2)').css({'display' : 'none'});
//
//   // Removes white background DIV
//   iwBackground.children(':nth-child(4)').css({'display' : 'none'});
//
//   // Moves the infowindow 115px to the right.
//   iwOuter.parent().parent().css({left: '115px'});
//
//   // Moves the shadow of the arrow 76px to the left margin.
//   iwBackground.children(':nth-child(1)').attr('style', function(i,s){ return s + 'left: 76px !important;'});
//
//   // Moves the arrow 76px to the left margin.
//   iwBackground.children(':nth-child(3)').attr('style', function(i,s){ return s + 'left: 76px !important;'});
//
//   // Changes the desired tail shadow color.
//   iwBackground.children(':nth-child(3)').find('div').children().css({'box-shadow': 'rgba(72, 181, 233, 0.6) 0px 1px 6px', 'z-index' : '1'});
//
//   // Reference to the div that groups the close button elements.
//   var iwCloseBtn = iwOuter.next();
//
//   // Apply the desired effect to the close button
//   iwCloseBtn.css({opacity: '1', right: '38px', top: '3px', border: '7px solid #48b5e9', 'border-radius': '13px', 'box-shadow': '0 0 5px #3990B9'});
//
//   // If the content of infowindow not exceed the set maximum height, then the gradient is removed.
//   if($('.iw-content').height() < 140){
//     $('.iw-bottom-gradient').css({display: 'none'});
//   }
//
//   // The API automatically applies 0.7 opacity to the button after the mouseout event. This function reverses this event to the desired value.
//   iwCloseBtn.mouseout(function(){
//     $(this).css({opacity: '1'});
//   });
// });
// }
// google.maps.event.addDomListener(window, 'load', initialize);



/*====================================================================
Calendar Area
======================================================================*/


// Video Slider Js
var slideWrapper = $(".main-slider"),
  iframes = slideWrapper.find('.embed-player'),
  lazyImages = slideWrapper.find('.slide-image'),
  lazyCounter = 0;

// POST commands to YouTube or Vimeo API
function postMessageToPlayer(player, command){
if (player == null || command == null) return;
player.contentWindow.postMessage(JSON.stringify(command), "*");
}

// When the slide is changing
function playPauseVideo(slick, control){
var currentSlide, slideType, startTime, player, video;

currentSlide = slick.find(".slick-current");
slideType = currentSlide.attr("class").split(" ")[1];
player = currentSlide.find("iframe").get(0);
startTime = currentSlide.data("video-start");

if (slideType === "vimeo") {
  switch (control) {
    case "play":
      if ((startTime != null && startTime > 0 ) && !currentSlide.hasClass('started')) {
        currentSlide.addClass('started');
        postMessageToPlayer(player, {
          "method": "setCurrentTime",
          "value" : startTime
        });
      }
      postMessageToPlayer(player, {
        "method": "play",
        "value" : 1
      });
      break;
    case "pause":
      postMessageToPlayer(player, {
        "method": "pause",
        "value": 1
      });
      break;
  }
} else if (slideType === "youtube") {
  switch (control) {
    case "play":
      postMessageToPlayer(player, {
        "event": "command",
        "func": "mute"
      });
      postMessageToPlayer(player, {
        "event": "command",
        "func": "playVideo"
      });
      break;
    case "pause":
      postMessageToPlayer(player, {
        "event": "command",
        "func": "pauseVideo"
      });
      break;
  }
} else if (slideType === "video") {
  video = currentSlide.children("video").get(0);
  if (video != null) {
    if (control === "play"){
      video.play();
    } else {
      video.pause();
    }
  }
}
}

// Resize player
function resizePlayer(iframes, ratio) {
if (!iframes[0]) return;
var win = $(".main-slider"),
    width = win.width(),
    playerWidth,
    height = win.height(),
    playerHeight,
    ratio = ratio || 16/9;

iframes.each(function(){
  var current = $(this);
  if (width / ratio < height) {
    playerWidth = Math.ceil(height * ratio);
    current.width(playerWidth).height(height).css({
      left: (width - playerWidth) / 2,
       top: 0
      });
  } else {
    playerHeight = Math.ceil(width / ratio);
    current.width(width).height(playerHeight).css({
      left: 0,
      top: (height - playerHeight) / 2
    });
  }
});
}

// DOM Ready
$(function() {
// Initialize
slideWrapper.on("init", function(slick){
  slick = $(slick.currentTarget);
  setTimeout(function(){
    playPauseVideo(slick,"play");
  }, 1000);
  resizePlayer(iframes, 16/9);
});
slideWrapper.on("beforeChange", function(event, slick) {
  slick = $(slick.$slider);
  playPauseVideo(slick,"pause");
});
slideWrapper.on("afterChange", function(event, slick) {
  slick = $(slick.$slider);
  playPauseVideo(slick,"play");
});
slideWrapper.on("lazyLoaded", function(event, slick, image, imageSource) {
  lazyCounter++;
  if (lazyCounter === lazyImages.length){
    lazyImages.addClass('show');
    // slideWrapper.slick("slickPlay");
  }
});

//start the slider
slideWrapper.slick({
  // fade:true,
  autoplaySpeed: 5000,
  lazyLoad:"progressive",
  speed:600,
  arrows:false,
  dots:true,
  cssEase:"cubic-bezier(0.87, 0.03, 0.41, 0.9)"
});
});

$(".main-slider").slick({
    autoplay: true,
    autoplaySpeed: 5000,
    pauseOnHover: true,
    pauseOnFocus: true,
    dots: true,
    arrow: false,
    responsive: [{
        breakpoint: 500,
        settings: {
            dots: true,
            arrows: false,
            infinite: false,
            slidesToShow: 2,
            slidesToScroll: 2
        }
    }]
});

// Resize event
$(window).on("resize.slickVideoPlayer", function(){
resizePlayer(iframes, 16/9);
});


// Swiper Js
// var swiper = new Swiper('.swiper-container', {
//   pagination: '.swiper-pagination',
//   paginationClickable: true,
//   nextButton: '.swiper-button-next',
//   prevButton: '.swiper-button-prev',
//   spaceBetween: 30,
//   autoplay: 5000,
//   autoplayDisableOnInteraction: false
// });
