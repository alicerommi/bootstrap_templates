(function ($) {

    "use strict";
	
	$('[data-toggle="tooltip"]').tooltip(); 
	 
	// PAGE LOADER
	$(window).on('load', function() {
		// Animate loader off screen
		$(".page-loader").fadeOut("slow");
		
		// ENABLE MASONARY
		if(isExists('.grid')){
			$('.grid').masonry({ 
				itemSelector: '.grid-item'  });
		}
		
	});
	
	
	// Dropdown functionality
	var winWidth = $(window).width();
	var isTouchDevice = (winWidth < 767) ? true : false;
	menuDropdown(isTouchDevice);

	// Window resize event for dropdown menu
	$(window).on('resize', function(){
		
		winWidth = $(window).width();
		isTouchDevice = (winWidth < 767) ? true : false;
		
		debounceFnForDropDown(isTouchDevice);
	});
	
	// PRODUCT DETAILS SCRIPT
	productDetailfn();
	
	// PRODUCT DETAILS ACCORDIAN
	enableAccordian()
	
	// PRICE RANGE FILTER
	priceRangeFilter();

	// POP UP ON CLICK
	enbalePopUpFn();

	// PARALAX SCRORR EFFECT
	paralaxScroll();
		
	// SMOOTH SCROLL ON THE SAME PAGE AFTER CLICKING A LINK
	smoothScroll();
	
	//Enable swiper slider
	enableSwiper();
	
	// Enable counter on visible
	var a = 0;
	enableCounter(a)
	
	// Circular Progress Bar
	var isAnimated = false;

	// FIXED MENU ON SCROLL
	var $fixedMenu
	
	if(isExists('.fixed-on-scroll')){
		$fixedMenu = $('.fixed-on-scroll');
		fixedMenuOnScrollFn($fixedMenu);
	}
	
	// SCROLL EVENT
	$(window).on('scroll', function() {
		
		// FIXED MENU ON SCROLL
		if(typeof $fixedMenu != 'undefined'){
			fixedMenuOnScrollFn($fixedMenu);
		}
		
		// PARALAX SCRORR EFFECT
		paralaxScroll();
		
		// BACK TO TOP VISIBLE AFTER THE CENTER OF THE PAGE
		backToTop();
		
		// Enable counter on visible
		enableCounter(a);
		
	});
	
	
	// Prevent fire an event if anchor is null
	$('a[href="#"]').on('click', function(e){

		return false;
	});
	
	// ENABLE MENU ICON FOR SMALLER DEVICE
	$('[data-menu-visible]').on('click', function(event){
		
		var $this = $(this),
			visibleHeadArea = $this.data('menu-visible');
		
		$('.nav-visible').not(visibleHeadArea).removeClass('visible');
		
		$(visibleHeadArea).toggleClass('visible');

		event.stopPropagation();
	});
	
	// BACK TO TOP VISIBLE AFTER THE CENTER OF THE PAGE
    backToTop();
	
    $('#back-to-top').on('click', function (e) {
        e.preventDefault();
        $('html,body').animate({
            scrollTop: 0
        }, 700);
    });
	
	
	// $('.review-link').on('click', function(){
		// $('.desc-item').removeClass('active');
		// $($(this).attr('href')).addClass('active');
	// });
	
	// SUBMIT REVIEW BY STAR
	$('.review-stars .star').on('click', function(){
		$('.review-stars .star').removeClass('active');
		var clickedCurrent = $(this);
		$('.review-stars .star').each(function(){
			$(this).addClass('active');
			if(clickedCurrent.is($(this))) return false;
		});
	});
	
	
	// CART FUNCTIONALITY
	var products = [];
	var productCartCount = 0;
	var subTotal = 0;
	
	
	// ADD TO CART
	$('[data-cart-btn]').on('click', function(){
		
		var $this = $(this),
			title = $this.parents('[data-product="1"]').find('.title').text(),
			price = $this.parents('[data-product="1"]').find('.price').text(),
			quantity = $this.parents('[data-product="1"]').find('input[name="quantity"]').val(),
			imageSrc = $this.parents('[data-product="1"]').find('.product-image img').attr('src'),
			totalItemPrice = price * quantity;
			
		
		productCartCount++;
		
		// SINGLE PRODUCT OBJECT
		var product = {};
		product.pId = productCartCount;
		product.title = title;
		product.price = price;
		product.quantity = quantity;
		product.imageSrc = imageSrc;
		product.totalItemPrice = totalItemPrice;
		
		products.push(product);
		
		$('.no-item').css('display', 'none');
		
		$('#added-item').text(productCartCount);
		
		var htmlString;
		$('#cart-product-list').html("");
		
		$.each(products, function( k, v ) {
			
			htmlString = 	'<div class="cart-product">' + 
								'<input class="hidden-id" type="hidden" value="'+ v.pId +'">' +
								'<input class="total-item-price" type="hidden" value="'+ v.totalItemPrice +'">' +
								'<a class="product-img" href="#"><img src="'+ v.imageSrc +'" alt=""></a>' +
								'<div class="product-detail">' +
									'<a href="#"><h5 class="title">'+ v.title +'</h5></a>' +
									'<h6 class="product-price">' +
										'<span class="quantity">'+ v.quantity +'</span> x ' +
										'$<span class="price">'+ v.price +'</span>' +
									'</h6>' +
									'<a href="#" class="cart-remove-btn"><b>Remove</b></a>' +
								'</div>' +
							'</div>';
			
			$('#cart-product-list').append(htmlString);
		});
		
		subTotal = subTotal + totalItemPrice;
		$('.subtotal').text(subTotal);
			
	});
	
	// REMOVE FROM CART
	$("body").on("click", ".cart-remove-btn", function(){
		productCartCount --;
		$('#added-item').text(productCartCount);
		
		var cartProduct = $(this).parents('.cart-product'),
			pId = cartProduct.find('.hidden-id').val(),
			totalItemPrice = cartProduct.find('.total-item-price').val();
			
		subTotal = subTotal - totalItemPrice;
		$('.subtotal').text(subTotal);
		
		// var index = products.findIndex(function(product) {
			
			// return product.pId === pId;
		// });
		
		var index = $.each(products, function( k, v ) {
			if(v.pId === pId) return k;
		});
			
		products.splice(index,1);
		
		if(products.length  === 0) $('.no-item').css('display', 'block');
		cartProduct.css('display', 'none');
		return false;
		
	});
	
	
})(jQuery);

