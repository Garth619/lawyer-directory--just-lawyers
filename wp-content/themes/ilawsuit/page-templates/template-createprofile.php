<?php
	
	/* Template Name: Create Profile */
	
	get_header(); ?>


<div id="internal_main">
	
	<div class="internal_banner">
		
		<h1><?php the_title();?></h1>

	</div><!-- internal_banner -->
	
	<div class="outer_container">
		
		<div class="directory_wrapper">
			
			<div class="default_wrapper content">
				
				<div class="mymultistep_form_wrapper">
							
							<img class="price_logo" src="<?php bloginfo('template_directory');?>/images/ilawuit-logo-dark.svg"/>
							
							<div class="price_description content">
								
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
								
							</div><!-- price_description -->
							
							<div class="mymultistep_form">
								
								<?php gravity_form(2, false, false, false, '', true, 1344); ?>
								
								</div><!-- mymultistep_form -->
								
							</div><!-- mymultistep_form_wrapper -->
				
			</div><!-- list_wrapper -->
			
		</div><!-- directory_wrapper -->
		
	</div><!-- outer_container -->
	
</div><!-- internal_main -->
		

<?php get_footer(); ?>