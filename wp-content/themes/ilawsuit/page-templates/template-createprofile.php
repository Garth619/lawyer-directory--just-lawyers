<?php
	
	/* Template Name: Create Profile */
	
	get_header(); ?>



<div id="internal_main">
	
	<div class="internal_banner">
		
		<?php 
			
		// some info i need to make the form redirects work properly
			
		$hiddenpost_id = get_the_ID();?>
		
		<h1 data-homeurl="<?php bloginfo('url');?>" id="<?php echo $hiddenpost_id;?>" data><?php the_title();?></h1>

	</div><!-- internal_banner -->
	
	<div class="outer_container">
		
		<div class="directory_wrapper">
			
			<div class="default_wrapper content">
				
				<?php get_template_part('page-templates/template','multistepforms');?>
				
			</div><!-- list_wrapper -->
			
		</div><!-- directory_wrapper -->
		
	</div><!-- outer_container -->
	
</div><!-- internal_main -->

<?php get_template_part('page-templates/template','prepareoverlay');?>

<?php get_footer(); ?>