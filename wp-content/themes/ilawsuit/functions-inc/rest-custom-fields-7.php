<?php

add_action( 'rest_api_init', 'wpshout_register_routes' ); 

function wpshout_register_routes() {
    register_rest_route( 
        'myplugin/v1',
        '/author/(?P<id>\d+)',
        array(
            'methods' => 'GET',
            'callback' => 'wpshout_find_author_post_title',
        )
    );
}



function wpshout_find_author_post_title( $data ) {
    $posts = get_posts( array(
        'author' => $data['id'],
        'post_type' => 'lawyer',
    ) );

    if ( empty( $posts ) ) {
        return null;
    }

    return $posts[0]->post_title;
}