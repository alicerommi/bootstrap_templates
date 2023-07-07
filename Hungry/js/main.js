jQuery(function($){
	
	if(cur_page_data.pageid == 1){
		$('.header').css('width','90%');	
	}
	
	var $window = $(window),
	$body = $('body');		
		
	$(document).ready(function() {
		
		if(cur_page_data.pageid == 1 || cur_page_data.pagename == "home"){
			
		}
		else{	
			$('.header').css({'background':'#fff','box-shadow':'0 1px #eee'});
			$('.site-content').css('padding-top','78px'); 
			$('.main-navigation a').css('color','#000');
			$('header').css('background','#fff');
		}
		
		jQuery('.counter-item').appear(function() {
			jQuery('.counter-number').countTo();
			jQuery(this).addClass('funcionando');
			console.log('funcionando');
		});
		
		
	}); 
	
	// SCROLLTO THE TOP
	// Show or hide the sticky footer button
	$window.scroll(function() {
		if ($(this).scrollTop() > 200) {
			$('.to_top').fadeIn(200);
		}else{
			$('.to_top').fadeOut(200);
			}
	});		
		
	// Animate the scroll to top
	$('.to_top').click(function(event) {
		event.preventDefault();
	
		$('html, body').animate({scrollTop: 0}, 300);
	});
	/////////////
		
	 /* wow
	-------------------------------*/
	new WOW({ mobile: false }).init();
	
	$(window).scroll(function() {
	    
	   if (($(".header").offset().top > 150) && (cur_page_data.pageid == 1 || cur_page_data.pagename == "home")) {
			$('header,.header').css('background','#fff'); 
			$('.main-navigation a').css('color','#000');
		} 
		else if (($(".header").offset().top > 0)&& (cur_page_data.pageid == 1 || cur_page_data.pagename == "home")) {
			$('.header').css('background','none'); 
			$('.main-navigation a').css('color','#fff');
		} 
	
	});
		
});
