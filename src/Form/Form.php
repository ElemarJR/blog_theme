<?php
/**
 * Form class
 *
 * @package Aztec
 */

namespace Aztec\Form;

use Aztec\Base;
use DI\Container;
use Aztec\Integration\Polylang\Polylang;

/**
 * Manage the compare properties system
 */
class Form extends Base {

	/**
	 * The query var to get the that is submiting
	 *
	 * @var string
	 */
	protected $query_var = 'form';

	/**
	 * The slug of the form
	 *
	 * The slug must be unique and is seted in the children class.
	 *
	 * @var string
	 */
	protected $slug;

	/**
	 * The list of fields of the form
	 *
	 * An associative array where the key is the name of the field and the
	 * value is the label.
	 *
	 * This list is useful to print the name and the label value in the form
	 * HTML.
	 *
	 * @var string[string]
	 */
	protected $fields;
	
	/**
	 * Define form slug and fields
	 *
	 * @param Container $container The dependency injection container.
	 */
	public function __construct( Container $container ) {
		parent::__construct( $container );
	}

	/**
	 *
	 * {@inheritDoc}
	 *
	 * @see \Aztec\Base::init()
	 */
	public function init() {
		add_action( 'init', $this->callback( 'rewrite_rule' ) );
		add_action( 'template_redirect', $this->callback( 'process_form' ) );

		add_filter( 'query_vars', $this->callback( 'query_vars' ) );
	}

	/**
	 * Add rewrite rule to submit the form
	 */
	public function rewrite_rule() {
		add_rewrite_rule( 'submit/([^/]+)?$', "index.php?{$this->query_var}=\$matches[1]", 'top' );
	}

	/**
	 * Add query var to the query var list
	 *
	 * @param string[] $qv The current query vars list.
	 * @return string[] The query vars list adding the form var.
	 */
	public function query_vars( $qv ) {
		$qv[] = $this->query_var;
		$qv[] = 'message';
		return $qv;
	}

	/**
	 * Process a form if is a submit request
	 *
	 * Get form objects and verify if the request correspond with the form that
	 * the form represents.
	 *
	 * Send a email with to the email setted in admin and redirect to the page
	 * setted in admin to.
	 *
	 * @todo Validate if mail was sent
	 */
	public function process_form() {		
		if ( false !== ( $form_slug = get_query_var( $this->query_var, false ) ) ) {
			if( ! $this->container->get( Polylang::class )->is_active() ) {
				wp_safe_redirect( add_query_arg( 'message', 'not-sent', $_SERVER['HTTP_REFERER'] ) );
				exit;
			}
			
			foreach ( $this->container->get( 'forms' ) as $form ) {
				$form_object = $this->container->get( $form );
				if ( $form_slug === $form_object->get_slug() ) {					
					$curlang = PLL()->curlang;
					$message = 'success';
					$email = get_theme_mod( $form_object->get_theme_mod_control_id( $curlang, 'email' ), false );
					$subject = get_theme_mod( $form_object->get_theme_mod_control_id( $curlang, 'subject' ), false );	
					
					if( false === $email ) {
						$message = 'not-sent';
					}
					
					if ( $form_object->is_spam() ) {
						$message = 'spam';
					}
					
					$values = $form_object->get_values();
					foreach( $values as $value ) {
						if ( '' === $value ) {
							$message = 'empty';
						}
					}
					
					if( 'success' === $message ) {
						$sent = wp_mail(
							'pittol@aztecweb.net', // @todo configure this data in admin
							'Assunto do e-mail',
							$form_object->get_message(),
							array(
								'Content-Type: text/html; charset=UTF-8',
								sprintf(
									'From: %s <%s>',
									$values['name'],
									get_bloginfo( 'admin_email' )
								),
								sprintf(
									'Reply-to: %s <%s>',
									$values['name'],
									$values['email']
								),
							)
						);
						
						if ( ! $sent ) {
							$message = 'not-sent';
						}
					}
					
					if( 'success' !== $message ) {
						$form_object->set_flash();
					}
					
					wp_safe_redirect( add_query_arg( 'message', $message, $_SERVER['HTTP_REFERER'] ) );
					exit;
				}
			}
		}
	}

	/**
	 * Get the form slug
	 *
	 * @return string
	 */
	public function get_slug() {
		return $this->slug;
	}

	/**
	 * Get the label from a field
	 *
	 * If the field value is an array, the label is the key `label`. Otherwise,
	 * the label is the string.
	 *
	 * @param string $key The field name.
	 * @return string The field label.
	 */
	public function get_label( $key ) {
		return is_array( $this->fields[ $key ] ) ? $this->fields[ $key ]['label'] : $this->fields[ $key ];
	}

