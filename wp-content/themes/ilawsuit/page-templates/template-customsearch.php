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
			
			Results for:<br/>
			
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
				
				//echo 'just keyword no pa no location';
				
				//echo "<br/><br/> 's' => $att_keyword";
				
		} ?>
		
		<?php if(!$att_keyword && $att_pa && $att_pa !== 'Search All Types' && !$att_location) { // just pa
					
			$args = array(
					'post_type'   => 'lawyer',
					'posts_per_page' => 50,
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
				
				//echo 'just pa (search all types not selected) no keywords no locations';
				
				//echo "<br/><br/> 'tax_query' => array(array('taxonomy' => 'practice_area','field' => 'slug','terms' => $att_pa,)),";
				
		} ?>
		
		<?php if(!$att_keyword && !$att_pa && $att_location) { // just location 
			
			$args = array(
					'post_type'   => 'lawyer',
					'posts_per_page' => 50,
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
					
			//echo 'just location no keywords no pa';
			
			//echo "<br/><br/>'tax_query' => array(array('taxonomy' => 'location','field' => 'slug','terms' => $att_location,)),";
				
		} ?>
		
		
		<?php if($att_keyword && $att_pa && $att_pa !== 'Search All Types' && !$att_location) { // keyword and pa
			
			$args = array(
					'post_type'   => 'lawyer',
					'posts_per_page' => 50,
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
					
			//echo 'keywords with pa (search all types not selected) no locations';
			
			//echo "<br/><br/>''s' => $att_keyword,tax_query' => array(array('taxonomy' => 'practice_area','field' => 'slug','terms' => $att_pa,)),";
				
		} ?>
		
		
		
		<?php if($att_keyword && !$att_pa && $att_location) { // keyword and location
			
			$args = array(
					'post_type'   => 'lawyer',
					'posts_per_page' => 50,
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
					
			//echo 'keywords with location and no pa';
			
			//echo "<br/><br/>'s' => $att_keyword,'tax_query' => array(array('taxonomy'  => 'location','field' => 'slug','terms' => $att_location,)),";
				
		} ?>
		
		
		
		
			<?php if(!$att_keyword && $att_pa && $att_pa !== 'Search All Types' && $att_location) { // pa and location
			
			$args = array(
					'post_type'   => 'lawyer',
					'posts_per_page' => 50,
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
					
			//echo 'location and pa (search all types not selected) with no keywords';
			
			//echo "<br/><br/>'tax_query' => array(array('taxonomy'  => 'practice_area','field' => 'slug','terms' => $att_pa,),array('taxonomy'  => 'location',field'     => 'slug','terms'     => $att_location,)),";
				
		} ?>
		
		
		

		
		
		<?php if($att_keyword && $att_pa && $att_pa !== 'Search All Types' && $att_location) { // all three
					
			
				$args = array(
					'post_type'   => 'lawyer',
					'posts_per_page' => 50,
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
			
				//echo "keywords with pa (search all types not selected) with locations";
				
				//echo "<br/><br/>'s' => $att_keyword,'tax_query' => array(array('taxonomy'  => 'location','field'     => 'slug','terms'     => $att_location,),array('taxonomy'  => 'practice_area','field'     => 'slug','terms'     => $att_pa,)),";
				
		} ?>
		
		
		
				
		<?php if($att_pa =='Search All Types') {
			
			
    		$termids = get_terms( array( 
		 			'taxonomy' => 'practice_area',
		 			'fields' => 'slugs'
		 			)
		 		);
		 		
		 		
		 		//echo "termids loaded";
		 		
		 		
		} ?>
		
		
		
		
				
		<?php if(!$att_keyword && $att_pa =='Search All Types' && !$att_location) { // all pas
			

		 	$args = array(
					'post_type'   => 'lawyer',
					'posts_per_page' => 50,
					'orderby' => 'title',
					'order' => 'ASC',
				); 

			//echo "<br/><br/>all posts (all pas)";
	
		
		} ?>

		
		
		
		
		
		<?php if($att_keyword && $att_pa == 'Search All Types' && !$att_location) { // keywords and all pas
			
			
			$args = array(
					'post_type'   => 'lawyer',
					'posts_per_page' => 50,
					'orderby' => 'title',
					'order' => 'ASC',
					's' => $att_keyword,
					'tax_query' => array(
						array(
							'taxonomy'  => 'practice_area',
							'field'     => 'slug',
							'terms'     => $termids,
						)
						
					),
				); 
				
				
				//echo "keyword with All PAs and no location";
				
				//echo "<br/><br/>'s' => $att_keyword,'tax_query' => array(array('taxonomy'  => 'practice_area','field'     => 'slug','terms'     => $termids,)),";
		
		
		} ?>
		
		
		
		<?php if(!$att_keyword && $att_pa == 'Search All Types' && $att_location) { //all pas and locations
			
			
			$args = array(
					'post_type'   => 'lawyer',
					'posts_per_page' => 50,
					'orderby' => 'title',
					'order' => 'ASC',
					'tax_query' => array(
						array(
							'taxonomy'  => 'practice_area',
							'field'     => 'slug',
							'terms'     => $termids,
						),
						array(
							'taxonomy'  => 'location',
							'field'     => 'slug',
							'terms'     => $att_location,
						)
						
					),
				); 
				
				
				//echo "All PAs with location and no keywords";
				
				//echo "<br/><br/>'tax_query' => array(array('taxonomy'  => 'practice_area','field'     => 'slug','terms'     => $termids,),array('taxonomy'  => 'location','field'     => 'slug','terms'     => $att_location,)),";
		
		
		} ?>
		
		
		
		<?php if($att_keyword && $att_pa == 'Search All Types' && $att_location) { // all three (all pas)
		
			
			
			
			$args = array(
					'post_type'   => 'lawyer',
					'posts_per_page' => 50,
					'orderby' => 'title',
					'order' => 'ASC',
					's' => $att_keyword,
					'tax_query' => array(
						array(
							'taxonomy'  => 'practice_area',
							'field'     => 'slug',
							'terms'     => $termids,
						),
						array(
							'taxonomy'  => 'location',
							'field'     => 'slug',
							'terms'     => $att_location,
						)
						
					),
				); 
			
			
		
			//echo "keywords with all PAs with location";
			
			//echo "<br/><br/>'s' => $att_keyword,'tax_query' => array(array('taxonomy'  => 'practice_area','field'     => 'slug','terms'     => $termids,),array('taxonomy'  => 'location','field'     => 'slug','terms'     => $att_location,)),";
		
		
		 } ?>
		
		


<!--  <pre><code><br/><br/><h3>search query test</h3><?php print_r($args);?></code><br/><br/><br/><br/>for pre_get_post this is just building an a simple nested array and adding to tax query wrapper like this $query->set( 'tax_query', $tax_query_array); bc on this custom wp_query, i am trying to add tax_query wrapper based on variables so it could get redundant </pre> -->
		
		
		
		
		<?php // consolodate all this shit ^ ?>
		
		
		
		<div class="directory_wrapper">
			
			
			
		
				<?php 
					$temp = $wp_query; 
					$wp_query = null; 
					$wp_query = new WP_Query(); 
					$wp_query->query($args); ?>
					
					
					<?php if ($wp_query->have_posts() ) {?>
			
				
						<div class="make_new_search_wrapper">
						
							<span class="make_new_search">make a new search</span><!-- make_new_search -->
						
							<div class="new_search_wrapper">
							
								<?php get_template_part('searchform','threepart');?>
							
							</div><!-- new_search_wrapper -->
						
						</div><!-- make_new_search_wrapper -->
				
					
					<?php }?>
					
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
			
					
		
				<?php endwhile; ?>

				</div><!-- lawyer_results_wrapper -->
			
				<div class="pagination">

					<?php wpbeginner_numeric_posts_nav(); ?>

				</div><!-- pagination -->
				
			<?php if ( !$wp_query->have_posts() ) {?>
			
				
				<h2 class="section_header">Nothing Found</h2>
			
				
				<div class="not_found_description content" style="text-align:center">
				
					<p>The search result you are looking for was not found. Try making a more refined search below.</p>
				 	
				 	<?php get_template_part('searchform','threepart');?>
			 	
			 	</div><!-- directory_description -->
				
			
			<?php } ?>

				<?php 
					$wp_query = null; 
					$wp_query = $temp;  // Reset
				?>
			
		</div><!-- directory_wrapper -->
		
	</div><!-- outer_container -->
	
</div><!-- internal_main -->
	
	
	<?php	get_footer(); ?>