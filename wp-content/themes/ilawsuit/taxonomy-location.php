<?php get_header(); ?>


<div id="internal_main">
	
	<div class="internal_banner">
		
		<h1><?php single_term_title();?> Lawyers</h1>

	</div><!-- internal_banner -->
	
	<div class="outer_container">
		
		<div class="directory_wrapper">
			
			<div class="list_wrapper">
				
				<?php	$children = get_queried_object()->term_id;

	
					if(get_field('content_blocks','option')) {
		 		 
						echo "<br/><br/>";
		 			 
						while(has_sub_field('content_blocks','option')) {
			 			 
						if(get_sub_field('current_taxonomy') == $children) {
			 			 
							the_sub_field('block');
			 		
			 			}
		 			 		
		 			}
		 		
		 			if(is_user_logged_in()) {
			 		
			 			echo '<a href="' . get_bloginfo('url') .  '/wp-admin/admin.php?page=content-blocks-settings">Edit</a><br/><br/><br/>';
			 		
		 			}

				}	


				echo "<br/><br/>Browse By City";


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
     
     	if(is_user_logged_in()) {
	
				echo '<a href="' . get_bloginfo('url') .  '/wp-admin/edit-tags.php?taxonomy=location&post_type=lawyer">Edit</a><br/><br/><br/>';
			 		
		 	}
    
    ?>

			</div><!-- list_wrapper -->
			
		</div><!-- directory_wrapper -->
		
	</div><!-- outer_container -->
	
</div><!-- internal_main -->
		

<?php get_footer(); ?>