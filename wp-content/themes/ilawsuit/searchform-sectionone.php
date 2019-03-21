<form action="<?php echo esc_url( home_url( '/results/' ) ); ?>" method="get">
				
	<div class="sec_one_input_wrapper">
	
		<div class="input_wrapper">
	
			<input type="text" name="mykeyword" id="search" placeholder="Attorney Name" value="<?php the_search_query(); ?>" />
			
		</div><!-- input_wrapper -->
	
		<div class="input_wrapper">
	
			<div class="sec_one_select_wrapper">
		
				<div class="sec_one_select">
			
					<span class="select_text">Type of Law</span><!-- select_text -->
			
				</div><!-- sec_one_select -->
				
				<div class="sec_one_select_dropdown">
					
					<ul>
						<li><span>Business</span></li>
						<li><span>Family Law</span></li>
						<li><span>Criminal Defense</span></li>
					</ul>
					
				</div><!-- sec_one_select_dropdown -->
		
			</div><!-- sec_one_select_wrapper -->
			
			<input id="typeoflaw" type="hidden" value="" name="customkeyword" />
	
		</div><!-- input_wrapper -->
	
		<div class="input_wrapper">
	
			<input type="text" placeholder="City or State" value="" name="custompa"/>
	
		</div><!-- input_wrapper -->
	
	</div><!-- sec_one_input_wrapper -->
	
	<div class="sec_one_submit_wrapper">
		
<!--
		<input type="hidden" value="1" name="sentence" />
			
		<input type="hidden" value="lawyer" name="post_type" />
-->
	
		<input type="submit" id="searchsubmit" value="Click to find a lawyer">
		
	</div><!-- sec_one_submit_wrapper -->
	
</form>