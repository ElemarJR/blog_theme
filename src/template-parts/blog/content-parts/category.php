<?php 

$categories = get_the_category();

if ( empty( $categories ) ) {
	return;
}

?>
<ul class="listing-post__categories">
	<?php foreach ( $categories as $term ) : ?>
	<li>
		<a href="<?php echo esc_url( get_term_link( $term, 'category' ) ) ?>">
			<?php echo esc_html( $term->name ) ?>
		</a>
	</li>
	<?php endforeach; ?>
</ul>
