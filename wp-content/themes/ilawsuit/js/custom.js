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
    
    $(".browse_filter ul li").filter(function() {
	    
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
   	
		 	//console.log(myUrl + ' doesnt have "//" at all - add in to fix broken link');
		 	
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
	
	// total count to top of page, it has to process after the loop but needs to be placed above it visually
	
	var textUpdate = $('span.overall_count').text();
		
	$('span.results_number').replaceWith('<span class="no_filter_space results_number">Total Lawyers (' + textUpdate + ')</span>');
	
	// pagination to top of page, it has to process after the loop but needs to be placed above it visually
	
	$('.bottom_pagination').clone().appendTo('.top_pagination');
	
	// adds class for proper spacing to headers if page descriptions are there or not 
	
	
	if ($(".directory_description")[0]){
    
		$('h2.browse_city, h2.featured_city').addClass('decription_exists');
	
	}
	
	
	if (!$("h2.featured_city")[0]){
    
		$('h2.browse_city').addClass('no_featured_header');
	
	} 	
	
	
	if ($(".directory_description")[0] && !$("h2.featured_city")[0] ) { 
	
		$('h2.browse_city').addClass('no_featured_header_with_description');
	
	}
	
	
	// bio overlay
	
	$('a.claim_button').on('click', function(e) {
	  
		$('.claim_overlay').addClass('open');
	
	});
	
	$('.overlay_close, span.go_back_to_profile').on('click', function(e) {
	  
		$('.claim_overlay').removeClass('open');
	
	});
	
	

	// claim/create profile form
	
	$('span.claim_begin').on('click', function(e) {
	  
		$('.price_description').fadeOut(300);
		
		$('.mymultistep_form').delay(500).fadeIn(300);
	
	});
	
	// layout styles: target li that has a textarea child and make it flex-basis 100%
	
	function myflexWidth() {
		
		$('.mymultistep_form textarea').parent().parent().addClass('flex_width');
	
		$('.form_content_wrapper').parent().addClass('flex_width');
	
		$('.ginput_container_checkbox').parent().addClass('flex_width');
		
	}
	
	myflexWidth();
	
	// populate the claim profile form with exisiting profile info on bio pages (super hardcoded in order to map correctly)
	
	function mypopulateForm() {
		
		// name
  
		var iname = $('.internal_banner h1').text();
		
		$('.mylawyer_name input').val(iname);
		
		// phone
		
		var iphone = $('a.att_bio_phone').text();
		
		$('.mylawyer_phone input').val(iphone);
		
		// lawfirm name
		
		var ilawfirm = $('.lawfirm_name').text();
		
		$('.mylawfirm_name input').val(ilawfirm);
		 
		// website url
		 
		var iurl = $('a.visit_website_button').attr('href');
		
		$('.mylawfirm_url input').val(iurl);
		 
		// City, State and Zip Code metadata are being set up in the functions.php. This is bc I am not using these acfs onthe template and I don't want them to index along with the whole address acf in the sidebar (street address doesn't exist in this database)
		 
		// City
		 
		var icity = my_mapdata.lawyerbio_city;
		
		$('.mylawyer_city').val(icity);
		 
		// State
		 
		var istate = my_mapdata.lawyerbio_state;
		
		$('.mylawyer_state select').val(istate);
		 
		// Zip code
		 
		var izip = my_mapdata.lawyerbio_zipcode;
		
		$('.mylawyer_zipcode input').val(izip);
		 	 
		// pa
		 
		//var paItem = [];
		 
		// $(".att_bio_pa_list ul li").each(function() { 
			 
	 //paItem.push($(this).text()) 
			 
	 //});
		 
	 //var paList = '' + paItem.join(', ') + '';
		 
	 // $('textarea#input_2_26').val(paList);
		
	 // school one name
		 
	 var ischoolonename = $('.school_one_name').text();
		
	 $('.myschool_one_name input').val(ischoolonename);
		 
	 // school one major
	
	 var ischoolonemajor = $('.school_one_major').text();
		
	 $('.myschool_one_major input').val(ischoolonemajor);
		
	 // school one degree
		
	 var ischoolonedegree = $('.school_one_degree').text();
		
	 $('.myschool_one_degree input').val(ischoolonedegree);
		
	 // school one year grad
		
	 var ischooloneyeargrad = $('.school_one_year_graduated').text();
		
	 $('.myschool_one_year_grad input').val(ischooloneyeargrad);
		
	 // school two name
		
	 var ischooltwoname = $('.school_two_name').text();
		
	 $('.myschool_two_name input').val(ischooltwoname);
		
	 // school two major
		
	 var ischooltwomajor = $('.school_two_major').text();
		
	 $('.myschool_two_major input').val(ischooltwomajor);
		
	 // school two degree
		
	 var ischooltwodegree = $('.school_two_degree').text();
		
	 $('.myschool_two_degree input').val(ischooltwodegree);
		
	 // school two year grad
		
	 var ischooltwoyeargrad = $('.school_two_year_graduated').text();
		
	 $('.myschool_two_year_grad input').val(ischooltwoyeargrad);
		
	 // years licensed for
		
	 var iyears = $('.years_licensed_for').text();
		
	 $('.my_years_liscensed input').val(iyears);
		
	}
	
	if($('body.single-lawyer').length >0 ){ // populate only on existing single lawyer forms

		mypopulateForm();

	}
	
	function postslugHidden() {
		
		// i think a smater way is to pass the post id here through functions and just add it to the hidden field, then on the after submission hook convert the id to slug buti cant put it back into the merge tag
		
				
	}
	
	postslugHidden();
	
	// replace the select dropdown with a better styled version
	
	function mystateSelect() {
		
		var x, i, j, selElmnt, a, b, c;
		/*look for any elements with the class "custom-select":*/
		x = document.getElementsByClassName("mycustom-select");
		for (i = 0; i < x.length; i++) {
		  selElmnt = x[i].getElementsByTagName("select")[0];
		  /*for each element, create a new DIV that will act as the selected item:*/
		  a = document.createElement("DIV");
		  a.setAttribute("class", "select-selected");
		  a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
		  x[i].appendChild(a);
		  /*for each element, create a new DIV that will contain the option list:*/
		  b = document.createElement("DIV");
		  b.setAttribute("class", "select-items select-hide");
		  for (j = 1; j < selElmnt.length; j++) {
		    /*for each option in the original select element,
		    create a new DIV that will act as an option item:*/
		    c = document.createElement("DIV");
		    c.innerHTML = selElmnt.options[j].innerHTML;
		    c.addEventListener("click", function(e) {
		        /*when an item is clicked, update the original select box,
		        and the selected item:*/
		        var y, i, k, s, h;
		        s = this.parentNode.parentNode.getElementsByTagName("select")[0];
		        h = this.parentNode.previousSibling;
		        for (i = 0; i < s.length; i++) {
		          if (s.options[i].innerHTML == this.innerHTML) {
		            s.selectedIndex = i;
		            h.innerHTML = this.innerHTML;
		            y = this.parentNode.getElementsByClassName("same-as-selected");
		            for (k = 0; k < y.length; k++) {
		              y[k].removeAttribute("class");
		            }
		            this.setAttribute("class", "same-as-selected");
		            break;
		          }
		        }
		        h.click();
		    });
		    b.appendChild(c);
		  }
		  x[i].appendChild(b);
		  a.addEventListener("click", function(e) {
		      /*when the select box is clicked, close any other select boxes,
		      and open/close the current select box:*/
		      e.stopPropagation();
		      closeAllSelect(this);
		      this.nextSibling.classList.toggle("select-hide");
		      this.classList.toggle("select-arrow-active");
		    });
		}
		function closeAllSelect(elmnt) {
		  /*a function that will close all select boxes in the document,
		  except the current select box:*/
		  var x, y, i, arrNo = [];
		  x = document.getElementsByClassName("select-items");
		  y = document.getElementsByClassName("select-selected");
		  for (i = 0; i < y.length; i++) {
		    if (elmnt == y[i]) {
		      arrNo.push(i)
		    } else {
		      y[i].classList.remove("select-arrow-active");
		    }
		  }
		  for (i = 0; i < x.length; i++) {
		    if (arrNo.indexOf(i)) {
		      x[i].classList.add("select-hide");
		    }
		  }
		}
		/*if the user clicks anywhere outside the select box,
		then close all select boxes:*/
		document.addEventListener("click", closeAllSelect);

		
	}
	
	mystateSelect();
	
	// latitude and longitude
	
	function mylatLng() {
		
		// read only input
		
		$('.mylatitude input, .mylongitude input').prop('readonly', true);
		
		// if all address input fields have a value, fire the ajax call to convert the address into latitude/longtitude coordinates
		
		$('span.calculate_lat_long').on('click', function(e) {
			
			if(!$('.mylawyer_streetaddress input, .mylawyer_city input, .mylawyer_state input, .mylawyer_zipcode input').val() == '') {
		  
		  	var latStreet = $('.mylawyer_streetaddress input').val();
				var latCity = $('.mylawyer_city input').val();
				var latState = $('.mylawyer_state select').val();
				var latZip = $('.mylawyer_zipcode input').val();
				var address = ''+latStreet+', '+latCity+', '+latState+' '+latZip+'';
				var address_plus = address.replace(/\s/g , "+");
		  
				// console.log(address_plus);
		  
				$.ajax({
		      url: 'https://maps.googleapis.com/maps/api/geocode/json?address='+address_plus+'&key=AIzaSyDPAds-G8zjbtCxCC19dH2o_voVQIEjg7o',
		      dataType: 'json',
		      success: function(json) {
		       //console.log(json.results[0].geometry.location.lat);
		       //console.log(json.results[0].geometry.location.lng);
		            
		       var mylat = json.results[0].geometry.location.lat;
		       var mylong = json.results[0].geometry.location.lng;
		            
		       $('.mylatitude input').val(mylat);
		       $('.mylongitude input').val(mylong);
		            
		      }
		    });
			}
		
		});
		
	}
	
	mylatLng();
	
	// contact info checkmark
	
	function mycontactCheck() {
		
		$('.mycontact_checkmark input[type="checkbox"]').change(function() {
		  
		  if ($(this).is(':checked')) {
		    
		    // name
				
				var contactname = $('.mylawyer_name input').val();
				
				$('.mypersonal_name input').val(contactname);
				
				// email
				
				var contactemail = $('.mylawyer_email input').val();
				
				$('.mypersonal_email input').val(contactemail);
				
				// phone
				
				var contactphone = $('.mylawyer_phone input').val();
				
				$('.mypersonal_phone input').val(contactphone);
				
				// street address
				
				var contactstreet = $('.mylawyer_streetaddress input').val();
				
				$('.mypersonal_streetaddress input').val(contactstreet);
				
				// city
				
				var contactcity = $('.mylawyer_city input').val();
				
				$('.mypersonal_city input').val(contactcity);
				
				// state
				
				var contactstate = $('.mylawyer_state select').val();
				
				$('.mypersonal_state input').val(contactstate);
				
				//console.log(contactstate);
				
				// zip
				
				var contactzip = $('.mylawyer_zipcode input').val();
				
				$('.mypersonal_zipcode input').val(contactzip);
				
				
			} else {
			  
			  $('.mypsersonal_address input, .mypsersonal_address select').val('');
		    
		 }
		  
		
		});


	}
	
	mycontactCheck();
	
	// add all the custom jquery above back into the form after it does ajax validation
	
	$(document).bind('gform_post_render', function(){
		
			myflexWidth();
			//mystateSelect();
			var x, i, j, selElmnt, a, b, c;
/*look for any elements with the class "custom-select":*/
x = document.getElementsByClassName("mycustom-select");
for (i = 0; i < x.length; i++) {
  selElmnt = x[i].getElementsByTagName("select")[0];
  /*for each element, create a new DIV that will act as the selected item:*/
  a = document.createElement("DIV");
  a.setAttribute("class", "select-selected render");
  a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
  x[i].appendChild(a);
  /*for each element, create a new DIV that will contain the option list:*/
  b = document.createElement("DIV");
  b.setAttribute("class", "select-items select-hide render");
  for (j = 1; j < selElmnt.length; j++) {
    /*for each option in the original select element,
    create a new DIV that will act as an option item:*/
    c = document.createElement("DIV");
    c.innerHTML = selElmnt.options[j].innerHTML;
    c.addEventListener("click", function(e) {
        /*when an item is clicked, update the original select box,
        and the selected item:*/
        var y, i, k, s, h;
        s = this.parentNode.parentNode.getElementsByTagName("select")[0];
        h = this.parentNode.previousSibling;
        for (i = 0; i < s.length; i++) {
          if (s.options[i].innerHTML == this.innerHTML) {
            s.selectedIndex = i;
            h.innerHTML = this.innerHTML;
            y = this.parentNode.getElementsByClassName("same-as-selected");
            for (k = 0; k < y.length; k++) {
              y[k].removeAttribute("class");
            }
            this.setAttribute("class", "same-as-selected");
            break;
          }
        }
        h.click();
    });
    b.appendChild(c);
  }
  x[i].appendChild(b);
  a.addEventListener("click", function(e) {
      /*when the select box is clicked, close any other select boxes,
      and open/close the current select box:*/
      e.stopPropagation();
      closeAllSelect(this);
      this.nextSibling.classList.toggle("select-hide");
      this.classList.toggle("select-arrow-active");
    });
}
function closeAllSelect(elmnt) {
  /*a function that will close all select boxes in the document,
  except the current select box:*/
  var x, y, i, arrNo = [];
  x = document.getElementsByClassName("select-items");
  y = document.getElementsByClassName("select-selected");
  for (i = 0; i < y.length; i++) {
    if (elmnt == y[i]) {
      arrNo.push(i)
    } else {
      y[i].classList.remove("select-arrow-active");
    }
  }
  for (i = 0; i < x.length; i++) {
    if (arrNo.indexOf(i)) {
      x[i].classList.add("select-hide");
    }
  }
}
/*if the user clicks anywhere outside the select box,
then close all select boxes:*/
document.addEventListener("click", closeAllSelect);

			mylatLng();
			mycontactCheck();
			
	});
  
  
  
}); // document ready