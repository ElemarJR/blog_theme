<?php
/**
 * Banner promotion component.
 *
 * @package WordPress
 * @subpackage ElemarJr
 * @since 0.1.0
 * @version 0.1.0
 */

use Aztec\Customize\Banner\Footer\Promotion;

global $container;

/**
 * Single post promotion object
 *
 * @var ContactBanner $spb
 */
$spb = $container->get( Promotion::class );

$lang = PLL()->curlang;

/**
 * Get banner background image
 */
$bg_images = $spb->get_background_images( $lang );

$text         = get_theme_mod( $spb->get_theme_mod_control_id( $lang, 'text' ) );
$button_url   = get_theme_mod( $spb->get_theme_mod_control_id( $lang, 'url' ) );
$button_label = get_theme_mod( $spb->get_theme_mod_control_id( $lang, 'label' ) );

if ( $text  ) :
?>
<div class="banner-contact <?php echo esc_attr( sanitize_title( $spb->slug ) ); ?>"
<?php
foreach ( $bg_images as $size => $url ) :
	echo ' data-bg-' . esc_attr( $size ) . '="' . esc_url( $url ) . '"';
endforeach;
?>
>
	<div class="banner-contact--text">
		<?php echo wp_kses_post( $text ); ?>
	</div>

	<?php if ( $button_url && $button_label ) : ?>
	<a class="button button__white" href="<?php echo esc_url( $button_url ); ?>" title="<?php echo esc_attr( $button_label ); ?>">
		<?php echo esc_html( $button_label ); ?>
	</a>
	<?php endif; ?>
</div>
<?php endif; ?>