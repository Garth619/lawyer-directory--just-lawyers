<?php get_header(); ?>


<?php 	
	
	$currentcity = get_query_var( 'currentcity');
	$currentstate = get_query_var( 'currentstate');
	$currentpracticearea =  get_query_var( 'office_pa');
	
	
	$taxlocations = 'location';
	$taxpracticeareas = 'practice_area';
	
	
	// pa url query -> pa id conversion
	
	$patermslug = get_term_by('slug', $currentpracticearea, $taxpracticeareas);
	
	$patermsid = $patermslug->term_taxonomy_id;
	
	$patermstitle = $patermslug->name;
	
	// state url query -> state id conversion
	
	$statetermslug = get_term_by('slug', $currentstate, $taxlocations);
	
	$statetermid = $statetermslug->term_taxonomy_id;
	
	$statetermtitle = $statetermslug->name;
	
	// city url query -> city id conversion
	
	$citytermslug = get_term_by('slug', $currentcity, $taxlocations);
	
	$citytermid = $citytermslug->term_taxonomy_id;
	
	$citytermtitle = $citytermslug->name;
	
	
?>


<div id="internal_main">
	
	<div class="internal_banner">
		
		<h1><?php echo $citytermtitle;?><br/> <?php echo $patermstitle;?> Lawyers</h1>

	</div><!-- internal_banner -->
	
	<div class="outer_container">
		
		<div class="directory_wrapper lawyer_wrapper">
			
			
			
			<?php 
				
				if(get_field('pa_location_content_blocks','option')) {
		 		 
					while(has_sub_field('pa_location_content_blocks','option')) {
			 			 
			 			if(get_sub_field('current_taxonomy') == $patermsid && (get_sub_field('current_location_taxonomy_state') == $statetermid) && get_sub_field('current_location_taxonomy_city') == $citytermid ) {?>
			 			
			 			
			 			<div class="directory_description">
			 			 
			 				<?php the_sub_field('block');?>
			 				
			 			</div><!-- directory_description -->
		 			 		
		 				<?php }
		 			 	
		 		}
			
		 		if(is_user_logged_in()) {
	
		 			echo '<a href="' . get_bloginfo('url') .  '/wp-admin/admin.php?page=pa-locations-content-blocks-settings">Edit</a><br/><br/><br/>';
			 	}
		 		 
		}	?>
		
		
			
			<h2 class="section_header">Browse by Lawyer</h2>
			
			<?php 
	
					$query_args = array (
						'post_type' => 'lawyer',
						'fields' => 'ids',
						'order' => 'ASC',
						'orderby' => 'title', // could these slow the results down?
						'posts_per_page' => -1, // is this messing up total results?
						'tax_query' => array(
						array(
							'taxonomy'  => $taxlocations,
							'field'     => 'slug',
							'terms'     => $currentcity,
						),
						array(
							'taxonomy'  => $taxpracticeareas,
							'field'     => 'slug',
							'terms'     => $currentpracticearea,
						)
						),
				);?>
	
			<div class="lawyer_results_wrapper">
	
				<?php $singlefirms = new WP_Query($query_args);
	
					while($singlefirms->have_posts()) : $singlefirms->the_post();?>
	
						
						<div class="single_lawyer_result">
							
							<a class="" href="<?php the_permalink();?>">
							
							<div class="single_lawyer_img_wrapper">
								
								
								<?php $lawyer_profile_image = get_field( 'lawyer_profile_image' ); ?>
					
								<?php if ( $lawyer_profile_image ) : ?>
					
									<img class="att_feed_image" src="<?php echo $lawyer_profile_image['url']; ?>" alt="<?php echo $lawyer_profile_image['alt']; ?>" />
						
									<?php else:?>
						
									<div class="logo_placeholder">
									
										<span>Add Logo</span>
									
									</div><!-- logo_placeholder -->
					
								<?php endif; ?>
								
							</div><!-- single_lawyer_img_wrapper -->
							
							<div class="single_lawyer_content">
								
								<span class="single_lawyer_title"><?php the_title();?></span><!-- single_lawyer_title -->
								
									<div class="single_lawyer_meta">
									
										<span>
										
										<?php echo $citytermtitle;?> 
										
										<?php if(get_field('state_abbr') && get_field('state_abbr') !== 'NULL') {
										
											echo ", "; the_field('state_abbr');
										
										} ?>
										
										</span>
									
										<?php if(get_field('lawyer_phone') && get_field('lawyer_phone') !== 'NULL') { ?>
									
											<span><?php the_field( 'lawyer_phone' ); ?></span>
									
										<?php }?>
										
									</div><!-- single_lawyer_meta -->
									
									<div class="visit_button_wrapper">
									
										<span class="visit_button">Visit Profile</span><!-- visit_button -->
									
									</div><!-- visit_button_wrapper -->
								
								</div><!-- single_lawyer_content -->
							
							</a>
							
							<?php edit_post_link( __( 'Edit'), '', '' ); ?>
							
						</div><!-- single_lawyer_result -->
	

					<?php endwhile;
					
					wp_reset_postdata();?>
  
  
  			</div><!-- lawyer_results_wrapper -->
  
			</div><!-- list_wrapper -->
			
		</div><!-- directory_wrapper -->
		
	</div><!-- outer_container -->
	
</div><!-- internal_main -->
		

<?php get_footer(); ?>
