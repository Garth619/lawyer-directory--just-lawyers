<?php
		
	function usp_pro_get_custom_field($post, $field, $request) {
	
		return get_post_meta($post, 'latitude', true); // custom field name
	
	}

	function usp_pro_rest_add_custom_field() {
	
	register_rest_field(
		
		'lawyer',
		'latitude', // rest field name
		
		array(
			'get_callback'    => 'usp_pro_get_custom_field',
			'update_callback' => null,
			'schema'          => null,
		)
		
	);
	
}


add_action('rest_api_init', 'usp_pro_rest_add_custom_field');