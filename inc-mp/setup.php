<?php
/**
 * Theme basic setup.
 *
 * @package musica-pristina
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

function create_section_posttype()
{

	register_post_type(
		'section',
		array(
			'labels' => array(
				'name' => __('Sections'),
				'singular_name' => __('Section')
			),
			'public' => true,
			'has_archive' => true,
			'rewrite' => array('slug' => 'sections'),
			'supports' => array('title', 'editor', 'custom-fields')
		)
	);
}
// Hooking up our function to theme setup
add_action('init', 'create_section_posttype');

add_theme_support('editor-color-palette', array(
	array(
		'name'  => __('Dark Blue', 'musica-pristina'),
		'slug'  => 'blue',
		'color'	=> '#041f30',
	),
	array(
		'name'  => __('Light Blue', 'musica-pristina'),
		'slug'  => 'light-blue',
		'color' => '#041f30',
	),
	array(
		'name'  => __('Orange', 'musica-pristina'),
		'slug'  => 'orange',
		'color'	=> '#f76402',
	),
	array(
		'name'  => __('White', 'musica-pristina'),
		'slug'  => 'white',
		'color'	=> '#ffffff',
	),
	array(
		'name'  => __('Black', 'musica-pristina'),
		'slug'  => 'black',
		'color'	=> '#000000',
	),
));

add_theme_support('post-thumbnails');

add_image_size('musicapristina-xs', 200, 120, true);
add_image_size('musicapristina-sm', 240, 144, true);
add_image_size('musicapristina-md', 350, 210, true);
add_image_size('musicapristina-lg', 500, 300, true);
add_image_size('musicapristina-xl', 800, 480, true);


function remove_parent_filters()
{ //Have to do it after theme setup, because child theme functions are loaded first
	remove_filter('excerpt_more', 'understrap_custom_excerpt_more');
	remove_filter('wp_trim_excerpt', 'understrap_all_excerpts_get_more_link');
}
add_action('after_setup_theme', 'remove_parent_filters');

function wpdocs_excerpt_more($more)
{
	return '';
}
add_filter('excerpt_more', 'wpdocs_excerpt_more', 500);


function mp_news_shortcode($atts)
{
	// $a = shortcode_atts( array(       'name' => 'world'    ), $atts );
	ob_start();
	get_template_part('global-templates/news');
	return ob_get_clean();
};
add_shortcode('mp-news', 'mp_news_shortcode');

function mp_principals_shortcode($atts)
{
	// $a = shortcode_atts( array(       'name' => 'world'    ), $atts );
	ob_start();
	get_template_part('global-templates/principals');
	return ob_get_clean();
};
add_shortcode('mp-principals', 'mp_principals_shortcode');

add_filter('widget_text','do_shortcode');

function understrap_posted_on()
{
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if (get_the_time('U') !== get_the_modified_time('U')) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s"> (updated %4$s) </time>';
	}
	$time_string = sprintf(
		$time_string,
		esc_attr(get_the_date('c')),
		esc_html(get_the_date()),
		esc_attr(get_the_modified_date('c')),
		esc_html(get_the_modified_date())
	);
	$posted_on   = apply_filters(
		'understrap_posted_on',
		sprintf(
			'<span class="posted-on">%1$s <a href="%2$s" rel="bookmark">%3$s</a></span>',
			esc_html_x('Posted on', 'post date', 'understrap'),
			esc_url(get_permalink()),
			apply_filters('understrap_posted_on_time', $time_string)
		)
	);
	$byline      = apply_filters(
		'understrap_posted_by',
		sprintf(
			'<span class="byline"> %1$s<span class="author vcard"><a class="url fn n" href="%2$s"> %3$s</a></span></span>',
			$posted_on ? esc_html_x('by', 'post author', 'understrap') : esc_html_x('Posted by', 'post author', 'understrap'),
			esc_url(get_author_posts_url(get_the_author_meta('ID'))),
			esc_html(get_the_author())
		)
	);
	echo '<strong>' . $posted_on . $byline . '</strong>'; // WPCS: XSS OK.
}