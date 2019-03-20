<?php get_header(); ?>

	
<div id="internal_main">
	
	<div class="internal_banner">
		
		<h1>
			
						
			<?php printf( __( '%s', 'twentyten' ), '<span>' . get_search_query() . '</span>' ); ?>
			
		</h1>

	</div><!-- internal_banner -->
	
	<div class="outer_container">
		
		<div class="directory_wrapper">
			
		
			
			<?php 
				
				$keyword = 	$_GET['s'];
				$location = $_GET['location'];
				

				
				$args = array(
					'post_type'   => 'lawyer',
					'posts_per_page' => 4,
					'paged' => $paged,
					's' => $keyword
				);  
			
			?>
			
			<?php $mymain_query = new WP_Query($args); while($mymain_query->have_posts()) : $mymain_query->the_post(); ?>
                	
      		
      		<?php the_title();?>
     		
     	
     	 <?php endwhile; ?>
      <?php wp_reset_postdata(); // reset the query ?>

			
			<div class="pagination">

				<?php wpbeginner_numeric_posts_nav(); ?>

			</div><!-- pagination -->
				
				

		</div><!-- directory_wrapper -->
		
	</div><!-- outer_container -->
	
</div><!-- internal_main -->



<?php get_footer(); ?>
