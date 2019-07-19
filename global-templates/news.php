<?php
$args = array(
    'post_type' => 'post',
    'post_status' => 'publish',
    'posts_per_page' => 3
);
$query = new WP_Query($args);

if ($query->have_posts()) : 
    while ($query->have_posts()) :
        $query->the_post();
        /*
		 * Include the Post-Format-specific template for the content.
		 * If you want to override this in a child theme, then include a file
		 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
		 */
        get_template_part('template-parts/content', 'list');
    endwhile;
else :
	get_template_part('template-parts/content', 'none');
endif;
?>
<div class="all-news">
	<p><a class="btn btn-outline-primary" href="/blog/">Read the Blog</a></p>
</div>
<?php 
//wp_reset_postdata();