<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package musica-pristina
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
?>

<?php get_template_part( 'sidebar-templates/sidebar', 'footerfull' ); ?>

</div><!-- #page we need this extra closing tag here -->
<footer data-bully>
	<div class="footer-widgets">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-12 footer-column footer-column-1">
					<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer 1') ) : ?><?php endif;?>
				</div>
				<div class="col-md-4 col-sm-12 footer-column footer-column-2">
					<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer 2') ) : ?><?php endif;?>
				</div>
				<div class="col-md-4 col-sm-12 footer-column footer-column-3">
					<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer 3') ) : ?><?php endif;?>
				</div>
			</div>
		</div>
	</div>
	<div class="footer-connect">
		<div class="container">
			<div class="row">
				<div class="col-md-4 offset-md-2 col-sm-6 offset-md-0">
					<div class="footer-subscribe">
						<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer Contact Form') ) : ?><?php endif;?>
					</div>
				</div>
				<div class="col-md-4 col-sm-6">
					<div class="footer-social">
						<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer Social Media') ) : ?><?php endif;?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="site-info">
		<div class="container">
			<div class="btt">
				<a title="Back To Top" class="back-to-top" href="#page"><i class="fa fa-angle-double-up wow flash"
						style="visibility: visible; animation-name: flash; animation-duration: 2s;"
						data-wow-duration="2s"></i></a>
			</div>
			Copyright &copy; 2019 Musica Pristina
		</div>
	</div>
</footer>
<?php wp_footer(); ?>
<script>
    // $('[data-rellax]').rellax();
    $('[data-bully]').bully();
</script>

</body>

</html>

