<?php
	
add_action( 'rest_api_init', 'map_route' ); 

	function map_route() {
    
		register_rest_route( 'mapping/v1', 'location/(?P<map_city>[a-z0-9]+(?:-[a-z0-9]+)*)/(?P<map_pa>[a-z0-9]+(?:-[a-z0-9]+)*)/(?P<page>[1-9]{1,2})', 
			array(
				'methods' => 'GET',
				'callback' => 'map_query',
				'args' => array(
					'map_city' => array(
						'required' => true
					),
					'map_pa' => array(
						'required' => true
					),
					'page' => array(
						'required' => true
					),
				),
			)
			
		);
		
	}
	
	
	function map_query($request_data) {
		
		$parameters = $request_data->get_params();
    $map_city = $parameters['map_city'];
    $map_pa = $parameters['map_pa'];
    $page = $parameters['page'];
		
    $featured_args = array(
	  	'post_type' => 'lawyer',
			'posts_per_page' => -1, // could potentially be alot of posts
			//'paged' => $page,
    	'orderby' => 'title',
    	'post_status' => 'publish',
			'order' => 'ASC',
			'tax_query' => array(
				'relation' => 'AND',
				array(
					'taxonomy'  => 'location',
					'field' => 'slug',
					'terms' => $map_city,
					'operator' => 'IN',
					),
				array(
					'taxonomy'  => 'practice_area',
					'field'     => 'slug',
					'terms'     =>  $map_pa,
					'operator' => 'IN',
				),
				array(
					'taxonomy'  => 'featured_lawyers',
					'field'     => 'slug',
					'terms'     =>'featured-lawyer',
					'operator' => 'IN',
				)
			),
		);
		
		
		$post_data = array();
		
		
		if($page == 1) {
		
			$featured_query = new WP_Query($featured_args); 
		
		
			while($featured_query->have_posts()) : $featured_query->the_post();
			
			
/*
			$terms = get_the_terms($post->ID, 'featured_lawyers');
			
			$term = array_pop($terms);
*/			
				
				$lawyer_profile_image = get_field( 'lawyer_profile_image' );
			
				$post_data[] = array(
		    	'Title' => get_the_title(),
					'Featured_lawyer' => true,
					'Featured_post_image' => $lawyer_profile_image['url'],
					'Permalink' => get_the_permalink(),
					'Lat' => round(get_field('latitude'), 6),
					'Lng' =>  round(get_field('longitude'), 6),
					'Address' => get_field('lawyer_address'),
					'Phone' => get_field('lawyer_phone'),
					'Tel_href' => str_replace(['-', '(', ')', ' '], '', get_field('lawyer_phone')),
					//'"ACF"' => get_fields($post->ID)
					);
	    
			endwhile; 
		
			wp_reset_postdata();
		
		
		}
		
		
		
		$reg_args = array(
	  	'post_type' => 'lawyer',
			'posts_per_page' => 40,
			'paged' => $page,
    	'orderby' => 'title',
    	'post_status' => 'publish',
			'order' => 'ASC',
			//'post__not_in' => $featured_lawyers,
			'tax_query' => array(
				'relation' => 'AND',
				array(
					'taxonomy'  => 'location',
					'field' => 'slug',
					'terms' => $map_city,
					'operator' => 'IN',
					),
				array(
					'taxonomy'  => 'practice_area',
					'field'     => 'slug',
					'terms'     =>  $map_pa,
					'operator' => 'IN',
				)
			),
		);
		
		
		$reg_query = new WP_Query($reg_args); 
		
		while($reg_query->have_posts()) : $reg_query->the_post();
		
			$post_data_two[] = array(
		    'Title' => get_the_title(),
		    'Permalink' => get_the_permalink(),
		    'Featured_lawyer' => false,
		    'Featured_post_image' => false,
		    'Lat' => round(get_field('latitude'), 6),
		    'Lng' =>  round(get_field('longitude'), 6),
		    'Address' => get_field('lawyer_address'),
		    'Phone' => get_field('lawyer_phone'),
		    'Tel_href' => str_replace(['-', '(', ')', ' '], '', get_field('lawyer_phone')),
		    //'"ACF"' => get_fields($post->ID)
		  );
	    
	  endwhile; 
		
		wp_reset_postdata();
		
		$entire_list = array_merge($post_data,$post_data_two);
    
    return rest_ensure_response($entire_list);
		
   
	}
	
