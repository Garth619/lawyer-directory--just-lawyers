<?php get_header(); ?>

	
<div id="internal_main">
	
	<div class="internal_banner">
		
		<h1>
			
			<?php if ( !is_paged() ) {
				
				echo 'Results:';
			
		 		}
			
			else {
			
				echo 'Results Page ' . $paged . ':';
				
			} ?>
		
			
			<?php printf( __( '%s', 'twentyten' ), '<span>' . get_search_query() . '</span>' ); ?>
			
		</h1>

	</div><!-- internal_banner -->
	
	<div class="outer_container">
		
		<div class="directory_wrapper">
			
		
			
			
				
				<?php if ( have_posts() ) : ?>
				
					<div class="filter_by_search_wrapper">
				
						<input class="list_input desktop" type="text" placeholder="Filter<?php // echo $citytermtitle;?> Results Below">
				
						<input class="list_input mobile" type="text" placeholder="Filter">
				
						<div class="filter_by_search_button"></div><!-- filter_by_search_button -->
				
					</div><!-- filter_by_search_wrapper -->
					
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
					
					<?php else: ?>
					
					
					<h2 class="section_header">Nothing Found</h2>
				
					<div class="no_results_wrapper content">
						
						<p>Sorry, but nothing matched your search criteria. Please try again with some different keywords.</p>
						
						<div class="search_no_results_form">
						
							<?php // get_search_form(); ?>
							
							<form action="/" method="get">
    
								<input type="text" name="s" id="search" placeholder="" value="<?php the_search_query(); ?>" />
    
								<input type="submit" id="searchsubmit" value="Search">
    	
    	
							</form>
						
						</div><!-- search_no_results_form -->
						
					</div><!-- no_results_wrapper -->
					
				<?php endif; ?>

				<div class="pagination">

					<?php wpbeginner_numeric_posts_nav(); ?>

				</div><!-- pagination -->

		</div><!-- directory_wrapper -->
		
	</div><!-- outer_container -->
	
</div><!-- internal_main -->



<?php get_footer(); ?>
