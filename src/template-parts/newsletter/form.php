<?php

use Aztec\Customize\Newsletter;
use Aztec\Helper\BackgroundImage;

global $container;

/**
 * Newsletter customize object
 *
 * @var Newsletter $spb
 */
$newsletter = $container->get( Newsletter::class );

/**
 * Get the current lang object
 */
$lang = PLL()->curlang;

?>

<?php
	$bg_images = $container->get( BackgroundImage::class )->get_newsletter_bg_images( $newsletter->get_theme_mod_section_id() . '_background' );
?>
<div class="newsletter" <?php
	foreach ( $bg_images as $size => $url ) :
		echo ' data-bg-' . $size . '="' . esc_url( $url ) . '"';
	endforeach;
?>>
	<div class="container">
		<h2 class="newsletter--title">
			<?php echo esc_html( get_theme_mod( $newsletter->get_theme_mod_control_id( $lang, 'title' ) ) ); ?>
		</h2>
		<form class="form newsletter--form" method="post" action="https://elemarjr.us17.list-manage.com/subscribe/post?u=0ea74f86198646647c46d29cf&amp;id=cd82e1ff48" target="_blank">

			<div class="newsletter--inputs">
				<input type="email" name="EMAIL" placeholder="<?php esc_attr_e( 'Type your email', 'elemarjr' ); ?>" required>

				<input class="col-6" type="text" name="FNAME" placeholder="<?php esc_attr_e( 'First Name', 'elemarjr' ); ?>" required>

				<input type="text" name="LNAME" placeholder="<?php esc_attr_e( 'Last Name', 'elemarjr' ); ?>" required>
			</div>

			<h4 class="newsletter--divisortitle"><?php esc_html_e( 'Content of Interest', 'elemarjr' ); ?></h4>

			<div class="newsletter--options">
				<label for="evt-pale">
					<div class="newsletter--interest">
						<span><?php esc_html_e( 'Events in which I will speak', 'elemarjr' ); ?></span>
						<input id="evt-pale" class="newsletter--check" type="checkbox" name="group[4625][1]" value="1">
						<span class="checkmark"></span>
					</div>
				</label>

				<label for="cont-en">
					<div class="newsletter--interest">
						<span><?php esc_html_e( 'English content', 'elemarjr' ); ?></span>
						<input id="cont-en" class="newsletter--check" type="checkbox" name="group[4625][2]" value="2">
						<span class="checkmark"></span>
					</div>
				</label>

				<label for="cont-pt">
					<div class="newsletter--interest">
						<span><?php esc_html_e( 'Portuguese content', 'elemarjr' ); ?></span>
						<input id="cont-pt" class="newsletter--check" type="checkbox" name="group[4625][4]" value="4">
						<span class="checkmark"></span>
					</div>
				</label>

				<label for="ofrt-prom">
					<div class="newsletter--interest">
						<span><?php esc_html_e( 'Offers and Promotions', 'elemarjr' ); ?></span>
						<input id="ofrt-prom" class="newsletter--check" type="checkbox" name="group[4625][8]" value="8">
						<span class="checkmark"></span>
					</div>
				</label>
			</div>

			<p class="newsletter--check-validation-message">
				<?php esc_html_e( 'Select at least one interest', 'elemarjr' ); ?>
			</p>

			<div class="newsletter--actions">
				<input type="submit" class="button button__white" value="<?php esc_attr_e( 'Subscribe', 'elemarjr' ); ?>">
			</div>
		</form>
	</div>
</div>
