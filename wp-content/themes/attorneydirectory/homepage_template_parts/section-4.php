<section id="section_four">
	
	<div class="section_inner">
	
		<span class="">States</span>
		
		
	
	<?php 
		
	$state_terms = get_terms( array( // change new WP_Term_Query later, its newer and faster i think
    'taxonomy' => 'location',
    'parent'  => 7
	
	) );
		
		if ( ! empty( $state_terms ) && ! is_wp_error( $state_terms ) ) {
     echo '<ul>';
     foreach ( $state_terms as $state_term ) {
	     
	      $stateterm_link = get_term_link( $state_term );
	     
       echo '<li><a href="' . esc_url( $stateterm_link ) . '">' . $state_term->name . '</a></li>';
        
     }
     echo '</ul>';
 }
 
 
 if(is_user_logged_in()) {
	
	echo '<a href="' . get_bloginfo('url') .  '/wp-admin/edit-tags.php?taxonomy=location&post_type=office">Edit</a><br/><br/><br/>';
			 		
	}
 
 
		
	?>
		
		
		
	
	</div>
	
	
</section><!-- section_four -->