<?php
		
function my_endpoint( $request_data ) {

	// setup query argument
	$args = array(
		'post_type' => 'lawyer',
	);

	// get posts
	$posts = get_posts($args);

	// add custom field data to posts array	
	foreach ($posts as $key => $post) {
			$posts[$key]->acf = get_fields($post->ID);
			//$posts[$key]->link = get_permalink($post->ID);
			//$posts[$key]->image = get_the_post_thumbnail_url($post->ID);
	}
	
	
	return $posts;


}

// register the endpoint
add_action( 'rest_api_init', function () {
	
	register_rest_route( 'my_endpoint/v1', '/my_post_type/', array(
		'methods' => 'GET',
		'callback' => 'my_endpoint',
		)
	);
});