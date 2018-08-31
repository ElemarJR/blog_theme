<?php
/**
 * Contect template class
 *
 * @package Aztec
 */

namespace Aztec\Pages;

use Aztec\Base;

/**
 * Contact features manipulation
 */
class Contact extends Base {

	/**
	 * The template path.
	 *
	 * @var string
	 */
	private $template = 'page-templates/contact.php';

	/**
	 * Doesn't show hero in the page
	 */
	public function init() {
		add_action( 'phpmailer_init', $this->callback( 'test_wp_mail' ), 10, 1 );
		add_action( 'wp_mail_failed', $this->callback( 'wp_mail_failed' ), 10, 1 );

		add_action( 'template_redirect', $this->callback( 'set_message' ) );

		add_filter( 'elemarjr_display_hero', $this->callback( 'hide_hero' ) );
		add_filter( 'elemarjr_site_content_bg', $this->callback( 'site_content_bg' ) );
	}

	/**
	 * Test WP Mail.
	 *
	 * @param  \PHPMailer $phpmailer PHPMailer instance.
	 * @return void
	 */
	public function test_wp_mail( \PHPMailer $phpmailer ) {
		$phpmailer->SMTPDebug   = 4;
		$phpmailer->Debugoutput = 'error_log';
	}

	/**
	 * WP mail fail.
	 *
	 * @param  array $error Error array.
	 * @return void
	 */
	public function wp_mail_failed( $error ) {
		error_log( 'failed' );
		error_log( print_r( $error, true ) );
		exit;
	}

	/**
	 * Set message.
	 */
	public function set_message() {
		$message    = false;
		$message_id = get_query_var( 'message', false );

		if ( false !== $message_id ) {

			$message = get_post_meta( get_the_id(), 'message_' . $message_id, true );
			if ( false === $message ) {
				$message_id = false;
			}
		}

		$this->container->set( 'contact.message_id', $message_id );
		$this->container->set( 'contact.message', $message );
	}

	/**
	 * Hide hero on contact page.
	 *
	 * @param  boolean $show Show hero.
	 * @return boolean
	 */
	public function hide_hero( $show ) {
		if ( is_page_template( $this->template ) ) {
			return false;
		}

		return $show;
	}

	/**
	 * Show featured image as background
	 *
	 * @param boolean $show Show featured image as background.
	 * @return boolean
	 */
	public function site_content_bg( $show ) {
		if ( is_page_template( $this->template ) ) {
			return true;
		}

		return $show;
	}
}
