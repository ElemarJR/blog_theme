<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of <pages></pages>
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * Template name: Contact
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage ElemarJr
 * @since 0.1.0
 * @version 0.1.0
 */

use Aztec\Form\Contact as ContactForm;
use Aztec\Pages\Contact;

global $container;

/** @var ContactForm $form */
$form   = $container->get( ContactForm::class );
$values = $form->get_flash();

/** @var Contact $contact */
$contact = $container->get( Contact::class );

get_header(); ?>

<main>
	<?php
	while ( have_posts() ) :
		the_post();
		?>
	<article id="post-<?php the_ID(); ?>" <?php post_class( 'contact' ); ?>>
		<div class="container">
			<div class="page-header">
				<h1 class="page-header--title">
				<?php echo wp_kses_post( $contact->title() ); ?>
				</h1>
			</div>

			<p class="contact--subtitle">
			<?php echo wp_kses_post( get_post_meta( get_the_ID(), 'subtitle', true ) ); ?>
			</p>

			<p class="contact--description">
			<?php echo wp_kses_post( get_post_meta( get_the_ID(), 'description', true ) ); ?>
			</p>

		<?php
		$message_id = $container->get( 'contact.message_id' );

		if ( false !== $message_id ) :
			get_template_part( 'template-parts/contact/message', 'success' === $message_id ? 'success' : 'error' );
			endif;
		?>

			<form action="<?php echo esc_url( $form->get_action() ); ?>" method="POST" class="contact--form form">
				<label for="name">
					<span class="screen-reader-text"><?php esc_html( $form->get_label( 'name' ) ); ?></span>
					<input type="text" name="name" placeholder="<?php echo esc_attr( $form->get_label( 'name' ) ); ?>" value="<?php echo esc_attr( $values['name'] ); ?>" required />
				</label>
				<label for="email">
					<span class="screen-reader-text"><?php esc_html( $form->get_label( 'email' ) ); ?></span>
					<input type="text" name="email" placeholder="<?php echo esc_attr( $form->get_label( 'email' ) ); ?>" value="<?php echo esc_attr( $values['email'] ); ?>" required />
				</label>
				<label for="message">
					<span class="screen-reader-text"><?php esc_html( $form->get_label( 'message' ) ); ?></span>
					<textarea name="message" placeholder="<?php echo esc_attr( $form->get_label( 'message' ) ); ?>" required><?php echo esc_textarea( $values['message'] ); ?></textarea>
				</label>
				<div class="form--submit-wrapper">
					<input type="submit" class="button button__bordered" value="<?php echo esc_attr_e( 'Send', 'elemarjr' ); ?>" />
				</div>
			</form>
		</div>
	</article>
	<?php endwhile; ?>
</main>

<?php get_footer(); ?>
