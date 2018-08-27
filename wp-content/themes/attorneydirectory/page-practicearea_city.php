<?php get_header(); ?>


<?php 

	$taxlocations = 'location';
	$taxpracticeareas = 'office_practice_area';
	
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


<div class="section_inner">
	
<div class="breadcrumb">
	
	<a href="<?php bloginfo('url');?>">Home</a>
	
	<a href="<?php the_permalink(554158);?>">Locations</a>
	
	<a href="<?php bloginfo('url');?>/lawyers-location/locations/<?php echo $lawfirm_location_currentstate;?>"><?php echo $statetitle;?></a>
	
	<a><?php echo $citytermtitle;?></a>
	
	<br/>
	<br/>
	<br/>
	<br/>
	
</div><!-- breadcrumb -->

<?php
	
	
	
	
	echo '<h1>' . $citytermtitle . ' Lawyers</h1>';
    

	     
	   		$termids = get_terms( array( 
		 			'taxonomy' => $taxpracticeareas,
		 			'fields' => 'ids',
		 			)
		 		);

		 		//print_r($termids);
		 		
		 		
		 		$currenttermid = get_term_by('slug', $lawfirm_location_currentcity, 'location');
		 		
		 		
		 		$termcityid = $currenttermid->term_id;
		 		
		 		
		 	 if(get_field('content_blocks','option')) {
		 		 
		 			 echo "<br/><br/>";
		 			 
		 			 while(has_sub_field('content_blocks','option')) {
			 			 
			 			 if(get_sub_field('current_taxonomy') == $termcityid) {
			 			 
			 			 	the_sub_field('block');
		 			 		
		 			 	}
		 			 	
		 			 	
					}
					
					if(is_user_logged_in()) {
	
		 			 		echo '<a href="' . get_bloginfo('url') .  '/wp-admin/admin.php?page=content-blocks-settings">Edit</a><br/><br/><br/>';
			 		
						}
		 		 
		 		}	
		 		
		 		echo "<br/>Browse By Practice Area<br/></br/>";	 		
		 		
		 		$args = array (
		 			'post_type' => 'office',
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
	
					echo '<a href="' . get_bloginfo('url') .  '/wp-admin/edit-tags.php?taxonomy=office_practice_area&post_type=office">Edit</a><br/><br/><br/>';
			 		
				}

	?>
	
</div>



<?php get_footer(); ?>
