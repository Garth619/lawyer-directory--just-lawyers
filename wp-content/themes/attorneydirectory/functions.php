<?php 



/* jQuery from Google
-------------------------------------------------------------- */


if (!is_admin()) add_action("wp_enqueue_scripts", "my_jquery_enqueue", 11);
function my_jquery_enqueue() {
   wp_deregister_script('jquery');
   wp_register_script('jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js", false, null,true);
   wp_enqueue_script('jquery');
}


/* Enqueued Scripts
-------------------------------------------------------------- */



 function load_my_styles_scripts() {
     // Load my stylesheet
     wp_enqueue_style( 'styles', get_template_directory_uri() . '/style.css', '', 3, 'all' ); 

     // Load my javascripts
     wp_enqueue_script( 'jquery-addon', get_template_directory_uri() . '/js/custom-min.js', array('jquery'), '', true );
 }
 
 add_action( 'wp_enqueue_scripts', 'load_my_styles_scripts', 20 );
 
 
 // Critical Styles in the header
 
 
/*
 function internal_css_print() {
    echo '<style type="text/css">';
    include_once get_template_directory() . '/critical.css';
    echo '</style>';
}
 
 
 
 add_action( 'wp_head', 'internal_css_print' );
*/



/* Force Gravity Forms to init scripts in the footer and ensure that the DOM is loaded before scripts are executed
-------------------------------------------------------------- */


add_filter( 'gform_init_scripts_footer', '__return_true' );
add_filter( 'gform_cdata_open', 'wrap_gform_cdata_open', 1 );
function wrap_gform_cdata_open( $content = '' ) {
if ( ( defined('DOING_AJAX') && DOING_AJAX ) || isset( $_POST['gform_ajax'] ) ) {
return $content;
}
$content = 'document.addEventListener( "DOMContentLoaded", function() { ';
return $content;
}
add_filter( 'gform_cdata_close', 'wrap_gform_cdata_close', 99 );
function wrap_gform_cdata_close( $content = '' ) {
if ( ( defined('DOING_AJAX') && DOING_AJAX ) || isset( $_POST['gform_ajax'] ) ) {
return $content;
}
$content = ' }, false );';
return $content;
}




/* Remove Unnecessary Scripts
-------------------------------------------------------------- */
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('admin_print_styles', 'print_emoji_styles');

/* Register Nav-Menus
-------------------------------------------------------------- */

register_nav_menus(array(
    'main_menu' => 'Main Menu',
    
));

/* Widgets
-------------------------------------------------------------- */

if (function_exists('register_sidebars')) {

    register_sidebar(array(
        'name' => 'Recent Posts',
        'id' => 'sidebar',
        'description' => '',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widgettitle">',
        'after_title' => '</h3>'
    ));
    
    register_sidebar(array(
        'name' => 'Category',
        'id' => 'category_sidebar',
        'description' => '',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widgettitle">',
        'after_title' => '</h3>'
    ));
    
    register_sidebar(array(
        'name' => 'Archive',
        'id' => 'archive_sidebar',
        'description' => '',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widgettitle">',
        'after_title' => '</h3>'
    ));

 }

/* Add Theme Support Page Thumbnails
-------------------------------------------------------------- */

add_theme_support('post-thumbnails');

/* Modify the_excerpt() " read more "
-------------------------------------------------------------- */

function new_excerpt_more($more)
{
    global $post;
    return '... <a href="' . get_permalink($post->ID) . '">' . 'read more' . '</a>';
}

add_filter('excerpt_more', 'new_excerpt_more');

/* Add Page Slug to Body Class
-------------------------------------------------------------- */
function add_slug_body_class($classes)
{
    global $post;
    if (isset($post)) {
        $classes[] = $post->post_type . '-' . $post->post_name;
    }
    return $classes;
}

add_filter('body_class', 'add_slug_body_class');



/* ACF: CREATE OPTIONS PAGE
-------------------------------------------------------------- */
if (function_exists('acf_add_options_page')) {
    acf_add_options_page(array(
        'page_title' => 'Header Settings',
        'menu_title' => 'Header Settings',
        'menu_slug' => 'header-general-settings',
        'capability' => 'edit_posts',
        'redirect' => false
    ));
    acf_add_options_page(array(
        'page_title' => 'Location Content Blocks Settings',
        'menu_title' => 'Location Content Blocks Settings',
        'menu_slug' => 'content-blocks-settings',
        'capability' => 'edit_posts',
        'redirect' => false
    ));
   acf_add_options_page(array(
        'page_title' => 'PA/Location Content Blocks Settings',
        'menu_title' => 'PA/Location Content Blocks Settings',
        'menu_slug' => 'pa-locations-content-blocks-settings',
        'capability' => 'edit_posts',
        'redirect' => false
    ));
    acf_add_options_page(array(
        'page_title' => 'Footer Settings',
        'menu_title' => 'Footer Settings',
        'menu_slug' => 'footer-general-settings',
        'capability' => 'edit_posts',
        'redirect' => false
    ));
    
}

/* ALLOW SVGs IN MEDIA UPLOAD
-------------------------------------------------------------- */
function cc_mime_types($mimes)
{
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}

add_filter('upload_mimes', 'cc_mime_types');


// search multiple custom post types


add_filter( 'pre_get_posts', 'tgm_io_cpt_search' );

function tgm_io_cpt_search( $query ) {
	
    if ( $query->is_search ) {
	
			$query->set( 'post_type', array('lawyer') );
    
    }
    
    return $query;
    
}


/// numbered pagination


function wpbeginner_numeric_posts_nav() {
 
    if( is_singular() )
        return;
 
    global $wp_query;
 
    /** Stop execution if there's only 1 page */
    if( $wp_query->max_num_pages <= 1 )
        return;
 
    $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
    $max   = intval( $wp_query->max_num_pages );
 
    /** Add current page to the array */
    if ( $paged >= 1 )
        $links[] = $paged;
 
    /** Add the pages around the current page to the array */
    if ( $paged >= 3 ) {
        $links[] = $paged - 1;
        $links[] = $paged - 2;
    }
 
    if ( ( $paged + 2 ) <= $max ) {
        $links[] = $paged + 2;
        $links[] = $paged + 1;
    }
 
    echo '<div class="navigation"><ul>' . "\n";
 
    /** Previous Post Link */
    if ( get_previous_posts_link() )
        printf( '<li>%s</li>' . "\n", get_previous_posts_link() );
 
    /** Link to first page, plus ellipses if necessary */
    if ( ! in_array( 1, $links ) ) {
        $class = 1 == $paged ? ' class="active"' : '';
 
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );
 
        if ( ! in_array( 2, $links ) )
            echo '<li>…</li>';
    }
 
    /** Link to current page, plus 2 pages in either direction if necessary */
    sort( $links );
    foreach ( (array) $links as $link ) {
        $class = $paged == $link ? ' class="active"' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
    }
 
    /** Link to last page, plus ellipses if necessary */
    if ( ! in_array( $max, $links ) ) {
        if ( ! in_array( $max - 1, $links ) )
            echo '<li>…</li>' . "\n";
 
        $class = $paged == $max ? ' class="active"' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
    }
 
    /** Next Post Link */
    if ( get_next_posts_link() )
        printf( '<li>%s</li>' . "\n", get_next_posts_link() );
 
    echo '</ul></div>' . "\n";
 
}


