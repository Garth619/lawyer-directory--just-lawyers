<div class="mymultistep_form_wrapper">
							
	<img class="price_logo" src="<?php bloginfo('template_directory');?>/images/ilawuit-logo-dark.svg"/>
	
	<div class="price_description content">
		
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
		
		<div class="price_tier_wrapper">
			
		<?php if(is_singular('lawyer')) {?>
		
			<div class="price_tier">
		
				<h3>Claim Profile</h3>
			
				<span class="price_tier_subheder">Free</span><!-- price_tier_subheder -->
		
				<p>Lorem ipsum dolor sit amet, consectetur adip</p>
		
				<div class="layout_selection">
			
					<span class="radio_button radio_button_one checked"></span>
			
					<span class="radio_button_verbiage">Claim Profile</span>
			
				</div><!-- layout_selection -->
		
			</div><!-- price_tier -->
		
		<?php } ?>
		
		<div class="price_tier">
		
			<h3>Basic Profile</h3>
			
			<span class="price_tier_subheder">$99/Year</span><!-- price_tier_subheder -->
		
			<p>Lorem ipsum dolor sit amet, consectetur adip</p>
		
			<div class="layout_selection">
			
				<span class="radio_button radio_button_two"></span>
			
				<span class="radio_button_verbiage">Update Basis Profile</span>
			
			</div><!-- layout_selection -->
		
		</div><!-- price_tier -->
		
		<div class="price_tier">
		
			<h3>Premium Profile</h3>
			
			<span class="price_tier_subheder">$199/Year</span><!-- price_tier_subheder -->
		
			<p>Lorem ipsum dolor sit amet, consectetur adip</p>
		
			<div class="layout_selection">
			
				<span class="radio_button radio_button_three"></span>
			
				<span class="radio_button_verbiage">Update Premium Profile</span>
			
			</div><!-- layout_selection -->
		
		</div><!-- price_tier -->
		
		</div><!-- price_tier_wrapper -->
		
		<span class="claim_begin">Let's Begin</span><!-- claim_begin -->
		
		<?php 
			
			if(is_singular('lawyer')) {?>
		
				<span class="go_back_to_profile">Go Back to Profile</span><!-- go_back_to_profile -->
		
		<?php } ?>
		
	</div><!-- price_description -->
	
	<div class="mymultistep_form">
		
		
		<?php 
			
			if(is_singular('lawyer')) {
				
				// logged out claim profile form
	
				if(!is_user_logged_in()) { 
		
					gravity_form(2, false, false, false, '', true, 1344);
				
				}
				
				// upgrade profile while logged in
	
				if(is_user_logged_in() && get_current_user_id() == $post->post_author) {
					
					// if the profile is currently a free profile
					
					if(get_field('lawyer_premium_layout_two') == 'Claim Free Profile') {
						
						echo "<div class='free_profile_form'";
							
						gravity_form(11, false, false, false, '', true, 1357);
							
						echo "</div>";
						
					}
					
					if(get_field('lawyer_premium_layout_two') == 'Basic Profile $119/Year') {
							
							echo "<div class='basic_profile_form'";
							
							gravity_form(11, false, false, false, '', true, 1357);
							
							echo "</div>";
						
					}

					
				}
				
				echo "<span class='go_back_to_profile'>Go Back to Profile</span>";
			
			}
			
			if(is_page_template('page-templates/template-createprofile.php')) {
				
				gravity_form(4, false, false, false, '', true, 1364);
				
			}
		
		?>
		
	
		
		</div><!-- mymultistep_form -->
		
	</div><!-- mymultistep_form_wrapper -->