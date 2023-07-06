// Show Contact
function showContact() {
  $('.contact-slide').css('bottom', '0');
}

function closeContact() {
  $('.contact-slide').css('bottom', '-550px');
}


// Smooth Scroll Effect
$('.navbar-expand-lg, .nav-link, .navbar-brand, .new-button').click(function() {
    var sectionTo = $(this).attr('href');
    $('html, body').animate({
      scrollTop: $(sectionTo).offset().top
    }, 1500);
});


/*====================================================================
Slider Header Section
======================================================================*/

(function() {
  var $slides = document.querySelectorAll('.slide');
  var $controls = document.querySelectorAll('.slider__control');
  var numOfSlides = $slides.length;
  var slidingAT = 1300; // sync this with scss variable
  var slidingBlocked = false;

  [].slice.call($slides).forEach(function($el, index) {
    var i = index + 1;
    $el.classList.add('slide-' + i);
    $el.dataset.slide = i;
  });

  [].slice.call($controls).forEach(function($el) {
    $el.addEventListener('click', controlClickHandler);
  });

  function controlClickHandler() {
    if (slidingBlocked) return;
    slidingBlocked = true;

    var $control = this;
    var isRight = $control.classList.contains('m--right');
    var $curActive = document.querySelector('.slide.s--active');
    var index = +$curActive.dataset.slide;
    (isRight) ? index++ : index--;
    if (index < 1) index = numOfSlides;
    if (index > numOfSlides) index = 1;
    var $newActive = document.querySelector('.slide-' + index);

    $control.classList.add('a--rotation');
    $curActive.classList.remove('s--active', 's--active-prev');
    document.querySelector('.slide.s--prev').classList.remove('s--prev');

    $newActive.classList.add('s--active');
    if (!isRight) $newActive.classList.add('s--active-prev');


    var prevIndex = index - 1;
    if (prevIndex < 1) prevIndex = numOfSlides;

    document.querySelector('.slide-' + prevIndex).classList.add('s--prev');

    setTimeout(function() {
      $control.classList.remove('a--rotation');
      slidingBlocked = false;
    }, slidingAT*0.75);
  };
}());
















var Slider = (function() {
    var initSlider = function() {
        var dir = $("html").attr("dir");
        var swipeHandler = new Hammer(document.getElementById("slider"));
        swipeHandler.on('swipeleft', function(e) {
            if (dir == "rtl")
                $(".arrow-left").trigger("click");
            else
                $(".arrow-right").trigger("click");
        });

        swipeHandler.on('swiperight', function(e) {
            if (dir == "rtl")
                $(".arrow-right").trigger("click");
            else
                $(".arrow-left").trigger("click");
        });

        $(".arrow-right , .arrow-left").click(function(event) {
            var nextActiveSlide = $(".slide.active").next();

            if ($(this).hasClass("arrow-left"))
                nextActiveSlide = $(".slide.active").prev();

            if (nextActiveSlide.length > 0) {
                var nextActiveIndex = nextActiveSlide.index();
                $(".dots span").removeClass("active");
                $($(".dots").children()[nextActiveIndex]).addClass("active");

                updateSlides(nextActiveSlide);
            }
        });

        $(".dots span").click(function(event) {
            var slideIndex = $(this).index();
            var nextActiveSlide = $($(".slider").children()[slideIndex]);
            $(".dots span").removeClass("active");
            $(this).addClass("active");

            updateSlides(nextActiveSlide);
        });

        var updateSlides = function(nextActiveSlide) {
            var nextActiveSlideIndex = $(nextActiveSlide).index();

            $(".slide").removeClass("prev-1");
            $(".slide").removeClass("next-1");
            $(".slide").removeClass("active");
            $(".slide").removeClass("prev-2");
            $(".slide").removeClass("next-2");

            nextActiveSlide.addClass("active");

            nextActiveSlide.prev().addClass("prev-1");
            nextActiveSlide.prev().prev().addClass("prev-2");
            nextActiveSlide.addClass("active");
            nextActiveSlide.next().addClass("next-1");
            nextActiveSlide.next().next().addClass("next-2");
        }

        var updateToNextSlide = function(nextActiveSlide)
        {

        }
    }
    return {
        init: function() {
            initSlider();
        }
    }
})();

$(function() {
    Slider.init();
});
