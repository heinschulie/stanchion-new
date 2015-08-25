<?php

/*
Template Name: Stanchion Product
*/

get_header(); ?>

<div class="clear"></div>

</header> <!-- / END HOME SECTION  -->

	<div id="content" class="site-content">

<div class="container">

<div class="content-left-wrap col-md-12 ">

	<div id="primary" class="content-area">

		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

			  <?php get_template_part( 'content', 'page-product' ); ?>

			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->

	</div><!-- #primary -->

</div><!-- .content-left-wrap -->

</div><!-- .container -->

<!--<?php get_footer(); ?>-->