<?php get_header(); ?>

<div class="section_inner">
	


<div class="breadcrumb office">
	
<ul>
<li><a href="<?php bloginfo('url');?>">Home</a>


<?php
$taxonomy = 'location'; // change this to your taxonomy
$terms = wp_get_post_terms( $post->ID, $taxonomy, array( "fields" => "ids") );
if( $terms ) {
  

  $terms = trim( implode( ',', (array) $terms ), ' ,' );
  
  wp_list_categories( 'title_li=&taxonomy=' . $taxonomy . '&include=' . $terms );

  
}
?>

</li>

<li><?php the_title();?></li>

</ul>

	
	<br/>
	<br/>
	<br/>
	
</div><!-- breadcrumb -->
	
<h1><?php the_title();?> Lawfirm</h1>

<br/>
<br/>

<?php the_field( 'lawfirm_or_office_bio' ); ?>

<br/>



<?php if(get_field('office_phone') == ('NULL') || empty(get_field('office_phone'))) {
	
	
}
		 
	
	else { ?>
		 
		 <p>Phone: <a href="tel:<?php the_field( 'office_phone' ); ?>"><?php the_field( 'office_phone' ); ?></a></p>


<?php } ?> 



<br/>

<?php if(get_field('office_address')):?>


<?php $address = get_field('office_address');
	
	
	$addressCleaned = str_replace(' ', '%20', $address); // this works but doesnt echo in ahref below?
	
?>
	
	
	<a href="https://www.google.com/maps/search/?api=1&query=<?php echo $addressCleaned;?>" target="_blank">
		
		<?php the_field('office_address');?>
		
	</a>
	
	
<!-- https://www.google.com/maps/search/?api=1&query=1200%20Pennsylvania%20Ave%20SE%2C%20Washington%2C%20District%20of%20Columbia%2C%2020003 -->


<br/>
<br/>

<?php endif;?>



<br/>



