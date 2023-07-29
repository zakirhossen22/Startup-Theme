
<?php

$post_type = get_theme_mod('ocean_menu_search_source', 'any'); ?>


<form method="get" class="search-form" id="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>" autocomplete="off">
	<input type="text" id="searchInput" class="field"  onkeyup="fetchResults()"  name="s" value="<?php echo get_search_query(); ?>" name="s" />

	<?php
	if('any' != $post_type) {
	?>
	<input type="hideen" name="post_type" value="<?php echo esc_attr($post_type); ?>"/>
	<?php
	}
	
	?>

	<!-- <input type="submit" class="search-submit" value="<?php echo esc_attr_x( 'Search', 'submit button', 'twentytwentyone' ); ?>" /> -->

	<div id="datafetch"></div>
</form>
