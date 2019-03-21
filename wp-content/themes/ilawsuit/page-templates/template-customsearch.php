<?php 
	
	/* Template Name: Custom Search */
	
	get_header();?>
	
	
	<div id="internal_main">
	
	<div class="internal_banner">
		
		<h1><?php the_title();?></h1>

	</div><!-- internal_banner -->
	
	<div class="outer_container">
		
		<div class="directory_wrapper">
			
			<div class="default_wrapper content">
				
				<?php $mykeyword = get_query_var( 'mykeyword'); echo $mykeyword?>
				
				<?php 
				
				$args = array(
					'post_type'   => 'lawyer',
					'posts_per_page' => 4,
					'paged' => $paged,
					's' => $mykeyword
				);  
			
				?>
						
				<?php 
					$temp = $wp_query; 
					$wp_query = null; 
					$wp_query = new WP_Query(); 
					$wp_query->query($args); 

					while ($wp_query->have_posts()) : $wp_query->the_post(); 
				?>

  
			
					<?php the_title();?>
		
				<?php endwhile; ?>

					<div class="pagination">

						<?php wpbeginner_numeric_posts_nav(); ?>

					</div><!-- pagination -->

				<?php 
					$wp_query = null; 
					$wp_query = $temp;  // Reset
				?>
			
			</div><!-- list_wrapper -->
			
		</div><!-- directory_wrapper -->
		
	</div><!-- outer_container -->
	
</div><!-- internal_main -->
	
	
	<?php	get_footer(); ?>