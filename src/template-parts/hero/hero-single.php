<?php
use Bookworm\Bookworm;
?>

<?php get_template_part( 'template-parts/blog/content-parts/category' )?>

<?php get_template_part( 'template-parts/blog/content-parts/serie' )?>

<?php the_title( '<h1 class="entry-title hero--title">', '</h1>' ); ?>

<div class="post--meta">
	<div class="post--meta-author">
		<?php echo esc_html( get_the_author() ); ?>
	</div>

	<div class="post--meta-date">
		<?php echo esc_html( get_the_date() ); ?>
	</div>

	<div class="post--meta-reading">
		<?php echo esc_html_e( 'Reading time:', 'elemarjr' ); ?>
		<?php echo esc_html( Bookworm::estimate( get_the_content(), ' min' ) ); ?>
	</div>

	<a class="post--meta-comments" href="<?php comments_link(); ?>">
		<?php echo esc_html_e( 'Comments' ); ?>:
	    <?php echo esc_html( get_comments_number() ); ?>
	</a>
</div><!-- .entry-meta -->