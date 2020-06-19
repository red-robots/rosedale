/**
 *	Custom jQuery Scripts
 *	
 *	Developed by: Austin Crane	
 *	Designed by: Austin Crane
 */

jQuery(document).ready(function ($) {
	
	/*
	*
	*	Current Page Active
	*
	------------------------------------*/
	$("[href]").each(function() {
    if (this.href == window.location.href) {
        $(this).addClass("active");
        }
	});

	/*
	*
	*	Responsive iFrames
	*
	------------------------------------*/
	var $all_oembed_videos = $("iframe[src*='youtube']");
	
	$all_oembed_videos.each(function() {
	
		$(this).removeAttr('height').removeAttr('width').wrap( "<div class='embed-container'></div>" );
 	
 	});

 var sections = $('section')
  , nav = $('nav')
  , nav_height = nav.outerHeight();
 
$(window).on('scroll', function () {
  var cur_pos = $(this).scrollTop();
 
  sections.each(function() {
    var top = $(this).offset().top - nav_height,
        bottom = top + $(this).outerHeight();
 
    if (cur_pos >= top && cur_pos <= bottom) {
      nav.find('a').removeClass('active');
      sections.removeClass('active');
 
      $(this).addClass('active');
      nav.find('a[href="#'+$(this).attr('id')+'"]').addClass('active');
    }
  });
});
	
	/*
	*
	*	Flexslider
	*
	------------------------------------*/
	$('.flexslider').flexslider({
		animation: "slide",
	}); // end register flexslider
	
	/*
	*
	*	Colorbox
	*
	------------------------------------*/
	$('a.gallery').colorbox({
		rel:'gal',
		width: '80%', 
		height: '80%'
	});
	
	/*
	*
	*	Isotope with Images Loaded
	*
	------------------------------------*/
	var $container = $('#container').imagesLoaded( function() {
  	$container.isotope({
    // options
	 itemSelector: '.item',
		  masonry: {
			gutter: 15
			}
 		 });
	});

	/*
	*
	*	Equal Heights Divs
	*
	------------------------------------*/
	$('.js-blocks').matchHeight();

	/*
	*
	*	Wow Animation
	*
	------------------------------------*/
	new WOW().init();

	$("a[href^=#]").click(function(e){
		e.preventDefault();
		$("a[href^=#]").removeClass("active");
		$(e.target).addClass("active");
		var href = e.target.hash.substring(1);
		$('html, body').animate({scrollTop: $("a[name="+href+"]").offset().top}, 500,function(){
			if($col.length>0){
				sticky_sidebar();
			}
		});
	});

	var $col = $('.template-history >.wrapper >.wrapper >.row-2 >.col-2');
	if($col.length>0){
		var $window = $(window);
		function sticky_sidebar(){
			var window_top = $window.scrollTop();
			var window_width = window.innerWidth;
			var $wrapper = $('.template-history >.wrapper >.wrapper');
			var anchor_top = $('.template-history >.wrapper >.wrapper >.row-2').offset().top;
			var anchor_bottom = $('.template-history >.wrapper >.wrapper >.row-2').offset().top +  $('.template-history >.wrapper >.wrapper >.row-2').outerHeight();
			if(window_width>=600&&window_top>=anchor_top){
				if($col.outerHeight()+window_top>=anchor_bottom){
					if(window_width>=900){
						$col.css({
							position: 'fixed',
							top: -1*($col.outerHeight()-(anchor_bottom-window_top)),
							backgroundColor: '#E9F5F1',
							maxWidth: '364px',
							right:parseFloat($wrapper.css("paddingRight"))+(parseFloat(window.innerWidth) - parseFloat($wrapper.offset().left) - parseFloat($wrapper.outerWidth())),
							width: '28%'
						});
					} else {
						$col.css({
							position: 'fixed',
							top: -1*($col.outerHeight()-(anchor_bottom-window_top)),
							backgroundColor: '#E9F5F1',
							maxWidth: '364px',
							right:parseFloat($wrapper.css("paddingRight"))+(parseFloat(window.innerWidth) - parseFloat($wrapper.offset().left) - parseFloat($wrapper.outerWidth())),
							width: '34%'
						});
					}
				} else {
					if(window_width>=900){
						$col.css({
							position: 'fixed',
							top: 0,
							maxWidth: '364px',
							backgroundColor: '#E9F5F1',
							right:parseFloat($wrapper.css("paddingRight"))+(parseFloat(window.innerWidth) - parseFloat($wrapper.offset().left) - parseFloat($wrapper.outerWidth())),
							width: '28%'
						});
					} else {
						$col.css({
							position: 'fixed',
							top: 0,
							maxWidth: '364px',
							backgroundColor: '#E9F5F1',
							right:parseFloat($wrapper.css("paddingRight"))+(parseFloat(window.innerWidth) - parseFloat($wrapper.offset().left) - parseFloat($wrapper.outerWidth())),
							width: '34%'
						});
					}
				}
			} else {
				$col.css({
					position:'',
					top: '',
					backgroundColor: '',
					right: '',
					width: '',
					maxWidth: ''
				});
			}
		}
		sticky_sidebar();
		$window.on('scroll',sticky_sidebar);
		$window.on('resize',sticky_sidebar);
	}

});// END #####################################    END