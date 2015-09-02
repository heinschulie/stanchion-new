<?php
/*
Plugin Name: Job Listing Widget
Description: This is the job listing widget
*/
/* Start Adding Functions Below this Line */

	// Creating the widget 
	class bat_widget extends WP_Widget
	{

		function __construct() {
			parent::__construct(
			// Base ID of your widget
			'bat_widget', 

			// Widget name will appear in UI
			__('Job Listing', 'bat_widget_domain'), 

			// Widget description
			array( 'description' => __( 'This is the job listing plugin', 'bat_widget_domain' ), ) 
			);
		}

		// Creating widget front-end
		// This is where the action happens
		
		
		function widget($args, $instance)
		{

			extract($args);

			echo $before_widget;

			?>

			<div class="col-lg-12 col-sm-3 job-box">
			  <div class="job-member">

				<div class="member-details">
				  <?php if( !empty($instance['title']) ): ?>
				  <h2 class="title">
					<?php echo htmlspecialchars_decode(apply_filters('widget_title', $instance['title'])); ?>
				  </h2>
				  <?php endif; ?>
				</div>
				<h4>Job Description</h4><br />
				<?php if( !empty($instance['description']) ): ?>
					<p class="details">
					  <?php echo htmlspecialchars_decode(apply_filters('widget_description', $instance['description'])); ?>
					</p>
				<?php endif; ?>
				<?php if( !empty($instance['link']) ): ?>
					<a href="<?php echo htmlspecialchars_decode(apply_filters('widget_link', $instance['link'])); ?>" class="btn btn-primary custom-button job-listing-button orange-btn">
            Read More
          </a>
				<?php endif; ?>

			  </div>
			</div>

			<?php
			echo $after_widget;
		}

		// Widget Backend 
		public function form( $instance ) {
			if ( isset( $instance[ 'title' ] ) ) {
				$title = $instance[ 'title' ];
			}
			else {
				$title = __( 'New title', 'bat_widget_domain' );
			}
			if ( isset( $instance[ 'description' ] ) ) {
				$description = $instance[ 'description' ];
			}
			else {
				$description = __( 'New description', 'bat_widget_domain' );
			}
			if ( isset( $instance[ 'link' ] ) ) {
				$link = $instance[ 'link' ];
			}
			else {
				$link = __( 'New link', 'bat_widget_domain' );
			}
			// Widget admin form
			?>      
			<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
			</p>
			<p>
			<label for="<?php echo $this->get_field_id( 'description' ); ?>"><?php _e( 'Description:' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'description' ); ?>" name="<?php echo $this->get_field_name( 'description' ); ?>" type="text" value="<?php echo esc_attr( $description ); ?>" />
			</p>
			<p>
			<label for="<?php echo $this->get_field_id( 'link' ); ?>"><?php _e( 'Link:' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'link' ); ?>" name="<?php echo $this->get_field_name( 'link' ); ?>" type="text" value="<?php echo esc_attr( $link ); ?>" />
			</p>
			<?php 
		}
	
		// Updating widget replacing old instances with new
		public function update( $new_instance, $old_instance ) {
			$instance = array();
			$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
			$instance['description'] = ( ! empty( $new_instance['description'] ) ) ? strip_tags( $new_instance['description'] ) : '';
			$instance['link'] = ( ! empty( $new_instance['link'] ) ) ? strip_tags( $new_instance['link'] ) : '';
			return $instance;
		}
	} // Class bat_widget ends here

	// Register and load the widget
	function bat_load_widget() {
		register_widget( 'bat_widget' );
	}

	add_action( 'widgets_init', 'bat_load_widget' );

/* Stop Adding Functions Below this Line */
?>
