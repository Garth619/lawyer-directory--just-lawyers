<?php 
	
	/* Template Name: Custom Search */
	
	get_header();?>
	
	
	<div id="internal_main">
	
	<div class="internal_banner">
		
		<h1><?php the_title();?></h1>

	</div><!-- internal_banner -->
	
	<div class="outer_container">
		
		<div class="directory_wrapper">
			
			<div class="default_wrapper content">
				
				<?php $mykeyword = get_query_var( 'mykeyword'); echo $mykeyword?>
				
			</div><!-- list_wrapper -->
			
		</div><!-- directory_wrapper -->
		
	</div><!-- outer_container -->
	
</div><!-- internal_main -->
	
	
	<?php	get_footer(); ?>