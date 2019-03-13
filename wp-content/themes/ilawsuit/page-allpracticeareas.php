<?php 
	
	/* Template Name: All Practice Areas */
	
	get_header(); ?>
	
	
	<div id="internal_main">
	
	<div class="internal_banner">
		
		<h1><?php the_title();?></h1>

	</div><!-- internal_banner -->
	
	<div class="outer_container">
		
		<div class="directory_wrapper">
			
			<div class="directory_description content">
			 			 
			 	<?php get_template_part( 'loop', 'page' ); ?>
			 				
			</div><!-- directory_description -->
			
			
			<div class="list_wrapper">
				
				<?php 
		
					$terms = get_terms( array(
					'taxonomy' => 'practice_area',
	
					) );
		
					if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
					
						echo '<ul>';
					
						foreach ( $terms as $term ) {
	     
							$term_link = get_term_link( $term );
	     
							echo '<li><a href="'. esc_url( $term_link ) . '">' . $term->name . '</a></li>';
        
     				}
    
		 				echo '</ul>';
 					}
 
 					if(is_user_logged_in()) {
	
 						echo '<a href="' . get_bloginfo('url') .  '/wp-admin/edit-tags.php?taxonomy=practice_area&post_type=lawyer">Edit</a><br/><br/><br/>';
			 		
					}
		
	?>
				
			</div><!-- list_wrapper -->
			
		</div><!-- directory_wrapper -->
		
	</div><!-- outer_container -->
	
</div><!-- internal_main -->



<?php get_footer(); ?>
