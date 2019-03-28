<?php 
	
	
	function my_custom_search($query) {
		
		if ( ! is_admin() && $query->is_main_query() && $query->is_archive('lawyer') ) {
        
        //if ($query->is_search) {
	        		
	        		// custom search query vars
	        
	        		$att_keyword = get_query_var( 'attorney_keyword');
						$att_pa = get_query_var( 'attorney_pa');
						$att_location = get_query_var( 'attorney_location');
						
						// custom search conditionals
						
						if($att_keyword && !$att_pa && !$att_location) {  //just keyword
							
							$query-> set('s' , $att_keyword);
							
						}
						
						// tax_query args
						
						$taxquery = array();
						
						
						
						
						
						$query->set('tax_query', $taxquery); 
						
						// CPT args

	        		
	        		$query-> set('posts_per_page' , 50);
	      		  $query-> set('order' , 'ASC');
	      		  $query-> set('orderby' ,'title');
	      		 
        
       // }
        
     }
		
		
	}
	
	
	add_action( 'pre_get_posts', 'my_custom_search' );
	
	
	
	//But... You still should be careful, if you change tax_query - it may have a value already. So if you want to be respectful of that, you should use something like this: This way you will add your tax query to already existing queries and not override them.


	
	
	
	$tax_query = $query->get( 'tax_query' );
if ( ! is_array( $tax_query ) ) {
    $tax_query = array();
}
$taxquery[] = array(
    'taxonomy' => 'myposttypes',
    'field'    => 'slug',
    'terms'    => $term_slug
);
$query->set( 'tax_query', $taxquery );
	
	
	
	
	
add_action( 'pre_get_posts', 'get_posts_plus_cpt_with_certain_tag' );

function get_posts_plus_cpt_with_certain_tag( $query ) {
    if ( $query->is_home() && $query->is_main_query() ) {

        /*
        * Change 110 to the term id you need to display posts from from cpt post type
        */
        $terms = get_terms( 'category', array( 'fields' => 'ids' ) );
        if ( $terms && !is_wp_error( $terms ) ) {
            $taxquery = array(
                'relation' => 'OR',
                array( // Includes all terms (categories) for post post type          
                    'taxonomy'  => 'category',
                    'field'     => 'term_id',
                    'terms'     => $terms,
                ),
                array( // Include the terms you need to display from cpt_tag           
                    'taxonomy'  => 'cpt_tag',
                    'field'     => 'term_id',
                    'terms'     => array( 110 ),
                ),

            );      
            $query->set('tax_query', $taxquery); 
        }   
        $query->set( 'post_type', array( 'post', 'cpt' ) );

    }
}
	
	
	add_action('pre_get_posts','alter_query');
 
function alter_query($query) {
	//gets the global query var object
	global $wp_query;
 
	//gets the front page id set in options
	$front_page_id = get_option('page_on_front');
 
	if ( 'page' != get_option('show_on_front') || $front_page_id != $wp_query->query_vars['page_id'] )
		return;
 
	if ( !$query->is_main_query() )
		return;
 
	$query-> set('post_type' ,'page');
	$query-> set('post__in' ,array( $front_page_id , [YOUR SECOND PAGE ID]  ));
	$query-> set('orderby' ,'post__in');
	$query-> set('p' , null);
	$query-> set( 'page_id' ,null);
 
	//we remove the actions hooked on the '__after_loop' (post navigation)
	remove_all_actions ( '__after_loop');
}
	
	
	// custom search


function my_custom_search($query) {
    
    if ( !is_admin() && $query->is_main_query() ) {
        
        if ($query->is_search) {
	        
	        	$attorneykeyword = get_query_var( 'attorney_keyword', FALSE );
            $attorneypa = get_query_var( 'attorney_pa', FALSE );
            $attorneylocation = get_query_var( 'attorney_location', FALSE );
            
            $tax_query_array = array('relation' => 'AND');
            
            $attorneylocation ? array_push($tax_query_array, array('taxonomy' => 'location', 'field' => 'term_id', 'terms' => $attorneylocation) ) : null ;

						// final tax_query
						
						$query->set( 'tax_query', $tax_query_array);
            
            $query->set('post_type', 'lawyer');
        
        }
    }
}


add_action( 'pre_get_posts', 'my_custom_search' );







 // search arguments 


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
add_action( 'pre_get_posts', 'sm_pre_get_posts', 1 );










add_action( 'pre_get_posts', 'hotbuys_search_query' );


function hotbuys_search_query( $query ) {
  
  if( $query->is_main_query() && is_search()) {
  
		$meta_query = array(
				array(
          'key' => 'client_status',
          'value' => array('active'),
          'compare' => 'IN' 
        ),
		);
		$query->set( 'meta_query', $meta_query );
		
  }
  
}






