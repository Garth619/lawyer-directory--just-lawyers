<?php get_header(); ?>


<div id="internal_main">
	
	<div class="internal_banner">
		
		<h1><?php single_term_title();?> Lawyers</h1>

	</div><!-- internal_banner -->
	
	<div class="outer_container">
		
		<div class="directory_wrapper">
			
			<div class="breadcrumb_wrapper">
				
				<a href="<?php bloginfo('url');?>">Home</a> 
	
				<a href="<?php the_permalink(133);?>">Locations</a>
	
				<a><?php single_term_title();?></a>
				
			</div><!-- breadcrumb_wrapper -->
			
			
				<?php	$children = get_queried_object()->term_id;?>

	
					<?php if(get_field('content_blocks','option')) : ?>
					
						
		 			 
							<?php while(has_sub_field('content_blocks','option')) : ?>
								
								
			 			 
								<?php if(get_sub_field('current_taxonomy') == $children) :?>
								
									<div class="directory_description content">
			 			 
									<?php the_sub_field('block');?>
										
										</div><!-- directory_description -->
			
		 				<h2 class="section_header">Browse by city</h2>
			 		
			 					<?php endif;?>
		 			 		
		 					<?php endwhile; ?>
		 		
		 				

		 			<?php endif;	 ?>
			
			
			
			<div class="filter_by_search_wrapper">
				
				<input class="list_input desktop" type="text" placeholder="Search <?php single_term_title();?> Cities">
				
				<input class="list_input mobile" type="text" placeholder="Search">
				
				<div class="filter_by_search_button"></div><!-- filter_by_search_button -->
				
			</div><!-- filter_by_search_wrapper -->
			
			<div class="list_wrapper">
				
				


				<?php 
					
				$taxlocations = 'location';
				$taxpracticeareas = 'practice_area';
	
				$terms = get_terms( array( // change to WP_Term_Query later its faster I think
					'taxonomy' => 'location',
					'parent' => $children,
	
				) );
	
		
				if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
     
					echo '<ul>';
     
						foreach ( $terms as $term ) {
	     
							$term_link = get_term_link( $term );
	     
							echo '<li><a href="'. esc_url( $term_link ) . '">' . $term->name . '</a></li>';
        
     				}
     
		 			echo '</ul>';
     
     }
     
     	
    
    ?>

			</div><!-- list_wrapper -->
			
		</div><!-- directory_wrapper -->
		
	</div><!-- outer_container -->
	
</div><!-- internal_main -->
		

<?php get_footer(); ?>
