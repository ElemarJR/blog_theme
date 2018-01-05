<?php 
use Bookworm\Bookworm;
?>

<?php get_template_part( 'template-parts/blog/content-parts/category' )?>

<?php the_title( '<h1 class="entry-title hero--title">', '</h1>' ); ?>

<div class="entry-meta hero--meta">
	<div class="hero--meta--data hero--meta--data__date">
		<?php echo esc_html( get_the_date() ); ?>
	</div>
	
	<div class="hero--meta--data hero--meta--data__reading">
		<?php echo esc_html_e( 'Reading time:', 'elemarjr' ); ?>
		<?php echo esc_html( Bookworm::estimate( get_the_content(), ' min' ) ); ?>
	</div>
	
	<a class="hero--meta--data hero--meta--data__comments" href="<?php comments_link(); ?>">
		<?php echo esc_html_e( 'Comments' ); ?>:
	    	<?php echo esc_html( get_comments_number() ); ?>
	</a>
</div><!-- .entry-meta -->