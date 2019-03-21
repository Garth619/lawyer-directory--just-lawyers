<?php 
	
	/* Template Name: Custom Search */
	
	get_header();?>
	
	
	<div id="internal_main">
	
	<div class="internal_banner">
		
		<h1><?php the_title();?></h1>

	</div><!-- internal_banner -->
	
	<div class="outer_container">
		
		<?php $att_keyword = get_query_var( 'attorney_keyword'); echo $att_keyword;?>
				
				<?php $att_pa = get_query_var( 'attorney_pa'); echo $att_pa?>
				
				<?php $att_location = get_query_var( 'attorney_location'); echo $att_location;?><br/><br/><br/>
		
		<div class="directory_wrapper">
			
			add filter and no results in
			
		
				
				
				
				<?php 
				
				$args = array(
					'post_type'   => 'lawyer',
					'posts_per_page' => 20,
					'orderby' => 'title',
					'order' => 'ASC',
					's' => $att_keyword,
					'tax_query' => array(
						array(
							'taxonomy'  => 'location',
							'field'     => 'slug',
							'terms'     => $att_location,
						),
						array(
							'taxonomy'  => 'practice_area',
							'field'     => 'slug',
							'terms'     => $att_pa,
						)
						
					),
				);  
			
				?>
				
			
						
				<?php 
					$temp = $wp_query; 
					$wp_query = null; 
					$wp_query = new WP_Query(); 
					$wp_query->query($args); ?>
					
					<div class="lawyer_results_wrapper">

					<?php while ($wp_query->have_posts()) : $wp_query->the_post(); 
				?>

					
				
				<div class="single_lawyer_result">
							
							<a class="" href="<?php the_permalink();?>">
							
							<div class="single_lawyer_img_wrapper">
								
								
								<?php $lawyer_profile_image = get_field( 'lawyer_profile_image' ); ?>
					
								<?php if ( $lawyer_profile_image ) : ?>
					
									<img class="att_feed_image" src="<?php echo $lawyer_profile_image['url']; ?>" alt="<?php echo $lawyer_profile_image['alt']; ?>" />
						
									<?php else:?>
						
									<div class="logo_placeholder">
									
										<span>Add Logo</span>
									
									</div><!-- logo_placeholder -->
					
								<?php endif; ?>
								
							</div><!-- single_lawyer_img_wrapper -->
							
							<div class="single_lawyer_content">
								
								<span class="single_lawyer_title"><?php the_title();?></span><!-- single_lawyer_title -->
								
									<div class="single_lawyer_meta">
									
										<span>
										
										<?php the_field('lawyer_city');
										
										 if(get_field('state_abbr') && get_field('state_abbr') !== 'NULL') {
										
											echo ", "; the_field('state_abbr');
										
										} ?>
										
										</span>
									
										<?php if(get_field('lawyer_phone') && get_field('lawyer_phone') !== 'NULL') { ?>
									
											<span><?php the_field( 'lawyer_phone' ); ?></span>
									
										<?php }?>
										
									</div><!-- single_lawyer_meta -->
									
									<div class="visit_button_wrapper">
									
										<span class="visit_button">Visit Profile</span><!-- visit_button -->
									
									</div><!-- visit_button_wrapper -->
								
								</div><!-- single_lawyer_content -->
							
							</a>
							
						</div><!-- single_lawyer_result -->
			
					
		
				<?php endwhile; ?>

				
			
			</div><!-- lawyer_results_wrapper -->
			
				<div class="pagination">

						<?php wpbeginner_numeric_posts_nav(); ?>

					</div><!-- pagination -->

				<?php 
					$wp_query = null; 
					$wp_query = $temp;  // Reset
				?>
			
		</div><!-- directory_wrapper -->
		
	</div><!-- outer_container -->
	
</div><!-- internal_main -->
	
	
	<?php	get_footer(); ?>