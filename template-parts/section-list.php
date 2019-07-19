<?php

/**
 * Template part for displaying posts.
 *
 * @package musica-pristina
 */

?>
<header data-bully="">
	<section class="container" id="section_<?php the_ID(); ?>">
		<h2 class="text-center"><?php the_title(); ?></h2>
		<?php the_content(); ?>
	</section>
</header>