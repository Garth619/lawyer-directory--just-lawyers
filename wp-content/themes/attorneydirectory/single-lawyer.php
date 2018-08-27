<?php get_header(); ?>

<div class="section_inner">

<div class="breadcrumb">
	

	<a href="<?php bloginfo('url');?>">Home</a>
	
	<?php $officeid = get_field('office_id');
	
	$new_argsone = array(
    'post_type' => 'office',
    'meta_query' => array(
        array(
            'key' => 'office_id',
						'value' => array($officeid)
        )
    )
		); 


 $mymain_queryone = new WP_Query($new_argsone); while($mymain_queryone->have_posts()) : $mymain_queryone->the_post(); ?>
                	
     	
     <a href="<?php the_permalink();?>"><?php the_title();?></a>
     
     

     	<br/>
     	<br/>
                    	
                  
 <?php endwhile; 
 wp_reset_postdata(); // reset the query ?>	

	
	<br/>
	<br/>
	<br/>
	
</div><!-- breadcrumb -->
	
<h1><?php the_title();?></h1>

<br/>
<br/>

<?php $lawyer_profile_image = get_field( 'lawyer_profile_image' ); ?>
	
	<?php if ( $lawyer_profile_image ) { ?>
		
		<img src="<?php echo $lawyer_profile_image['url']; ?>" alt="<?php echo $lawyer_profile_image['alt']; ?>" />

	<?php } else { ?>

		<img style="width:200px;" src="<?php bloginfo('template_directory');?>/images/default.jpg"/>

<?php }?>

<br/>
<br/>

<?php 
	
	$lawfirmtitle = $mymain_queryone->posts[0]->post_title;
	
	$lawfirmslug = $mymain_queryone->posts[0]->post_name;
	
	$lawfirmid =  $mymain_queryone->posts[0]->ID;
	
?>

Lawfirm: <a href="<?php bloginfo('url');?>/office/<?php echo $lawfirmslug;?>"><?php echo $lawfirmtitle;?></a>

<br/>
<br/>

<?php if(get_field('office_phone', $lawfirmid) == ('NULL') || empty(get_field('office_phone', $lawfirmid))) {
	
	
	}
	
	else {?>

Phone: <a href="tel:<?php the_field('office_phone', $lawfirmid);?>"><?php the_field('office_phone', $lawfirmid);?></a>


<?php } ?>

<br/>
<br/>

<h2>Practice Areas</h2>


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




</div>
	

<?php get_footer(); ?>
