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
				
			 				
			<div class="list_wrapper">
				
				<?php 
					
					
					$currenttermslug = get_queried_object()->term_id; 
					
					$termargs = array (
					'taxonomy' => 'location',
					'posts_per_page' => -1,
					'fields' => 'ids',
					'parent' => 139 
				);
	
				

				$term_query = new WP_Term_Query( $termargs );?>
				
				

				<pre><code><?php var_dump($term_query->terms);?></code></pre>
				
<!-- 				<pre><code><?php var_dump($currenttermslug);?></code></pre> -->
				
				<?php
				
				
	
				$query_args = array (
					'post_type' => 'lawyer',
					'fields' => 'ids',
					'post_status' => 'publish',
					'no_found_rows' => true,
					'posts_per_page' => 2000, // -1 screws up some searches with too much memory
					'tax_query' => array(
						array(
								'taxonomy'  => 'location',
								'field'     => 'ids',
								'include_children' => false,
								'terms'     => $term_query->terms, 
							),
						array(
								'taxonomy'  => 'practice_area',
								'field'     => 'ids',
								'terms'     => $currenttermslug,
							)
						),
					);
				
				
				$myposts = new Wp_Query( $query_args );?>


			</div><!-- list_wrapper -->
			
		</div><!-- directory_wrapper -->
		
	</div><!-- outer_container -->
	
</div><!-- internal_main -->



<?php get_footer(); ?>