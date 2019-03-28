<?php 
	
	/* Template Name: Custom Search -  Pre Get Post */
	
	get_header();

	
		
?>
	
	
	<div id="internal_main">
	
	<div class="internal_banner">
		
		<h1>
			
			<?php if($att_keyword && !$att_pa && !$att_location) { //just keyword
					
				echo $att_keyword;
				
			} ?>
			
			
			<?php if(!$att_keyword && $att_pa && $att_pa !== 'Search All Types' && !$att_location) { // just pa
			
				echo $att_pa;
				
			} ?>
			
			
			<?php if(!$att_keyword && !$att_pa && $att_location) { // just location 
				
				echo $att_location;
								
			} ?>
			
			<?php if($att_keyword && $att_pa && $att_pa !== 'Search All Types' && !$att_location) { // keyword and pa
				
				echo $att_keyword .' <span>and</span> ' . $att_pa;
			
			} ?>
			
			<?php if($att_keyword && !$att_pa && $att_location) { // keyword and location
				
				echo $att_keyword .' <span>in</span> ' . $att_location;
				
			} ?>
			
			<?php if(!$att_keyword && $att_pa && $att_pa !== 'Search All Types' && $att_location) { // pa and location
				
				echo $att_pa .' <span>in</span> ' . $att_location;
			
			} ?>
			
			<?php if($att_keyword && $att_pa && $att_pa !== 'Search All Types' && $att_location) { // all three
				
				echo $att_keyword . ' <span>and</span> ' .$att_pa .' <span>in</span> ' . $att_location;
				
			} ?>
			
			<?php if(!$att_keyword && $att_pa =='Search All Types' && !$att_location) { // all pas
				
				echo 'Practice Areas';
				
			} ?>
			
			
			<?php if($att_keyword && $att_pa == 'Search All Types' && !$att_location) { // keywords and all pas
				
				echo $att_keyword . ' <span>and</span> Practice Areas';
			
			} ?>
			
			
			<?php if(!$att_keyword && $att_pa == 'Search All Types' && $att_location) { //all pas and locations
				
				echo 'Practice Areas <span>in</span> ' . $att_location;
				
			} ?>
			
			
			<?php if($att_keyword && $att_pa == 'Search All Types' && $att_location) { // all three (all pas)
				
				echo $att_keyword . ' <span>and</span> Practice Areas <span>in</span> ' . $att_location;
			
			} ?>
			
			
			<?php if(empty($att_keyword) && empty($att_pa) && empty($att_location)) { // all three (all pas)
				
				echo "Try Again";
			
			} ?>
			
		</h1>

	</div><!-- internal_banner -->
	
	<div class="outer_container">
		
		
			
		
		<div class="directory_wrapper">
			
			
			
		
				

								
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
										
										<?php if($att_pa && $att_pa !== 'Search All Types') {?>
											
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
			
					
		
				

				</div><!-- lawyer_results_wrapper -->
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
				<div class="pagination">

					<?php wpbeginner_numeric_posts_nav(); ?>

				</div><!-- pagination -->
				
						
		</div><!-- directory_wrapper -->
		
	</div><!-- outer_container -->
	
</div><!-- internal_main -->
	
	
	<?php	get_footer(); ?>