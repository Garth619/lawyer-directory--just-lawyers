<?php get_header(); ?>

<div id="internal_main">
	
	<div class="internal_banner">
		
		<h1><?php single_term_title();?> Lawyers</h1>

	</div><!-- internal_banner -->
	
	<div class="outer_container">
		
		<div class="directory_wrapper">
			
			<div class="breadcrumb_wrapper">
				
				<a href="<?php bloginfo('url');?>">Home</a>
	
				<a href="<?php the_permalink(126);?>">Practice Areas</a>
	
				<a><?php single_term_title();?></a>
				
			</div><!-- breadcrumb_wrapper -->
			
			
			 			 
			 <?php $currentterm = get_queried_object()->term_id; 
	
				 if(get_field('pa_location_content_blocks','option')) : 
		 		 
					  while(has_sub_field('pa_location_content_blocks','option')) :
			 			 
				 			if(get_sub_field('current_taxonomy') == $currentterm && empty(get_sub_field('current_location_taxonomy_state')) && empty(get_sub_field('current_location_taxonomy_city')) ) : ?>
				 		
				 			<div class="directory_description content">
			 			 
				 				<?php the_sub_field('block');?>
				 			
				 			</div><!-- directory_description -->
			
				 			<h2 class="section_header">Browse by state</h2>
		 			 		
		 				<?php endif;
		 			 	
		 			endwhile;
			
		 		endif;	?>
		 		
		 		<div class="filter_by_search_wrapper">
				
					<input class="list_input desktop" type="text" placeholder="Filter<?php // single_term_title();?> States Below">
				
					<input class="list_input mobile" type="text" placeholder="Filter">
				
					<div class="filter_by_search_button"></div><!-- filter_by_search_button -->
				
				</div><!-- filter_by_search_wrapper -->
				
				<div class="list_not_found" style="display: none;">
					
					not found
					
				</div><!-- list_not_found -->
			 				
			<div class="list_wrapper">
				
			<?php
				
				$taxlocations = 'location';
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
			
					echo "</ul>"; ?>

				</div><!-- list_wrapper -->
			
		</div><!-- directory_wrapper -->
		
	</div><!-- outer_container -->
	
</div><!-- internal_main -->



<?php get_footer(); ?>
