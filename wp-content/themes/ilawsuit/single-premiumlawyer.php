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
					
					<?php if (get_field('lawyer_profile_picture')) : ?>
					
						<img class="att_img" src="<?php the_field('lawyer_profile_picture');?>" alt="<?php the_title();?>" />
						
						<?php else:?>
						
						<div class="att_bio_placeholder">
						
							<span>Add Photo</span>
						
						</div><!-- att_bio_placeholder -->
					
					<?php endif; ?>
					
				</div><!-- att_bio_profile -->
				
				<?php if(get_field('lawyer_street_address')) : ?>
				
						<div class="att_bio_row_wrapper">
					
							<span class="att_bio_sidebar_title">Address</span><!-- att_bio_sidebar_title -->
						
							<span class="att_bio_address"><?php the_field( 'lawyer_street_address' ); ?>, <?php the_field( 'lawyer_city' ); ?> <?php the_field( 'lawyer_state' ); ?> 
<?php the_field( 'lawyer_zip' ); ?></span><!-- att_bio_address -->
						
							<!-- do this -->
							
							<?php $claim_address = get_field('lawyer_street_address') . ' ' . get_field('lawyer_city') . ' ' . get_field('lawyer_state') . ' ' . get_field('lawyer_zip');
	
								$claim_addressCleaned = str_replace(' ', '%20', $claim_address); // this works but doesnt echo in ahref below?
					
							?>
					
							<a class="get_directions" href="https://www.google.com/maps/search/?api=1&query=<?php echo $claim_addressCleaned;?>" target="_blank" rel="noopener">Directions</a><!-- get_directions -->

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
					
						<span class="att_bio_sidebar_title att_bio_phone">Phone</span><!-- att_bio_sidebar_title -->
					
						<a class="att_bio_row_title" href="tel:<?php echo str_replace(['-', '(', ')', ' '], '', get_field('lawyer_phone')); ?>"><?php the_field( 'lawyer_phone' ); ?></a><!-- att_bio_row_title -->
					
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
 
								<?php foreach ( $terms as $term ) { ?>
								
									<li><a href="<?php bloginfo('url');?>/lawyers-practice/<?php echo $term->slug;?>-lawyers"><?php echo $term->name;?></a></li>
									
								<?php } ?>
    
    						</ul>
    						
    					</div><!-- att_bio_pa_list -->
					
						</div><!-- att_bio_practice_areas -->
						
					<?php } ?>
						
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
												
							</div><!-- att_bio_contents_row -->
						
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