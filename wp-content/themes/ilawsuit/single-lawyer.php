<?php get_header(); ?>

<div class="section_inner">
	
	<div class="breadcrumb">
	
		<a href="<?php bloginfo('url');?>">Home</a>
	
		<a><?php the_title();?></a>
	
	</div><!-- breadcrumb -->

		<br/><br/><br/>
		
		<h1><?php the_title();?></h1>
		
		<br/><br/>
		
		<?php $lawyer_profile_image = get_field( 'lawyer_profile_image' ); ?>
	
		<?php if ( $lawyer_profile_image ) { ?>
		
			<img src="<?php echo $lawyer_profile_image['url']; ?>" alt="<?php echo $lawyer_profile_image['alt']; ?>" />

			<?php } else { ?>

			<img style="width:200px;" src="<?php bloginfo('template_directory');?>/images/default.jpg"/>

		<?php }?>
		
		<br/><br/>
		
		<?php if(get_field('lawyer_phone') == ('NULL') || empty(get_field('lawyer_phone'))) {
	
	
			}
	
			else {?>

			Phone: <a href="tel:<?php the_field('lawyer_phone');?>"><?php the_field('lawyer_phone');?></a>


		<?php } ?>
		
		<br/><br/>
		
		<?php if(get_field('lawfirm_name')) {?>
		
		<br/><br/>
		
		<?php the_field('lawfirm_name');?>
		
		<?php }?>
		
		<?php if(get_field('lawyer_website') == ('NULL') || empty(get_field('lawyer_website'))) {
		 
		 
		 }
		 
	 else { ?>
     	
     <a href="<?php the_field( 'lawyer_website' ); ?>" target="_blank">Visit Site</a>
     
     <br/>
     <br/>
     
     (regex if already has http:// or https:// or http://www. or https://www. leave alone otherwise fix to have //)
     
     <br/><br/>
     
     like http://lawyerdirectory.1p21.io/office/hennigan-bennett-dorman-llp/
     		
     <br/>
     <br/>
		 
	 <?php }?>
		
		<?php if(get_field('lawyer_address')):?>


<?php $address = get_field('lawyer_address');
	
	
	$addressCleaned = str_replace(' ', '%20', $address); // this works but doesnt echo in ahref below?
	
?>
	
	
	<a href="https://www.google.com/maps/search/?api=1&query=<?php echo $addressCleaned;?>" target="_blank">
		
		<?php the_field('lawyer_address');?>
		
	</a>
	
	
<!-- https://www.google.com/maps/search/?api=1&query=1200%20Pennsylvania%20Ave%20SE%2C%20Washington%2C%20District%20of%20Columbia%2C%2020003 -->


<br/>
<br/>

<?php endif;?>

		
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
	
	<?php if(get_field('school_one_degree') == ('NULL') || get_field('school_one_degree') == ('N/A') || empty(get_field('school_one_degree'))) {
		
		
	}
	
	else {?>

		<p>Degree: <?php the_field( 'school_one_degree' ); ?></p>

	<?php } ?>
	
	<?php if(get_field('school_one_major') == ('NULL') || get_field('school_one_major') == ('N/A') || empty(get_field('school_one_major'))) {
		
		
	}
	
	else { ?>

		<p>Major: <?php the_field( 'school_one_major' ); ?></p>

	<?php } ?>
	
	<?php if(get_field('school_one_year_graduated') == ('NULL') || get_field('school_one_major') == ('N/A') || empty(get_field('school_one_year_graduated'))) {
		
		}
		
		else { ?>

		<p>Year Graduated: <?php the_field( 'school_one_year_graduated' ); ?></p>

	<?php } ?>
		

<?php }?>




<?php if(get_field('school_two_name') == ('NULL') || get_field('school_two_name') == ('N/A') || empty(get_field('school_two_name'))) {
	
}

else { ?>
	
	<br/>
	
	<hr/>
	<br/>
	<br/>
	

	<p>School: <?php the_field( 'school_two_name' ); ?></p>
	
	<?php if(get_field('school_two_degree') == ('NULL') || get_field('school_two_degree') == ('N/A') || empty(get_field('school_two_degree'))) {
		
		
	}
	
	else { ?>

		<p>Degree: <?php the_field( 'school_two_degree' ); ?></p>

	<?php }?>
	
	<?php if(get_field('school_two_major') == ('NULL') || get_field('school_two_major') == ('N/A') || empty(get_field('school_two_major'))) {
		
		
	}
	
	else { ?>

		<p>Major: <?php the_field( 'school_two_major' ); ?></p>

	<?php } ?>
	
	<?php if(get_field('school_two_year_graduated') == ('NULL') || get_field('school_two_year_graduated') == ('N/A') || empty(get_field('school_two_year_graduated'))) {
		
		
		}
		
		else { ?>

		<p>Year Graduated: <?php the_field( 'school_two_year_graduated' ); ?></p>

	<?php }?>
		

<?php }?>

	
			<?php edit_post_link( __( 'Edit'), '', '' ); ?>



</div><!-- section_inner -->


<?php get_footer(); ?>
