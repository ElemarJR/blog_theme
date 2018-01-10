<?php
/**
 * The application container
 * 
 * @var DI\Container 
 */
global $container;
?>
<nav class="category-nav">
	<ul>
		<?php 
			$home_classes = array( 'cat-item' );
			if( is_home() ) {
				$home_classes[] = 'current-cat';
			}
			
			$home_url = $container->get( Aztec\Helper\Url::class )->get_post_page_url();
		?>
		<li class="<?php echo esc_attr( join( ' ', $home_classes ) ) ?>">
			<a href="<?php echo esc_url( $home_url ); ?>"><?php esc_html_e( 'Show All', 'elemarjr' ); ?></a>
		</li>
		<?php
			wp_list_categories( array(
				'title_li' => false
			) );
		?>
	</ul>
</nav>
