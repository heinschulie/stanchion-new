
<div class="blog-container">
  <div class="col-md-6 list-item-container">
    <ul class="blog-unordered-list">
      <?php // Display blog posts on any page @ http://m0n.co/l
		    
        $wp_query = new WP_Query('category_name=White Paper,Case Study');
		    while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
      <li class="blog-list-item">
        <a class="blog-image-link" href="<?php the_permalink(); ?>" title="Read more">
          <?php 
                  if ($wp_query->current_post == 0) {
                    the_post_thumbnail('large');                   
                  }  
                  else{
                    the_post_thumbnail();
                  }
              ?>
        </a>
        <div class="col-md-8 post-text">
          <?php 
            
              if ($wp_query->current_post == 0) {
                echo '<h3>';
                  the_title();
                echo '</h3>';
              }  
              else{
                echo '<h5>';
                  the_title();
                echo '</h5>';
              }                      
          ?>
          <?php the_excerpt(); ?>
        </div>
      </li>
      <?php endwhile; ?>
    </ul>
  </div>
  <div class="col-md-4 list-item-container">
    <ul class="">
      <?php // Display blog posts on any page @ http://m0n.co/l
      
		    $wp_query = new WP_Query( array('post_type' => 'post', 'posts_per_page' => '3', 'category_name' => 'News') );
		    while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
      <li class="blog-list-item">
        <a class="blog-image-link" href="<?php the_permalink(); ?>" title="Read more">         
          <?php
            if ( has_post_thumbnail()) {
              the_post_thumbnail();
            } else {
              echo '<img src="http://stanchionpayments.com/wp-content/uploads/2015/09/white-square.jpg" />';
            }
          ?>
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
  <div class="col-md-2 list-item-container">
    <aside id="archives" class="widget">
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

