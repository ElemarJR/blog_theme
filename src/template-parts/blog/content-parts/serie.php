<?php

use Aztec\Taxonomy\Serie;

global $container;

/** @var Serie $serie_helper */
$serie_helper = $container->get( Serie::class );

$series = $serie_helper->get_post_terms( get_the_ID() );

foreach ( $series as $term ) :
?>
<a class="listing-post__serie" href="<?php echo esc_url( get_the_permalink() ) ?>">
	<?php echo esc_html( $term->name ) ?>
</a>
<?php endforeach; ?>
