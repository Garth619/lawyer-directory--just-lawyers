<?php

add_action( 'rest_api_init', 'my_register_route');
function my_register_route() {
            
      register_rest_route( 'my-route', 'my-posts/(?P<id>\d+)', array(
            'methods' => 'GET',
            'callback' => 'my_posts',
            'args' => array( // learn more about these args
                    'id' => array( 
                        'validate_callback' => function( $param, $request, $key ) {
                            return is_numeric( $param );
                        }
                    ),
                ),
             )
        );
}
   
function my_posts( $data ) {
            
    // default the author list to all
    $post_author = 'all';
    
    // if ID is set
    if( isset( $data[ 'id' ] ) ) {
          $post_author = $data[ 'id' ];
    }
    
    // get the posts
    $posts_list = get_posts( array( 'posts_per_page' => 100,'post_type' => 'lawyer', 'author' => $post_author ) );
    $post_data = array();
            
    foreach( $posts_list as $posts) {
        $post_id = $posts->ID;
        $post_author = $posts->post_author;
        $post_title = $posts->post_title;
        $post_content = $posts->post_content;
        
        $post_data[ $post_id ][ 'author' ] = $post_author;
        $post_data[ $post_id ][ 'title' ] = $post_title;
        $post_data[ $post_id ][ 'content' ] = $post_content;
    }
            
    wp_reset_postdata();
            
    return rest_ensure_response( $post_data );
}