// FIXED MENU ON SCROLL
function fixedMenuOnScrollFn($fixedElem){
		
	var topWindow = $(window).scrollTop();
	var fixedPosition = 500;
	
	if((fixedPosition) < topWindow){
		$fixedElem.addClass('fixed');
	}else if((fixedPosition) > topWindow){
		$fixedElem.removeClass('fixed');
	}
}
	
// Dropdown menu Function
function menuDropdown(isTouchDevice){
	
	$('.main-menu li').removeClass('d-hover-effect');
	
	if(isTouchDevice){
		
		$('.main-menu  a').unbind('click').on('click', function(e) {
			
			var listElem = $(this).parent();
			
			$(listElem).toggleClass('d-hover-effect');
			
		});
		
	}else{
		
		var anchorElem = $('.main-menu li');
		
		$(anchorElem).unbind('mouseenter').on('mouseenter', function(e) {
			$(this).addClass('d-hover-effect');
			
		}).unbind('mouseleave').on('mouseleave', function(e) {
			$(this).removeClass('d-hover-effect');
			
		});
	}
	
}

// Debounce Function for Dropdown menu
var debounceFnForDropDown = debounce(function( isTouchDevice ) {
	menuDropdown(isTouchDevice);
},50);

function paralaxScroll(){
	
	$('[data-paralax-scroll]').each(function(){
		var	$this = $(this),
			$top = $this.find('.top'),
			$left = $this.find('.left'),
			$right = $this.find('.right'),
			$bottom = $this.find('.bottom');
		
		var transformSize;
		if($this.visible(true)) {
			
			var elemBottom = $this.offset().top;
			var winTop = $(window).scrollTop();
			var winBottom = $(window).scrollTop() + $(window).outerHeight()*3;
			var elemTop = $this.offset().top + $this.outerHeight();
			
			transformSize =  Math.floor(((winBottom - elemTop))/17);
			
			$top.css({
				'-webkit-transform' : 'translate(0,-'+ transformSize +'%)',
				'transform' : 'translate3d(0,-'+ transformSize +'%,0)'
			});
			$bottom.css({
				'-webkit-transform' : 'translate(0,'+ transformSize +'%)',
				'transform' : 'translate3d(0,'+ transformSize +'%,0)'
			});
			$left.css({
				'-webkit-transform' : 'translate(-'+ transformSize +'%, 0)',
				'transform' : 'translate3d(-'+ transformSize +'%, 0, 0)'
			});
			$right.css({
				'-webkit-transform' : 'translate('+ transformSize +'%, 0)',
				'transform' : 'translate3d('+ transformSize +'%, 0, 0)'
			});
		}
	});

}

