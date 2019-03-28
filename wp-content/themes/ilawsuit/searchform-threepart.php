<div class="three_part_search_wrapper">

<form action="<?php bloginfo('url');?>/lawyer-search-test/" method="get">
				
	<div class="sec_one_input_wrapper">
	
		<div class="input_wrapper">
	
			<input type="text" name="attorney_keyword" id="search" placeholder="Attorney Name" value="<?php // the_search_query(); ?>" />
			
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
						<li><span>Real Estate</span></li>
						<li><span>Search All Types</span></li>
					</ul>
					
				</div><!-- sec_one_select_dropdown -->
		
			</div><!-- sec_one_select_wrapper -->
			
			<input id="typeoflaw" type="hidden" value="" name="attorney_pa" />
	
		</div><!-- input_wrapper -->
	
		<div class="input_wrapper">
	
			<input type="text" placeholder="City or State" value="" name="attorney_location"/>
	
		</div><!-- input_wrapper -->
	
	</div><!-- sec_one_input_wrapper -->
	
	<div class="sec_one_submit_wrapper">
			
			<input type="submit" id="searchsubmit" value="Click to find a lawyer">
		
	</div><!-- sec_one_submit_wrapper -->
	
</form>

</div><!-- three_part_search_wrapper -->