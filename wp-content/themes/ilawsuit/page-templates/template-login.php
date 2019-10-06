<div class="custom_login">
	
	<div class="custom_login_inner">
		
		<?php echo file_get_contents("wp-content/themes/ilawsuit/images/ilawuit-logo-dark.svg"); ?>
		
		<?php
			if ( ! is_user_logged_in() ) { // Display WordPress login form:
				
			$args = array(
        'redirect' => admin_url(), 
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