<?php get_header(); ?>


<div id="internal_main">
	
	<div class="internal_banner">
		
		<h1>Results <?php echo $att_keyword;?></h1>

	</div><!-- internal_banner -->
	
	<div class="outer_container">
		
		<div class="directory_wrapper">
			
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

					<?php the_title();?>
		
				<?php endwhile; // end of loop ?>

			<?php endif; ?>

			<div class="pagination">

				<?php wpbeginner_numeric_posts_nav(); ?>

			</div><!-- pagination -->
			
		</div><!-- directory_wrapper -->
		
	</div><!-- outer_container -->
	
</div><!-- internal_main -->


<?php get_footer(); ?>


		




