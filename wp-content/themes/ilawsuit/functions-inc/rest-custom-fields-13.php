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
	
	//custom routing for my query_vars below
	
	
	function new_posts() {
		
            
   	$testargs = array(
	  		'post_type' => 'lawyer',
			'posts_per_page' => 100,
    		'orderby' => 'title',
    		'offset' => 100,
    		'no_found_rows' => true, // does this break offest?
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
		
		$mytitle = get_the_title();
		$mypermalink = get_the_permalink();
		
		$lat = get_field('latitude');
		$lattwo = round($lat, 6);
		
				
		$lgn = get_field('longitude');
		$lgntwo = round($lgn, 6);
		
		$phone = get_field('lawyer_phone');
		$address = get_field('lawyer_address');
		
		$post_data[] = array(
		    '"Title"' => $mytitle,
		    '"Permalink"' => $mypermalink,
		    '"Lat"' => $lattwo,
		    '"Lng"' =>  $lgntwo,
		    '"Address"' => $address,
		    '"Phone"' => $phone,
		    //'"ACF"' => get_fields($post->ID)
		    
	    );
               
		endwhile; 
		

    wp_reset_postdata();
    
    
    return rest_ensure_response($post_data);
		
   
	}
	

	
	

                
	
	
	