// PRODUCT DETAILS SCRIPT
function productDetailfn(){
	
	// PRODUCT IMAGE
	$('[data-p-image]').on('click', function(){
		var $this = $(this),
			imageSrc = $this.data('p-image');
		$('.p-img').removeClass('active');
		$(imageSrc).addClass('active');
		
	});
	
	if(isExists('.zoom')){ $('.zoom').zoom(); }
	
	$('[data-quantity]').click(function(){
		var $this = $(this),
			btn = $this.data('quantity'),
			qty =  $('#quantity-input').val();
		
		if(qty === null || isNaN(qty)){ $('#quantity-input').val('1'); return; }
		
		if(btn === 'plus') {
			qty++; 
			$('#quantity-input').val(qty);
		}
		else if(btn === 'minus' && qty > 1){
			qty--; 
			$('#quantity-input').val(qty);
		}
	});
}

// PRODUCT DETAILS ACCORDIAN
function enableAccordian(){
	$('[data-desc-active]').on('click', function(){
		
		$('[data-desc-active]').removeClass('active');
		$('.desc-item').removeClass('active');
		
		var $this = $(this),
			activeElem = $this.data('desc-active'),
			activeHeading = 'a[data-desc-active="'+ activeElem +'"]';

		$('.product-heading ' + activeHeading).addClass('active');
		$(activeElem).addClass('active');
		
		return;
	});
}

// PRICE RANGE FILTER
function priceRangeFilter(){
	// PRICE RANGE FILTER
	if(isExists('#slider-range')){
		$('#slider-range').slider({
			range: true,
			min: 0,
			max: 1500,
			values: [ 10, 800 ],
			slide: function( event, ui ) {
				$( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
		  }
		});
		$( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) +
			" - $" + $( "#slider-range" ).slider( "values", 1 ) );
	}
}

// POP UP ON CLICK
function enbalePopUpFn(){
	// Close the div if user clicks outside of the div
	$(window).on('click', function() {
		$('.dark-bg').removeClass('visible');
		$('.visible-on-click').removeClass('visible');
	});
	
	// Prevent the closing the div if user clicks inside of the div
	$('.visible-on-click').on('click', function(event){
		event.stopPropagation();
	});

	// Close button for right side hidden area
	$('.close-btn').on('click', function(){
		$('.dark-bg').removeClass('visible');
		var closeElem = $(this).data('close');
		$(closeElem).removeClass('visible');
		
	});
	
	// Click event for displaying the div that has "data-popup" attribute 
	
	$('[data-popup]').on('click', function(event){
		
		var $this = $(this),
			visibleHeadArea = $this.data('popup');
		
		$('.visible-on-click').removeClass('visible');
		
		$(visibleHeadArea).toggleClass('visible');
		
		if($(visibleHeadArea).hasClass('visible-on-click')){
			if($(visibleHeadArea).hasClass('visible')){ $('.dark-bg').addClass('visible'); }
			else{ $('.dark-bg').removeClass('visible'); }
		}
		event.stopPropagation();
	
	});
}

function smoothScroll(){
	// Select all links with hashes
	$('a[href*="#"]')
	  // Remove links that don't actually link to anything
	  .not('[href="#"]')
	  .not('[href="#bs-carousel"]')
	  .not('[href="#0"]')
	  .click(function(event) {
		// On-page links
		if (
		  location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') 
		  && 
		  location.hostname == this.hostname
		) {
		  // Figure out element to scroll to
		  var target = $(this.hash);
		  target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
		  // Does a scroll target exist?
		  if (target.length) {
			// Only prevent default if animation is actually gonna happen
			event.preventDefault();
			$('html, body').animate({
			  scrollTop: target.offset().top - 150
			}, 500, function() {
			  // Callback after animation
			  // Must change focus!
			  var $target = $(target);
			  $target.focus();
			  
			});
		  }
		}
	  });
}


function backToTop() {
	var scrollTrigger = $(document).outerHeight()/2;
	var scrollTop = $(window).scrollTop();
	if (scrollTop > scrollTrigger) {
		$('#back-to-top').addClass('show');
	} else {
		$('#back-to-top').removeClass('show');
	}
};
	
