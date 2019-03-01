<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() )
		echo esc_html( ' | ' . sprintf( __( 'Page %s', 'twentyten' ), max( $paged, $page ) ) );

	?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />



<style>


<?php the_field( 'review_css','option'); ?>

@import url('https://fonts.googleapis.com/css?family=Montserrat:800|Prata|Work+Sans');

</style>

<?php wp_head(); ?>

<?php the_field('schema_code', 'option'); ?>

<?php the_field('analytics_code', 'option'); ?>

</head>

<body <?php body_class(); ?>>
	
	
	<header>
		
		<div class="header_left">
			
			<a class="" href="">
				
				<img src="<?php bloginfo('template_directory');?>/images/ilawuit-logo.svg"/>
				
			</a>
			
		</div><!-- header_left -->
		
		<div class="header_middle">
			
			<div class="search_wrapper"><?php get_search_form(); ?></div><!-- search_wrapper -->
			
		</div><!-- header_middle -->
		
		<div class="header_right">
			
			<div class="menu_wrapper">
				
				<div class="menu_bars">
				
					<span class="menu_bar"></span><!-- menu_bar -->
					<span class="menu_bar"></span><!-- menu_bar -->
					<span class="menu_bar"></span><!-- menu_bar -->
				
				</div><!-- menu_bars -->
			
				<span class="menu_title">Menu</span><!-- menu_title -->
			
			</div><!-- menu_wrapper -->
			
		</div><!-- header_right -->
		
	</header>
				

<?php // wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'main_menu' ) ); ?>
			