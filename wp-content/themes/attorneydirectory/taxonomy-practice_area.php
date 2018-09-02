<?php get_header(); ?>

<div class="section_inner">
	

<div class="breadcrumb">
	
	<a href="<?php bloginfo('url');?>">Home</a>
	
	<a href="<?php the_permalink(126);?>">Practice Areas</a>
	
	<a><?php single_term_title();?></a>
	
	<br/>
	<br/>
	<br/>
	
</div><!-- breadcrumb -->


<h1><?php single_term_title();?> Lawyers</h1>


<?php
	

	$currentterm = get_queried_object()->term_id; 
	
	
	
		if(get_field('pa_location_content_blocks','option')) {
		 		 
		 	echo "<br/><br/>";
		 			 
		 	while(has_sub_field('pa_location_content_blocks','option')) {
			 			 
			 	if(get_sub_field('current_taxonomy') == $currentterm && empty(get_sub_field('current_location_taxonomy_state')) && empty(get_sub_field('current_location_taxonomy_city')) ) {
			 			 
			 		the_sub_field('block');
		 			 		
		 		}
		 			 	
		 	}
			
			if(is_user_logged_in()) {
	
		 			echo '<a href="' . get_bloginfo('url') .  '/wp-admin/admin.php?page=pa-locations-content-blocks-settings">Edit</a><br/><br/><br/>';
			 		
				}
		 		 
		}	
		
		
		echo "<br></br>Browse by State";
	
	
	
	$taxlocations = 'location';
	$taxpracticeareas = 'practice_area';
	
	$query_args = array (
		'post_type' => 'lawyer',
		'fields' => 'ids',
		'posts_per_page' => -1,
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

</div>


<?php get_footer(); ?>
