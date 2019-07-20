<?php

/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package musica-pristina
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();

$container = get_theme_mod('understrap_container_type');
?>

<?php if (is_front_page() && is_home()) : ?>
    <?php get_template_part('global-templates/hero'); ?>
<?php endif; ?>

<header class="entry-header">
    <div class="container">
        <h1 class="entry-title"><?php single_post_title(); ?></h1>
    </div>
</header>
<div class="breadcrumbs" typeof="BreadcrumbList" vocab="http://schema.org/">
    <div class="container">
    </div>
</div>
<div>
    <div class="container">
        <div class="row">
            <div class="col-md-9 content-area" id="primary">
                <main class="site-main" id="main">

                    <?php if (have_posts()) : ?>
                        <?php /* Start the Loop */ ?>
                        <?php while (have_posts()) : the_post(); ?>
                            <?php
                            /*
						 * Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
                            get_template_part('loop-templates/content', get_post_format());
                            ?>
                        <?php endwhile; ?>
                    <?php else : ?>
                        <?php get_template_part('loop-templates/content', 'none'); ?>
                    <?php endif; ?>
                </main><!-- #main -->
            </div>
            <div class="col-md-3 right-area">
                <?php dynamic_sidebar('right-sidebar'); ?>
            </div>
        </div>
        <div class="row">
            <!-- Do the left sidebar check and opens the primary div -->
            <?php //get_template_part('global-templates/left-sidebar-check'); ?>
            <!-- The pagination component -->
            <?php understrap_pagination(); ?>
            <!-- Do the right sidebar check -->
            <?php //get_template_part('global-templates/right-sidebar-check'); ?>
        </div><!-- .row -->
    </div>
    </article>
    <?php get_footer(); ?>