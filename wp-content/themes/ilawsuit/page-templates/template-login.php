<div class="custom_login">
	
	<div class="custom_login_inner">
		
		<?php echo file_get_contents("wp-content/themes/ilawsuit/images/ilawuit-logo-dark.svg"); ?>
		
<!--
		<?php $current_user = wp_get_current_user();
			
			$current_user_id = $current_user->ID;
			
			echo $current_user_id;
			
			$author_args = array(
				'posts_per_page' => 1,
				'post_status' => 'publish',
				'author' => $current_user_id,
				'orderby' => 'date',
				'order' => 'ASC',
			);
			
			$first_post = new WP_Query($args);
			
			if ($first_post->have_posts()) {
			
			$first_post->the_post();

    // Now you can use `the_title();` etc.

    wp_reset_postdata();
}
			
		?>
-->
		
		<?php
			if ( ! is_user_logged_in() ) { // Display WordPress login form:
				
			$args = array(
        //'redirect' => admin_url(), 
        'form_id' => 'loginform-custom',
        'label_username' => __( 'Username' ),
        'label_password' => __( 'Password' ),
        'label_remember' => __( 'Remember Me' ),
        'label_log_in' => __( 'Log In' ),
        'remember' => true
			);
			
			wp_login_form( $args );
		} 
?>
	
	<span class="back_to_site">Back to Site</span><!-- back_to_site -->
		
	</div><!-- custom_login_inner -->
	
</div><!-- custom_login -->