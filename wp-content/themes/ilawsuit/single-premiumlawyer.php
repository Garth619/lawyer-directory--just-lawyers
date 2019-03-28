<div id="internal_main">
	
	<div class="internal_banner">
		
		<h1><?php the_title();?></h1>
		
		<div class="internal_banner_meta">
			
			<?php 
				
				$terms = get_the_terms( get_the_ID(), 'practice_area' );
				
				if(get_field('lawyer_featured_practice_area')) { ?>
					
					<span><?php the_field('lawyer_featured_practice_area');?></span>
					
				<?php }
					
					else {
				
					
				
					$term = reset($terms);
				
				?>
			
					<span><?php echo $term->name; ?></span>
			
			<?php } ?>
			
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
				
				<?php if(get_field('lawyer_address') && get_field('lawyer_address') !== 'NULL') { ?>
				
					<div class="att_bio_address_wrapper">
					
						<span class="att_bio_sidebar_title">Address</span><!-- att_bio_sidebar_title -->
					
						<span class="att_bio_address"><?php the_field( 'lawyer_address' ); ?></span><!-- att_bio_address -->
					
						<?php $address = get_field('lawyer_address');
	
							$addressCleaned = str_replace(' ', '%20', $address); // this works but doesnt echo in ahref below?
					
						?>
					
						<a class="get_directions" href="https://www.google.com/maps/search/?api=1&query=<?php echo $addressCleaned;?>" target="_blank" rel="noopener">Directions</a><!-- get_directions -->

					</div><!-- att_bio_address_wrapper -->
				
				<?php } ?>
				
				<?php if(get_field('lawyer_phone') && get_field('lawyer_phone') !== 'NULL') { ?>
				
					<div class="att_bio_address_wrapper">
					
						<span class="att_bio_sidebar_title">Phone</span><!-- att_bio_sidebar_title -->
					
						<a class="att_bio_phone" href="tel:<?php echo str_replace(['-', '(', ')', ' '], '', get_field('lawyer_phone')); ?>"><?php the_field( 'lawyer_phone' ); ?></a><!-- att_bio_phone -->
					
					</div><!-- att_bio_address_wrapper -->
				
				<?php } ?>
				
				<?php if(get_field('lawyer_website') && get_field('lawyer_website') !== 'NULL') { ?>
				
					<a class="visit_website_button" href="<?php the_field( 'lawyer_website' ); ?>" target="_blank" rel="noopener">Visit Website</a><!-- visit_website -->
				
				<?php } ?>
				
				</div><!-- att_bio_sidebar_inner -->
				
			</div><!-- att_bio_sidebar -->
			
			<div class="att_bio_content content">
				
				<?php if(get_field('lawyer_bio')) { ?>
				
					<div class="att_bio_experience">
				
						<?php the_field( 'lawyer_bio' ); ?>
				
					</div><!-- att_bio_experience -->
				
				<?php } ?>
				
				
								

        <?php if ( $terms && ! is_wp_error( $terms ) ) {?>
								
						<div class="att_bio_practice_areas">
					
							<h2>Practice Areas</h2>
					
							<div class="att_bio_pa_list">
								
								<ul>
 
								<?php foreach ( $terms as $term ) {
									
									echo "<li>" . $term->name . "</li>";
    						
    						} ?>
    
    						</ul>
						
							<?php } ?>
						
					</div><!-- att_bio_pa_list -->
					
				</div><!-- att_bio_practice_areas -->
				
			</div><!-- att_bio_content -->
			
		</section><!-- att_bio_wrapper -->
		
		<?php if(get_field('selling_points_title') || get_field('selling_points_description')) { ?>
		
		<section class="att_bio_selling_point">
			
			<div class="att_bio_selling_point_inner">
				
				<span class="selling_points_subheader"><?php the_field( 'selling_points_title' ); ?></span><!-- subheader -->
				
				<span class="selling_points_description"><?php the_field( 'selling_points_description' ); ?></span><!-- selling_points_description -->
				
				
			</div><!-- att_bio_selling_point_inner -->
			
			<?php 
				
				if(get_field('selling_point_banner_image_custom')) { 
			
					$selling_point_banner_image_custom = get_field( 'selling_point_banner_image_custom' ); ?>
				
					<img data-src="<?php echo $selling_point_banner_image_custom['url']; ?>" alt="<?php echo $selling_point_banner_image_custom['alt']; ?>" />
			
					<?php 
					
				} 
						
				else {
			
					if(get_field('selling_point_banner_options') == 'Building') { ?>
			
						<img data-src="<?php bloginfo('template_directory');?>/images/profile-quote-img-2.jpg" alt="<?php the_title();?> Selling Point" />
			
					<?php	}
			
					if(get_field('selling_point_banner_options') == 'Inside Office') { ?>
			
						<img data-src="<?php bloginfo('template_directory');?>/images/profile-quote-img.jpg" alt="<?php the_title();?> Selling Point" />
			
						<?php } 
				
				} ?>

			
		</section><!-- att_bio_selling_point -->
		
		<?php } ?>
		
		<section class="att_bio_middle_content_wrapper">
			
			<div class="att_bio_middle_content_inner content">
			
				<div class="att_bio_middle_content">
				
					<?php the_field( 'lawyer_bottom_content' ); ?>
				
				</div><!-- att_bio_middle_content -->
			
				<div class="att_bio_middle_sidebar">
				
					<div class="att_bio_middle_sidebar_inner">
						
						<?php if(get_field('lawyer_bar_admission')) { ?>
					
							<div class="att_bio_sidebar_row">
				
								<span class="att_bio_sidebar_title">Bar Admission</span><!-- att_bio_sidebar_title -->
					
								<ul>
									
									 <?php while(has_sub_field('lawyer_bar_admission')): ?>
									 
											<li><?php the_sub_field('bar_admission_bullet');?></li>
									    
										<?php endwhile; ?>
									 
								</ul>
					
						</div><!-- att_bio_sidebar_row -->
						
						<?php } ?>
						
						<?php if(get_field('school_one_name') && get_field('school_one_name') !== 'NULL') { ?>
						
							<div class="att_bio_sidebar_row">
					
								<span class="att_bio_sidebar_title">Education</span><!-- att_bio_sidebar_title -->
					
								<ul>
								
									<li>
									
										<strong>
										
										<?php if(get_field('school_one_name') && get_field('school_one_name') !== 'NULL') {
									
											the_field( 'school_one_name' );
										
										} ?>
										
										</strong>
									
										<br/>
									
										<?php if(get_field('school_one_major') && get_field('school_one_major') !== 'NULL' && get_field('school_one_major') !== 'N/A') {
									
											the_field( 'school_one_major' ); echo "&nbsp;&nbsp;|&nbsp;&nbsp";
										
										} 
										
										if(get_field('school_one_year_graduated') && get_field('school_one_year_graduated') !== 'NULL' && get_field('school_one_year_graduated') !== 'N/A') {
									
											the_field( 'school_one_year_graduated' );
										
										} ?>
									
									</li>
								
								
										
										<?php if(get_field('school_two_name') && get_field('school_two_name') !== 'NULL' && get_field('school_two_name') !== 'N/A') { ?>
										
											<li>
									
												<strong><?php the_field( 'school_two_name' );?></strong>
									
												<br/>
										
												<?php if(get_field('school_two_major') && get_field('school_two_major') !== 'NULL') {
									
													the_field( 'school_two_major' ); echo "&nbsp;&nbsp;|&nbsp;&nbsp";
										
												} 
									
												if(get_field('school_two_year_graduated') && get_field('school_two_year_graduated') !== 'NULL' && get_field('school_two_year_graduated') !== 'N/A') {
									
													the_field( 'school_two_year_graduated' );
										
												} ?>
								
										 </li>
									
									<?php } ?>
								
								</ul>
												
							</div><!-- att_bio_sidebar_row -->
						
						<?php } ?>
				
					</div><!-- att_bio_middle_sidebar_inner -->
				
				</div><!-- att_bio_middle_sidebar -->
			
			</div><!-- att_bio_middle_content_inner -->
			
		</section><!-- att_bio_middle_content_wrapper -->
		
		<?php if(get_field('lawyer_case_result_slides')): ?>
		 
		<section class="att_bio_caseresults">
			
			<div class="att_bio_caseresults_inner">
				
				<h2 class="att_bio_title">Case Results</h2><!-- att_bio_title -->
				
				<?php if(get_field('lawyer_case_result_selling_points')): ?>
				
					<div class="case_results_meta">
						
							<?php while(has_sub_field('lawyer_case_result_selling_points')): ?>
						 
								<div class="single_case_results_meta">
						
									<div class="single_case_icon">
							
										<img data-src="<?php bloginfo('template_directory');?>/images/star_icon.svg" alt="star_icon"/>
							
									</div><!-- single_case_icon -->
						
									<div class="single_case_content">
							
										<span class="cr_title"><?php the_sub_field( 'case_result_bold_header' ); ?></span><!-- cr_title -->
							
										<span class="cr_subtitle"><?php the_sub_field( 'case_results_subheader' ); ?></span><!-- cr_subtitle -->
							
									</div><!-- single_case_content -->
						
								</div><!-- single_case_results_meta -->
						    
							<?php endwhile; ?>
						 
						</div><!-- case_results_meta -->
					
					<?php endif; ?>
				
				<div class="att_bio_case_results_slider_wrapper">
					
					<div class="att_bio_case_results_slider">
						
							<?php while(has_sub_field('lawyer_case_result_slides')): ?>
		 
								<div class="att_bio_case_results_slide">
							
									<span class="att_bio_case_results_title"><?php the_sub_field( 'lawyer_case_results_header' ); ?></span><!-- att_bio_case_results_title -->
							
									<span class="att_bio_case_results_subtitle"><?php the_sub_field( 'lawyer_case_results_verdict' ); ?></span><!-- att_bio_case_results_subtitle -->
							
									<span class="att_bio_case_results_description"><?php the_sub_field( 'lawyer_case_results_description' ); ?></span><!-- att_bio_case_results_description -->
							
								</div><!-- att_bio_case_results_slide -->
		    
							<?php endwhile; ?>
		 
						
						
					</div><!-- att_bio_case_results_slider -->
					
				</div><!-- att_bio_case_results_slider_wrapper -->
				
			</div><!-- att_bio_caseresults_inner -->
			
			<div class="cr_button_wrapper">
						
						<div class="cr_button_left cr_button">
							
							<div class="cr_arrow"></div><!-- cr_arrow -->
							
						</div><!-- cr_button -->
						
						<div class="cr_button_right cr_button">
							
							<div class="cr_arrow"></div><!-- cr_arrow -->
							
						</div><!-- cr_button -->
						
					</div><!-- cr_button_wrapper -->
			
		</section><!-- att_bio_caseresults -->
		
		<?php endif; ?>
		
		<?php if(get_field('lawyer_faq')) { ?>
		
		<section class="faq">
			
			<div class="faq_inner">
				
				<h2 class="att_bio_title">FAQs</h2>
				
				<div class="faq_questions">
					
					<div class="faq_col">
						
						<?php if(get_field('lawyer_faq')): ?>
						 
							<?php while(has_sub_field('lawyer_faq')): ?>
						 
								<div class="single_faq">
							
									<span class="faq_question"><?php the_sub_field( 'question' ); ?></span><!-- faq_question -->
							
									<div class="faq_answer content">
								
										<?php the_sub_field( 'answer' ); ?>
							
									</div><!-- faq_answer -->
							
								</div><!-- single_faq -->
						    
							<?php endwhile; ?>
						 
						<?php endif; ?>
						
					</div><!-- faq_col -->
					
					<div class="faq_col">
						
						<?php if(get_field('lawyer_faq_col_two')): ?>
						 
							<?php while(has_sub_field('lawyer_faq_col_two')): ?>
						 
								<div class="single_faq">
							
									<span class="faq_question"><?php the_sub_field( 'question' ); ?></span><!-- faq_question -->
							
									<div class="faq_answer content">
								
										<?php the_sub_field( 'answer' ); ?>
							
									</div><!-- faq_answer -->
							
								</div><!-- single_faq -->
						    
							<?php endwhile; ?>
						 
						<?php endif; ?>
						
					</div><!-- faq_col -->
					
				</div><!-- faq_questions -->
				
			</div><!-- faq_inner -->
			
		</section><!-- faq -->
		
		<?php } ?>
	
</div><!-- internal_main -->