
<div class="blog-container">
  <div class="col-md-6 list-item-container">
    <!--<h1 class="widget-title">
      <?php _e( 'Case Studies', 'zerif-lite' ); ?>
    </h1>-->
    <ul class="blog-unordered-list">
      <?php // Display blog posts on any page @ http://m0n.co/l
		    $args = array(
	        'category_name' => 'Case Study'
        );
        $wp_query = new WP_Query( $args );
		    while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
      <li class="blog-list-item">
        <a class="blog-image-link" href=""
          <?php the_permalink(); ?>" title="Read more">
          <?php the_post_thumbnail(); ?>
        </a>
        <div class="col-md-8 post-text">
          <h5>
            <?php the_title(); ?>
          </h5>
          <?php the_excerpt(); ?>
        </div>
      </li>
      <?php endwhile; ?>
    </ul>
  </div>
  <div class="col-md-4 list-item-container">
    <!--<h1 class="widget-title">
      <?php _e( 'White Papers', 'zerif-lite' ); ?>
    </h1>-->
    <ul class="">
      <?php // Display blog posts on any page @ http://m0n.co/l
		    $args = array(
	        'category_name' => 'White Paper'
        );
        $wp_query = new WP_Query( $args );
                
        while ($wp_query->have_posts()) : 
            $wp_query->the_post();
            echo '<h2><a href="'.the_permalink().'">'.the_title().'</a></h2>';
            if ($loop->current_post == 0) {
                  echo the_post_thumbnail();
                  echo the_excerpt();
            }
        endwhile; wp_reset_postdata();
        
		    while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
      
      <!--<li class="blog-list-item">
        <a class="blog-image-link" href=""
          <?php the_permalink(); ?>" title="Read more">
          <?php the_post_thumbnail(); ?>
        </a>
        <div class="col-md-8 post-text">
          <h5>
            <?php the_title(); ?>
          </h5>
          <?php the_excerpt(); ?>
        </div>
      </li>-->
      <?php endwhile; ?>
    </ul>
  </div>
  <div class="col-md-2 list-item-container">
    <aside id="archives" class="widget">
      <!--<h1 class="widget-title">
        <?php _e( 'Archives', 'zerif-lite' ); ?>
      </h1>-->
      <ul>
        <?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
      </ul>
    </aside>
  </div>

  <?php if ($paged > 1) { ?>

  <nav id="nav-posts">
    <div class="prev">
      <?php next_posts_link('&laquo; Previous Posts'); ?>
    </div>
    <div class="next">
      <?php previous_posts_link('Newer Posts &raquo;'); ?>
    </div>
  </nav>
  <?php } else { ?>
  <?php } ?>
  <?php wp_reset_postdata(); ?>

</div>

