// @codekit-prepend 'googlemap.js'
// @codekit-prepend 'waypoints.js'
// @codekit-prepend 'slick.js'
// @codekit-prepend 'lity.js'
// @codekit-prepend 'modernizr-webp.js'

jQuery(document).ready(function($){
	
	
	
		// section one animation
		
		
		$('body.page-template-template-home').addClass('ready');
	
	
	 /* Modernizr - check if browser supports webp for section_one. 
     --------------------------------------------------------------------------------------- */
    
    // add data-webp and data-jpg to images in section one and you're gucci
    
     Modernizr.on('webp', function (result) {
	    
	    $('#section_one img').each(function () {
	    
				if (result) {
    
					if ($(this).attr('data-webp')) {
          
          	var img = $(this).data('webp');
          
						$(this).attr('src', img);
        	
        	}
        	
        }
  
	 			else {
		 			
		 			if ($(this).attr('data-jpg')) {
          
          	var img = $(this).data('jpg');
          
						$(this).attr('src', img);
        	
        	}
    
    		}
  		
  		});
  		
  		
  		// background images (one time load, does not reflect media queries or window width..yet)
  		
  		if (result) {
	  		
	  		var sectionOne = '#section_one';
	  		
	  		if ($(sectionOne).attr('data-webpbg')) {
		  		
		  		var imgBg = $(sectionOne).data('webpbg');
		  		
		  		$(sectionOne).css('background-image', 'url(' + imgBg + ')');
		  		
	  		}
	  		
	  	}
	  	
	  	
	  	else {
		  	
		  	if ($('#section_one').attr('data-jpgbg')) {
		  		
		  		var imgBg = $('#section_one').data('jpgbg');
		  		
		  		$('#section_one').css('background-image', 'url(' + imgBg + ')');
		  		
	  		}
		  	
	  	}
  		
			// console.log(result);
	
		});
		
		
		
		/* Load Images - Call function when you reach the a section with images using waypoints
       BG image - <div data-src=""></div>   ,   Image - <img data-src="">
      --------------------------------------------------------------------------------------- */

    function loadImages() {
      
      // images
      
      $('img').each(function () {
        
        if ($(this).attr('data-src')) {
          
          var img = $(this).data('src');
          
          $(this).attr('src', img);
        
        }
      
      });

      // background images
      
      $('div, section').each(function () {
       
        if ($(this).attr('data-src')) {
          
          var backgroundImg = $(this).data('src');
          
          $(this).css('background-image', 'url(' + backgroundImg + ')');
        
        }
      
      });

     
    }

    createWaypoint('internal_main', null, null, -10, loadImages, false);







     /* Wistia - Call function when script needs to be loaded either by hover or waypoints
     --------------------------------------------------------------------------------------- */

    //function wistiaLoad() {
     // jQuery.getScript('https://fast.wistia.com/assets/external/E-v1.js', function(data, textStatus, jqxhr) {
        //console.log('wistia load:', textStatus); // Success
     // });
   // }

    // examples:

    // jQuery(".banner-box-1").one("mouseenter", function(e){
    //   wistiaLoad();
    // });

    // createWaypoint('section-1', null, null, '100%', wistiaLoad, false)
    
    
    $('.wistia_embed').click(function () {
        //make sure to only load if Wistia is not already loaded
        if (typeof Wistia === 'undefined') {
            $.getScript("https://fast.wistia.com/assets/external/E-v1.js", function (data, textStatus, jqxhr) {
                // We got the text but, it's possible parsing could take some time on slower devices. Unfortunately, js parsing does not have
                // a hook we can listen for. So we need to set an interval to check when it's ready 
                var interval = setInterval(function () {
                    if ($('.wistia_embed').attr('id') && window._wq) {
                        var videoId = $('.wistia_embed').attr('id').split('-')[1];
                        window._wq = window._wq || [];
                        _wq.push({
                            id: videoId,
                            onReady: function (video) {
                                $('.wistia_click_to_play').trigger('click');
                            }
                        });
                        clearInterval(interval);
                    }
                }, 100)
            });
        }
    })
   
    
    
    
    
    



    /* Smooth Scroll down to section on click (<a href="#id_of_section_to_be_scrolled_to">)
      --------------------------------------------------------------------------------------- */

    $(function() {
      $('a[href*="#"]:not([href="#"])').click(function() {
        if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
          var target = $(this.hash);
          target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
          if (target.length) {
            $('html, body').animate({
              scrollTop: target.offset().top
            }, 1000);
            return false;
          }
        }
      });
    });

		
		
		/* Waypoints
     --------------------------------------------------------------------------------------- */


    function createWaypoint(triggerElementId, animatedElement, className, offsetVal, functionName, reverse) {
      if(jQuery('#' + triggerElementId).length) {
        var waypoint = new Waypoint({
          element: document.getElementById(triggerElementId),
          handler: function (direction) {
            if (direction === 'down') {
              jQuery(animatedElement).addClass(className);

              if (typeof functionName === 'function') {
                functionName();
                this.destroy();
              }

            } else if (direction === 'up') {
              if (reverse) {
                jQuery(animatedElement).removeClass(className);
              }

            }
          },
          offset: offsetVal
          // Integer or percent
          // 500 means when element is 500px from the top of the page, the event triggers
          // 50% means when element is 50% from the top of the page, the event triggers
        });
      }
    }
		
		
		

    createWaypoint('internal_main', '.mobile_sticky_header', 'visible', -300, null, true);
    
   


		
		/* Live Chat - Call function when script needs to be loaded either by hover, click or waypoints
   --------------------------------------------------------------------------------------------------- */ 
   
   
   
   function livechatLoad() {
	   if(my_data.live_chat) {
      jQuery.getScript(my_data.live_chat, function(data, textStatus, jqxhr) {
        console.log('Live Chat load:', textStatus); // Success
      });
      // alert( my_data.live_chat);
      }
    }
   
   
   // createWaypoint('section_one', null, null, -100, livechatLoad, false);
   // createWaypoint('internal_trigger', null, null, -100, livechatLoad, false);




        
    



/* Slick Carousel ( http://kenwheeler.github.io/slick/ )
--------------------------------------------------------------------------------------- */



$('.sec_two_grid').slick({
  infinite: true,
  slidesToShow: 1,
  slidesToScroll: 1,
  mobileFirst:true,
	arrows:true,
	prevArrow:".sec_two_button_left",
	nextArrow:".sec_two_button_right",
	responsive: [
    {
      breakpoint: 700,
      settings: {
      slidesToShow: 2,
      slidesToScroll: 2,
     }
   },
   {
      breakpoint: 1066,
      settings: "unslick"
   }
	]
 });
 
 
 
 
 $('.att_bio_case_results_slider').slick({
  infinite: true,
  slidesToShow: 3,
  slidesToScroll: 3,
  arrows:true,
	prevArrow:".cr_button_left",
	nextArrow:".cr_button_right",
	responsive: [
    {
      breakpoint: 1275,
      settings: {
      slidesToShow: 2,
      slidesToScroll: 2,
     }
   },
   {
      breakpoint: 980,
      settings: {
      slidesToShow: 1,
      slidesToScroll: 1,
      adaptiveHeight: true
     }
   }
	]
 });
 

 

	

/* Remove "#" from menu anchor items to avoid jump to the top of the page
--------------------------------------------------------------------------------------- */


$("ul > li.menu-item-has-children > a[href='#']").removeAttr("href");




$('.sec_three_tab').on('click', function(e) {
  
	$('.sec_three_tab').removeClass('active');
	
	$(this).addClass('active');

});




// Section Three Tabs



$('.sec_three_tab').on('click', function(e) {
  
	var dataTab = $(this).attr('data-tab');
	
/*
	$('.sec_three_list').fadeOut(300);
   
  $('.'+dataTab).delay(600).fadeIn(400);
*/
  
  $('.sec_three_list').fadeOut(300);
   
  $('.'+dataTab).delay(600).show(0);
  
  $('.sec_three_list_wrapper, a.view_all_button').addClass('hide');
  
  
  $('.sec_three_list_wrapper, a.view_all_button').delay(600).queue(function(){
        
  	$(this).removeClass('hide').dequeue();
     
  });
  
  

});



  // faq
  
  
  $('.single_faq').on('click', function(e) {
    
    $(this).find('.faq_answer').slideToggle(300);
    
    $(this).find('.faq_question').toggleClass('active');
    
  });
  
  
  
  //on page list filter
  
  $(".list_input").on("keyup", function() {
	  
    var value = $(this).val().toLowerCase();
    
    $(".list_wrapper ul li").filter(function() {
	    
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);           
      
    });
    
    $(".single_lawyer_result").filter(function() {
	    
      $(this).toggle($(this).find('span.single_lawyer_title').text().toLowerCase().indexOf(value) > -1);
      
    });
    
  });
 
  
  // form styles
  
  $('.form_wrapper textarea').parent().parent().addClass('textarea_wrap');

	
	
	// nav
	
	
		var windowWidth = $(window).width();
	
	
	
		function navWidth() {
	    
	    if (windowWidth >= 1100) {
	        
	      
	      $('nav').addClass('desktop');
	      
	      
	      $('nav ul.menu > li.menu-item-has-children > a').on('click', function(e) {
	        
	      	$(".submenu_container").empty();
	      
					$(this).next('ul.sub-menu').clone().appendTo('.submenu_container').fadeIn();
	      
	      
	      });
	      
	      
	      // current page clone
	
				$('nav ul.menu > li.current-menu-ancestor > a').next('ul.sub-menu').clone().appendTo('.submenu_container').show();
	    		    	   		
	    		
	    }
	    
	     if (windowWidth <= 1099) {
		     
		     $('nav ul.menu > li.menu-item-has-children > a').on('click', function(e) {
			     
			     $(this).next('ul.sub-menu').slideToggle(300);
		       
		     });
		     
	     }
	    
	   
		};
		
	
	 navWidth();
	 
	 
	 $('.menu_wrapper').on('click', function(e) {
	   
	 	$('nav').slideDown(450);
	 
	 });
	 
	 
	 $('.nav_close').on('click', function(e) {
	   
	 	$('nav').slideUp(450);
	 
	 });
	 
	 
	 
	 // att bio lawyer visit website validation
	 
	 
	 var myUrl = $('a.visit_website_button').attr("href");
	 
	 if(myUrl) {
		 
	 	if(!myUrl.includes("//")){
   	
		 	console.log(myUrl + ' doesnt have "//" at all - add in to fix broken link');
		 	
		 	$(myUrl).prepend('//');
		 	
		 	$('a.visit_website_button').attr('href',function(i,v) {
		 		
		 		return "//" + v;
			
			});
		
		 }
		 
	 }
	 
	 
	 // custom search section one
	 
	 
	 $('.sec_one_select').on('click', function(e) {
	   
	 	$('.sec_one_select_dropdown').slideToggle(300);
	 
	 });
	 
	 
	 $('.sec_one_select_dropdown ul li span').on('click', function(e) {
	   
	 	var typeoflaw = $(this).text();
	 	
	 	$('.sec_one_select span').replaceWith('<span class="select_text">' +typeoflaw+ '<span>');
	 	
	 	$('input#typeoflaw').val(typeoflaw);
	 	
	 		$('.sec_one_select_dropdown').slideUp(300);
	 	
	 });
	 
	 
	 $(document).click(function (e){

			var container = $(".sec_one_select_wrapper");

			if (!container.is(e.target) && container.has(e.target).length === 0){

				$('.sec_one_select_dropdown').slideUp(300);
		
			}

		}); 
	 
	 
	 // new search slidetoggle
	 
	 
	 $('span.make_new_search').on('click', function(e) {
		 
		$(this).delay(200).fadeOut(400);
	   
	 	$('.new_search_wrapper .three_part_search_wrapper').delay(800).slideDown();
	 
	 });
	 
	
	
	// mobile search

	
	$('.mobile_refine_wrapper').on('click', function(e) {
	  
		$('.mobile_search_overlay').slideToggle();
		
		$(this).fadeOut(300);
		
		$('.mobile_close_wrapper').delay(300).css("display", "flex").hide().fadeIn(300);
	
	});
	
	
	$('.mobile_close_wrapper').on('click', function(e) {
	  
		$('.mobile_search_overlay').slideToggle();
		
		$(this).fadeOut(300);
		
		$('.mobile_refine_wrapper').delay(300).css("display", "flex").hide().fadeIn(300);
	
	});
	
	// total count reorder position on lawyer results
	
	
	//var textUpdate = $('span.overall_count').text();
		
	//$('span.results_number').replaceWith('<span.results_number>' + textUpdate + '</span>');
	

  
}); // document ready