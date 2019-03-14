<?php get_header(); ?>

<?php 
	
	// this whole thing can probably be listed only once in the functions.php across all templates 
	
	$currentpracticearea = get_query_var( 'office_pa');
	$currentstate = get_query_var( 'currentstate');
	
	$taxlocations = 'location';
	$taxpracticeareas = 'practice_area';
	
	

	// pa url query -> pa id/title conversion
	
	$patermslug = get_term_by('slug', $currentpracticearea, $taxpracticeareas);
	
	$patermsid = $patermslug->term_taxonomy_id;
	
	$patermstitle = $patermslug->name;
	
	// state url query -> state id/title conversion
	
	$statetermslug = get_term_by('slug', $currentstate, $taxlocations);
	
	$statetermid = $statetermslug->term_taxonomy_id;
	
	$statetermtitle = $statetermslug->name;
	
?>



<div id="internal_main">
	
	<div class="internal_banner">
		
		<h1><?php echo $statetermtitle;?> <?php echo $patermstitle;?> Lawyers</h1>

	</div><!-- internal_banner -->
	
	<div class="outer_container">
		
		<div class="directory_wrapper">
			
			<div class="breadcrumb_wrapper">
				
				<a href="<?php bloginfo('url');?>">Home</a>
	
				<a href="<?php the_permalink(126);?>">Practice Areas</a>
	
				<a href="<?php bloginfo('url');?>/lawyers-practice/<?php echo $currentpracticearea;?>"><?php echo $patermstitle;?></a>
	
				<a><?php echo $statetermtitle;?></a>
			
			</div><!-- breadcrumb_wrapper -->
			
			<?php if(get_field('pa_location_content_blocks','option')) : ?>
		 		 
				<?php while(has_sub_field('pa_location_content_blocks','option')) :?>
			 			 
			 		<?php if(get_sub_field('current_taxonomy') == $patermsid && (get_sub_field('current_location_taxonomy_state') == $statetermid) && empty(get_sub_field('current_location_taxonomy_city')) ) :?>
			 	
				 		<div class="directory_description content">
				 			 
				 			<?php the_sub_field('block'); ?>
			 		
			 			</div><!-- directory_description -->
			
			 			<h2 class="section_header">Browse by city</h2>
		 			 		
			 		<?php endif;?>
		 			 	
			 <?php endwhile;?>
			
			 <?php endif;	?>
			 				
			 <div class="filter_by_search_wrapper">
				
					<input class="list_input desktop" type="text" placeholder="Filter<?php // echo $statetermtitle;?> Cities Below">
				
					<input class="list_input mobile" type="text" placeholder="Filter">
				
					<div class="filter_by_search_button"></div><!-- filter_by_search_button -->
				
			</div><!-- filter_by_search_wrapper -->
			
			<div class="list_wrapper">
				
				<?php
	
				$query_args = array (
					'post_type' => 'lawyer',
					'posts_per_page' => -1,
					'fields' => 'ids',
					'tax_query' => array(
						 array(
						   'taxonomy'  => $taxlocations,
						    'field'     => 'slug',
						    'terms'     => $currentstate,
						),
						array(
						   'taxonomy'  => $taxpracticeareas,
						    'field'     => 'slug',
						    'terms'     => $currentpracticearea,
						)
					),
				);


				$myposts = new Wp_Query( $query_args );


				// print_r($myposts->posts);

				// this might be redundant i think i already made a query like this up above
				$parentid = get_term_by('slug', $currentstate, 'location');$currentparentid = $parentid->term_id;


				$termargs = array (
					'taxonomy' => $taxlocations,
					'posts_per_page' => -1,
					//'fields' => 'all_with_object_id',
					'object_ids' => $myposts->posts,
					'parent' => $currentparentid,
			
				);

				$term_query = new WP_Term_Query( $termargs );

		
				if ( ! empty( $term_query ) && ! is_wp_error( $term_query ) ) {
			
				echo "<ul>";
			
				foreach ( $term_query ->terms as $term )
			
					echo '<li><a href="' . get_bloginfo('url') . '/lawyers-practice/' . $currentpracticearea . '/' . $currentstate . '/'  . $term->slug . '">' . $term->name . '</a></li>';
			
			}
			
			echo "</ul>";

			?>

								
			</div><!-- list_wrapper -->
			
		</div><!-- directory_wrapper -->
		
	</div><!-- outer_container -->
	
</div><!-- internal_main -->




<?php get_footer(); ?>
