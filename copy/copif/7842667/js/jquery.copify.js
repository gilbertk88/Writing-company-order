// 
//  jquery.copify.js
//  
//  Created by Rob Mcvey on 2013-11-05.
//  Copyright 2013 Rob McVey. All rights reserved.
// 

$(document).ready(function(){
	
	/* Utility functions to get browser info and check if we support fancy nice things
	================================================== */
	function get_browser(){
	    var N=navigator.appName, ua=navigator.userAgent, tem;
	    var M=ua.match(/(opera|chrome|safari|firefox|msie)\/?\s*(\.?\d+(\.\d+)*)/i);
	    if(M && (tem= ua.match(/version\/([\.\d]+)/i))!= null) M[2]= tem[1];
	    M=M? [M[1], M[2]]: [N, navigator.appVersion, '-?'];
	    return M[0];
	}
	function get_browser_version(){
		var N=navigator.appName, ua=navigator.userAgent, tem;
		var M=ua.match(/(opera|chrome|safari|firefox|msie)\/?\s*(\.?\d+(\.\d+)*)/i);
		if(M && (tem= ua.match(/version\/([\.\d]+)/i))!= null) M[2]= tem[1];
		M=M? [M[1], M[2]]: [N, navigator.appVersion, '-?'];
		return parseInt(M[1]);
	}
	function ux_supported() {
		if (get_browser() == 'Safari' && get_browser_version() < 6) {
			return false;
		} else {
			return true;
		}
	}
	
	/* Slogan / Welcome Message Animation
	================================================== */
	if($('.hero-holder').length > 0) {
		setTimeout (function () {
			$('.hero-holder').animate({ opacity : 1 });
		} , 500);
	}

	/* Parallax Effect - disabled for mobile devices
	================================================== */	
	if( !device.tablet() && !device.mobile() && ux_supported()) {
		
		// Home page
		$('#hero').parallax("50%", 0.4);
		$('#team-section').parallax("50%", 0.4);
		$('#counter-section').parallax("50%", 0.4);

		// Guides - content checklists
		$('#content-creation-cheatsheet').parallax("50%", 0.4);
		$('#content-creation-cheatsheet-parallax-blog').parallax("50%", 0.4);
		$('#content-creation-cheatsheet-parallax-article').parallax("50%", 0.4);
		$('#content-creation-cheatsheet-parallax-press').parallax("50%", 0.4);
		$('#content-creation-cheatsheet-parallax-social').parallax("50%", 0.4);
		$('#content-creation-cheatsheet-parallax-white').parallax("50%", 0.4);			
		$('#content-creation-cheatsheet-parallax-product').parallax("50%", 0.4);			
		$('#content-creation-cheatsheet-parallax-review').parallax("50%", 0.4);						
		$('#content-creation-cheatsheet-parallax-web').parallax("50%", 0.4);
		
		// Freelance writers
		$('#freelance-writing-jobs').parallax("50%", 0.4);
		
		// Guides - How to become a copywriter
		$('#how-to-become-writer').parallax("50%", 0.4);
		
		/* Since there is an issue with fixed background on mobile devices we add this style attribute in here */
		$('.parallax-section').each(function(index, element) {
               $(this).addClass('fixed');
           });

	} else {
		$('.parallax-banner').css('background-position' , '50% 50% !important');
	}
	
	
	/* Show all services in the footer
	================================================== */		
	$('.show-all-services').click(function(event) {
		event.preventDefault();
		$('.all-services').fadeToggle();
	});

	/* Add selected class to menu items
	================================================== */
	$('#ut-navigation ul').find('a[href$="' + window.location.pathname + '"]').addClass('selected');
	
	/* Testimonial Carousel
	================================================== */
	$("#avatarSlider").flexslider({
		animation: "fade",
		directionNav:false,
		controlNav:false,
		smoothHeight: true,
		animationLoop:true,
		slideshowSpeed: 8000,		
		slideToStart: 0,
	});
	
	/* Testimonial quotes Carousel
	================================================== */
	$("#quoteSlider").flexslider({
		animation: "fade",
		directionNav:true,
		controlNav:false,		
		smoothHeight: true,
		animationLoop:true,
		sync: "#avatarSlider",
		slideshowSpeed: 8000,			
		slideToStart: 0,
	});
	

	/* Handle the contact form
	================================================== */
	$("#contact-form #send-btn:not(.disabled)").on('click' ,function() {
		
		// Form params
		var button = $(this);
		var errors = 0;
		var form = $("#contact-form");
		var processor = "/contact_form.json";
		var data = form.serialize();
		
		// Add spinner class to button
		button.addClass("contact-sending-spinner disabled");
		
		// Null any empty inputs
		form.find('input.required').each(function() {
			var input = $(this);
			if (input.val() == "" || input.val() == input.attr('placeholder')) {
				input.addClass('error');
				errors += 1;
			} else {
				input.removeClass('error');
			}
		});
		
		// Stop of errors
		if(errors > 0) {
			// Remove spinner class to button
			button.removeClass("contact-sending-spinner disabled");
			return false;
		}
		
		
		// Hide previous messages
		form.find(".success-message, .error-message, .alert-message").hide();
		
		// Ajax the form
		$.ajax({	   
			type: "POST",
			url: processor,
			data: data,
			success: function(data) {
				form.append('<span class="feedback"></span>');
				// Remove spinner class to button
				button.removeClass("contact-sending-spinner disabled");
				if(data.status === 'OK') {
					form.find(".success-message").fadeIn();
					form.each(function(){
						this.reset();
					});
					button.hide();
				}
				else if (data.status === 'ERROR') {
					form.find(".error-message").fadeIn().html(data.message);
				} else {
					form.find(".alert-message").fadeIn().html(data);	
				}
			}
		});		
			
	});


	/* Milestone Counter on home page
	================================================== */		
	$('#counter-section').waypoint(function(direction) {										
		if( direction === 'down' ) {
			
			$('.counter').each(function(){
										
				var counter = $(this).data('counter');
				
				if( !$(this).find('.count').hasClass('animated') ) {
										
					$(this).find('.count').countTo({
						from: 0,
						to: counter,
						speed: 5000,
						refreshInterval: 100,
						onComplete: function() {
							$(this).addClass('animated');
						}
					});
				
				}
				
			});
									
		}
			
	} , { offset: '50%' } );


	/* Scroll section animations
	================================================== */
	function animate_about() {
			
		$('.about-box').each(function( k ) {
			
			var el = $(this);
			
			setTimeout ( function () {
				el.animate({opacity: 1} , 600 );
			},  k * 100 );
			
		});
	
	}
	
	/* member box */
	function animate_member() {
			
		$('.member-box, .member-photo').each(function( k ) {
			
			var el = $(this);
			
			setTimeout ( function () {
				el.animate({opacity: 1} , 600 );
			},  k * 80 );
			
		});
	
	}		

	/* counter section */
	function animate_counter() {
			
		$('.counter-box').each(function( k ) {
			
			var el = $(this);
			
			setTimeout ( function () {
				el.animate({opacity: 1} , 600 );
			},  k * 50 );
			
		});
	
	}
	
	/* client section */
	function animate_clients() {
			
		$('.client-logo').each(function( k ) {
			
			var el = $(this);
			
			setTimeout ( function () {
				el.animate({opacity: 1} , 600 );
			},  k * 50 );
			
		});
	}
	
	/* This is only used for browsers that support csstransistions
	=========================================*/
	function animate_sections() {

		/* Product section */
		$('#product-section').waypoint(function(direction) {
			
			if( direction === 'down' && !$(this).hasClass('animated') ) {
				setTimeout ( function () {
						$('#product-section').find('[class$=title]').animate({ opacity: 1 });
				}, 200 );
				setTimeout ( function () {
						$('#product-section').find('[class$=slogan]').animate({ opacity: 1 });

				}, 400 );
				setTimeout ( function () {
						$('#product-section').find('.home-device-preview').animate({ opacity: 1 });

				}, 600 );
				setTimeout( animate_about , 1000 );
				$(this).addClass('animated');
			}
		} , { offset: '90%' } );
	
		
		/* writers */
		$('#team-section').waypoint(function( direction ) {
			if( direction === 'down' && !$(this).hasClass('animated') ) {
				setTimeout ( function () {
						$('#team-section header').find('[class$=title]').animate({ opacity: 1 });
				}, 200 );
				setTimeout ( function () {
						$('#team-section header').find('[class$=slogan]').animate({ opacity: 1 });
				}, 400 );
				setTimeout( animate_member , 1000);
				$(this).addClass('animated');
			}
		} , { offset: '90%' } );
		
		/* counter/stats */
		$('#counter-section').waypoint( function( direction ) {
			if( direction === 'down' && !$(this).hasClass('animated') ) {
				setTimeout ( function () {
						$('#counter-section header').find('[class$=title]').animate({ opacity: 1 });
				}, 200 );
				setTimeout ( function () {
						$('#counter-section header').find('[class$=slogan]').animate({ opacity: 1 });
				}, 400 );
				setTimeout( animate_counter , 1000);
				$(this).addClass('animated');			
			}
		} , { offset: '90%' } );
		
	
		/* packages */
		$('#packages-section').waypoint( function( direction ) {
			if( direction === 'down' && !$(this).hasClass('animated') ) {
				setTimeout ( function () {
						$('#packages-section').find('[class$=title]').animate({ opacity: 1 });
				}, 200 );
				setTimeout ( function () {
						$('#packages-section').find('[class$=slogan]').animate({ opacity: 1 });

				}, 400 );
				setTimeout ( function () {
						$('#packages-section').find('.home-device-preview').animate({ opacity: 1 });

				}, 600 );
				setTimeout( animate_about , 1000 );
				$(this).addClass('animated');
			}
		} , { offset: '90%' } );
		
		/* testimonials */
		$('#testimonial-section').waypoint( function( direction ) {
			if( direction === 'down' && !$(this).hasClass('animated') ) {
				setTimeout ( function () {
						$('#testimonial-section header').find('[class$=title]').animate({ opacity: 1 });
				}, 200 );
				setTimeout ( function () {
						$('#testimonial-section header').find('[class$=slogan]').animate({ opacity: 1 });
				}, 400 );
				setTimeout ( function () {
						$('.ut-testimonials').animate({ opacity: 1 });
				}, 600 );
				$(this).addClass('animated');
			}
		} , { offset: '90%' } );

		/* logos */
		$('#logo-section').waypoint( function( direction ) {
			if( direction === 'down' && !$(this).hasClass('animated') ) {
				setTimeout( animate_clients , 300 );	
				$(this).addClass('animated');
			}
		} , { offset: '70%' } );

		/* contact */
		$('#contact-section').waypoint( function( direction ) {
			if( direction === 'down' && !$(this).hasClass('animated') ) {
				setTimeout ( function () {
						$('#contact-section header').find('[class$=title]').animate({ opacity: 1 });
				}, 200 );
				setTimeout ( function () {
						$('#contact-section header').find('[class$=slogan]').animate({ opacity: 1 });
				}, 600 );
				setTimeout ( function () {
						$('.contact-wrap').animate({ opacity: 1 });
				}, 600 );
				$(this).addClass('animated');		
			}
		} , { offset: '90%' } );
		
		
		/* Product features section (intro) */
		$('#product-features-intro').waypoint(function(direction) {
			var waypoint = this;
			if( direction === 'down' && !$(this).hasClass('animated') ) {
				setTimeout ( function () {
						$(waypoint).find('.section-title').animate({ opacity: 1 });

				}, 200 );
				setTimeout ( function () {
						$(waypoint).find('.section-slogan').animate({ opacity: 1 });

				}, 300 );
				$(this).addClass('animated');
			}
		} , { offset: '90%' } );
		
		/* Product features section */
		$('#product-features .fade-in-feature').waypoint(function(direction) {
			var waypoint = this;
			if( direction === 'down' && !$(this).hasClass('animated') ) {
				setTimeout ( function () {
						$(waypoint).find('h3').animate({ opacity: 1 });

				}, 200 );
				setTimeout ( function () {
						$(waypoint).find('p').animate({ opacity: 1 });

				}, 300 );
				setTimeout ( function () {
						$(waypoint).find('.magnify-shot').animate({ opacity: 1 });

				}, 400 );
				$(this).addClass('animated');
			}
		} , { offset: '90%' } );
		
		
		/* Copywirters page /intro */
		$('#copywriters-intro').waypoint(function(direction) {

			// Fade things
			if( direction === 'down' && !$(this).hasClass('animated') ) {
				
				var waypoint = this;
				
				setTimeout ( function () {
						$(waypoint).find('.section-title').animate({ opacity: 1 });

				}, 200 );
				setTimeout ( function () {
						$(waypoint).find('.section-slogan').animate({ opacity: 1 });

				}, 300 );
				$(this).addClass('animated');
			}
		} , { offset: '90%' } );
		
		/* Jobs page (copywriting jobs)  */
		$('#copywriting-jobs').waypoint(function(direction) {

			// Fade things
			if( direction === 'down' && !$(this).hasClass('animated') ) {
				
				var waypoint = this;
				
				setTimeout ( function () {
						$(waypoint).find('.section-title').animate({ opacity: 1 });

				}, 200 );
				setTimeout ( function () {
						$(waypoint).find('.section-slogan').animate({ opacity: 1 });

				}, 300 );
				
				$(this).addClass('animated');
				
			}
		} , { offset: '90%' } );
		
		/* Jobs page (copywriting jobs)  rows of contetn */
		$('.copywriting-jobs-info').waypoint(function(direction) {

			// Fade things
			if( direction === 'down' && !$(this).hasClass('animated') ) {
				
				var waypoint = this;
				
				setTimeout ( function () {
						$(waypoint).animate({ opacity: 1 });

				}, 600 );
				
				$(this).addClass('animated');
				
			}
		} , { offset: '90%' } );
		
		/* Guides content creation cheetsheet */
		$('.content-cheatsheet').waypoint(function(direction) {

			// Fade things
			if( direction === 'down' && !$(this).hasClass('animated') ) {
				
				var waypoint = this;
				
				setTimeout ( function () {
						$(waypoint).animate({ opacity: 1 });

				}, 600 );
				
				$(this).addClass('animated');
				
			}
		} , { offset: '90%' } );
		
		/* Guides content creation cheetsheet parallax sections */
		$('.content-creation-cheatsheet-parallax').waypoint(function(direction) {

			// Fade things
			if( direction === 'down' && !$(this).hasClass('animated') ) {
				
				var waypoint = this;
				
				setTimeout ( function () {
						$(waypoint).find('.parallax-title').animate({ opacity: 1 });

				}, 400);
				
				setTimeout ( function () {
						
						$(waypoint).find('.checklist').each(function( k ) {

							var el = $(this);

							setTimeout ( function () {
								el.animate({opacity: 1} , 600 );
							},  k * 250 );

						});

				}, 900);
				
				
				$(this).addClass('animated');
				
			}
		} , { offset: '90%' } );

		/* Clients intro */
		$('#clients-intro').waypoint(function(direction) {

			// Fade things
			if( direction === 'down' && !$(this).hasClass('animated') ) {
				
				var waypoint = this;
				
				setTimeout ( function () {
						$(waypoint).find('.section-title').animate({ opacity: 1 });

				}, 200 );
				setTimeout ( function () {
						$(waypoint).find('.section-slogan').animate({ opacity: 1 });

				}, 300 );
				setTimeout ( function () {
						$(waypoint).find('.client-logo-holder, .client-logo').animate({ opacity: 1 });
				}, 500 );
				
				$(this).addClass('animated');
			}
		} , { offset: '90%' } );

		/* Clients single */
		$('#clients-single').waypoint(function(direction) {

			// Fade things
			if( direction === 'down' && !$(this).hasClass('animated') ) {
				
				var waypoint = this;
				
				setTimeout ( function () {
						$(waypoint).find('.section-title').animate({ opacity: 1 });

				}, 200 );
				setTimeout ( function () {
						$(waypoint).find('.section-slogan').animate({ opacity: 1 });

				}, 300 );
				setTimeout ( function () {
						$(waypoint).find('.client-single-info, .client-single-logo').animate({ opacity: 1 });

				}, 500 );
				setTimeout ( function () {
						$(waypoint).find('.client-single-face, .client-single-quote').animate({ opacity: 1 });

				}, 800 );	
				
				setTimeout ( function () {
						$(waypoint).find('.client-single-logos').animate({ opacity: 1 });

				}, 800 );	
				
				setTimeout ( function () {
						$(waypoint).find('.client-single-logos .client-logo').animate({ opacity: 1 });

				}, 900 );				
					
			}
		} , { offset: '90%' } );
		
	
		/****************************************************************************
		*****************************************************************************
		******************* UX dots on Copywriters page *****************************
		*****************************************************************************
		****************************************************************************/	
		var uxScrollDotsLeaderSize = 44;
		var uxScrollDotsSize = 10;
		
		function uxScrollDots(waypoint, start, end) {
			//Vertical or horizontal?
			var horizontal = waypoint.hasClass('ux-dots-horizontal');
			
			// Get size of outer div
			if (horizontal) {
				var distance = waypoint.parent().width();
			} else {
				var distance = waypoint.parent().height();
			}
			// Take off half the width of the dots so as to not overlap
			distance = distance	- (uxScrollDotsSize / 2);
		
			// For our way point window, how fast do we need to travel?
			var parallaxFactor = distance / (end - start);	
			var parallaxDistance = (window.pageYOffset - start) * parallaxFactor;
			// Append px
			var curDistance = parallaxDistance + 'px';
			
			// Get the innder span			
			var span = waypoint.find('span');
			// Where in the doc is it?
			var offset = span.offset();
			
			// Horizontal?
			if (horizontal) {
				
				span.css('width', curDistance);
				
				// Add our rtl or ltr class to change arrow head
				if (waypoint.hasClass('ux-dots-right')) {
					var horDirection = 'rtl';
					// Position the leading arrow
					$('#ux-dots-leader').css({
						"top": (offset.top - ((uxScrollDotsLeaderSize / 2) - (uxScrollDotsSize / 2))),
						"left": (offset.left - (uxScrollDotsLeaderSize + uxScrollDotsSize))
					}).addClass(horDirection);
				} else {
					var horDirection = 'ltr';
					// Position the leading arrow
					$('#ux-dots-leader').css({
						"top": (offset.top - ((uxScrollDotsLeaderSize / 2) - (uxScrollDotsSize / 2))),
						"left": offset.left + parallaxDistance
					}).addClass(horDirection);
				}
				
			} else {

				span.css('height', curDistance);
				
				// Position the leading arrow
				$('#ux-dots-leader').css({
					"top": offset.top + parallaxDistance,
					"left": (offset.left - ((uxScrollDotsLeaderSize / 2) - (uxScrollDotsSize / 2)))
				});
				
				// Remove any classes added while horizontal
				$('#ux-dots-leader').removeClass('rtl ltr');
			}
			
			// Are we in to the dark section?
			if(start >= 650) {
				$('#ux-dots-leader').addClass('ux-dots-leader-white');
			} else {
				$('#ux-dots-leader').removeClass('ux-dots-leader-white');
			}
		}
		
		// Make dots for a way point fully visible
		function uxScrollShow (waypoint) {
			//Vertical or horizontal?
			var horizontal = waypoint.hasClass('ux-dots-horizontal');
			if (horizontal) {
				waypoint.find('span').css('width', '100%');
			} else {
				waypoint.find('span').css('height', '100%');
			}
		}
		
		// Hide dots for a waypoint 
		function uxScrollHide (waypoint) {
			//Vertical or horizontal?
			var horizontal = waypoint.hasClass('ux-dots-horizontal');
			if (horizontal) {
				waypoint.find('span').css('width', '0px');
			} else {
				waypoint.find('span').css('height', '0px');
			}
		}
		
		// UX dots 1
		if($('#ux-dots-way-1').length) {
			
			// Our super duper calla fragislistic poker dots
			var waypoints = [
				{selector:'#ux-dots-way-1', start:10, end:200},
				{selector:'#ux-dots-way-2', start:200, end:450},
				{selector:'#ux-dots-way-3', start:450, end:650},
				{selector:'#ux-dots-way-4', start:650, end:1200},
				{selector:'#ux-dots-way-5', start:1200, end:1400},
				{selector:'#ux-dots-way-6', start:1400, end:1600}
			];
			
			// Set our waypoints for fade in copywriters
			var copywriterFaces = [
				{selector:'#copywriter-face-1', start:60},
				{selector:'#copywriter-face-2', start:130},
				{selector:'#copywriter-face-4', start:208},
				{selector:'#copywriter-face-5', start:267},
				{selector:'#copywriter-face-6', start:330},
				{selector:'#copywriter-face-7', start:390},
				{selector:'#copywriter-face-8', start:450},
				{selector:'#copywriter-face-9', start:522},
				{selector:'#copywriter-face-10', start:582},
				{selector:'#copywriter-face-11', start:730},
				{selector:'#copywriter-face-12', start:950},
				{selector:'#copywriter-face-13', start:1233},
				{selector:'#copywriter-face-14', start:1297},
				{selector:'#copywriter-face-15', start:1367},
				{selector:'#copywriter-face-16', start:1450}
			];
			
			// Initial position of leading ux arrow
			var initialOffset = $('#ux-dots-way-1').find('span').offset();
			$('#ux-dots-leader').css({
				"top": initialOffset.top,
				"left": (initialOffset.left  - ((uxScrollDotsLeaderSize / 2) - (uxScrollDotsSize / 2)))
			}).removeClass('rtl ltr');

			// Bind scroll to ux dots
			$(document).scroll(function(event) {
												
				// Handle each dots divs
				$.each(waypoints, function(k, waypoint) {
					if (window.pageYOffset < waypoint.start) {
						uxScrollHide($(waypoint.selector));	
					}
					if (window.pageYOffset >= waypoint.start && window.pageYOffset <= waypoint.end) {
						uxScrollDots($(waypoint.selector), waypoint.start, waypoint.end);
					}
					if (window.pageYOffset > waypoint.end) {
						uxScrollShow($(waypoint.selector));	
					}
				});
				
				// Fade in faces, yeah?
				$.each(copywriterFaces, function(k, face) {
					if (window.pageYOffset > face.start && !$(face.selector).hasClass('visible')) {
						$(face.selector).animate({ opacity: 1 }).addClass('visible');
					}
					if (window.pageYOffset < face.start && $(face.selector).hasClass('visible')) {
						$(face.selector).animate({ opacity: 0 }).removeClass('visible');
					}	
				});
				
				// Once finished always position the leader arrow properly (sometimes goes mental)	
				if(window.pageYOffset >= 1600) {
					var finalOffset = $('#ux-dots-leader').offset();
					$('#ux-dots-leader').css({
						"top": '1815px',
						"left": finalOffset.left
					}).removeClass('rtl ltr');
				}
				
			});

		}
			
	}
	
	/* No animations for mobile, tablets or browsers with no csstransitions support 
	====================================================*/
	if( !device.tablet() && !device.mobile() && Modernizr.csstransitions ) {
		animate_sections();
	}
	
	/**
	 * Windows phone doesnt work with scrollTo, so we use animate and scrollTop instead
	 *
	 * @author Chris Green
	 * @param targetSelector The selector to scroll to
	 * @param duration The duration
	 * @param offset Offset from targetSelector
	 * @param axis Axis to scroll on (only used in scrollTo)
	 * @return void
	 **/
	function scrollTo(targetSelector, duration, offset, axis) {
		if (device.windowsPhone() || device.windowsTablet()) {
			$('html, body').animate({ scrollTop: $(targetSelector).offset().top += offset }, duration);
		} else {
			$.scrollTo($(targetSelector) , duration, {
				offset: offset, 
				'axis': axis
			});
		}
	}
	
	/* Clients sort by industry 
	====================================================*/
	var $clientsHolder = $('#clients-intro .client-logo-holder .row'); // get original list
	var $clientsClone = $clientsHolder.clone(); // clone it so it can be reverted back to
	
	$('#clients-intro .client-industry-buttons span').on("click" , function(event) {
		
		var target = $(this).data('target');

		if (target == 'all') {
			var filters = $clientsClone.find('.client-logo');
		} else {
			var filters = $clientsClone.find('.client-logo[data-tag~='+ target +']');
		}

		$clientsHolder.quicksand(filters, {
			duration: 500,
	        adjustHeight: 'dynamic'
		});

	});
	

	/* Counter section, scroll down to contact on clcik
	================================================== */	
	$('#to-contact-section').on("click" , function(event) {
		event.preventDefault();
		scrollTo('#contact-section', 1000, -200, 'y');
	});
	
	/* Counter section, scroll down to contact on clcik
	================================================== */	
	$('#to-quick-contact-section').on("click" , function(event) {
		event.preventDefault();
		scrollTo('#contact-form', 1000, -200, 'y');
	});

	/* Scroll to product feature sections on product page
	================================================== */
	$(".single-goto").each(function(k, button) {
		var target = $(button).data('target');
		
		$(button).on("click" , function(event) {
			event.preventDefault();
			scrollTo(target, 1000, -200, 'y');
		});
	});

	/* Add selected class to docs-nav
	================================================== */
	if($('#docs-nav').length > 0) {
		// Get the parts of the URL
		var urlparts = window.location.pathname.split( '/' );
		// Find the nav item which matches current URL and make "active"
		var docsNavCurrent = $('#docs-nav').find('a[href*="' + urlparts[2] + '"]');
		if(docsNavCurrent.length) {
			docsNavCurrent.addClass('active').removeAttr("href");
		} else {
			$('#docs-nav a:first').addClass('active').removeAttr("href");
		}
	}

	// Toggle response on API docs
	$(".docs-toggle-response").click(function() {
		$(this).parent().find("pre").toggleClass("hidden");
	}); 

	// Guides - Scroll down to sections on content checklists
	$("#content-creation-cheatsheet .content-icon-holder").click(function(e) {
		var divTo = $(this).data("section");
		var target = "#content-creation-cheatsheet-parallax-" + divTo;
		scrollTo(target, 1000, -450, 'y');
	});

	// Guides - check a checklist point
	$(".content-creation-cheatsheet-parallax .checklist").click(function() {
		$(this).toggleClass('checked', 1000);
	});

	// Silly name generator game
	$('#goMental').on("click", function() {
	
		if (!$(this).hasClass("disabled")) {
	
			$('#goMental').addClass("disabled");

			$('.sillyName').hide();

			$('.contacting_silly').slideToggle();

			window.dotsGoingUp = true;
	
			var wait = document.getElementById("silly-dots");
	
			var dots = window.setInterval(function() {

     		
				if ( window.dotsGoingUp ) {
					wait.innerHTML += ".";
				} else {
			
	           		wait.innerHTML = wait.innerHTML.substring(4, wait.innerHTML.length);
          		
					if ( wait.innerHTML === "") {
						window.dotsGoingUp = true;
					}
             			
	       		}
				if ( wait.innerHTML.length > 15 ) {
					window.dotsGoingUp = false;
				}
          			
	       	}, 130);

	       	setTimeout(function() {
	       		clearInterval(dots);
	       	} , 2000);

			$.ajax({
				url: '/get_silly_name.json?gen=go&speed=slow',
				dataType: 'json',
				cache: false,
				success: function(silly) {
					wait.innerHTML = ".";
					$('.sillyName').html(silly.response.name);
		            $('.contacting_silly').hide();
		            $('.sillyName').show();
					$('#goMental').removeClass("disabled");
				}
			});
		
		}	

	});


	// PJAX pagination on copywriters
	if ($(".copywriters-pagination").length > 0) {
		if ($.support.pjax) {
		
			$.pjax.defaults = {
				timeout: 3200,
				scrollTo: false
			}
			$(document).on('pjax:send', function() {
				$('.copywriters-directory').addClass('pjaxing');
			});
			$(document).on('pjax:complete', function() {
				$('.copywriters-directory').removeClass('pjaxing');
			});
			$(document).on('click', '.copywriters-pagination a', function(event) {
				$.pjax.click(event, {container: $('#pjax')})
			})
		}
	}
	
	// Tips on package signup
	$('.packages .package-plan .hasTip').popover({
		trigger: "hover",
		container : "body"
	});
	
});
