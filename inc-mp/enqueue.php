<?php
/**
 * Theme basic setup.
 *
 * @package musica-pristina
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

function mp_understrap_remove_scripts()
{
	wp_dequeue_style('understrap-styles');
	wp_deregister_style('understrap-styles');

	wp_dequeue_script('understrap-scripts');
	wp_deregister_script('understrap-scripts');

	wp_deregister_script('jquery');
	wp_deregister_script( 'wp-embed' );

	// Removes the parent themes stylesheet and scripts from inc/enqueue.php
}
add_action('wp_enqueue_scripts', 'mp_understrap_remove_scripts', 20);

function mp_theme_enqueue_styles()
{

	// Get the theme data
	$the_theme = wp_get_theme();
	wp_enqueue_style('musica-pristina-styles', get_stylesheet_directory_uri() . '/css/child-theme.min.css', array(), $the_theme->get('Version'));
	wp_enqueue_style('musica-pristina-google-font-styles', 'https://fonts.googleapis.com/css?family=Raleway%3A400%2C600%2C700%2C800%7COpen+Sans%3A400%2C400italic&subset=latin%2Clatin-ext&display=block', array(), $the_theme->get('Version'));
	wp_enqueue_script('jquery', 'https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js', array(), null, true);
	// wp_enqueue_script('font-awesome', 'https://kit.fontawesome.com/347627540a.js', array(), null, true);	
	wp_enqueue_script('musica-pristina-scripts', get_stylesheet_directory_uri() . '/js/child-theme.min.js', array(), $the_theme->get('Version'), true);
	wp_enqueue_script('musica-pristina-bully', get_stylesheet_directory_uri() . '/js/jquery.bully.js', array(), $the_theme->get('Version'), true);
	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'mp_theme_enqueue_styles', 30);

function mp_add_child_theme_textdomain()
{
	load_child_theme_textdomain('musica-pristina', get_stylesheet_directory() . '/languages');
}
add_action('after_setup_theme', 'mp_add_child_theme_textdomain');