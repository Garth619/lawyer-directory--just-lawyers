<?php 
	
	/* Template Name: Custom Search */
	
	get_header();
	
	
	$att_keyword = get_query_var( 'attorney_keyword');
				
	$att_pa = get_query_var( 'attorney_pa');
				
	$att_location = get_query_var( 'attorney_location');
	
	
?>
	
	
	<div id="internal_main">
	
	<div class="internal_banner">
		
		<h1>
			
			Results for:
			
			<?php if($att_keyword) {
					
				echo $att_keyword;
				
			} ?>
			
			<?php if($att_pa) {
					
				echo $att_pa;
				
			} ?>
			
			<?php if($att_location) {
					
				echo $att_location;
				
			} ?>
			
			
		</h1>

	</div><!-- internal_banner -->
	
	<div class="outer_container">
		
		
	<?php if($att_keyword && !$att_pa && !$att_location) { //just keyword
					
			$args = array(
					'post_type'   => 'lawyer',
					'posts_per_page' => 50,
					'orderby' => 'title',
					'order' => 'ASC',
					's' => $att_keyword
				);
				
				echo 'just keyword no pa no location';
				
		} ?>
		
		<?php if(!$att_keyword && $att_pa && !$att_location) { // just pa
					
			$args = array(
					'post_type'   => 'lawyer',
					'posts_per_page' => 20,
					'orderby' => 'title',
					'order' => 'ASC',
					'tax_query' => array(
						array(
							'taxonomy'  => 'practice_area',
							'field'     => 'slug',
							'terms'     => $att_pa,
						)
						
					),
				);
				
				echo 'just pa no keywords no locations';
				
		} ?>
		
		<?php if(!$att_keyword && !$att_pa && $att_location) { // just location these need to remove the s in a min
			
			$args = array(
					'post_type'   => 'lawyer',
					'posts_per_page' => 20,
					'orderby' => 'title',
					'order' => 'ASC',
					'tax_query' => array(
						array(
							'taxonomy'  => 'location',
							'field'     => 'slug',
							'terms'     => $att_location,
						)
					),
				);  
					
			echo 'just location no keywords no pa';
				
		} ?>
		
		
		<?php if($att_keyword && $att_pa && !$att_location) { // keyword and pa
			
			$args = array(
					'post_type'   => 'lawyer',
					'posts_per_page' => 20,
					'orderby' => 'title',
					'order' => 'ASC',
					's' => $att_keyword,
					'tax_query' => array(
						array(
							'taxonomy'  => 'practice_area',
							'field'     => 'slug',
							'terms'     => $att_pa,
						)
					),
				);  
					
			echo 'keywords with pa no locations';
				
		} ?>
		
		
		
		<?php if($att_keyword && !$att_pa && $att_location) { // keyword and location
			
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
						)
					),
				);  
					
			echo 'keywords with location and no pa';
				
		} ?>
		
		
		
		
			<?php if(!$att_keyword && $att_pa && $att_location) { // pa and location
			
			$args = array(
					'post_type'   => 'lawyer',
					'posts_per_page' => 20,
					'orderby' => 'title',
					'order' => 'ASC',
					'tax_query' => array(
						array(
							'taxonomy'  => 'practice_area',
							'field'     => 'slug',
							'terms'     => $att_pa,
						),
						array(
							'taxonomy'  => 'location',
							'field'     => 'slug',
							'terms'     => $att_location,
						)
					),
				);  
					
			echo 'location and pa with no keywords';
				
		} ?>
		
		
		
		
		
		
		
		<?php if($att_keyword && $att_pa && $att_location) { // all three
					
			
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
			
			
				
		} ?>
		
		<?php // consolodate all this shit ^ ?>
		
		<div class="directory_wrapper">
			
			add three part search in (slidetoggle?) no results in
			
		
				<?php 
					$temp = $wp_query; 
					$wp_query = null; 
					$wp_query = new WP_Query(); 
					$wp_query->query($args); ?>
					
					<div class="pagination">

						<?php wpbeginner_numeric_posts_nav(); ?>

					</div><!-- pagination -->
					
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
										
										<?php if($att_pa) {?>
											
											<span><?php echo $att_pa; ?></span>
											
										<?php } ?>
									
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