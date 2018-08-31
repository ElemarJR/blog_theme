<?php
/**
 * The post list.
 *
 * @package WordPress
 * @subpackage ElemarJr
 * @since 0.1.0
 * @version 0.1.0
 */

global $container;

$query       = $container->get( 'post_list.query' );
$extra_class = $container->get( 'post_list.extra_class' );
?>
<div class="post-list--wrapper">
	<div class="post-list--loading"><?php esc_html_e( 'Loading posts...', 'elemarjr' ); ?></div>
	<div class="post-list <?php echo esc_attr( $extra_class ); ?>">
		<?php
		while ( $query->have_posts() ) :
			$query->the_post();
			get_template_part( 'template-parts/blog/content' );
			endwhile;
			wp_reset_postdata();
		?>
	</div>
</div>
