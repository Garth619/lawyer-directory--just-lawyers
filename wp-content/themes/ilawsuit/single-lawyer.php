<?php // acf_form_head(); ?>

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
			
			<span class="success_close">Close</span>
			
			<?php echo file_get_contents("wp-content/themes/ilawsuit/images/success.svg"); ?>
			
		</div><!-- success_overlay_inner -->
		
	</div><!-- success_overlay -->


<?php  get_footer(); ?>
