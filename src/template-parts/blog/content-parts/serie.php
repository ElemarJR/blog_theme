<?php
/**
 * Display the post serie name
 *
 * The link over the series name is the term archive link in single and the post link in the post listing.
 */
use Aztec\Taxonomy\Serie;

global $container;

/** @var Serie $serie_helper */
$serie_helper = $container->get( Serie::class );

$series = $serie_helper->get_post_terms( get_the_ID() );

if( false === $series ) {
	return;
}

foreach ( $series as $term ) :
	$link = is_single() ? $serie_helper->get_serie_link( $term ) : get_the_permalink();
?>
<a class="listing-post__serie" href="<?php echo esc_url( $link ) ?>">
	<?php echo esc_html( $term->name ) ?>
</a>
<?php endforeach; ?>
