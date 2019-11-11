

jQuery(document).ready(function($){
	
	$('h2.slide').on('click', function(e) {
		
		$(this).next('.slidecontent').slideToggle(400);
	  
	});

	
	


}); // Document Ready

