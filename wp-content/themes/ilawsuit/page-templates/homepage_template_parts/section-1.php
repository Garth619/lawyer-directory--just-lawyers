<section id="section_one">
	
		<div class="sec_one_inner">
			
			<h1><?php the_field( 'section_one_title' ); ?></h1>
			
			<div class="sec_one_search_wrapper">
				
				<form action="/" method="get">
				
					<div class="sec_one_input_wrapper">
				
						<div class="input_wrapper">
				
							<input type="text" name="s" id="search" placeholder="Attorney Name" value="<?php the_search_query(); ?>" />
							
						</div><!-- input_wrapper -->
				
						<div class="input_wrapper">
					
							<div class="sec_one_select_wrapper">
						
								<div class="sec_one_select">
							
									<span class="select_text">Type of Law</span><!-- select_text -->
							
								</div><!-- sec_one_select -->
						
							</div><!-- sec_one_select_wrapper -->
					
						</div><!-- input_wrapper -->
				 
						<div class="input_wrapper">
					
							<input type="text" placeholder="City or State" value="" name="location"/>
				
						</div><!-- input_wrapper -->
				
					</div><!-- sec_one_input_wrapper -->
				 
					<div class="sec_one_submit_wrapper">
						
						<input type="hidden" value="1" name="sentence" />
							
						<input type="hidden" value="lawyer" name="post_type" />
				 
						<input type="submit" id="searchsubmit" value="Click to find a lawyer">
						
					</div><!-- sec_one_submit_wrapper -->
				
				</form>
			
			</div><!-- sec_one_search_wrapper -->
			
		</div><!-- sec_one_inner -->
	
		<img class="sec_one_bg" src="<?php bloginfo('template_directory');?>/images/hero-desk.jpg"/>
		
</section><!-- section_one -->

