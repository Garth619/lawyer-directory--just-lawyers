(function ($) {



	$(document).ready(function() {
		
		/* Ajax request to get current cookie despite caching */
		$.post(
			ajaxInfo.url, 
			{
				'action': 'wpshout_get_fave_food_cookie',
				'cookie': 'ajax_user',
			}, 
			function( response ) {
				
				console.log( response );
				
				if(ajaxInfo.ajax_loggedin == 'ajax_loggedin') {
	 				
	 				Cookie.set( ajaxInfo.ajax_username, ajaxInfo.ajax_userid, {
		 				domain: my_mapdata.currentdomain
					});
					
					//var cookieID = 
					
					if (Cookie.exists(ajaxInfo.ajax_username)) {
					
						console.log('cookie '+ajaxInfo.ajax_username+' exists');
						
						$('a.username_post_link').text('ajax test');
						
					
					}
	 				
 				}
 				
 				if(ajaxInfo.ajax_loggedin == 'ajax_loggedout') {
	 				
	 				Cookie.remove(ajaxInfo.ajax_username, {domain: my_mapdata.currentdomain});
	 				
 				}
 				
			}
		);
		
		
		


	
		
		
/* might need
		var whatis = cookie.get( cookieName );
		
		console.log( whatis );
*/
		

		/* Track form changes */
/*
		$( '.favorite-food-input' ).on( "input", function() {
			faveTyped =  $( this ).val();
			if( faveTyped != '' ) {
				$( '.favorite-food-submit' ).removeAttr( 'disabled' );
			} else {
				$( '.favorite-food-submit' ).attr( 'disabled', 'disabled' );
			}
		});
*/

		/* Update favorite food through form */
/*
		$( '.favorite-food-submit' ).click(function() {
			cookie.remove( cookieName );

			var sanitized = escapeRegExp( faveTyped );

			cookie.set( cookieName, sanitized, {
			   expires: 999, // Expires in 999 days
			   path: '/',
			});
			
			fave = cookie.get( cookieName );
			$( '.current-favorite' ).html( faveText + fave );
		});
*/
	});


}(jQuery));