///// Permalink Rewrites



function prefix_rewrite_rule() {
		
		
		add_rewrite_rule( 'lawyers-location/state/([^/]+)/([^/]+)', 'index.php?office_location_currentstate=$matches[1]&office_location_currentcity=$matches[2]', 'top' );
	
		add_rewrite_rule( 'lawyers-practice/([^/]+)/([^/]+)/([^/]+)', 'index.php?office_pa=$matches[1]&currentstate=$matches[2]&currentcity=$matches[3]', 'top' );
		
		add_rewrite_rule( 'lawyers-practice/([^/]+)/([^/]+)', 'index.php?office_pa=$matches[1]&currentstate=$matches[2]', 'top' );
    
    
 }
 
add_action( 'init', 'prefix_rewrite_rule' );


// global query vars

function prefix_register_query_var( $vars ) {
    $vars[] = 'office_location_currentstate';
    $vars[] = 'office_location_currentcity';
    $vars[] = 'office_pa';
    $vars[] = 'currentstate';
    $vars[] = 'currentcity';
 
    return $vars;
}
 
add_filter( 'query_vars', 'prefix_register_query_var' );


// redirection of templates based on query vars


function prefix_url_rewrite_templates() {
	
	
	
		if ( get_query_var( 'office_location_currentstate') && get_query_var( 'office_location_currentcity') ) { // or the other isset example  if(!isset( $wp_query->query['photos'] ))
       
     
	  
	  	add_filter( 'template_include', function() {
            return get_template_directory() . '/page-practicearea_city.php';
       });

    }
		
		
		
 
    if ( get_query_var( 'currentstate') ) { // or the other isset example  if(!isset( $wp_query->query['photos'] ))
       
	  
	  	add_filter( 'template_include', function() {
            return get_template_directory() . '/page-locations_state_pa.php';
       });

    }
    
    

    if (get_query_var( 'currentstate') && get_query_var( 'currentcity')) { 
       
	    
	    
			add_filter( 'template_include', function() {
            return get_template_directory() . '/page-locations_city_pa.php';
       });


    }

}
 
add_action( 'template_redirect', 'prefix_url_rewrite_templates' );




// prevent logouts

/*

https://wordpress.stackexchange.com/questions/114439/preventing-session-timeout


add_filter( 'auth_cookie_expiration', 'keep_me_logged_in_for_1_year' );
function keep_me_logged_in_for_1_year( $expirein ) {
    return 31556926; // 1 year in seconds
}
*/

