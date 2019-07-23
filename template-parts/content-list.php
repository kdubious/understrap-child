<?php
/**
 * Template part for displaying posts.
 *
 * @package musica-pristina
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class( array( 'list-article', 'news-article' ) ); ?>>
	<div class="row">
		<div class="col-md-4">
			<div class="news-thumb">
				<a href="<?php echo esc_url( get_permalink() ); ?>">
					<?php
					if ( has_post_thumbnail() ) {
						the_post_thumbnail( 'musicapristina-lg', ['class' => 'img-fluid, rounded']);
					} else {
						echo '<img alt="" src="' . get_template_directory_uri() . '/assets/images/placholder2.png">';
					}
					?>
				</a>
			</div>
		</div>
		<div class="col-md-8">
			<div class="news-content">
				<div class="news-meta">
						<?php the_category( ' / ' ); ?>
					</div>
				<header class="news-header">
					<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
				</header>
				<div class="news-excerpt">
					<?php
					/**
					 * @since 2.1.0
					 */
					the_excerpt();
					?>
				</div>
			</div>
		</div>
	</div>
</article><!-- #post-## -->
