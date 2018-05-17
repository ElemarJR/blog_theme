<?php

$series = get_the_terms( get_the_ID(), 'serie' );

if ( empty( $series ) ) {
	return;
}

foreach ( $series as $term ) :
?>
<a class="listing-post__serie" href="<?php echo esc_url( get_the_permalink() ) ?>">
	<?php echo esc_html( $term->name ) ?>
</a>
<?php endforeach; ?>
