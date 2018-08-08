<?php

global $container;

use Aztec\Helper\Url;

$args = $container->get( 'template.home.blog' );
$blog_id = get_option( 'page_for_posts' );
$query_args = [
	'posts_per_page' => 3,
];
$url_helper = new Url();
$see_more_url = '';

if( ! empty( $args['language'] )  ) {
	$language = $args['language'];
	$query_args['lang'] = $language;
	$see_more_url = $url_helper->get_another_language_post_url( $blog_id, $language );
}

if( '' === $see_more_url ) {
	$see_more_url = get_permalink( $blog_id );
}

$query = new WP_Query( $query_args );

?>
<p class="front-page--blog-description">
	<?php echo wp_kses_post( $args['description'] ); ?>
</p>

<div class="front-page--blog-list">
	<?php
		$container->set( 'post_list.query', $query );
		$container->set( 'post_list.extra_class', 'front-page--blog--list' );
		get_template_part( 'template-parts/blog/post-list' );

		if ( false !== $see_more_url ) :
	?>
	<div class="front-page--blog-actions">
		<a class="button button__transparent" href="<?php echo esc_url( $see_more_url ); ?>" class="see-more">
			<?php echo esc_html_e( 'See more', 'elemarjr' ) ?> <i class="i-arrow-right"></i>
		</a>
	</div>
	<?php endif; ?>
</div>
