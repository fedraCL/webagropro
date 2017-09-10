<?php
/**
 * Transera functions and definitions
 *
 * @package WordPress
 * @subpackage Transera
 * @since 1.0
 */

/**
 * Sets the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function transera_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'transera_content_width', 840 );
}
add_action( 'after_setup_theme', 'transera_content_width', 0 );

include_once get_template_directory() . '/includes/constants.php';
include_once get_template_directory() . '/includes/init.php';
