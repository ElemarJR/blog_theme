<?php

use Aztec\Taxonomy\Serie;

global $container;

/** @var Serie $serie_helper */
$serie_helper = $container->get( Serie::class );

$series = $serie_helper->get_post_terms( get_the_ID() );

if( false === $series ) {
	return;
}

foreach ( $series as $serie ) :
	$posts = $serie_helper->get_serie_posts( $serie );
?>
<div class="post-serie">
	<h3 class="post-serie--title"><?php echo sprintf( __( 'More posts in "%s" series:', 'elemarjr' ), $serie->name ); ?></h3>

	<ul class="post-serie--list">
		<?php
			foreach ( $posts as $serie_post ) :
				$item_class = 'post-serie--item';
				if ( get_the_ID() === $serie_post->ID ) {
					$item_class .= ' post-serie--item__current';
				}
			?>
			<li class="<?php echo esc_attr( $item_class ); ?>">
				<a class="post-serie--item--link" href="<?php echo esc_url( get_the_permalink( $serie_post ) ); ?>" title="<?php echo esc_attr( get_the_title( $serie_post ) ); ?>">
					<span class="post-serie--item--date">
						<?php echo esc_html( get_the_date( '', $serie_post ) ); ?>
					</span>
					<span class="post-serie--item--title">
						<?php echo esc_html( get_the_title( $serie_post ) ); ?>
					</span>
				</a>
			</li>
		<?php endforeach; ?>
	</ul>
</div>
<?php endforeach; ?>