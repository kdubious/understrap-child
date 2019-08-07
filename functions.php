<?php
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$musicapristina_includes = array(
	'/theme-settings.php',                  // Initialize theme default settings.
	'/setup.php',                           // Theme setup and custom theme supports.
	'/widgets.php',                         // Register widget area.
	'/enqueue.php',                         // Enqueue scripts and styles.
	'/woocommerce.php',                     // Load WooCommerce functions.
);

foreach ($musicapristina_includes as $file) {
	$filepath = locate_template('inc-mp' . $file);
	if (!$filepath) {
		trigger_error(sprintf('Error locating /inc-mp%s for inclusion', $file), E_USER_ERROR);
	}
	require_once $filepath;
}

function remove_block_css()
{
	wp_dequeue_style('wp-block-library');
}
add_action('wp_enqueue_scripts', 'remove_block_css', 100);
