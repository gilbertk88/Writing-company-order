// 
//  jquery.copify.js
//  copify
//  
//  Created by Rob Mcvey on 2014-02-21.
//  Copyright 2014 Rob McVey. All rights reserved.
// 
$(document).ready(function() {

	// Fix missing input placeholders on poop browsers
	$('input, textarea').placeholder();

	// Show logout link hint
	$(".logoutLinkTip").twipsy({
		animate: true,
		placement: 'below'
	});

	// Ridiculous hack for shitty IE10 not supoporting conditional CSS anymore      
	if ($.browser.msie && $.browser.version == 10) {
		$(".modal.fade").removeClass("fade");                   
	}
	
	// Slide toggle sidenav elements. We store the index of closed items in sessionStorage.
	$(".sidenav h5.sidenav_collapsable").click(function() {
		$(this).toggleClass("down").next().slideToggle();
		// Remember which are shut
		if(window.sessionStorage) {
			var sidenav_collapsable_array = window.sessionStorage.getItem("sidenav_collapsable");
			var scolps_vis = $(this).hasClass("down");
			var scolps_index = $(this).index();
			// First time we've checked, it's null
			if (sidenav_collapsable_array == null) {
				sidenav_collapsable_array = [];
				if (scolps_vis == false) {
					sidenav_collapsable_array.push(scolps_index);
					window.sessionStorage.setItem("sidenav_collapsable", JSON.stringify(sidenav_collapsable_array));
				}
			} else {
				var sidenav_collapsable_array_parsed = JSON.parse(sidenav_collapsable_array);
				// Add it in to session storage
				if ($.inArray(scolps_index, sidenav_collapsable_array_parsed) == -1 && scolps_vis == false) {
					sidenav_collapsable_array_parsed.push(scolps_index);
				} 
				// else we dithc it from the array
				else {
					sidenav_collapsable_array_parsed.splice(sidenav_collapsable_array_parsed.indexOf(scolps_index), 1);
				}
				window.sessionStorage.setItem("sidenav_collapsable", JSON.stringify(sidenav_collapsable_array_parsed));
			}
		}
	});
	
	// Visibilty of dashboard menu dropdowns on page load. Check for menus to keep closed in sessionStorage
	if(window.sessionStorage) {
		var sidenav_collapsable_array = (window.sessionStorage.getItem("sidenav_collapsable"));
		var sidenav_collapsable_array_parsed = JSON.parse(sidenav_collapsable_array);
		if ($.isArray(sidenav_collapsable_array_parsed)) {
			$.each($(".sidenav h5.sidenav_collapsable"), function(i,k) {
			 	if ($.inArray($(k).index() , sidenav_collapsable_array_parsed) != -1) {
					$(k).removeClass('down').next('ul').hide();
				}
			});
		}
	}	
	
	
});

