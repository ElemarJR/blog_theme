<?php
/**
 * The template to show just the newsletter form. The form is loaded in the
 * footer
 * 
 * Template name: Newsletter Form
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage ElemarJr
 * @since 0.1.0
 * @version 0.1.0
 */

use Aztec\Form\Contact;

global $container;

/**
 * 
 * @var Contact $form
 */
$form = $container->get( Contact::class );
$values = $form->get_flash();

get_header();

get_footer();
