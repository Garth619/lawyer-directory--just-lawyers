<div class="search_form">

<form action="/" method="get">
    <label for="search"></label>
    <input type="text" name="s" placeholder="Search for Lawfirm or Lawyer" id="search" value="<?php the_search_query(); ?>" />
    <input type="submit" class="search-submit" value="<?php echo esc_attr_x( 'Search', 'submit button' ) ?>" />
</form>


</div><!-- search_form -->