	/**
	 * Get the type of the field
	 *
	 * If the field value is an array and has the `type` value, the type is
	 * this value. Otherwise, the type is defined as text.
	 *
	 * @param string $key The field name.
	 * @return string The field type.
	 */
	public function get_type( $key ) {
		return isset( $this->fields[ $key ]['type'] ) ? $this->fields[ $key ]['type'] : 'text';
	}

	/**
	 * Get the form submit action URL
	 *
	 * This url is based on the rewrite rule added in the rewrite_rule
	 * function.
	 *
	 * @return string The action URL.
	 */
	public function get_action() {
		return home_url( '/submit/' . $this->slug );
	}

	/**
	 * Get the form message to send by e-mail
	 *
	 * @return \WP_Error|string The HTML string with the form values. Will
	 *                          return an error if the form wasn`t submitted.
	 */
	public function get_message() {
		$referer = $_SERVER['HTTP_REFERER'];

		$message = '';
		foreach ( $this->get_values() as $field => $value ) {
			if ( 'textarea' === $this->get_type( $field ) ) {
				$field_content = nl2br( $value );
				$field_content = '<br>' . $field_content;
			} else {
				$field_content = sanitize_text_field( $value );
			}

			$message .= sprintf( '<strong>%s:</strong> %s<br/>', $this->get_label( $field ), $field_content );
		}

		$message .= '<br><br>---<br>';
		$message .= sprintf( __( 'Message sent by %s website', 'elemarjr' ), get_bloginfo( 'name' ) ) . '<br>';
		$message .= sprintf( __( 'Sent from: <a href="%1$s">%1$s</a>', 'elemarjr' ), $referer );

		return $message;
	}
	
	/**
	 * Get form inputs values sanitized
	 */
	public function get_values() {
		if( ! is_array( $this->fields ) ) {
			return array();
		}
		
		$values = array();
		
		foreach( array_keys( $this->fields ) as $field ) {
			if( empty( $_POST[ $field ] ) ) {
				$values[ $field ] = '';
				continue;
			}
			
			$value = $_POST[ $field ];
			if ( 'textarea' === $this->get_type( $field ) ) {
				$values[ $field ] = sanitize_textarea_field( $value );
			} else {
				$values[ $field ] = sanitize_text_field( $value );
			}
		}
		
		return $values;
	}

	/**
	 * Check if the form is spam using Akismet
	 * 
	 * Based on the `wpcf7_akismet_comment_check` Contact Form 7 plugin
	 * 
	 * If the Akismet isn't active or the key isn't set, consider not spam.
	 * 
	 * @return boolean
	 */
	public function is_spam() {
		if ( ! ( is_callable( array( 'Akismet', 'get_api_key' ) ) && (bool) \Akismet::get_api_key() ) ) {
			return false;
		}
		
		$params = $this->spam_parameters();
		
		$spam = false;
		$query_string = build_query( $params );
		
		$response = \Akismet::http_post( $query_string, 'comment-check' );
		
		return ! $response[1];
	}

	/**
	 * Define spam parameters
	 * 
	 * Based on the `wpcf7_akismet` Contact Form 7 plugin 
	 * 
	 * @link https://akismet.com/development/api/#comment-check
	 */
	public function spam_parameters() {
		$params = array();
		
		/*
		 * These parameters aren't required, but can be set by the extended
		 * class.
		 */
		$params['comment_author'] = '';
		$params['comment_author_email'] = '';
		$params['comment_author_url'] = '';
		$params['comment_content'] = '';
		
		$params['blog'] = get_option( 'home' );
		$params['blog_lang'] = get_locale();
		$params['blog_charset'] = get_option( 'blog_charset' );
		$params['user_ip'] = $_SERVER['REMOTE_ADDR'];
		$params['user_agent'] = $_SERVER['HTTP_USER_AGENT'];
		$params['referrer'] = $_SERVER['HTTP_REFERER'];
		
		$params['comment_type'] = 'contact-form';
		
		return $params;
	}
	
	public function get_flash_key() {
		return $this->slug . '_flash_values';
	}
	
	public function get_flash() {
		if( ! empty( $_SESSION[ $this->get_flash_key() ] ) ) {
			$values = $_SESSION[ $this->get_flash_key() ];
			$this->empty_flash();
			return $values;
		}
		
		return $this->get_values();
	}
	
	public function set_flash() {
		$_SESSION[ $this->get_flash_key() ] = $this->get_values();
	}
	
	public function empty_flash() {
		unset( $_SESSION[ $this->get_flash_key() ] );
	}
}
