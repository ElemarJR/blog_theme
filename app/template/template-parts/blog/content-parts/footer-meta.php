<?php

use Bookworm\Bookworm;

?>
<div class="listing-post__date">
	<?php echo esc_html( get_the_date() ); ?>
</div>

<div class="listing-post__footer__right">
	<span>
		<?php echo esc_html( Bookworm::estimate( get_the_content(), 'M' ) ); ?>
	</span>
	<i class="i-time"></i>
	<a class="listing-post__comments" href="<?php comments_link(); ?>">
	    <span>
	    		<?php echo esc_html( get_comments_number() ); ?>
	    	</span>
		<i class="i-comments"></i>
	</a>
</div>