<?php $post_slug = get_post_field( 'post_name', get_post() ); 
	
	 $new_argsone = array(
		'post_type' => 'firm',
		'post_status'   => 'publish',
    'name' => $post_slug
		);
		
		
	 $mymain_queryone = new WP_Query($new_argsone); while($mymain_queryone->have_posts()) : $mymain_queryone->the_post();
	 
	
	 if(get_field('website_link') == ('NULL') || empty(get_field('website_link'))) {
		 
		 
		 }
		 
	 else { ?>
     	
     <a href="<?php the_field( 'website_link' ); ?>" target="_blank">Visit Site</a>
     
     <br/>
     <br/>
     
     (regex if already has http:// or https:// or http://www. or https://www. leave alone otherwise fix to have //)
     
     <br/><br/>
     
     like http://lawyerdirectory.1p21.io/office/hennigan-bennett-dorman-llp/
     		
     <br/>
     <br/>
		 
	 <?php }
	 
	 
	 
     	
   
                    	
                  
 endwhile; 
 wp_reset_postdata(); // reset the query ?>	


<br/>

<h2><?php the_field( 'lawfirm_parent_name' ); ?>'s Practice Areas in <?php the_field( 'office_city' ); ?></h2>

<?php $terms = get_the_terms( get_the_ID(), 'office_practice_area' );
	

                         
if ( $terms && ! is_wp_error( $terms ) ) { 
 		
 		echo "<ul>";
 		
   foreach ( $terms as $term ) {
        
        echo "<li>" . $term->name . "</li>";
    
    }
    
    echo "</ul>";
 
 } ?>


<hr/>

<br/>
<br/>
<br/>

<!-- attorneys -->

<h2><?php the_field( 'lawfirm_parent_name' ); ?>'s Lawyers in <?php the_field( 'office_city' ); ?></h2>



<?php 
	
	$term_names = wp_list_pluck( $terms, 'slug' );
	
	// getting an array of term slugs to use below in a tax query of the other cpt "lawyer". This is to reduce the amount of meta_queries to only specific terms.  This performance hit is unavoidable but doing it this way narrows down meta search from at least 550,000 to a range of 1 -40,000 depending on office post terms involved.  I am using term slugs because I am trying match office terms to exact lawyer terms. The two cpts (office and lawyers) have different term_ids but the same slugs. (I am also referenceing $terms higher up)
	
	//print_r($term_names);
	
	$lawyer_args = array (
		'post_type' => 'lawyer',
		'post_status'   => 'publish',
		'fields' => 'ids',
		'posts_per_page' => -1,
		'tax_query' => array(
			 array(
			   'taxonomy'  => 'practice_area',
			    'field'     => 'slug',
			    'terms'     => $term_names
			)
		),
	);


	$lawyerposts = new Wp_Query( $lawyer_args ); 
	

	$lawyer_ids = $lawyerposts->posts;



 $officeid = get_field('office_id');
	
	 $new_args = array(
    'post_type' => 'lawyer',
    'posts_per_page' => -1,
		'post__in' => $lawyer_ids, // pluck wasnt showing right array with integers
		'fields' => 'ids',
    'meta_query' => array(
        array(
           'key' => 'office_id',
           'value' => array($officeid)
        )
			)
);  



 ?>
 
 
 <div class="attorney_wrapper">


<?php $mymain_querytwo = new WP_Query($new_args); while($mymain_querytwo->have_posts()) : $mymain_querytwo->the_post(); ?>
                	
     
   <div class="attorney_single_wrapper">
     
     <h2 class="entry-title"><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h2>
     
		 <br/>

		 <?php $lawyer_profile_image = get_field( 'lawyer_profile_image' ); ?>
	
		 	<?php if ( $lawyer_profile_image ) { ?>
		
		 		<img src="<?php echo $lawyer_profile_image['url']; ?>" alt="<?php echo $lawyer_profile_image['alt']; ?>" />

		 	<?php } else { ?>

		 	<img style="width:200px;" src="<?php bloginfo('template_directory');?>/images/default.jpg"/>

		 <?php }?>


		 <br/>
		 <br/>

		 <h2><?php the_title(); ?>'s Practice Areas</h2>


<?php $terms = get_the_terms( get_the_ID(), 'practice_area' );
                         
if ( $terms && ! is_wp_error( $terms ) ) : 
 
    
 
    foreach ( $terms as $term ) {
        echo $term->name . "<br/>";
    }
                         
   
    
   ?>
 
    
<?php endif; ?>  

<?php if(get_field('years_licensed_for')):?>

<br/>
<br/>

<h2>Years Licensed For: <?php the_field( 'years_licensed_for' ); ?> </h2>

<?php endif;?>

<?php if(get_field('lawyer_bio')):?>

	<?php the_field( 'lawyer_bio' ); ?>

<?php endif;?>




<?php if(get_field('school_one_name') == ('NULL') || empty(get_field('school_one_name'))) {
	
	
}

else { ?>


<br/>
<br/>

	<h2>Education</h2>

	<p>School: <?php the_field( 'school_one_name' ); ?></p>
	
	<?php if(get_field('schoo_one_degree')):?>

		<p>Degree: <?php the_field( 'schoo_one_degree' ); ?></p>

	<?php endif;?>
	
	<?php if(get_field('school_one_year_graduated')):?>

		<p>Year Graduated: <?php the_field( 'school_one_year_graduated' ); ?></p>

	<?php endif;?>
		

<?php }?>




<?php if(get_field('school_two_name') == ('NULL') || empty(get_field('school_two_name'))) {
	
}

else { ?>
	
	<br/>
	
	<hr/>
	<br/>
	<br/>
	

	<p>School: <?php the_field( 'school_two_name' ); ?></p>
	
	<?php if(get_field('school_two_degree')):?>

		<p>Degree: <?php the_field( 'school_two_degree' ); ?></p>

	<?php endif;?>
	
	<?php if(get_field('school_two_year_graduated')):?>

		<p>Year Graduated: <?php the_field( 'school_two_year_graduated' ); ?></p>

	<?php endif;?>
		

<?php }?>

   </div><!-- attorney_single_wrapper -->
             	
                    	
                  
 <?php endwhile; ?>
<?php wp_reset_postdata(); // reset the query ?>	

<br/>
<br/>



</div><!-- attorney_wrapper -->


<br/><br/>

<!-- (also maybe other lawfirm locations with links can go here?) -->

</div><!-- secton inner -->



	

<?php get_footer(); ?>
