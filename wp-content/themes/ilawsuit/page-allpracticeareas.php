<?php 
	
	/* Template Name: All Practice Areas */
	
	get_header(); ?>


<div class="section_inner">
	
<div class="breadcrumb">
	
	<a href="<?php bloginfo('url');?>">Home</a>
	
	<a>Practice Areas</a>
	
	<br/>
	<br/>
	<br/>
	<br/>
	
</div><!-- breadcrumb -->
	
	<h1>Practice Areas</h1>
	
	
	<?php get_template_part( 'loop', 'page' ); ?>
	
	
	
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

</div>


<?php get_footer(); ?>
