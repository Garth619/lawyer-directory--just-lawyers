<?php get_header();
	
	
	$att_keyword = get_query_var( 'attorney_keyword');
				
	$att_pa = get_query_var( 'attorney_pa');
				
	$att_location = get_query_var( 'attorney_location'); // get rid of these
	
	
	
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
			
			
			<?php 
				
				if(!$att_keyword && !$att_pa && $att_location) { // just location 
				
					echo $att_location;
								
				}
			
				if($att_keyword && $att_pa && $att_pa !== 'Search All Types' && !$att_location) { // keyword and pa
				
					echo $att_keyword .' <span>and</span> ' . $att_pa;
			
				}
			
				if($att_keyword && !$att_pa && $att_location) { // keyword and location
				
					echo $att_keyword .' <span>in</span> ' . $att_location;
				
				} 
			
				if(!$att_keyword && $att_pa && $att_pa !== 'Search All Types' && $att_location) { // pa and location
				
					echo $att_pa .' <span>in</span> ' . $att_location;
			
				} 
			
				if($att_keyword && $att_pa && $att_pa !== 'Search All Types' && $att_location) { // all three
				
					echo $att_keyword . ' <span>and</span> ' .$att_pa .' <span>in</span> ' . $att_location;
				
				}
			
				if(!$att_keyword && $att_pa =='Search All Types' && !$att_location) { // all pas
				
					echo 'Practice Areas';
				
				} 
			
			
				if($att_keyword && $att_pa == 'Search All Types' && !$att_location) { // keywords and all pas
				
					echo $att_keyword . ' <span>and</span> Practice Areas';
			
				}
			
			
				if(!$att_keyword && $att_pa == 'Search All Types' && $att_location) { //all pas and locations
				
					echo 'Practice Areas <span>in</span> ' . $att_location;
				
				}
			
			
				if($att_keyword && $att_pa == 'Search All Types' && $att_location) { // all three (all pas)
				
					echo $att_keyword . ' <span>and</span> Practice Areas <span>in</span> ' . $att_location;
			
				}
			
			
				if(empty($att_keyword) && empty($att_pa) && empty($att_location)) { // all three (all pas)
				
					echo "Try Again";
			
				}
			
			?>
			
		</h1>

	</div><!-- internal_banner -->
	
	<div class="outer_container">
				
		<div class="directory_wrapper">
			
			
			<?php if(have_posts()) : ?>
			
				<?php $count = $wp_query->found_posts;
			
					if($count) { ?>
							
						<span class="results_number">Search Results (<?php echo $count;?>)</span><!-- results_number -->
							
				<?php } ?>
				
				<?php if(empty($att_keyword) && empty($att_pa) && empty($att_location)) { ?>
				
					<div class="content" style="text-align:center">
				
						<p>The search result you are looking for might be too broad. Try refining your search.</p>
				 	
				 	</div><!-- directory_description -->

				<?php } ?>
				 	 
				<div class="make_new_search_wrapper">
						
					<span class="make_new_search">refine your search</span><!-- make_new_search -->
						
					<div class="new_search_wrapper">
							
						<?php get_template_part('searchform','threepart');?>
							
					</div><!-- new_search_wrapper -->
						
				</div><!-- make_new_search_wrapper -->
						
				<div class="pagination">

					<?php wpbeginner_numeric_posts_nav(); ?>

				</div><!-- pagination -->
				
				<div class="lawyer_results_wrapper">
					
					<?php while ( have_posts() ) : the_post(); ?>

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
		
				<?php endwhile; // end of loop ?>
				
				</div><!-- lawyer_results_wrapper -->

			<?php endif; ?>

			
			<?php if (!have_posts() ) {?>
			
				<h2 class="section_header">Nothing Found</h2>
			
				<div class="not_found_description content" style="text-align:center">
				
					<p>The search result you are looking for is not found. Try making a more refined search below.</p>
				 	
				 	<?php get_template_part('searchform','threepart');?>
			 	
			 	</div><!-- directory_description -->
				
			<?php } ?>
			
			<div class="pagination">

				<?php wpbeginner_numeric_posts_nav(); ?>

			</div><!-- pagination -->
			
		</div><!-- directory_wrapper -->
		
	</div><!-- outer_container -->
	
</div><!-- internal_main -->


<?php get_footer(); ?>
