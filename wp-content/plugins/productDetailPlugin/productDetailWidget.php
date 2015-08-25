<?php
/*
Plugin Name: Product Detail Widget
Description: Product plugin for Batstone 
*/
/* Start Adding Functions Below this Line */

	// Creating the widget 
	class product_widget extends WP_Widget
	{

		function __construct() {
			parent::__construct(
			// Base ID of your widget
			'product_widget', 

			// Widget name will appear in UI
			__('Product Detail', 'product_widget_domain'), 

			// Widget description
			array( 'description' => __( 'Sample widget based on WPBeginner Tutorial', 'product_widget_domain' ), ) 
			);
		}

		// Creating widget front-end
		// This is where the action happens
		
		
		function widget($args, $instance)
		{

			extract($args);

			echo $before_widget;

			?>

      <?php if( !empty($instance['title']) ): ?>
        <h1 class="product-section-title">
          <?php echo htmlspecialchars_decode(apply_filters('widget_title', $instance['title'])); ?>
        </h1>
      <?php endif; ?>

      <?php if( !empty($instance['slogan']) ): ?>
        <h2 class="product-section-slogan">
          <?php echo htmlspecialchars_decode(apply_filters('widget_slogan', $instance['slogan'])); ?>
        </h2>
      <?php endif; ?>

      <?php if( !empty($instance['description']) ): ?>
        <h4 class="product-section-description">
          <?php echo htmlspecialchars_decode(apply_filters('widget_description', $instance['description'])); ?>
        </h4>
      <?php endif; ?>

      <img class="product-icon-small" src="<?php bloginfo('template_url'); ?>/images/stanchion/productsicon2.png" alt="Icon" />
      <img class="left" src="<?php bloginfo('template_url'); ?>/images/stanchion/productsicon2.png" alt="Indians" height="100px" />

      <h5 class="product-section-header">WHITE PAPERS</h5>

      <ul class="product-whitepaper-blogs">
        <?php // Display blog posts on any page @ http://m0n.co/l
		                $temp = $wp_query; $wp_query= null;
		                $wp_query = new WP_Query(); 
                    $wp_query->query('showposts=7&tag=white-paper,the_title()' . '&paged='.$paged);
		                while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
        <li class="product-blog-list-item">
          <a href=""
            <?php the_permalink(); ?>" title="Read more">
            <?php the_post_thumbnail(); ?>
          </a>
          <div class="col-md-9 post-text">
            <h5>
              <?php the_title(); ?>
            </h5>
            <?php the_excerpt(); ?>
          </div>
        </li>
        <?php endwhile; ?>
      </ul>

      <h1 class="product-section-title">SERVICE</h1>
      <?php if( !empty($instance['serviceslogan']) ): ?>
        <h2 class="product-section-slogan">
          <?php echo htmlspecialchars_decode(apply_filters('widget_slogan', $instance['serviceslogan'])); ?>
        </h2>
      <?php endif; ?>

      <?php if( !empty($instance['servicedescription']) ): ?>
        <h4 class="product-section-description">
          <?php echo htmlspecialchars_decode(apply_filters('widget_description', $instance['servicedescription'])); ?>
        </h4>
      <?php endif; ?>

      <img class="product-icon-small" src="http://batstone-stanchiondev.azurewebsites.net/wp-content/themes/stanchion/images/productsicon2.png" alt="Icon" />

      <h5 class="product-section-header">CASE STUDIES</h5>

      <ul class="product-whitepaper-blogs">
        <?php // Display blog posts on any page @ http://m0n.co/l
		          $temp = $wp_query; $wp_query= null;
		          $wp_query = new WP_Query(); 
              $wp_query->query('showposts=7&tag=white-paper' . '&paged='.$paged);
		          while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
        <li class="product-blog-list-item">
          <a href=""
            <?php the_permalink(); ?>" title="Read more">
            <?php the_post_thumbnail(); ?>
          </a>
          <div class="col-md-9 post-text">
            <h5>
              <?php the_title(); ?>
            </h5>
            <?php the_excerpt(); ?>
          </div>
        </li>
        <?php endwhile; ?>
      </ul>

			<?php
			  echo $after_widget;
		  }

		  // Widget Backend 
		  public function form( $instance ) {
    
			  if ( isset( $instance[ 'title' ] ) ) {
				  $title = $instance[ 'title' ];
			  }
			  else {
				  $title = __( 'New title', 'product_widget_domain' );
			  }
      
			  if ( isset( $instance[ 'slogan' ] ) ) {
				  $slogan = $instance[ 'slogan' ];
			  }
			  else {
				  $slogan = __( 'New slogan', 'product_widget_domain' );
			  }
      
			  if ( isset( $instance[ 'description' ] ) ) {
				  $description = $instance[ 'description' ];
			  }
			  else {
				  $description = __( 'New description', 'product_widget_domain' );
			  }
           
			  if ( isset( $instance[ 'serviceslogan' ] ) ) {
				  $serviceslogan = $instance[ 'serviceslogan' ];
			  }
			  else {
				  $serviceslogan = __( 'New service slogan', 'product_widget_domain' );
			  }
      
			  if ( isset( $instance[ 'servicedescription' ] ) ) {
				  $servicedescription = $instance[ 'servicedescription' ];
			  }
			  else {
				  $servicedescription = __( 'New description', 'product_widget_domain' );
			  }
        
			  // Widget admin form
			  ?>
			  <p>
			    <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
			    <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
			  </p>
        <p>
          <label for=""
            <?php echo $this->get_field_id( 'slogan' ); ?>"><?php _e( 'Slogan:' ); ?>
          </label>
          <input class="widefat" id=""<?php echo $this->get_field_id( 'slogan' ); ?>" name="<?php echo $this->get_field_name( 'slogan' ); ?>" type="text" value="<?php echo esc_attr( $slogan ); ?>" />
        </p>
        <p>
          <label for=""
            <?php echo $this->get_field_id( 'description' ); ?>"><?php _e( 'Description:' ); ?>
          </label>
          <input class="widefat" id=""<?php echo $this->get_field_id( 'description' ); ?>" name="<?php echo $this->get_field_name( 'description' ); ?>" type="text" value="<?php echo esc_attr( $description ); ?>" />
        </p>
        <p>
          <label for=""
            <?php echo $this->get_field_id( 'serviceslogan' ); ?>"><?php _e( 'Slogan:' ); ?>
          </label>
          <input class="widefat" id=""<?php echo $this->get_field_id( 'serviceslogan' ); ?>" name="<?php echo $this->get_field_name( 'service-slogan' ); ?>" type="text" value="<?php echo esc_attr( $serviceslogan ); ?>" />
        </p>
        <p>
          <label for=""
            <?php echo $this->get_field_id( 'servicedescription' ); ?>"><?php _e( 'Service Description:' ); ?>
          </label>
          <input class="widefat" id=""<?php echo $this->get_field_id( 'servicedescription' ); ?>" name="<?php echo $this->get_field_name( 'servicedescription' ); ?>" type="text" value="<?php echo esc_attr( $servicedescription ); ?>" />
        </p>

			  <?php 
		  }
	
		  // Updating widget replacing old instances with new
		  public function update( $new_instance, $old_instance ) {
    
			  $instance = array();
			  $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
			  $instance['slogan'] = ( ! empty( $new_instance['slogan'] ) ) ? strip_tags( $new_instance['slogan'] ) : '';
			  $instance['description'] = ( ! empty( $new_instance['description'] ) ) ? strip_tags( $new_instance['description'] ) : '';
			  $instance['serviceslogan'] = ( ! empty( $new_instance['serviceslogan'] ) ) ? strip_tags( $new_instance['serviceslogan'] ) : '';
			  $instance['servicedescription'] = ( ! empty( $new_instance['servicedescription'] ) ) ? strip_tags( $new_instance['servicedescription'] ) : '';
      
			  return $instance;
		  }
	} // Class product_widget ends here

	// Register and load the widget
	function product_load_widget() {
		register_widget( 'product_widget' );
	}

	add_action( 'widgets_init', 'product_load_widget' );

/* Stop Adding Functions Below this Line */
?>
