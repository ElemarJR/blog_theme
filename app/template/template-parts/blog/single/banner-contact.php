<?php 
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

?>
<div class="banner-contact">
	<div class="banner-contact--content">
		<h2 class="banner-contact--title">
			<?php echo wp_kses_post( get_theme_mod( $spb->get_theme_mod_control_id( $lang, 'title' ) ) ); ?>
		</h2>
		<h4 class="banner-contact--subtitle">
			<?php echo wp_kses_post( get_theme_mod( $spb->get_theme_mod_control_id( $lang, 'text' ) ) ); ?>
		</h4>

		<?php $button_label = get_theme_mod( $spb->get_theme_mod_control_id( $lang, 'label' ) ); ?>
		<a class="button button__tiffany" href="<?php echo esc_url( get_theme_mod( $spb->get_theme_mod_control_id( $lang, 'url' ) ) ) ?>" title="<?php echo esc_attr( $button_label ); ?>">
			<?php echo esc_html( $button_label ); ?>
		</a>
	</div>
</div>