<?php
	
	// rest api to plot query results to the maps https://www.tychesoftwares.com/creating-custom-api-endpoints-in-the-wordpress-rest-api/

	
	add_action( 'rest_api_init', 'my_register_route' );

	function my_register_route() {
    
		register_rest_route( 'my-route', 'my-posts', 
			array(
				'methods' => 'GET',
				'callback' => 'my_posts',
			)
		);
		
	}
	
	function my_posts() {
            
   // get the posts
    
    $posts_list = get_posts(
    		array(
    			'post_type' => 'lawyer',
    			'posts_per_page' => 100,
    			'orderby' => 'title',
    			'order' => 'ASC'
    		)
    	);
    	
    $post_data = array();
    
    foreach( $posts_list as $posts) {
        $post_id = $posts->ID;
        $post_title = $posts->post_title;
        $post_data[ $post_id ][ 'title' ] = $post_title;
        $post_data[ $post_id ][ 'garrett' ] = 'garrett';
    }
    
    wp_reset_postdata();
    
    
    return rest_ensure_response( $post_data );
}
	
