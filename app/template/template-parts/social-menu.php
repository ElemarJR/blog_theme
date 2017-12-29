<?php
wp_nav_menu( array(
	'theme_location' => 'social',
	'menu_id'        => 'social-menu',
	'menu_class'     => 'follow-us--menu',
	'depth'          => 1,
	'link_before'    => '<span class="screen-reader-text">',
	'link_after'     => '</span>',
) );
