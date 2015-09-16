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
        <h2 class="stanchion-slogan stanchion-sidepage-title">
          <?php echo htmlspecialchars_decode(apply_filters('widget_title', $instance['title'])); ?>
        </h2>
      <?php endif; ?>

      <?php if( !empty($instance['description']) ): ?>
        <p class="stanchion-bodycopy copy-margin">
          <?php echo htmlspecialchars_decode(apply_filters('widget_description', $instance['description'])); ?>
        </p>
      <?php endif; ?>

      <?php if( !empty($instance['image_uri']) ): ?>
        <figure class="logo-container">
          <img class="product-logo" src="<?php echo esc_url($instance['image_uri']); ?>" alt="">
        </figure>
      <?php endif; ?>

      <img class="product-icon-small" src="<?php bloginfo('template_url'); ?>/images/stanchion/productsicon2.png" alt="Icon" />

      <h5 class="product-section-header">WHITE PAPERS</h5>

      <ul class="product-blog-list">
        <?php // Display blog posts on any page @ http://m0n.co/l
		                $temp = $wp_query; $wp_query= null;
                    $args = array(
	                    'tag' => $instance['title'],
	                    'category_name' => 'White Paper'
                    );
                    $wp_query = new WP_Query( $args );
		                while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
        <li class="product-blog-list-item">
          <a href="<?php the_permalink(); ?>" title="Read more">
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

      <img class="product-icon-small" src="<?php bloginfo('template_url'); ?>/images/stanchion/productsicon2.png" alt="Icon" />

      <?php // Display blog posts on any page @ http://m0n.co/l
		          $temp = $wp_query; $wp_query= null;
                    $args = array(
	                    'tag' => $instance['title'],
	                    'category_name' => 'Case Study'
                    );
                    $query = new WP_Query( $args );
                    $query->get_posts();
              if( $query->have_posts() ): ?>
                <h5 class="product-section-header">CASE STUDIES</h5>
              <?php endif; ?>     

      <ul class="product-blog-list">
        <?php // Display blog posts on any page @ http://m0n.co/l
		          $temp = $wp_query; $wp_query= null;
                    $args = array(
	                    'tag' => $instance['title'],
	                    'category_name' => 'Case Study'
                    );
                    $wp_query = new WP_Query( $args );
		          while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
          <li class="product-blog-list-item">
            <a href="<?php the_permalink(); ?>" title="Read more">
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
      
			  if ( isset( $instance[ 'description' ] ) ) {
				  $description = $instance[ 'description' ];
			  }
			  else {
				  $description = __( 'New description', 'product_widget_domain' );
			  }
         
			  if ( isset( $instance[ 'image_uri' ] ) ) {
				  $image_uri = $instance[ 'image_uri' ];
			  }
			  else {
				  $image_uri = __( 'New image_uri', 'product_widget_domain' );
			  }
        
			  // Widget admin form
			  ?>
			  <p>
			    <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
			    <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
			  </p>
        <p>
          <label for=""
            <?php echo $this->get_field_id( 'description' ); ?>"><?php _e( 'Description:' ); ?>
          </label>
          <input class="widefat" id=""<?php echo $this->get_field_id( 'description' ); ?>" name="<?php echo $this->get_field_name( 'description' ); ?>" type="text" value="<?php echo esc_attr( $description ); ?>" />
        </p>

        <p>

          <label for="<?php echo $this->get_field_id('image_uri'); ?>"><?php _e('Image', 'zerif-lite'); ?></label><br/>

          <?php
              if ( !empty($instance['image_uri']) ) :
                  echo '<img class="custom_media_image_team" src="' . $instance['image_uri'] . '" style="margin:0;padding:0;max-width:100px;float:left;display:inline-block" /><br />';
              endif;
           ?>

          <input type="text" class="widefat custom_media_url_team" name="<?php echo $this->get_field_name('image_uri'); ?>"id="<?php echo $this->get_field_id('image_uri'); ?>" value="<?php if( !empty($instance['image_uri']) ): echo $instance['image_uri']; endif; ?>" style="margin-top:5px;">

          <input type="button" class="button button-primary custom_media_button_team" id="custom_media_button_clients" name="<?php echo $this->get_field_name('image_uri'); ?>" value="<?php _e('Upload Image','zerif-lite'); ?>" style="margin-top:5px;"/>

      </p>
        
        
			<?php 
		  }
	
		  // Updating widget replacing old instances with new
		  public function update( $new_instance, $old_instance ) {
    
			  $instance = array();
			  $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
			  $instance['description'] = ( ! empty( $new_instance['description'] ) ) ? strip_tags( $new_instance['description'] ) : '';
        
        $instance['image_uri'] =   ( ! empty( $new_instance['image_uri'] ) ) ? strip_tags( $new_instance['image_uri'] ) : '';
        
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
