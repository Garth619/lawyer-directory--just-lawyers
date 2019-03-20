<?php // search arguments 


/**
 * Build a custom query based on several conditions
 * The pre_get_posts action gives developers access to the $query object by reference
 * any changes you make to $query are made directly to the original object - no return value is requested
 *
 * @link https://codex.wordpress.org/Plugin_API/Action_Reference/pre_get_posts
 *
 */
function sm_pre_get_posts( $query ) {
    // check if the user is requesting an admin page 
    // or current query is not the main query
    if ( is_admin() || ! $query->is_main_query() ){
        return;
    }

    // edit the query only when post type is 'accommodation'
    // if it isn't, return
    if ( !is_post_type_archive( 'accommodation' ) ){
        return;
    }

    $meta_query = array();

    // add meta_query elements
    if( !empty( get_query_var( 'city' ) ) ){
        $meta_query[] = array( 
        									'key' => '_sm_accommodation_city', 
        									'value' => get_query_var( 'city' ), 
        									'compare' => 'LIKE'
        								);
    }

    if( !empty( get_query_var( 'type' ) ) ){
        $meta_query[] = array( 
        									'key' => '_sm_accommodation_type', 
        									'value' => get_query_var( 'type' ), 
        									'compare' => 'LIKE'
												);
    }

    if( count( $meta_query ) > 1 ){
        $meta_query['relation'] = 'AND';
    }

    if( count( $meta_query ) > 0 ){
        $query->set( 'meta_query', $meta_query );
    }
}
add_action( 'pre_get_posts', 'sm_pre_get_posts', 1 );?>

