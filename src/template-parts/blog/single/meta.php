<?php
use Bookworm\Bookworm;
?>

<div class="post--meta">
	<a href="<?php the_author_link(); ?>" class="post--meta-author">
		<?php echo esc_html( get_author_name() ); ?>
	</a><!-- .post--meta-author -->

	<div class="post--meta-date">
		<?php echo esc_html( get_the_date() ); ?>
	</div><!-- .post--meta-data -->

	<div class="post--meta-reading">
		<span class="post--icon__time"></span>
		<?php echo esc_html_e( 'Reading time:', 'elemarjr' ); ?>
		<?php echo esc_html( Bookworm::estimate( get_the_content(), ' min' ) ); ?>
	</div><!-- .post--meta-reading -->
</div><!-- .post--meta -->