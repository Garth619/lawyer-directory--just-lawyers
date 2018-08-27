<?php get_header(); ?>


<div class="section_inner">	
	
	<div class="breadcrumb">
	
	<a href="<?php bloginfo('url');?>">Home</a>
	
	<br/>
	<br/>
	<br/>
	<br/>
	
</div><!-- breadcrumb -->


<?php if ( have_posts() ) : ?>

	
				
	<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'twentyten' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
	
	<div class="search"><?php get_search_form(); ?></div><!-- search -->
				
	<div class="search_wrapper">
			
		<?php get_template_part( 'loop', 'search' ); ?>
	
	</div><!-- search_wrapper -->
				
				
		<?php else : ?>
		
				
		<h1>Nothing Found</h1>
		
					
		<p>Sorry, but nothing matched your search criteria. Please try again with some different keywords.</p>
		
		<div class="search_wrapper">
						
				
		<?php get_search_form(); ?>
		
		</div><!-- search_wrapper -->
					
	<?php endif; ?>
	
	

</div><!-- section_inner -->
		
<?php get_footer(); ?>
