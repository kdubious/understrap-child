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
					<div class="footer-subscribe text-center">
						<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer Contact Form') ) : ?><?php endif;?>
					</div>
				</div>
				<div class="col-md-4 col-sm-6">
					<div class="footer-social text-center">
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
			<p class="text-center">
				Copyright &copy; 2010 - <?php echo date("Y");?> Musica Pristina
			</p>
		</div>
	</div>
</footer>
<?php wp_footer(); ?>


<!--
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js" defer onload="myInit()"></script>
<script src="https://kit.fontawesome.com/347627540a.js" async></script>


<script src="<?php echo get_stylesheet_directory_uri() . '/js/child-theme.min.js?ver=' . wp_get_theme()->get('Version') ?>" defer></script>


-->
<?php if ( is_front_page() ) : ?>
<script src="<?php echo get_stylesheet_directory_uri() . '/js/jquery.bully.js'?>" defer onload="myInit()"></script>

<script>
    // $('[data-rellax]').rellax();
	function myInit() {
		$( document ).ready(function() {
			$('[data-bully]').bully();
		});
	}
</script>

<?php else : ?>

<script>
	function myInit() {
		
	}
</script>

<?php endif; ?>

<script>

	
	/* First CSS File */
	/*
	var giftofspeed = document.createElement('link');
	giftofspeed.rel = 'stylesheet';
	giftofspeed.href = '<?php echo get_stylesheet_directory_uri() . '/css/child-theme.min.css'?>';
	giftofspeed.type = 'text/css';
	var godefer = document.getElementsByTagName('link')[0];
	godefer.parentNode.insertBefore(giftofspeed, godefer);
	*/
    
</script>	


</body>

</html>

