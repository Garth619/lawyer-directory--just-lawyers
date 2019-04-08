<?php 
	
	
	add_action('rest_api_init', 'register_custom_fields');
	
	function register_custom_fields() {
		
		$latitude = get_field('latitude');
		
		register_rest_field (
			'lawyer', 
			'latitude',
			array(
				'get_callback' => function() {return get_permalink();}
			)
			
		);
		
		
	}
	
	
	
	/////////
	
	
	
		
	
	
	//////////
	
