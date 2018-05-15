<?php

use Aztec\Customize\Newsletter;

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
<div class="newsletter--wrapper">
	<div class="container newsletter">
		<h2 class="newsletter--title"><?php echo esc_html( get_theme_mod( $newsletter->get_theme_mod_control_id( $lang, 'title' ) ) ); ?></h2>
		<div class="newsletter--subtitle"><?php echo wp_kses_post( get_theme_mod( $newsletter->get_theme_mod_control_id( $lang, 'text' ) ) ); ?></div>
		<form class="form newsletter--form" method="post" action="https://elemarjr.us17.list-manage.com/subscribe/post?u=0ea74f86198646647c46d29cf&amp;id=cd82e1ff48" target="_blank">
			<span class="screen-reader-text"><?php esc_html_e( 'Type your email', 'elemarjr' ); ?></span>
			<input type="email" name="EMAIL" placeholder="<?php esc_attr_e( 'Type your email', 'elemarjr' ); ?>" required>

			<div class="newsletter--col-6">
				<span class="screen-reader-text"><?php esc_html_e( 'First Name', 'elemarjr' ); ?></span>
				<input class="col-6" type="text" name="FNAME" placeholder="<?php esc_attr_e( 'First Name', 'elemarjr' ); ?>" required>
				<span class="screen-reader-text"><?php esc_html_e( 'Last Name', 'elemarjr' ); ?></span>
				<input type="text" name="LNAME" placeholder="<?php esc_attr_e( 'Last Name', 'elemarjr' ); ?>" required>
			</div>

			<h4 class="newsletter--divisortitle"><?php esc_html_e( 'Content of Interest', 'elemarjr' ); ?></h4>

			<?php
				// @todo remove div element inner the div
				// @todo remove onclick calls using a JS file
			?>
			<div class="newsletter--col-6">
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
			</div>

			<div class="newsletter--col-6">
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

			<div class="form--submit-wrapper">
				<input type="submit" class="button button__white" value="<?php esc_attr_e( 'Subscribe', 'elemarjr' ); ?>">
			</div>
		</form>
	</div>
</div>
