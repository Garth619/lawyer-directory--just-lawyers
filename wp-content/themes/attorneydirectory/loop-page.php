<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<div class="content">
	
		<?php the_content();?>
	
		<?php edit_post_link( __( 'Edit'), '', '' ); ?>
	
	</div>

<?php endwhile; // end of loop ?>

<?php endif; ?>