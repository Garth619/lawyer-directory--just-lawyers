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
		
		<h1><?php echo $citytermtitle;?> <?php echo $patermstitle;?> Lawyers</h1>

	</div><!-- internal_banner -->
	
	<div class="outer_container">
		
		<div class="directory_wrapper lawyer_wrapper">
			
			
			
			<div class="breadcrumb_wrapper">
			
				<a href="<?php bloginfo('url');?>">Home</a>
	
				<a href="<?php the_permalink(126);?>">Practice Areas</a> 
	
				<a class="" href="<?php bloginfo('url');?>/lawyers-practice/<?php echo $currentpracticearea;?>"><?php echo  $patermstitle;?></a>
	
				<a class="" href="<?php bloginfo('url');?>/lawyers-practice/<?php echo get_query_var( 'office_pa');?>/<?php echo get_query_var( 'currentstate');?>"><?php echo $statetermtitle;?></a>
	
				<a><?php echo $citytermtitle;?></a>
			
			</div><!-- breadcrumb_wrapper -->
			
						
			
			
			<?php if(get_field('pa_location_content_blocks','option')) :?>
		 		 
					<?php while(has_sub_field('pa_location_content_blocks','option')) :
			 			 
			 			if(get_sub_field('current_taxonomy') == $patermsid && (get_sub_field('current_location_taxonomy_state') == $statetermid) && get_sub_field('current_location_taxonomy_city') == $citytermid ) : ?>
			 			
			 			
			 				<div class="directory_description content">
			 			 
			 					<?php the_sub_field('block');?>
			 				
			 				</div><!-- directory_description -->
			 			
			 				<h2 class="section_header">Browse by Lawyer</h2>
		 			 		
		 				<?php endif;
		 			 	
			 			endwhile;
			
		 		endif; ?>
		 		
		 		
		 		<div class="filter_by_search_wrapper">
				
					<input class="list_input desktop" type="text" placeholder="Filter<?php // echo $citytermtitle;?> Lawyers Below">
				
					<input class="list_input mobile" type="text" placeholder="Filter">
				
					<div class="filter_by_search_button"></div><!-- filter_by_search_button -->
				
				</div><!-- filter_by_search_wrapper -->
		
				
			
				
				<?php 
	
					$query_args = array (
						'post_type' => 'lawyer',
						'fields' => 'ids',
						'no_found_rows' => true,
						'order' => 'ASC',
						'post_status' => 'publish',
						'orderby' => 'title',
						'posts_per_page' => -1,
						'tax_query' => array(
							'relation' => 'AND',
							array(
								'taxonomy'  => $taxlocations,
								'field'     => 'slug',
								'terms'     => $currentcity,
								'operator' => 'IN',
							),
							array(
								'taxonomy'  => $taxpracticeareas,
								'field'     => 'slug',
								'terms'     => $currentpracticearea,
								'operator' => 'IN',
								)
						),
				);
	
				 $singlefirms = new WP_Query($query_args);?>
				 
				 

				 <?php $count = $singlefirms->found_posts; ?>
				 
				 <?php if($count) { ?>
							
					<span class="results_number">Total Lawyers (<?php echo $count;?>)</span><!-- results_number -->
							
				 <?php } ?>
				 
				 <div class="make_new_search_wrapper lawyer_search_styles">
						
							<span class="make_new_search">refine your search</span><!-- make_new_search -->
						
							<div class="new_search_wrapper">
							
								<?php get_template_part('searchform','threepart');?>
							
							</div><!-- new_search_wrapper -->
						
						</div><!-- make_new_search_wrapper -->
				 
				 <div class="lawyer_results_wrapper">
	
					<?php while($singlefirms->have_posts()) : $singlefirms->the_post();?>
	
						
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
										
										<?php echo $citytermtitle;
										
										 if(get_field('state_abbr') && get_field('state_abbr') !== 'NULL') {
										
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
							
						</div><!-- single_lawyer_result -->
	

					<?php endwhile;
					
					wp_reset_postdata();?>
  
  
  			</div><!-- lawyer_results_wrapper -->
  
			</div><!-- list_wrapper -->
			
		</div><!-- directory_wrapper -->
		
	</div><!-- outer_container -->
	
</div><!-- internal_main -->
		

<?php get_footer(); ?>
