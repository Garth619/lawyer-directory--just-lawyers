<?php
	
	//https://wordpress.stackexchange.com/questions/271877/how-to-do-a-meta-query-using-rest-api-in-wordpress-4-7
	
	// wp-json/tchernitchenko/v2/my_meta_query?meta_query[relation]=OR&meta_query[0][key]=arkivera&meta_query[0][value]=1&meta_query[0][compare]==

	
	// Register a REST route
add_action( 'rest_api_init', function () {
    //Path to meta query route
    register_rest_route( 'tchernitchenko/v2', '/my_meta_query/', array(
            'methods' => 'GET', 
            'callback' => 'custom_meta_query' 
    ) );
});

// Do the actual query and return the data
function custom_meta_query(){
    if(isset($_GET['meta_query'])) {
        $query = $_GET['meta_query'];
        // Set the arguments based on our get parameters
        $args = array (
            'relation' => $query[0]['relation'],
            array(
                'key' => $query[0]['key'],
                'value' => $query[0]['value'],
                'compare' => '=',
            ),
        );
        // Run a custom query
        $meta_query = new WP_Query($args);
        if($meta_query->have_posts()) {
            //Define and empty array
            $data = array();
            // Store each post's title in the array
            while($meta_query->have_posts()) {
                $meta_query->the_post();
                $data[] =  get_the_title();
            }
            // Return the data
            return $data;
        } else {
            // If there is no post
            return 'No post to show';
        }
    }
}

	
	