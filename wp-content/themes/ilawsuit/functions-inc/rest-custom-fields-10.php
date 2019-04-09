<?php
	
add_action( 'rest_api_init', 'garrett_test' ); 

	function garrett_test() {
    
		register_rest_route( 'new-route', 'new-posts', 
			array(
				'methods' => 'GET',
				'callback' => 'new_posts',
			)
			
		);
		
	}
	
	
	// need regex rules, need pagination somehow https://www.tychesoftwares.com/creating-custom-api-endpoints-in-the-wordpress-rest-api/
	//custom routing for my query_vars below
	
	
	function new_posts() {
		
            
   	$testargs = array(
	  		'post_type' => 'lawyer',
			'posts_per_page' => 100,
    		'orderby' => 'title',
    		//'offset' => 100,
    		'post_status' => 'publish',
			'order' => 'ASC',
			'tax_query' => array(
				'relation' => 'AND',
				array(
					'taxonomy'  => 'location',
					'field' => 'slug',
					'terms' => 'los-angeles', // query_var
					'operator' => 'IN',
					),
				array(
					'taxonomy'  => 'practice_area',
					'field'     => 'slug',
					'terms'     => 'business', // query_var
					'operator' => 'IN',
				)
			),
		);
		
		
		$post_data = array();
		
		$test_query = new WP_Query($testargs); 
		
		
		
		 //$plugins = new \WP_Query( $query_args );

    
    foreach( $test_query->posts as $posts) {// try to change this back to if and while
	    
	    //$posts[$key]->acf = get_fields($post->ID);
	    
	    // https://stackoverflow.com/questions/35924138/adding-acf-to-custom-wp-api-endpoints
	    

	    $post_data[] = array(
		    '"Title"' => $posts->post_title,
		    '"Lat"' => $posts->ID,
		    '"Lng"' => 'what',
		    
	    );

			
			// https://json-schema.org/understanding-json-schema/index.html
	   
        
    }
    
    
    
    wp_reset_postdata();
    
    
    return rest_ensure_response( $post_data );
		
   
	}
	
	
	
	
	
	
	
	
	