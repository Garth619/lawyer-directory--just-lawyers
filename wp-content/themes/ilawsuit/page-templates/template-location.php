<?php get_header(); ?>


<div id="internal_main">
	
	<div class="internal_banner">
		
		<?php	// state url query -> state id conversion
		
			$currentstate = get_query_var( 'office_location_currentstate');
	
			$taxlocations = 'location';
			$taxpracticeareas = 'practice_area';	
		
			$stateterms = get_term_by('slug', $currentstate, $taxlocations);
			$statetermid = $stateterms->term_taxonomy_id;
			$statetermtitle = $stateterms->name;
			$statetermslug = $stateterms->slug;
	
		?>
		
		<h1><?php echo $statetermtitle;?> Lawyers template-location.php<br/>/lawyers-location/state/alaska-lawyers/</h1>

	</div><!-- internal_banner -->
	
	<div class="outer_container">
		
		<div class="directory_wrapper">
			
			<div class="breadcrumb_wrapper">
				
				<a href="<?php bloginfo('url');?>">Home</a> 
	
				<a href="<?php the_permalink(133);?>">Locations</a>
	
				<a><?php echo $statetermtitle;?></a>
				
			</div><!-- breadcrumb_wrapper -->
			
			<?php 
				
				if(get_field('content_blocks','option')) : 
					
					while(has_sub_field('content_blocks','option')) :
								
						if(get_sub_field('current_taxonomy') == $statetermid) :?>
								
									<div class="directory_description content">
			 			 
									<?php the_sub_field('block');?>
										
										</div><!-- directory_description -->
			
										<h2 class="section_header">Browse by city</h2>
			 		
			 				<?php endif;
		 			 		
				 		endwhile;
				 					
				 endif;	 ?>
			
			<div class="filter_by_search_wrapper">
				
				<input class="list_input desktop" type="text" placeholder="Filter<?php // single_term_title();?> Cities Below">
				
				<input class="list_input mobile" type="text" placeholder="Filter">
				
				<div class="filter_by_search_button"></div><!-- filter_by_search_button -->
				
			</div><!-- filter_by_search_wrapper -->
			
			<div class="list_wrapper">
				
				


				<?php 
					
				
	

				$termargs = array (
					'taxonomy' => $taxlocations,
					'parent' => $statetermid 
				);
				
				
				$terms = new WP_Term_Query( $termargs );
	
		
				if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
     
					echo '<ul>';
     
						foreach ( $terms->terms as $term ) {
	     
							echo '<li><a href="'. get_bloginfo('url') . '/lawyers-location/state/'. $statetermslug . '/' . $term->slug . '-lawyers">' . $term->name . '</a></li>';
        
     				}
     
		 			echo '</ul>';
     
     }
     
     	
    
    ?>

			</div><!-- list_wrapper -->
			
		</div><!-- directory_wrapper -->
		
	</div><!-- outer_container -->
	
</div><!-- internal_main -->
		

<?php get_footer(); ?>
