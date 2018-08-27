<?php get_header(); ?>


<?php 	
	
	$currentcity = get_query_var( 'currentcity');
	$currentstate = get_query_var( 'currentstate');
	$currentpracticearea =  get_query_var( 'office_pa');
	
	
	$taxlocations = 'location';
	$taxpracticeareas = 'office_practice_area';
	
	
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

<div class="section_inner">
	
<div class="breadcrumb">
	
	<a href="<?php bloginfo('url');?>">Home</a>
	
	<a href="<?php the_permalink(554156);?>">Practice Areas</a> 
	
	<a class="" href="<?php bloginfo('url');?>/lawyers-practice/<?php echo $currentpracticearea;?>"><?php echo  $patermstitle;?></a>
	
	<a class="" href="<?php bloginfo('url');?>/lawyers-practice/<?php echo get_query_var( 'office_pa');?>/<?php echo get_query_var( 'currentstate');?>"><?php echo $statetermtitle;?></a>
	
	<a><?php echo $citytermtitle;?></a>
	
	<br/>
	<br/>
	<br/>
	<br/>
	
</div><!-- breadcrumb -->

<h1><?php echo $citytermtitle;?> <?php echo $patermstitle;?> Lawyers</h1>


<?php if(get_field('pa_location_content_blocks','option')) {
		 		 
		 	echo "<br/><br/>";
		 			 
		 	while(has_sub_field('pa_location_content_blocks','option')) {
			 			 
			 	if(get_sub_field('current_taxonomy') == $patermsid && (get_sub_field('current_location_taxonomy_state') == $statetermid) && get_sub_field('current_location_taxonomy_city') == $citytermid ) {
			 			 
			 		the_sub_field('block');
		 			 		
		 		}
		 			 	
		 	}
			
			if(is_user_logged_in()) {
	
		 			echo '<a href="' . get_bloginfo('url') .  '/wp-admin/admin.php?page=pa-locations-content-blocks-settings">Edit</a><br/><br/><br/>';
			 		
				}
		 		 
		}	?>





Browse by Lawfirm

<?php 
	
	$query_args = array (
		'post_type' => 'office',
		'fields' => 'ids',
		'posts_per_page' => -1,
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
	);
	
	echo "<ul>";
	
	$singlefirms = new WP_Query($query_args);
	
	
	
	while($singlefirms->have_posts()) : $singlefirms->the_post();?>
	
	
	<li>
	
	<a href="<?php the_permalink();?>"><?php the_title(); ?></a>
	
	</li>
  
  
  <?php endwhile;
	  
	  
  wp_reset_postdata();
  
  echo "</ul>";
  
  if(is_user_logged_in()) {
	
					echo '<a href="' . get_bloginfo('url') .  '/wp-admin/edit.php?post_type=office">Edit</a><br/><br/><br/>';
			 		
				}

	
	?>

</div>



<?php get_footer(); ?>
