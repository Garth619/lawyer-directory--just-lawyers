<?php
	
	add_action('rest_api_init', 'garrett_new');
	
	
	function garrett_new() {
		
		register_rest_route('mapping/v1','lawyermap', array(
			'methods' => 'GET', // might need to use WP_REST+SERVER::READABLE
			'callback' => 'mapResults',
		));
		
	}
	
	
	function mapResults() {
		
		register_rest_field (
			'lawyer', 
			'longitude',
			array(
				'get_callback' => function() {return get_the_author();}
			)
			
		);
	
	}
