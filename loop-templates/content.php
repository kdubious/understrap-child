<?php

/**
 * Post rendering content according to caller of get_template_part.
 *
 * @package musica-pristina
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;
?>
<article <?php post_class('mp-post-list-item'); ?> id="post-<?php the_ID(); ?>">
	<header class="news-header">
		<?php
		the_title(
			sprintf('<h2 class="news-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())),
			'</a></h2>'
		);
		?>
		<?php if ('post' == get_post_type()) : ?>
			<div class="news-meta">
				<?php understrap_posted_on(); ?><br>
				<?php understrap_entry_footer(); ?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->
	<?php echo get_the_post_thumbnail($post->ID, 'large'); ?>
	<div class="news-content">
		<?php the_excerpt(); ?>
		<?php
		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . __('Pages:', 'understrap'),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->