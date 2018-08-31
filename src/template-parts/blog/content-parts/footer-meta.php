<?php
/**
 * The footer meta data.
 *
 * @package WordPress
 * @subpackage ElemarJr
 * @since 0.1.0
 * @version 0.1.0
 */

use Bookworm\Bookworm;
?>
<div class="listing-post--date">
	<?php echo esc_html( get_the_date() ); ?>
</div>

<div class="listing-post__footer__right">
	<span class="listing-post--reading">
		<?php echo esc_html( Bookworm::estimate( get_the_content(), 'M' ) ); ?>
		<i class="i-time"></i>
	</span>
	<a class="listing-post--comments" href="<?php comments_link(); ?>">
			<?php echo esc_html( get_comments_number() ); ?>
		<i class="i-comments"></i>
	</a>
</div>
