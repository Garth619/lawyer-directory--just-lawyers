<?php get_header(); 

	
	if(get_field('lawyer_premium_layout') == 'Premium') {

		get_template_part('single','premiumlawyer');
	
	}
	
	else {
		
		get_template_part('single','standardlawyer');
		
	}


 get_footer(); ?>
