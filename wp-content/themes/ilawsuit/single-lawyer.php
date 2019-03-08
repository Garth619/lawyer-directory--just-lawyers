<?php get_header(); ?>


<div id="internal_main">
	
	<div class="internal_banner">
		
		<h1><?php the_title();?></h1>
		
		<div class="internal_banner_meta">
			
			<span>Criminal Defense</span>
			
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
	
					<!-- https://www.google.com/maps/search/?api=1&query=1200%20Pennsylvania%20Ave%20SE%2C%20Washington%2C%20District%20of%20Columbia%2C%2020003 -->

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
				
			</div><!-- att_bio_sidebar -->
			
			<div class="att_bio_content content">
				
				<?php if(get_field('lawyer_bio')) { ?>
				
					<div class="att_bio_experience">
				
						<?php the_field( 'lawyer_bio' ); ?>
				
					</div><!-- att_bio_experience -->
				
				<?php } ?>
								
				<?php $terms = get_the_terms( get_the_ID(), 'practice_area' );
                         
					if ( $terms && ! is_wp_error( $terms ) ) {?>
								
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
		
		<section class="att_bio_selling_point">
			
			<div class="att_bio_selling_point_inner">
				
				<span class="selling_points_subheader">over twenty years of experience</span><!-- subheader -->
				
				<span class="selling_points_description">Over 10,000 cases successfully resolved. Lorem ispum blurb about experience </span><!-- selling_points_description -->
				
				
			</div><!-- att_bio_selling_point_inner -->
			
			<img src="<?php bloginfo('template_directory');?>/images/profile-quote-img-2.jpg"/>
			
		</section><!-- att_bio_selling_point -->
		
		<section class="att_bio_middle_content_wrapper">
			
			<div class="att_bio_middle_content_inner content">
			
				<div class="att_bio_middle_content">
				
					<h2>over 20 year of experience</h2>
				
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse molestie et diam eu interdum. Maecenas vel tortor maximus, pharetra libero eget, pharetra nisi. Aliquam dictum vehicula purus, in condimentum neque tempor a. Duis at ante rhoncus, porta arcu ut, sagittis diam.</p>


					<h2>Awards</h2>
				
					<ul>
						<li>Nunc feugiat egestas elit, eu malesuada nisl feugiat at.</li>
						<li>Cras semper augue ligula, ut posuere libero interdum ac. </li>
						<li>Integer scelerisque vel neque eu hendrerit. </li>
						<li> Mauris sed sapien facilisis, ullamcorper nibh s</li>
					</ul>
				
				</div><!-- att_bio_middle_content -->
			
				<div class="att_bio_middle_sidebar">
				
					<div class="att_bio_middle_sidebar_inner">
					
						<div class="att_bio_sidebar_row">
				
							<span class="att_bio_sidebar_title">Bar Admissions</span><!-- att_bio_sidebar_title -->
					
							<ul>
								<li>Licensed in NY (1989)</li>
								<li>Licensed in NY (2001)</li>
							</ul>
					
						</div><!-- att_bio_sidebar_row -->
					
						<div class="att_bio_sidebar_row">
					
							<span class="att_bio_sidebar_title">Education</span><!-- att_bio_sidebar_title -->
					
							<ul>
								<li><strong>School Name 1</strong><br/>Bachelor’s of Arts&nbsp;&nbsp;|&nbsp;&nbsp;YEAR </li>
								<li><strong>School Name 2</strong><br/>J.D.&nbsp;&nbsp;|&nbsp;&nbsp;YEAR </li>
							</ul>
					
						</div><!-- att_bio_sidebar_row -->
				
					</div><!-- att_bio_middle_sidebar_inner -->
				
				</div><!-- att_bio_middle_sidebar -->
			
			</div><!-- att_bio_middle_content_inner -->
			
		</section><!-- att_bio_middle_content_wrapper -->
		
		<section class="att_bio_caseresults">
			
			<div class="att_bio_caseresults_inner">
				
				<h2 class="att_bio_title">Case Results</h2><!-- att_bio_title -->
				
				<div class="case_results_meta">
					
					<div class="single_case_results_meta">
						
						<div class="single_case_icon">
							
							<img src="<?php bloginfo('template_directory');?>/images/star_icon.svg" alt="star_icon"/>
							
						</div><!-- single_case_icon -->
						
						<div class="single_case_content">
							
							<span class="cr_title">100 Cases</span><!-- cr_title -->
							
							<span class="cr_subtitle">Dismissed This Year</span><!-- cr_subtitle -->
							
						</div><!-- single_case_content -->
						
					</div><!-- single_case_results_meta -->
					
					<div class="single_case_results_meta">
						
						<div class="single_case_icon">
							
							<img src="<?php bloginfo('template_directory');?>/images/star_icon.svg" alt="star_icon"/>
							
						</div><!-- single_case_icon -->

						
						<div class="single_case_content">
							
							<span class="cr_title">50 Cases</span><!-- cr_title -->
							
							<span class="cr_subtitle">Reduced Charges</span><!-- cr_subtitle -->
							
						</div><!-- single_case_content -->
						
					</div><!-- single_case_results_meta -->
					
					<div class="single_case_results_meta">
						
						<div class="single_case_icon">
							
							<img src="<?php bloginfo('template_directory');?>/images/star_icon.svg" alt="star_icon"/>
							
						</div><!-- single_case_icon -->
						
						<div class="single_case_content">
							
							<span class="cr_title">200 Not Guilty</span><!-- cr_title -->
							
							<span class="cr_subtitle">Jury Verdicts</span><!-- cr_subtitle -->
							
						</div><!-- single_case_content -->
						
					</div><!-- single_case_results_meta -->
					
				
					
				</div><!-- case_results_meta -->
				
				<div class="att_bio_case_results_slider_wrapper">
					
					<div class="att_bio_case_results_slider">
						
						<div class="att_bio_case_results_slide">
							
							<span class="att_bio_case_results_title">Drug Felony</span><!-- att_bio_case_results_title -->
							
							<span class="att_bio_case_results_subtitle">Dismissed</span><!-- att_bio_case_results_subtitle -->
							
							<span class="att_bio_case_results_description">DEA seized 150+ pounds of marijuana and high-tech extraction machine from house at which client was found.</span><!-- att_bio_case_results_description -->
							
						</div><!-- att_bio_case_results_slide -->
						
						<div class="att_bio_case_results_slide">
							
							<span class="att_bio_case_results_title">Drug Felony</span><!-- att_bio_case_results_title -->
							
							<span class="att_bio_case_results_subtitle">Dismissed</span><!-- att_bio_case_results_subtitle -->
							
							<span class="att_bio_case_results_description">DEA seized 150+ pounds of marijuana and high-tech extraction machine from house at which client was found.</span><!-- att_bio_case_results_description -->
							
						</div><!-- att_bio_case_results_slide -->
						
						<div class="att_bio_case_results_slide">
							
							<span class="att_bio_case_results_title">Drug Felony</span><!-- att_bio_case_results_title -->
							
							<span class="att_bio_case_results_subtitle">Dismissed</span><!-- att_bio_case_results_subtitle -->
							
							<span class="att_bio_case_results_description">DEA seized 150+ pounds of marijuana and high-tech extraction machine from house at which client was found.</span><!-- att_bio_case_results_description -->
							
						</div><!-- att_bio_case_results_slide -->
						
						<div class="att_bio_case_results_slide">
							
							<span class="att_bio_case_results_title">Drug Felony</span><!-- att_bio_case_results_title -->
							
							<span class="att_bio_case_results_subtitle">Dismissed</span><!-- att_bio_case_results_subtitle -->
							
							<span class="att_bio_case_results_description">DEA seized 150+ pounds of marijuana and high-tech extraction machine from house at which client was found.</span><!-- att_bio_case_results_description -->
							
						</div><!-- att_bio_case_results_slide -->
						
						<div class="att_bio_case_results_slide">
							
							<span class="att_bio_case_results_title">Drug Felony</span><!-- att_bio_case_results_title -->
							
							<span class="att_bio_case_results_subtitle">Dismissed</span><!-- att_bio_case_results_subtitle -->
							
							<span class="att_bio_case_results_description">DEA seized 150+ pounds of marijuana and high-tech extraction machine from house at which client was found.</span><!-- att_bio_case_results_description -->
							
						</div><!-- att_bio_case_results_slide -->
						
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
		
		<section class="faq">
			
			<div class="faq_inner">
				
				<h2 class="att_bio_title">FAQs</h2>
				
				<div class="faq_questions">
					
					<div class="faq_col">
						
						<div class="single_faq">
							
							<span class="faq_question">Do you offer free consultations?</span><!-- faq_question -->
							
							<div class="faq_answer content">
								
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse molestie et diam eu interdum. Maecenas vel tortor maximus, pharetra libero eget, pharetra nisi. Aliquam dictum vehicula purus, in condimentum neque tempor a. Duis at ante rhoncus, porta arcu ut, sagittis diam.</p> 
								
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse molestie et diam eu interdum. Maecenas vel tortor maximus, pharetra libero eget, pharetra nisi. Aliquam dictum vehicula purus, in condimentum neque tempor a. Duis at ante rhoncus, porta arcu ut, sagittis diam.</p>
								
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse molestie et diam eu interdum. Maecenas vel tortor maximus, pharetra libero eget, pharetra nisi. Aliquam dictum vehicula purus, in condimentum neque tempor a. Duis at ante rhoncus, porta arcu ut, sagittis diam.</p>
							
							</div><!-- faq_answer -->
							
						</div><!-- single_faq -->
						
						<div class="single_faq">
							
							<span class="faq_question">Do you offer free consultations?</span><!-- faq_question -->
							
							<div class="faq_answer content">
								
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse molestie et diam eu interdum. Maecenas vel tortor maximus, pharetra libero eget, pharetra nisi. Aliquam dictum vehicula purus, in condimentum neque tempor a. Duis at ante rhoncus, porta arcu ut, sagittis diam.</p> 
								
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse molestie et diam eu interdum. Maecenas vel tortor maximus, pharetra libero eget, pharetra nisi. Aliquam dictum vehicula purus, in condimentum neque tempor a. Duis at ante rhoncus, porta arcu ut, sagittis diam.</p>
								
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse molestie et diam eu interdum. Maecenas vel tortor maximus, pharetra libero eget, pharetra nisi. Aliquam dictum vehicula purus, in condimentum neque tempor a. Duis at ante rhoncus, porta arcu ut, sagittis diam.</p>
							
							</div><!-- faq_answer -->
							
						</div><!-- single_faq -->
						
						<div class="single_faq">
							
							<span class="faq_question">Do you offer free consultations?</span><!-- faq_question -->
							
							<div class="faq_answer content">
								
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse molestie et diam eu interdum. Maecenas vel tortor maximus, pharetra libero eget, pharetra nisi. Aliquam dictum vehicula purus, in condimentum neque tempor a. Duis at ante rhoncus, porta arcu ut, sagittis diam.</p> 
								
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse molestie et diam eu interdum. Maecenas vel tortor maximus, pharetra libero eget, pharetra nisi. Aliquam dictum vehicula purus, in condimentum neque tempor a. Duis at ante rhoncus, porta arcu ut, sagittis diam.</p>
								
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse molestie et diam eu interdum. Maecenas vel tortor maximus, pharetra libero eget, pharetra nisi. Aliquam dictum vehicula purus, in condimentum neque tempor a. Duis at ante rhoncus, porta arcu ut, sagittis diam.</p>
							
							</div><!-- faq_answer -->
							
						</div><!-- single_faq -->
						
						<div class="single_faq">
							
							<span class="faq_question">Do you offer free consultations?</span><!-- faq_question -->
							
							<div class="faq_answer content">
								
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse molestie et diam eu interdum. Maecenas vel tortor maximus, pharetra libero eget, pharetra nisi. Aliquam dictum vehicula purus, in condimentum neque tempor a. Duis at ante rhoncus, porta arcu ut, sagittis diam.</p> 
								
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse molestie et diam eu interdum. Maecenas vel tortor maximus, pharetra libero eget, pharetra nisi. Aliquam dictum vehicula purus, in condimentum neque tempor a. Duis at ante rhoncus, porta arcu ut, sagittis diam.</p>
								
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse molestie et diam eu interdum. Maecenas vel tortor maximus, pharetra libero eget, pharetra nisi. Aliquam dictum vehicula purus, in condimentum neque tempor a. Duis at ante rhoncus, porta arcu ut, sagittis diam.</p>
							
							</div><!-- faq_answer -->
							
						</div><!-- single_faq -->
						
					</div><!-- faq_col -->
					
					<div class="faq_col">
						
						<div class="single_faq">
							
							<span class="faq_question">Do you offer free consultations?</span><!-- faq_question -->
							
							<div class="faq_answer content">
								
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse molestie et diam eu interdum. Maecenas vel tortor maximus, pharetra libero eget, pharetra nisi. Aliquam dictum vehicula purus, in condimentum neque tempor a. Duis at ante rhoncus, porta arcu ut, sagittis diam.</p> 
								
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse molestie et diam eu interdum. Maecenas vel tortor maximus, pharetra libero eget, pharetra nisi. Aliquam dictum vehicula purus, in condimentum neque tempor a. Duis at ante rhoncus, porta arcu ut, sagittis diam.</p>
								
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse molestie et diam eu interdum. Maecenas vel tortor maximus, pharetra libero eget, pharetra nisi. Aliquam dictum vehicula purus, in condimentum neque tempor a. Duis at ante rhoncus, porta arcu ut, sagittis diam.</p>
							
							</div><!-- faq_answer -->
							
						</div><!-- single_faq -->
						
						<div class="single_faq">
							
							<span class="faq_question">Do you offer free consultations?</span><!-- faq_question -->
							
							<div class="faq_answer content">
								
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse molestie et diam eu interdum. Maecenas vel tortor maximus, pharetra libero eget, pharetra nisi. Aliquam dictum vehicula purus, in condimentum neque tempor a. Duis at ante rhoncus, porta arcu ut, sagittis diam.</p> 
								
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse molestie et diam eu interdum. Maecenas vel tortor maximus, pharetra libero eget, pharetra nisi. Aliquam dictum vehicula purus, in condimentum neque tempor a. Duis at ante rhoncus, porta arcu ut, sagittis diam.</p>
								
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse molestie et diam eu interdum. Maecenas vel tortor maximus, pharetra libero eget, pharetra nisi. Aliquam dictum vehicula purus, in condimentum neque tempor a. Duis at ante rhoncus, porta arcu ut, sagittis diam.</p>
							
							</div><!-- faq_answer -->
							
						</div><!-- single_faq -->
						
						<div class="single_faq">
							
							<span class="faq_question">Do you offer free consultations?</span><!-- faq_question -->
							
							<div class="faq_answer content">
								
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse molestie et diam eu interdum. Maecenas vel tortor maximus, pharetra libero eget, pharetra nisi. Aliquam dictum vehicula purus, in condimentum neque tempor a. Duis at ante rhoncus, porta arcu ut, sagittis diam.</p> 
								
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse molestie et diam eu interdum. Maecenas vel tortor maximus, pharetra libero eget, pharetra nisi. Aliquam dictum vehicula purus, in condimentum neque tempor a. Duis at ante rhoncus, porta arcu ut, sagittis diam.</p>
								
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse molestie et diam eu interdum. Maecenas vel tortor maximus, pharetra libero eget, pharetra nisi. Aliquam dictum vehicula purus, in condimentum neque tempor a. Duis at ante rhoncus, porta arcu ut, sagittis diam.</p>
							
							</div><!-- faq_answer -->
							
						</div><!-- single_faq -->
						
					</div><!-- faq_col -->
					
				</div><!-- faq_questions -->
				
			</div><!-- faq_inner -->
			
		</section><!-- faq -->
	
</div><!-- internal_main -->


<?php get_footer(); ?>
