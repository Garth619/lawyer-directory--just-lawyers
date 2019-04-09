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
		
		
		while($test_query->have_posts()) : $test_query->the_post();
		
		$post_data[] = array(
		    '"Title"' => get_the_title(),
		    '"Permalink"' => get_the_permalink(),
		    '"Lat"' => get_field('latitude'),
		    '"Lng"' =>  get_field('longitude'),
		    '"Address"' => get_field('lawyer_address'),
		    //'"ACF"' => get_fields($post->ID)
		    
	    );
               
		endwhile; 
		

    wp_reset_postdata();
    
    
    return rest_ensure_response($post_data);
		
   
	}
	
	
	
	

                
	
	
	
