<?php
/**
 *Template Name: Frontpage Template
 *
 * @package musica-pristina
 */

get_header();

get_template_part( 'global-templates/hero' );

$args = array(
    'post_type' => 'section',
    'post_status' => 'publish',
    'posts_per_page' => 3,
    'meta_key' => 'sort',
    'orderby' => 'meta_value_num',
    'order' => 'ASC'
);
$query = new WP_Query($args);

if ($query->have_posts()) : 
    while ($query->have_posts()) :
        $query->the_post();
        ?>
        <?php
        /*
        * Include the Post-Format-specific template for the content.
        * If you want to override this in a child theme, then include a file
        * called content-___.php (where ___ is the Post Format name) and that will be used instead.
        */
        get_template_part('template-parts/section', 'list');
        ?>

    <?php endwhile; ?>
<?php else : ?>
    <?php get_template_part('template-parts/content', 'none'); ?>
<?php endif;

get_footer();

?>