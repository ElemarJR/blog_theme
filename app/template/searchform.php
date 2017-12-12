<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ) ?>">
	<label>
		<span class="screen-reader-text"><?php echo esc_html_x( 'Search for:', 'label' ) ?></span>
		<input type="search" class="search-field" value="<?php echo get_search_query() ?>" name="s" />
	</label>
	<button type="submit" class="search-submit"></button>
</form>
