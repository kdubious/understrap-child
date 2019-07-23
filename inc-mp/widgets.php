<?php

/**
 * Theme basic setup.
 *
 * @package musica-pristina
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

function unregister_widgets_area()
{
    // Unregister some of the sidebars
    unregister_sidebar('first-widget-area');
    unregister_sidebar('second-widget-area');
    unregister_sidebar('third-widget-area');
}

add_action('widgets_init', 'unregister_widgets_area', 11);

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

    register_sidebar(
        array(
            'name'          => __('Right Sidebar', 'understrap'),
            'id'            => 'right-sidebar',
            'description'   => __('Right sidebar widget area', 'understrap'),
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget'  => '</aside>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        )
    );

    register_sidebar(
        array(
            'name'          => __('Left Sidebar', 'understrap'),
            'id'            => 'left-sidebar',
            'description'   => __('Left sidebar widget area', 'understrap'),
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget'  => '</aside>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        )
    );

    register_sidebar(
        array(
            'name'          => __('Hero Slider', 'understrap'),
            'id'            => 'hero',
            'description'   => __('Hero slider area. Place two or more widgets here and they will slide!', 'understrap'),
            'before_widget' => '<div class="carousel-item">',
            'after_widget'  => '</div>',
            'before_title'  => '',
            'after_title'   => '',
        )
    );

    register_sidebar(
        array(
            'name'          => __('Hero Canvas', 'understrap'),
            'id'            => 'herocanvas',
            'description'   => __('Full size canvas hero area for Bootstrap and other custom HTML markup', 'understrap'),
            'before_widget' => '',
            'after_widget'  => '',
            'before_title'  => '',
            'after_title'   => '',
        )
    );

    register_sidebar(
        array(
            'name'          => __('Top Full', 'understrap'),
            'id'            => 'statichero',
            'description'   => __('Full top widget with dynamic grid', 'understrap'),
            'before_widget' => '<div id="%1$s" class="footer-widget %2$s dynamic-classes">',
            'after_widget'  => '</div><!-- .static-hero-widget -->',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        )
    );

    register_sidebar(
        array(
            'name'          => __('Footer Full', 'understrap'),
            'id'            => 'footerfull',
            'description'   => __('Full sized footer widget with dynamic grid', 'understrap'),
            'before_widget' => '<div id="%1$s" class="footer-widget %2$s dynamic-classes">',
            'after_widget'  => '</div><!-- .footer-widget -->',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        )
    );
}

add_action('widgets_init', 'theme_sidebar_widgets_init');

function understrap_widgets_init()
{ }
