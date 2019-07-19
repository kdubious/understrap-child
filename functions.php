<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

function understrap_remove_scripts() {
    wp_dequeue_style( 'understrap-styles' );
    wp_deregister_style( 'understrap-styles' );

    wp_dequeue_script( 'understrap-scripts' );
    wp_deregister_script( 'understrap-scripts' );
	
	wp_deregister_script( 'jquery' );

    // Removes the parent themes stylesheet and scripts from inc/enqueue.php
}
add_action( 'wp_enqueue_scripts', 'understrap_remove_scripts', 20 );

function theme_enqueue_styles() {

	// Get the theme data
	$the_theme = wp_get_theme();
    wp_enqueue_style( 'musica-pristina-styles', get_stylesheet_directory_uri() . '/css/child-theme.min.css', array(), $the_theme->get( 'Version' ) );
	wp_enqueue_style( 'musica-pristina-google-font-styles', 'https://fonts.googleapis.com/css?family=Raleway%3A400%2C500%2C600%2C700%2C300%2C100%2C800%2C900%7COpen+Sans%3A400%2C300%2C300italic%2C400italic%2C600%2C600italic%2C700%2C700italic&subset=latin%2Clatin-ext&ver=2.2.4', array(), $the_theme->get( 'Version' ) );
    wp_enqueue_script( 'jquery', 'https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js', array(), null, true);
    wp_enqueue_script( 'musica-pristina-scripts', get_stylesheet_directory_uri() . '/js/child-theme.min.js', array(), $the_theme->get( 'Version' ), true );
	wp_enqueue_script( 'musica-pristina-bully', get_stylesheet_directory_uri() . '/js/jquery.bully.js', array(), $the_theme->get( 'Version' ), true );
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles', 30 );

function add_child_theme_textdomain() {
    load_child_theme_textdomain( 'musica-pristina', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'add_child_theme_textdomain' );


if ( function_exists('register_sidebar') ) {
register_sidebar(array(
'name' => 'Footer 1',
'before_widget' => '<div class="footer-widget">',
'after_widget' => '</div>',
'before_title' => '<h5>',
'after_title' => '</h5>',
));

register_sidebar(array(
'name' => 'Footer 2',
'before_widget' => '<div class="footer-widget">',
'after_widget' => '</div>',
'before_title' => '<h5>',
'after_title' => '</h5>',
));

register_sidebar(array(
'name' => 'Footer 3',
'before_widget' => '<div class="footer-widget">',
'after_widget' => '</div>',
'before_title' => '<h5>',
'after_title' => '</h5>',
));

register_sidebar(array(
'name' => 'Footer Contact Form',
'before_widget' => '<div class="footer-widget">',
'after_widget' => '</div>',
'before_title' => '<h5>',
'after_title' => '</h5>',
));

register_sidebar(array(
'name' => 'Footer Social Media',
'before_widget' => '<div class="footer-widget">',
'after_widget' => '</div>',
'before_title' => '<h5>',
'after_title' => '</h5>',
));
}


function create_section_posttype() {
 
    register_post_type( 'section',
        array(
            'labels' => array(
                'name' => __( 'Sections' ),
                'singular_name' => __( 'Section' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'sections'),
            'supports' => array( 'title', 'editor', 'custom-fields') 
        )
    );
}
// Hooking up our function to theme setup
add_action( 'init', 'create_section_posttype' );

add_theme_support( 'editor-color-palette', array(
	array(
		'name'  => __( 'Dark Blue', 'musica-pristina' ),
		'slug'  => 'blue',
		'color'	=> '#041f30',
	),
	array(
		'name'  => __( 'Light Blue', 'musica-pristina' ),
		'slug'  => 'light-blue',
		'color' => '#041f30',
	),
	array(
		'name'  => __( 'Orange', 'musica-pristina' ),
		'slug'  => 'orange',
		'color'	=> '#f76402',
	),
	array(
		'name'  => __( 'White', 'musica-pristina' ),
		'slug'  => 'white',
		'color'	=> '#ffffff',
	),
	array(
		'name'  => __( 'Black', 'musica-pristina' ),
		'slug'  => 'black',
		'color'	=> '#000000',
	),
) );

add_theme_support( 'post-thumbnails' );
add_image_size( 'musicapristina-blog-small', 300, 150, true );
add_image_size( 'musicapristina-small', 480, 300, true );
add_image_size( 'musicapristina-medium', 640, 400, true );


function remove_parent_filters(){ //Have to do it after theme setup, because child theme functions are loaded first
	remove_filter( 'excerpt_more', 'understrap_custom_excerpt_more' );
	remove_filter( 'wp_trim_excerpt', 'understrap_all_excerpts_get_more_link' );
}
add_action( 'after_setup_theme', 'remove_parent_filters' );

function wpdocs_excerpt_more( $more ) {
    return '[.....]';
}
add_filter( 'excerpt_more', 'wpdocs_excerpt_more', 500 );


function mp_news_shortcode( $atts ) {
    // $a = shortcode_atts( array(       'name' => 'world'    ), $atts );
    ob_start();
    get_template_part( 'global-templates/news' );
    return ob_get_clean();
};
add_shortcode( 'mp-news', 'mp_news_shortcode' );
