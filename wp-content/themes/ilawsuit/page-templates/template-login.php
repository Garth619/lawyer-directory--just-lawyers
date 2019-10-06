<?php 
	
	/* Template Name: Login */ ?>
	 
<?php wp_head(); ?>

<div class="custom_login">
	
	<div class="custom_login_inner">
		
		<?php echo file_get_contents("wp-content/themes/ilawsuit/images/ilawuit-logo-dark.svg"); ?>
		
		<div class="wp_login_error">
    
    <?php if( isset( $_GET['login'] ) && $_GET['login'] == 'failed' ) { ?>
        
        <p>The username/password you entered is incorrect, Please try again.</p>
    
    <?php } 
    
    else if( isset( $_GET['login'] ) && $_GET['login'] == 'loggedout' ) { ?>
        
        <p>Please enter both username and password.</p>
   
    <?php } ?>
	
	</div>   
		
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

<?php wp_footer();?>