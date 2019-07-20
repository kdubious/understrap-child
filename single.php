<?php

/**
 * Template Name: Right Sidebar Layout
 *
 * This template can be used to override the default template and sidebar setup
 *
 * @package understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();

the_post();
?>

<div class="wrapper" id="full-width-page-wrapper">
	<header class="entry-header">
		<div class="container">
			<?php the_title('<h1 class="entry-title">', '</h1>'); ?>
		</div>
	</header>
	<div class="breadcrumbs" typeof="BreadcrumbList" vocab="http://schema.org/">
		<div class="container">
		</div>
	</div>
	<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
		<div class="container">
			<div class="row">
				<div class="col-md-9 content-area" id="primary">
					<div class="entry-content">
						<?php the_content(); ?>
						<?php
						wp_link_pages(
							array(
								'before' => '<div class="page-links">' . __('Pages:', 'understrap'),
								'after'  => '</div>',
							)
						);
						?>
					</div>
				</div>
				<div class="col-md-3 right-area">
					<?php dynamic_sidebar( 'right-sidebar' ); ?>
				</div>
			</div>
		</div>
	</article>
	<footer class="entry-footer">
		<?php edit_post_link(__('Edit', 'understrap'), '<span class="edit-link">', '</span>'); ?>
	</footer>
</div>
<?php get_footer();