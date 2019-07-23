<?php
if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

function understrap_remove_scripts()
{
	wp_dequeue_style('understrap-styles');
	wp_deregister_style('understrap-styles');

	wp_dequeue_script('understrap-scripts');
	wp_deregister_script('understrap-scripts');

	wp_deregister_script('jquery');

	// Removes the parent themes stylesheet and scripts from inc/enqueue.php
}
add_action('wp_enqueue_scripts', 'understrap_remove_scripts', 20);

function theme_enqueue_styles()
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
add_action('wp_enqueue_scripts', 'theme_enqueue_styles', 30);

function add_child_theme_textdomain()
{
	load_child_theme_textdomain('musica-pristina', get_stylesheet_directory() . '/languages');
}
add_action('after_setup_theme', 'add_child_theme_textdomain');

function unregister_widgets_area()
{
	// Unregister some of the sidebars
	unregister_sidebar('first-widget-area');
	unregister_sidebar('second-widget-area');
	unregister_sidebar('third-widget-area');
}

add_action('widgets_init', 'unregister_widgets_area', 11);

function understrap_widgets_init() {
	register_sidebar(
		array(
			'name'          => __( 'Right Sidebar', 'understrap' ),
			'id'            => 'right-sidebar',
			'description'   => __( 'Right sidebar widget area', 'understrap' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s" data-spy="affix" data-offset-top="197">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Left Sidebar', 'understrap' ),
			'id'            => 'left-sidebar',
			'description'   => __( 'Left sidebar widget area', 'understrap' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Hero Slider', 'understrap' ),
			'id'            => 'hero',
			'description'   => __( 'Hero slider area. Place two or more widgets here and they will slide!', 'understrap' ),
			'before_widget' => '<div class="carousel-item">',
			'after_widget'  => '</div>',
			'before_title'  => '',
			'after_title'   => '',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Hero Canvas', 'understrap' ),
			'id'            => 'herocanvas',
			'description'   => __( 'Full size canvas hero area for Bootstrap and other custom HTML markup', 'understrap' ),
			'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '',
			'after_title'   => '',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Top Full', 'understrap' ),
			'id'            => 'statichero',
			'description'   => __( 'Full top widget with dynamic grid', 'understrap' ),
			'before_widget' => '<div id="%1$s" class="footer-widget %2$s dynamic-classes">',
			'after_widget'  => '</div><!-- .static-hero-widget -->',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Footer Full', 'understrap' ),
			'id'            => 'footerfull',
			'description'   => __( 'Full sized footer widget with dynamic grid', 'understrap' ),
			'before_widget' => '<div id="%1$s" class="footer-widget %2$s dynamic-classes">',
			'after_widget'  => '</div><!-- .footer-widget -->',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);

}

function theme_sidebar_widgets_init()
{
	register_sidebar(array(
		'name' => 'Footer 1',
		'id' => 'footer-1',
		'before_widget' => '<div class="footer-widget">',
		'after_widget' => '</div>',
		'before_title' => '<h5>',
		'after_title' => '</h5>',
	));

	register_sidebar(array(
		'name' => 'Footer 2',
		'id' => 'footer-2',
		'before_widget' => '<div class="footer-widget">',
		'after_widget' => '</div>',
		'before_title' => '<h5>',
		'after_title' => '</h5>',
	));

	register_sidebar(array(
		'name' => 'Footer 3',
		'id' => 'footer-3',
		'before_widget' => '<div class="footer-widget">',
		'after_widget' => '</div>',
		'before_title' => '<h5>',
		'after_title' => '</h5>',
	));

	register_sidebar(array(
		'name' => 'Footer Contact Form',
		'id' => 'footer-contact',
		'before_widget' => '<div class="footer-widget">',
		'after_widget' => '</div>',
		'before_title' => '<h5>',
		'after_title' => '</h5>',
	));

	register_sidebar(array(
		'name' => 'Footer Social Media',
		'id' => 'footer-social',
		'before_widget' => '<div class="footer-widget">',
		'after_widget' => '</div>',
		'before_title' => '<h5>',
		'after_title' => '</h5>',
	));
}

add_action('widgets_init', 'theme_sidebar_widgets_init');

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
	return '[.....]';
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

function woocommerce_get_product_thumbnail( $size = 'woocommerce_thumbnail', $deprecated1 = 0, $deprecated2 = 0 ) {
	global $product;
	$image_size = apply_filters( 'single_product_archive_thumbnail_size', $size );
	return $product ? $product->get_image( $image_size ) : '';
}

function understrap_woocommerce_support() {
	add_theme_support( 'woocommerce', array(
		'thumbnail_image_width' => 640,
		'single_image_width' => 640,
	) );

	// Add New Woocommerce 3.0.0 Product Gallery support.
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-slider' );

	// hook in and customizer form fields.
	add_filter( 'woocommerce_form_field_args', 'understrap_wc_form_field_args', 10, 3 );
}
