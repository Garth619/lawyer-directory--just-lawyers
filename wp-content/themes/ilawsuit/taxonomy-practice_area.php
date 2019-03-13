<?php get_header(); ?>

<div id="internal_main">
	
	<div class="internal_banner">
		
		<h1><?php single_term_title();?> Lawyers</h1>

	</div><!-- internal_banner -->
	
	<div class="outer_container">
		
		<div class="directory_wrapper">
			
			<div class="directory_description content">
			 			 
			 <?php $currentterm = get_queried_object()->term_id; 
	
				 if(get_field('pa_location_content_blocks','option')) {
		 		 
				 	while(has_sub_field('pa_location_content_blocks','option')) {
			 			 
				 		if(get_sub_field('current_taxonomy') == $currentterm && empty(get_sub_field('current_location_taxonomy_state')) && empty(get_sub_field('current_location_taxonomy_city')) ) {
			 			 
				 			the_sub_field('block');
		 			 		
		 				}
		 			 	
		 			}
			
		 			if(is_user_logged_in()) {
	
		 				echo '<a href="' . get_bloginfo('url') .  '/wp-admin/admin.php?page=pa-locations-content-blocks-settings">Edit</a><br/><br/><br/>';
			 		
					}
		 		 
				}	?>
			 				
			</div><!-- directory_description -->
			
			<h2 class="section_header">Browse by state</h2>
			
			<div class="list_wrapper">
				
				<?php $taxlocations = 'location';
	$taxpracticeareas = 'practice_area';
	
	$query_args = array (
		'post_type' => 'lawyer',
		'fields' => 'ids',
		'posts_per_page' => 100, // -1 screws up some searches with too much memory...why? cant be more than 50 states so I said 100 to be safe
		'tax_query' => array(
			 array(
			   'taxonomy'  => $taxlocations,
			    'field'     => 'ids',
			    'terms'     => 139 // add a slug to id conversion here or is it ok to change field to slug
			),
			array(
			   'taxonomy'  => $taxpracticeareas,
			    'field'     => 'ids',
			    'terms'     => $currentterm,
			)
		),
	);
	
	
	
	$myposts = new Wp_Query( $query_args );
	

	$termargs = array (
		'taxonomy' => $taxlocations,
		'posts_per_page' => -1,
		'object_ids' => $myposts->posts,
		'parent' => 139 // add a slug to id conversion here
			
	);
	
	$currenttermslug = get_queried_object()->slug; 

	$term_query = new WP_Term_Query( $termargs );

		
		if ( ! empty( $term_query ) && ! is_wp_error( $term_query ) ) {
			
			echo "<ul>";
			
			foreach ( $term_query ->terms as $term )
			
					echo '<li><a href="' . get_bloginfo('url') . '/lawyers-practice/' . $currenttermslug . '/' . $term->slug . '">' . $term->name . '</a></li>';
			
			}
			
			echo "</ul>";

?>

				
								
			</div><!-- list_wrapper -->
			
		</div><!-- directory_wrapper -->
		
	</div><!-- outer_container -->
	
</div><!-- internal_main -->



<?php get_footer(); ?>
