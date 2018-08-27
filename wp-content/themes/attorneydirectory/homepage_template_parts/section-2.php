<section id="section_two">
	
	<div class="section_inner">
		
	<span>Practice Areas</span>
	
	
	<?php $top_practice_areas_terms = get_field( 'top_practice_areas' );
	
		if ( $top_practice_areas_terms ) {
				
			echo "<ul>";
		
			foreach ( $top_practice_areas_terms as $top_practice_areas_term ) { ?>
			
			
		
				<li><a href="<?php bloginfo('url');?>/lawyers-practice/<?php echo $top_practice_areas_term->slug;?>"><?php echo $top_practice_areas_term->name;?></a></li>
			
			<?php }
				
			echo "</ul>";

		} ?>
		
		<a class="see_all_pa" href="<?php the_permalink(126);?>">Don't see what your looking for? See All Practice Areas</a><!-- see_all_pa -->
	

		<?php edit_post_link( __( 'Edit'), '<br/><br/>', '' ); ?>

	</div><!-- section_inner -->

	
</section><!-- section_two -->