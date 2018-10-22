<?php
/**
 * The post meta data.
 *
 * @package WordPress
 * @subpackage ElemarJr
 * @since 0.1.0
 * @version 0.1.0
 */

use Bookworm\Bookworm;
?>

<div class="post--meta">
	<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" class="post--meta-author">
		<?php echo esc_html( get_the_author_meta( 'display_name' ) ); ?>
	</a><!-- .post--meta-author -->

	<div class="post--meta-date">
		<?php echo esc_html( get_the_date() ); ?>
	</div><!-- .post--meta-data -->

	<div class="post--meta-reading">
		<span class="post--icon__time"></span>
		<?php echo esc_html_e( 'reading time:', 'elemarjr' ); ?>
		<?php echo esc_html( Bookworm::estimate( get_the_content(), ' min' ) ); ?>
	</div><!-- .post--meta-reading -->
</div><!-- .post--meta -->