// Debounce Function for Dropdown menu
var debounceFnForDropDown = debounce(function( isTouchDevice ) {
	menuDropdown(isTouchDevice);
},50);

// Debounce Function
function debounce(func, wait, immediate) {
	var timeout;
	return function() {
		var context = this, args = arguments;
		var later = function() {
			timeout = null;
			if (!immediate) func.apply(context, args);
		};
		var callNow = immediate && !timeout;
		clearTimeout(timeout);
		timeout = setTimeout(later, wait);
		if (callNow) func.apply(context, args);
	};
}


// Counter Function
function enableCounter(a){
	var a = a;
	if(!isExists('.counter')) return;
	var oTop = $('.counter').offset().top - window.innerHeight;
		if (a == 0 && $(window).scrollTop() > oTop) {
			$('.counter-value').each(function() {
			var $this = $(this),
				countTo = $this.attr('data-count');
			$({
				countNum: $this.text()
			}).animate({
				countNum: countTo
				},
			{
				duration: 1000,
				easing: 'swing',
				step: function() {
					$this.text(Math.floor(this.countNum));
				},
				complete: function() {
					$this.text(this.countNum);
				}

			});
		});
		a = 1;
	}
	
}

// Swiper slider function
function enableSwiper(){
	
	if ( isExists('.swiper-container') ) {
		
		$('.swiper-container').each(function (index) {
			
			var $this						= $(this),
				swprDirection 				= $this.data('swpr-direction'),
				swprSlidePerView			= $this.data('swpr-slides-per-view'),
				swprBreakpoints				= $this.data('swpr-breakpoints'),
				swprSpeed					= $this.data('swpr-speed'),
				swprCrossFade				= $this.data('swpr-crossfade'),
				swprLoop					= $this.data('swpr-loop'),
				swprAutoplay 				= $this.data('swpr-autoplay'),
				swprMousewheelControl 		= $this.data('swpr-wheel-control'),
				swprlidesPerview 			= $this.data('slides-perview'),
				swprMargin 					= parseInt($(this).data('swpr-margin')),
				swprSlideEffect 			= $this.data('slide-effect'),
				swprAutoHeight 				= $this.data('autoheight'),
				swprScrollbar 				= ($this.data('scrollbar') ? $(this).find('.swiper-scrollbar') : null),
				swprNextButton				= $this.parentsUntil('section').find('.swpr-control .swiper-button-next'),
				swprPrevButton				= $this.parentsUntil('section').find('.swpr-control .swiper-button-prev');
				swprScrollbar 				= (isExists(swprScrollbar) ? swprScrollbar : null);
				
			
			var swiper = new Swiper($(this)[0], {
				pagination			: $(this).find('.swiper-pagination'),
				
				slidesPerView		: ( swprSlidePerView ? swprSlidePerView : 'auto' ),
				direction			: ( swprDirection ? swprDirection : 'horizontal'),
				loop				: ( swprLoop ? swprLoop : false),
				nextButton			: swprNextButton,
				prevButton			: swprPrevButton,
				autoplay			: ( swprAutoplay ? swprAutoplay : false),
				paginationClickable	: true,
				spaceBetween		: ( swprMargin ? swprMargin : 0),
				mousewheelControl	: ( (swprMousewheelControl) ? swprMousewheelControl : false),
				scrollbar			: ( swprScrollbar ? swprScrollbar : null ),
				scrollbarHide		: false,
				speed				: ( swprSpeed ? swprSpeed : 1000 ),
				autoHeight			: ( (swprAutoHeight == false) ? swprAutoHeight : true ),
				effect				: ( swprSlideEffect ? swprSlideEffect : 'coverflow' ),
				fade				: { crossFade: swprCrossFade ? swprCrossFade : false },
				breakpoints			: {
										1200: { slidesPerView: swprBreakpoints ? 3 : 1, },
										992: { slidesPerView: swprBreakpoints ? 2 : 1, },
										580: { slidesPerView: 1, }
										},
			});
		});
	}
}

function initMap() {
	var uluru = {lat: -25.363, lng: 131.044};
	var map = new google.maps.Map(document.getElementById('map'), {
		zoom: 4,
		center: uluru
	});
	
	var marker = new google.maps.Marker({
		position: uluru,
		map: map
	});
	google.maps.event.addDomListener(window, 'load', initMap);
	
}	

function isExists(elem){
	if ($(elem).length > 0) { 
		return true;
	}
	return false;
}
