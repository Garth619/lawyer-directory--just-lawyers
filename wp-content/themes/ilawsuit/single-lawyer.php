<?php 
	
	if(is_user_logged_in() && get_current_user_id() == $post->post_author) { 

	acf_form_head();

	} ?>

<?php get_header(); 

	
	if(get_field('lawyer_premium_layout_two') == 'Premium Profile $189/Year') {

		get_template_part('single','premiumlawyer');
	
	}
	
	else {
		
		get_template_part('single','standardlawyer');
		
	} ?>
	
	<?php get_template_part('page-templates/template','prepareoverlay');?>
	
	<div class="success_overlay show_on_success">
		
		<div class="success_overlay_inner">
			
			<div class="success_content">
			
				<?php echo file_get_contents("wp-content/themes/ilawsuit/images/success.svg"); ?>
			
				<span class="success_header">Success!</span><!-- success_header -->
			
				<p>This can be verbiage to explain how to make edits by hovering over sections of the profile. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et.</p>
				
				<span class="success_close">View Profile</span>
			
			</div><!-- success_content -->
			
		</div><!-- success_overlay_inner -->
		
	</div><!-- success_overlay -->
	
		
	<?php if(is_user_logged_in() && get_current_user_id() == $post->post_author) { ?>
	
	<div class="update_custom_form current_author_form content">
		
		<div class="update_custom_form_left"></div><!-- update_custom_form_left -->
		
		<div class="update_custom_form_right">
			
				<div class="acf_close"></div><!-- acf_close -->
				
				<!-- https://support.advancedcustomfields.com/forums/topic/split-up-an-acf_form-into-a/ -->

				<?php acf_form(); ?>
				
				
				
				<?php gravity_form(7, false, false, false, '', true, 2344); ?>
				
			</div><!-- update_custom_form_right -->
		
	</div><!-- acf_form -->
	
<?php } ?>
	
	<?php  get_footer(); ?>
