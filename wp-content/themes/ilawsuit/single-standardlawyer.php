<div id="internal_main">
	
	<div class="internal_banner">
		
		<h1><?php the_title();?></h1>
		
		<div class="internal_banner_meta">
			
			<?php $terms = get_the_terms( get_the_ID(), 'practice_area' ); ?>
			
<!--
			<?php 
				
				if(get_field('lawyer_featured_practice_area')) { ?>
					
					<span><?php the_field('lawyer_featured_practice_area');?></span>
					
				<?php }
					
					else {
				
					$term = reset($terms);
				
				?>
			
					<span><?php echo $term->name; ?></span>
			
			<?php } ?>
-->
			
			<?php $term = reset($terms);
				
				$termslug = $term->slug;
				
			?>
			
			<span><?php echo $term->name; ?></span>
			
			<?php if(get_field('lawyer_city') && get_field('lawyer_city') !== 'NULL') { ?>
			
				<span><?php the_field( 'lawyer_city' ); ?></span>
			
			<?php }?>
			
			<?php if(get_field('state_abbr') && get_field('state_abbr') !== 'NULL') { ?>
			
				<span><?php the_field( 'state_abbr' ); ?></span>
			
			<?php }?>


		</div><!-- internal_banner_meta -->

	</div><!-- internal_banner -->
	
		<section class="att_bio_wrapper">
			
			<div class="att_bio_sidebar">
				
				<div class="att_bio_sidebar_inner">
				
				<div class="att_bio_profile">
					
					<?php $lawyer_profile_image = get_field( 'lawyer_profile_image' ); ?>
					
					<?php if ( $lawyer_profile_image ) : ?>
					
						<img class="att_img" src="<?php echo $lawyer_profile_image['url']; ?>" alt="<?php echo $lawyer_profile_image['alt']; ?>" />
						
						<?php else:?>
						
						<div class="att_bio_placeholder">
						
							<span>Add Photo</span>
						
						</div><!-- att_bio_placeholder -->
					
					<?php endif; ?>
					
				</div><!-- att_bio_profile -->
				
				<?php if(get_field('lawyer_street_address')) : ?>
				
						<div class="att_bio_row_wrapper">
					
							<span class="att_bio_sidebar_title">Address</span><!-- att_bio_sidebar_title -->
						
							<span class="att_bio_address">Hi street address</span><!-- att_bio_address -->
						
							<!-- do this -->
					
							<a class="get_directions" href="https://www.google.com/maps/search/?api=1&query=" target="_blank" rel="noopener">Directions</a><!-- get_directions -->

						</div><!-- att_bio_row_wrapper -->
						
						<?php else : ?>
				
					<?php if(get_field('lawyer_address') && get_field('lawyer_address') !== 'NULL') { ?>
				
						<div class="att_bio_row_wrapper">
					
							<span class="att_bio_sidebar_title">Address</span><!-- att_bio_sidebar_title -->
						
							<span class="att_bio_address"><?php the_field( 'lawyer_address' ); ?></span><!-- att_bio_address -->
						
							<?php $address = get_field('lawyer_address');
	
								$addressCleaned = str_replace(' ', '%20', $address); // this works but doesnt echo in ahref below?
					
							?>
					
							<a class="get_directions" href="https://www.google.com/maps/search/?api=1&query=<?php echo $addressCleaned;?>" target="_blank" rel="noopener">Directions</a><!-- get_directions -->

						</div><!-- att_bio_row_wrapper -->
				
					<?php } ?>
				
				
				<?php endif;?>
				
				
				<?php if(get_field('lawyer_phone') && get_field('lawyer_phone') !== 'NULL') { ?>
				
					<div class="att_bio_row_wrapper">
					
						<span class="att_bio_sidebar_title">Phone</span><!-- att_bio_sidebar_title -->
					
						<a class="att_bio_row_title att_bio_phone" href="tel:<?php echo str_replace(['-', '(', ')', ' '], '', get_field('lawyer_phone')); ?>"><?php the_field( 'lawyer_phone' ); ?></a><!-- att_bio_row_title -->
					
					</div><!-- att_bio_row_wrapper -->
				
				<?php } ?>
				
				<?php if(get_field('lawfirm_name') && get_field('lawfirm_name') !== 'NULL') { ?>
				
					<div class="att_bio_row_wrapper">
					
						<span class="att_bio_sidebar_title">Lawfirm Name</span><!-- att_bio_sidebar_title -->
					
						<span class="att_bio_row_title lawfirm_name"><?php the_field( 'lawfirm_name' ); ?></span><!-- att_bio_row_title -->
					
					</div><!-- att_bio_row_wrapper -->
				
				<?php } ?>
				
				<?php if(get_field('years_licensed_for') && get_field('years_licensed_for') !== 'NULL') { ?>
				
					<div class="att_bio_row_wrapper">
					
						<span class="att_bio_sidebar_title">Years Licensed For</span><!-- att_bio_sidebar_title -->
					
						<span class="att_bio_row_title years_licensed_for"><?php the_field( 'years_licensed_for' ); ?></span><!-- att_bio_row_title -->
					
					</div><!-- att_bio_row_wrapper -->
				
				<?php } ?>
				
				<?php if(get_field('lawyer_website') && get_field('lawyer_website') !== 'NULL') { ?>
				
					<a class="visit_website_button" href="<?php the_field( 'lawyer_website' ); ?>" target="_blank" rel="noopener">Visit Website</a><!-- visit_website -->
				
				<?php } ?>
				
				
				
				</div><!-- att_bio_sidebar_inner -->
				
			</div><!-- att_bio_sidebar -->
			
			<div class="att_bio_content content">
				
				<?php if ( $terms && ! is_wp_error( $terms ) ) {?>
								
						<div class="att_bio_practice_areas">
					
							<h2>Practice Areas</h2>
					
							<div class="att_bio_pa_list">
								
								<ul>
 
								<?php foreach ( $terms as $term ) { ?>
									
									<li><a href="<?php bloginfo('url');?>/lawyers-practice/<?php echo $term->slug;?>-lawyers"><?php echo $term->name;?></a></li>
									
									<?php } ?>
    
    						</ul>
    						
    					</div><!-- att_bio_pa_list -->
					
						</div><!-- att_bio_practice_areas -->
						
					<?php } ?>
					
			
				
				
				<?php //acf_form(); ?>

		
						
					
					<?php if(get_field('school_one_name') && get_field('school_one_name') !== 'NULL') { ?>
					
						<div class="att_standard_education">
						
							<div class="att_bio_content_row">
					
								<span class="att_bio_content_title">Education</span><!-- att_bio_sidebar_title -->
					
								<ul>
									
									<?php if(get_field('school_one_name') && get_field('school_one_name') !== 'NULL') { ?>
								
									<li>
									
										<strong>
										
											<span class="school_one_name"><?php the_field( 'school_one_name' );?></span><!-- school_one_name -->
											
										</strong>
										
										<?php if(get_field('school_one_major') && get_field('school_one_major') !== 'NULL' && get_field('school_one_major') !== 'N/A' ) { ?>
									
											<span class="school_one_major"><?php the_field( 'school_one_major' ); ?></span><!-- school_one_major -->
										<?php } ?>
										
										<?php if(get_field('school_one_degree') && get_field('school_one_degree') !== 'NULL' && get_field('school_one_degree') !== 'N/A' ) { ?>
									
											<span class="school_one_degree"><?php the_field( 'school_one_degree' ); ?></span><!-- school_one_major -->
										<?php } ?>
										
										<?php if(get_field('school_one_year_graduated') && get_field('school_one_year_graduated') !== 'NULL' && get_field('school_one_year_graduated') !== 'N/A') { ?>
									
											<span class="school_one_year_graduated"><?php the_field( 'school_one_year_graduated' );?></span><!-- school_one_year_graduated -->
										
										<?php } ?>
										
									</li>
								
									<?php } ?>
										
									<?php if(get_field('school_two_name') && get_field('school_two_name') !== 'NULL') { ?>
										
										<li>
									
										<strong>
									
											<span class="school_two_name"><?php the_field( 'school_two_name' );?></span><!-- school_two_name -->
											
										</strong>
										
										<?php if(get_field('school_two_major') && get_field('school_two_major') !== 'NULL' && get_field('school_two_major') !== 'N/A') { ?>
									
											<span class="school_two_major"><?php the_field( 'school_two_major' );?></span><!-- school_two_major -->
										
										<?php } ?> 
										
										<?php if(get_field('school_two_degree') && get_field('school_two_degree') !== 'NULL' && get_field('school_two_degree') !== 'N/A' ) { ?>
									
											<span class="school_two_degree"><?php the_field( 'school_two_degree' ); ?></span><!-- school_one_major -->
										<?php } ?>
										
										<?php if(get_field('school_two_year_graduated') && get_field('school_two_year_graduated') !== 'NULL' && get_field('school_two_year_graduated') !== 'N/A') { ?>
									
											<span class="school_two_year_graduated"><?php the_field( 'school_two_year_graduated' );?></span><!-- school_two_year_graduated -->
										
										<?php } ?>
								
									</li>
									
									<?php } ?>
								
								</ul>
												
							</div><!-- att_bio_sidebar_row -->
							
						</div><!-- att_standard_education -->
						
						<?php } ?>
						
					
					
					<a class="claim_button">Claim this Listing</a><!-- claim_button -->
					
					<div class="overlay claim_overlay">
						
						<div class="overlay_inner">
							
							<div class="overlay_close"></div><!-- overlay_close -->
							
							<img class="overlay_logo" src="<?php bloginfo('template_directory');?>/images/ilawuit-logo-dark.svg"/>
							
							<div class="overlay_description content">
								
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
								
								<div class="price_tier_wrapper">
								
								<div class="price_tier">
								
									<h3>Claim Profile</h3>
									
									<span class="price_tier_subheder">Free</span><!-- price_tier_subheder -->
								
									<p>Lorem ipsum dolor sit amet, consectetur adip</p>
								
									<div class="layout_selection">
									
										<span class="radio_button radio_button_one checked"></span>
									
										<span class="radio_button_verbiage">Claim Profile</span>
									
									</div><!-- layout_selection -->
								
								</div><!-- price_tier -->
								
								<div class="price_tier">
								
									<h3>Basic Profile</h3>
									
									<span class="price_tier_subheder">$119/Year</span><!-- price_tier_subheder -->
								
									<p>Lorem ipsum dolor sit amet, consectetur adip</p>
								
									<div class="layout_selection">
									
										<span class="radio_button radio_button_two"></span>
									
										<span class="radio_button_verbiage">Update Basis Profile</span>
									
									</div><!-- layout_selection -->
								
								</div><!-- price_tier -->
								
								<div class="price_tier">
								
									<h3>Premium Profile</h3>
									
									<span class="price_tier_subheder">$189/Year</span><!-- price_tier_subheder -->
								
									<p>Lorem ipsum dolor sit amet, consectetur adip</p>
								
									<div class="layout_selection">
									
										<span class="radio_button radio_button_three"></span>
									
										<span class="radio_button_verbiage">Update Premium Profile</span>
									
									</div><!-- layout_selection -->
								
								</div><!-- price_tier -->
								
								</div><!-- price_tier_wrapper -->
								
								<span class="claim_begin">Let's Begin</span><!-- claim_begin -->
								
								<span class="go_back_to_profile">Go Back to Profile</span><!-- go_back_to_profile -->
								
							</div><!-- overlay_description -->
							
							<div class="overlay_form">
								
								<?php gravity_form(2, false, false, false, '', true, 1344); ?>
								
							</div><!-- overlay_form -->
							
						</div><!-- overlay_inner -->
						
					</div><!-- overlay -->
				
				</div><!-- att_bio_content -->
			
		</section><!-- att_bio_wrapper -->
		
		<section class="related_att">
			
			<div class="related_att_inner">
				
				<?php 
					
					$term = reset($terms);
				
				?>
			
				<span class="related_att_title"><?php echo $term->name; ?> Attorneys in 
				
				<?php if(get_field('lawyer_city') && get_field('lawyer_city') !== 'NULL') {
			
					the_field( 'lawyer_city' );
			
				} ?>
				
				</span><!-- related_att_title -->
				
				<div class="related_att_grid">
					
					
				<?php 
					
					// gets the deepest location term which in this case is a single term of city name
					
					$locationterms = wp_get_post_terms( get_queried_object_id(), 'location', array( 'orderby' => 'id', 'order' => 'DESC' ) );

					$deepestTerm = false;
					$maxDepth = -1;

					foreach ($locationterms as $locationterm) {
						$ancestors = get_ancestors( $locationterm->term_id, 'location' );
						$locationtermDepth = count($ancestors);

						if ($locationtermDepth > $maxDepth) {
							$deepestTerm = $locationterm;
							$maxDepth = $locationtermDepth;
    				}
					}
					
					$currentcityterm = $deepestTerm->slug;
					
					// exclude current post
					
					$exclude_post = $post->ID;
					
					// query args for wp query below
					
					$query_args = array (
						'post_type' => 'lawyer',
						'orderby' => 'rand',
						'post_staus' => 'publish',
						'posts_per_page' => 8,
						'post__not_in' => array($exclude_post),
						'tax_query' => array(
							array(
								'taxonomy' => 'location',
								'field' => 'slug',
								'terms' => $currentcityterm
							),
							array(
								'taxonomy'  => 'practice_area',
								'field'     => 'slug',
								'terms'     =>	$termslug,
							)
						),
					); 
				
				 
				 $mymain_query = new WP_Query($query_args); while($mymain_query->have_posts()) : $mymain_query->the_post(); ?>
                	
          
          	<div class="related_single_att">
						
						<?php $lawyer_profile_image = get_field( 'lawyer_profile_image' ); ?>
					
						<?php if ( $lawyer_profile_image ) : ?>
					
							<img class="att_img" src="<?php echo $lawyer_profile_image['url']; ?>" alt="<?php echo $lawyer_profile_image['alt']; ?>" />
						
						<?php else:?>
						
							<div class="att_bio_placeholder">
						
							<span>Add Photo</span>
						
							</div><!-- att_bio_placeholder -->
					
					<?php endif; ?>
						
						<span class="related_single_att_title"><?php the_title();?></span><!-- related_single_att_title -->
						
<!--
						<?php 
				
							if(get_field('lawyer_featured_practice_area')) { ?>
					
								<span class="related_single_att_subtitle"><?php the_field('lawyer_featured_practice_area');?></span>								
					
							<?php }
					
							else {
				
								$terms = get_the_terms( get_the_ID(), 'practice_area' );
				
								$term = reset($terms);
				
						?>
			
						<span class="related_single_att_subtitle"><?php echo $term->name; ?></span>
			
					<?php } ?>
-->
					
						<div class="related_view_profile_wrapper">
						
							<a class="related_view_profile" href="<?php the_permalink();?>">View Profile</a><!-- related_view_profile -->
						
						</div><!-- related_view_profile_wrapper -->
						
					</div><!-- related_single_att -->
          
          
          <?php endwhile; ?>
					<?php wp_reset_postdata(); // reset the query ?>
					
					
					
				</div><!-- related_att_grid -->
				
			</div><!-- related_att_inner -->
			
		</section><!-- related_att -->
				
</div><!-- internal_main -->
