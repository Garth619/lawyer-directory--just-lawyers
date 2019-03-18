<?php get_header(); ?>


<?php 

	$taxlocations = 'location';
	$taxpracticeareas = 'practice_area';
	
	$lawfirm_location_currentstate = get_query_var( 'office_location_currentstate');
	$lawfirm_location_currentcity = get_query_var( 'office_location_currentcity');
	
	
	// these are different than the pa querys on the other templates but these shoudl still go in the functions.php 
	
	// state url query -> state id conversion
	
	$statetermslug = get_term_by('slug', $lawfirm_location_currentstate, $taxlocations);
	
	$statetitle = $statetermslug->name;
	
	// city url query -> city id conversion
	
	$citytermslug = get_term_by('slug', $lawfirm_location_currentcity, $taxlocations);
	
	$citytermtitle = $citytermslug->name;
	
?>


<div id="internal_main">
	
	<div class="internal_banner">
		
		<h1><?php echo $citytermtitle . ", " .  $statetitle;?></h1>

	</div><!-- internal_banner -->
	
	<div class="outer_container">
		
		<div class="directory_wrapper">
			
			<div class="breadcrumb_wrapper">
				
				<a href="<?php bloginfo('url');?>">Home</a>
	
				<a href="<?php the_permalink(133);?>">Locations</a>
	
				<a href="<?php bloginfo('url');?>/lawyers-location/state/<?php echo $lawfirm_location_currentstate;?>"><?php echo $statetitle;?></a>
	
				<a><?php echo $citytermtitle;?></a>
				
			</div><!-- breadcrumb_wrapper -->
			
				<?php
    
				$termids = get_terms( array( 
		 			'taxonomy' => $taxpracticeareas,
		 			'fields' => 'ids',
		 			)
		 		);

		 		//print_r($termids);
		 		
		 		
		 		$currenttermid = get_term_by('slug', $lawfirm_location_currentcity, 'location');
		 		
		 		
		 		$termcityid = $currenttermid->term_id;
		 		
		 		
		 		if(get_field('content_blocks','option')) : 
		 	 
		 	 	 while(has_sub_field('content_blocks','option')) :
			 			 
			 	 	if(get_sub_field('current_taxonomy') == $termcityid) : ?>
			 			 
			 			<div class="directory_description content">
			 			 
			 			 	<?php the_sub_field('block');?>
			 			 	
			 			</div><!-- directory_description -->
			
		 				<h2 class="section_header">Browse by city</h2>
		 			 		
		 			 <?php endif;
		 			 	
		 		 endwhile;
					
			  endif;	?>
			
			
			
			<div class="filter_by_search_wrapper">
				
				<input class="list_input desktop" type="text" placeholder="Filter<?php // echo $citytermtitle;?> Practice Areas Below">
				
				<input class="list_input mobile" type="text" placeholder="Filter">
				
				<div class="filter_by_search_button"></div><!-- filter_by_search_button -->
				
			</div><!-- filter_by_search_wrapper -->

			
			<div class="list_wrapper">
				
			
		 		
		 	<?php
		 		
		 		$args = array (
		 			'post_type' => 'lawyer',
		 			'fields' => 'ids',
		 			'tax_query' => array(

		 			array(
		 				'taxonomy'  => $taxlocations,
		 				'field'     => 'ids',
		 				'terms'     => $termcityid,
		 			),

		 			array(
		 				'taxonomy'  => $taxpracticeareas,
		 				'field'     => 'ids',
		 				'terms'     => $termids,
		 			)
		 		),
		 	); 			


			$postids = new WP_Query( $args );

			
			$termargs = array (
				'taxonomy' => $taxpracticeareas,
				//'fields' => 'all_with_object_id',
				'object_ids' => $postids->posts,
				//'parent' => $currentparentid,
			
			);

			
			$term_query = new WP_Term_Query( $termargs );

		
			if ( ! empty( $term_query ) && ! is_wp_error( $term_query ) ) {
				
				echo "<ul>";
				
				foreach ( $term_query ->terms as $term )
				
			
					echo '<li><a href="'. get_bloginfo('url') . "/lawyers-practice/" .  $term->slug  . '/' . $lawfirm_location_currentstate . '/' . $lawfirm_location_currentcity . '">' . $term->name . '</a></li>';
			
				}
				
				echo "</ul>";

				
				if(is_user_logged_in()) {
	
					echo '<a href="' . get_bloginfo('url') .  '/wp-admin/edit-tags.php?taxonomy=practice_area&post_type=lawyer">Edit</a><br/><br/><br/>';
			 		
				}

	?>
				
			</div><!-- list_wrapper -->
			
		</div><!-- directory_wrapper -->
		
	</div><!-- outer_container -->
	
</div><!-- internal_main -->
		

<?php get_footer(); ?>