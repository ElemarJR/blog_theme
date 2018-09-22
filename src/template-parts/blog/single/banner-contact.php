<?php
/**
 * Banner contact component.
 *
 * @package WordPress
 * @subpackage ElemarJr
 * @since 0.1.0
 * @version 0.1.0
 */

use Aztec\Customize\SinglePostBanner;

global $container;

/**
 * Single post banner object
 *
 * @var SinglePostBanner $spb
 */
$spb = $container->get( SinglePostBanner::class );

/**
 * Get the current lang object
 */
$lang = PLL()->curlang;

/**
 * Get banner background image
 */
$bg_images = $spb->get_background_images( $lang );

?>
<div class="banner-contact"
<?php
foreach ( $bg_images as $size => $url ) :
	echo ' data-bg-' . esc_attr( $size ) . '="' . esc_url( $url ) . '"';
endforeach;
?>
		>
	<div class="banner-contact--text">
		<?php echo wp_kses_post( get_theme_mod( $spb->get_theme_mod_control_id( $lang, 'text' ) ) ); ?>
	</div>

	<?php $button_label = get_theme_mod( $spb->get_theme_mod_control_id( $lang, 'label' ) ); ?>
	<a class="button button__white" href="<?php echo esc_url( get_theme_mod( $spb->get_theme_mod_control_id( $lang, 'url' ) ) ); ?>" title="<?php echo esc_attr( $button_label ); ?>">
		<?php echo esc_html( $button_label ); ?>
	</a>
</div>
