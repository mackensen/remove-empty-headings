<?php
/**
 * Plugin Name:     Remove Empty Headings
 * Plugin URI:      PLUGIN SITE HERE
 * Description:     PLUGIN DESCRIPTION HERE
 * Author:          YOUR NAME HERE
 * Author URI:      YOUR SITE HERE
 * Text Domain:     remove-empty-headings
 * Domain Path:     /languages
 * Version:         0.1.0
 *
 * @package         Remove_Empty_Headings
 */

// Load the actual class.
require( 'includes/class-remove-empty-headings.php' );

add_filter( 'content_save_pre', array( 'Remove_Empty_Headings', 'remove_headings' ), 10, 1 );
