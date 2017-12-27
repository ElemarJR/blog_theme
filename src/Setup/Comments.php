<?php
/**
 * Comments setup.
 *
 * @package Aztec
 */

namespace Aztec\Setup;

use Aztec\Base;

/**
 * Change the default comment template behavior
 */
class Comments extends Base {

	/**
	 * Add comments hooks
	 */
	public function init() {
		add_action( 'comment_form_before', $this->callback( 'enqueue_comments_reply' ) );
		
		add_filter( 'comment_form_fields', $this->callback( 'comment_form_fields' ) );
		add_filter( 'comment_form_submit_field', $this->callback( 'comment_form_submit_field' ), 10, 2 );
		add_filter( 'comment_form_field_author', $this->callback( 'open_comment_meta' ) );
		add_filter( 'comment_form_field_url', $this->callback( 'close_comment_meta' ) );
	}
	
	public function enqueue_comments_reply() {
		if( get_option( 'thread_comments' ) )  {
			wp_enqueue_script( 'comment-reply' );
		}
	}
	
	public function open_comment_meta( $field ) {
		error_log(print_r($field, true));
		return '<div class="comment-meta">' . $field;
	}
	
	public function close_comment_meta( $field ) {
		error_log(print_r($field, true));
		return $field . '</div>';
	}
	
	/**
	 * Override default fields markup using regex and reorder
	 *
	 * - remove `p` wrapper
	 * - add `screen-reader-text` to the label
	 * - add placeholder to the input with the name of the label
	 *
	 * @param array $fields The default comment fields.
	 * @return array The default comment fields overrode.
	 */
	function comment_form_fields( $fields ) {
		/*
		 * Capturing groups
		 * 1:  Start `p` tag. E.g,: <p class="comment-form-email">
		 * 2:  Element class
		 * 3:  `<label `
		 * 4:  `for` attribute with close label tag. E.g.: for="email">
		 * 5:  Label content. E.g: E-mail <span class="required">*</span>
		 * 6:  Label name + space. E.g: `E-mail `
		 * 7:  Asterisk
		 * 8:  Label name (if not required)
		 * 9:  </label>
		 * 10:  `input` tag without close. E.g: <input [...] required='required'
		 * 11: ` />`
		 * 12: Comment `textarea` without close
		 * 13: ></textarea>
		 * 14: `</p>`
		 */
		$fields = preg_replace(
			'/
				(<p.*class="(.*)".*?>)
					(<label\s)((?>.*?>))
						(
							((?>.*?\s))<span\sclass="required">(\*)<\/span>
							|
							(.*)
						)
					(<\/label>).*
					(?:
						(<input.*)(\s\/>)
						|
						(<textarea.*)(><\/textarea>)
					)
				(<\/p>)
			/x',
			'<div class="$2">$3class="screen-reader-text" $4$5$9$10$12 placeholder="$6$7$8"$11$13</div>',
			$fields
		);
		
		return array(
			'author'  => $fields['author'],
			'email'   => $fields['email'],
			'url'     => $fields['url'],
			'comment' => $fields['comment'],
		);
	}
	
	function comment_form_submit_field( $submit_field, $args ) {
		/*
		 * Capturing groups
		 * 1:  `<p class="form-submit">`
		 * 2:  Element class
		 * 3:  Summit button and comment post ID hiiden field
		 * 4:  `</p>`
		 */
		$submit_field = preg_replace(
			'/
				(<p.*class="(.*)">)
					(.*)
				(<\/p>)
			/xs',
			'<div class="$2">$3</div>',
			$submit_field
		);
		
		return $submit_field;
	}
}
