<?php
/**
 * Theme basic setup.
 *
 * @package musica-pristina
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

function understrap_woocommerce_wrapper_start()
{
	$container = get_theme_mod('understrap_container_type');
	echo '<div class="wrapper" id="woocommerce-wrapper">';
	echo '<div class="' . esc_attr($container) . '" id="content" tabindex="-1">';
	//echo '<div class="row">';
	// get_template_part( 'global-templates/left-sidebar-check' );
	//echo '<main class="site-main" id="main">';
}

function understrap_woocommerce_wrapper_end()
{
	//echo '</main><!-- #main -->';
	// get_template_part( 'global-templates/right-sidebar-check' );
	//echo '</div><!-- .row -->';
	echo '</div><!-- Container end -->';
	echo '</div><!-- Wrapper end -->';
}

function woocommerce_get_product_thumbnail($size = 'woocommerce_thumbnail', $deprecated1 = 0, $deprecated2 = 0)
{
	global $product;
	$image_size = apply_filters('single_product_archive_thumbnail_size', $size);
	return $product ? $product->get_image($image_size) : '';
}

function understrap_woocommerce_support()
{
	add_theme_support('woocommerce', array(
		'thumbnail_image_width' => 640,
		'single_image_width' => 640,
	));

	// Add New Woocommerce 3.0.0 Product Gallery support.
	add_theme_support('wc-product-gallery-lightbox');
	add_theme_support('wc-product-gallery-zoom');
	add_theme_support('wc-product-gallery-slider');

	// hook in and customizer form fields.
	add_filter('woocommerce_form_field_args', 'understrap_wc_form_field_args', 10, 3);
}