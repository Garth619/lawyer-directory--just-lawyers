<?php if ( ! have_posts() ) : ?>
	
	
	<div id="post-0" class="post error404 not-found">
		
		<h2>Not Found</h2>
		
		<div class="entry-content">
			<p>Apologies, but no posts have been created</p>
			
		</div><!-- .entry-content -->
	</div><!-- #post-0 -->


<?php endif; ?>


<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

		
		<div class="single_lawfirm">
		
			<a href="<?php the_permalink();?>"><?php the_title();?></a><br/><br/>
			
			<?php if(get_field('office_phone') == ('NULL') || empty(get_field('office_phone'))) {
	
			}
		 
	
			else { ?>
		 
			<p>Phone: <a href="tel:<?php the_field( 'office_phone' ); ?>"><?php the_field( 'office_phone' ); ?></a></p>


			<?php } ?> 
			
			<?php if(get_field('office_address')):?>


				<?php the_field('office_address');?>


			<?php endif;?>


			<?php edit_post_link( __( 'Edit'), '', '' ); ?>
			
		
		</div><!-- single_lawfirm -->
			
		
<?php endwhile; // end of loop ?>

<?php endif; ?>



<?php wpbeginner_numeric_posts_nav(); ?>