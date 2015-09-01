<?php

/*
Template Name: Stanchion Jobs
*/

get_header(); ?>

<div class="clear"></div>

</header> <!-- / END HOME SECTION  -->

	<div id="content" class="site-content">

<div class="container">

<div class="content-left-wrap col-md-12 stanchion-team">

	<div id="primary" class="content-area">

		<main id="main" class="site-main" role="main">

      
      
			<?php while ( have_posts() ) : the_post(); ?>

			  <?php get_template_part( 'content', 'page-jobs' ); ?>

			<?php endwhile; // end of the loop. ?>
      
      <div class="col-lg-12 col-md-12 col-sm-12" style="border: 1px solid red;">
        <ul class="">
          <?php // Display blog posts on any page @ http://m0n.co/l
		      $args = array(
	          'region' => 'Cape Town'
          );
          $wp_query = new WP_Query( $args );
		      while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
            <?php get_template_part( 'content', 'page-jobs' ); ?>
          <?php endwhile; ?>
        </ul>
      </div>



    </main><!-- #main -->

	</div><!-- #primary -->

</div><!-- .content-left-wrap -->

</div><!-- .container -->

<?php get_footer(); ?>