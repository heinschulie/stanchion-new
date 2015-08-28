<?php
/*
Plugin Name: Job Detail Widget
Description: Test Plugin for Batstone 
*/
/* Start Adding Functions Below this Line */

	// Creating the widget 
	class job_widget extends WP_Widget
	{

		function __construct() {
			parent::__construct(
			// Base ID of your widget
			'job_widget', 

			// Widget name will appear in UI
			__('Job Detail', 'job_widget_domain'), 

			// Widget description
			array( 'description' => __( 'Stanchion opportunity described in detail.', 'job_widget_domain' ), ) 
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
			  <div class="job-detail">
				  <div class="member-details">
				    <?php if( !empty($instance['title']) ): ?>
				      <h2 class="title">
					      <?php echo htmlspecialchars_decode(apply_filters('widget_title', $instance['title'])); ?>
				      </h2>
				    <?php endif; ?>
				  </div>
          <div class="member-details">
            <?php if( !empty($instance['renumeration']) ): ?>
            <p class="detailitem">
              <em>Renumeration: </em><?php echo htmlspecialchars_decode(apply_filters('widget_renumeration', $instance['renumeration'])); ?>
            </p>
            <?php endif; ?>
          </div>
          <div class="member-details">
            <?php if( !empty($instance['joblevel']) ): ?>
            <p class="detailitem">
              <em>Job Level: </em><?php echo htmlspecialchars_decode(apply_filters('widget_joblevel', $instance['joblevel'])); ?>
            </p>
            <?php endif; ?>
          </div>
          <div class="member-details">
            <?php if( !empty($instance['location']) ): ?>
            <p class="detailitem">
              <em>Location: </em><?php echo htmlspecialchars_decode(apply_filters('widget_location', $instance['location'])); ?>
            </p>
            <?php endif; ?>
          </div>
          <div class="member-details">
            <?php if( !empty($instance['education']) ): ?>
            <p class="detailitem">
              <em>Education: </em><?php echo htmlspecialchars_decode(apply_filters('widget_education', $instance['education'])); ?>
            </p>
            <?php endif; ?>
          </div>
          <div class="member-details">
            <?php if( !empty($instance['jobpolicy']) ): ?>
            <p class="detailitem">
              <em>Job Policy: </em><?php echo htmlspecialchars_decode(apply_filters('widget_jobpolicy', $instance['jobpolicy'])); ?>
            </p>
            <?php endif; ?>
          </div>
          <div class="member-details">
            <?php if( !empty($instance['type']) ): ?>
            <p class="detailitem">
              <em>Type: </em><?php echo htmlspecialchars_decode(apply_filters('widget_type', $instance['type'])); ?>
            </p>
            <?php endif; ?>
          </div>
          <div class="member-details">
            <?php if( !empty($instance['reference']) ): ?>
            <p class="detailitem">
              <em>Reference: </em><?php echo htmlspecialchars_decode(apply_filters('widget_reference', $instance['reference'])); ?>
            </p>
            <?php endif; ?>
          </div>
				  <h4>Job Description</h4><br />
          <div class="member-details">
            <?php if( !empty($instance['description']) ): ?>
            <p class="details">
              <?php echo htmlspecialchars_decode(apply_filters('widget_description', $instance['description'])); ?>
            </p>
            <?php endif; ?>
          </div>
          <h4>Key Job Functions</h4>
          <div class="member-details">
            <br />
            <?php if( !empty($instance['functions']) ): ?>
            <p class="details">
              <?php echo htmlspecialchars_decode(apply_filters('widget_functions', $instance['functions'])); ?>
            </p>
            <?php endif; ?>
          </div>
          <h6 class="application-message">To apply please send your CV to and cover letter</h6>
          <h6 class="contact-heading">Contact Details</h6>
          <div class="member-details">
            <br />
            <?php if( !empty($instance['contact']) ): ?>
            <p class="details">
              <?php echo htmlspecialchars_decode(apply_filters('widget_contact', $instance['contact'])); ?>
            </p>
            <?php endif; ?>
            <p>Stanchion Payments</p>
            <?php if( !empty($instance['contactemail']) ): ?>
              <p class="details">
                <?php echo htmlspecialchars_decode(apply_filters('widget_contactemail', $instance['contactemail'])); ?>
              </p>
            <?php endif; ?>
          </div>
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
				$title = __( 'New title', 'job_widget_domain' );
			}
			if ( isset( $instance[ 'renumeration' ] ) ) {
				$renumeration = $instance[ 'renumeration' ];
			}
			else {
				$renumeration = __( 'New renumeration', 'job_widget_domain' );
			}
			if ( isset( $instance[ 'location' ] ) ) {
				$location = $instance[ 'location' ];
			}
			else {
				$location = __( 'New location', 'job_widget_domain' );
			}
			if ( isset( $instance[ 'joblevel' ] ) ) {
				$joblevel = $instance[ 'joblevel' ];
			}
			else {
				$joblevel = __( 'New job level', 'job_widget_domain' );
			}
			if ( isset( $instance[ 'education' ] ) ) {
				$education = $instance[ 'education' ];
			}
			else {
				$education = __( 'New education level', 'job_widget_domain' );
			}
			if ( isset( $instance[ 'jobpolicy' ] ) ) {
				$jobpolicy = $instance[ 'jobpolicy' ];
			}
			else {
				$jobpolicy = __( 'New job policy', 'job_widget_domain' );
			}
			if ( isset( $instance[ 'type' ] ) ) {
				$type = $instance[ 'type' ];
			}
			else {
				$type = __( 'New type', 'job_widget_domain' );
			}
			if ( isset( $instance[ 'reference' ] ) ) {
				$reference = $instance[ 'reference' ];
			}
			else {
				$reference = __( 'New reference', 'job_widget_domain' );
			}
			if ( isset( $instance[ 'description' ] ) ) {
				$description = $instance[ 'description' ];
			}
			else {
				$description = __( 'New description', 'job_widget_domain' );
			}
			if ( isset( $instance[ 'functions' ] ) ) {
				$functions = $instance[ 'functions' ];
			}
			else {
				$functions = __( 'New functions', 'job_widget_domain' );
			}
			if ( isset( $instance[ 'contact' ] ) ) {
				$contact = $instance[ 'contact' ];
			}
			else {
				$contact = __( 'New contact', 'job_widget_domain' );
			}
			if ( isset( $instance[ 'contactemail' ] ) ) {
				$contactemail = $instance[ 'contactemail' ];
			}
			else {
				$contactemail = __( 'New contact email', 'job_widget_domain' );
			}
      
			// Widget admin form
			?>
			<p>
			  <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
			  <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
			</p>
      <p>
        <label for=""
          <?php echo $this->get_field_id( 'renumeration' ); ?>"><?php _e( 'Renumeration:' ); ?>
        </label>
        <input class="widefat" id=""<?php echo $this->get_field_id( 'renumeration' ); ?>" name="<?php echo $this->get_field_name( 'renumeration' ); ?>" type="text" value="<?php echo esc_attr( $renumeration ); ?>" />
      </p>
      <p>
        <label for=""
          <?php echo $this->get_field_id( 'location' ); ?>"><?php _e( 'Location:' ); ?>
        </label>
        <input class="widefat" id=""<?php echo $this->get_field_id( 'location' ); ?>" name="<?php echo $this->get_field_name( 'location' ); ?>" type="text" value="<?php echo esc_attr( $location ); ?>" />
      </p>
      <p>
        <label for=""
          <?php echo $this->get_field_id( 'joblevel' ); ?>"><?php _e( 'Job Level:' ); ?>
        </label>
        <input class="widefat" id=""<?php echo $this->get_field_id( 'joblevel' ); ?>" name="<?php echo $this->get_field_name( 'joblevel' ); ?>" type="text" value="<?php echo esc_attr( $joblevel ); ?>" />
      </p>
      <p>
        <label for=""
          <?php echo $this->get_field_id( 'education' ); ?>"><?php _e( 'Education:' ); ?>
        </label>
        <input class="widefat" id=""<?php echo $this->get_field_id( 'education' ); ?>" name="<?php echo $this->get_field_name( 'education' ); ?>" type="text" value="<?php echo esc_attr( $education ); ?>" />
      </p>
      <p>
        <label for=""
          <?php echo $this->get_field_id( 'jobpolicy' ); ?>"><?php _e( 'Job Policy:' ); ?>
        </label>
        <input class="widefat" id=""<?php echo $this->get_field_id( 'jobpolicy' ); ?>" name="<?php echo $this->get_field_name( 'jobpolicy' ); ?>" type="text" value="<?php echo esc_attr( $jobpolicy ); ?>" />
      </p>
      <p>
        <label for=""
          <?php echo $this->get_field_id( 'type' ); ?>"><?php _e( 'Type:' ); ?>
        </label>
        <input class="widefat" id=""<?php echo $this->get_field_id( 'type' ); ?>" name="<?php echo $this->get_field_name( 'type' ); ?>" type="text" value="<?php echo esc_attr( $type ); ?>" />
      </p>
      <p>
        <label for=""
          <?php echo $this->get_field_id( 'reference' ); ?>"><?php _e( 'Reference:' ); ?>
        </label>
        <input class="widefat" id=""<?php echo $this->get_field_id( 'reference' ); ?>" name="<?php echo $this->get_field_name( 'reference' ); ?>" type="text" value="<?php echo esc_attr( $reference ); ?>" />
      </p>
			<p>
			  <label for="<?php echo $this->get_field_id( 'description' ); ?>"><?php _e( 'Description:' ); ?></label> 
			  <input class="widefat" id="<?php echo $this->get_field_id( 'description' ); ?>" name="<?php echo $this->get_field_name( 'description' ); ?>" type="text" value="<?php echo esc_attr( $description ); ?>" />
			</p>
      <p>
        <label for=""
          <?php echo $this->get_field_id( 'functions' ); ?>"><?php _e( 'Functions:' ); ?>
        </label>
        <p class="widefat" id=""<?php echo $this->get_field_id( 'functions' ); ?>" name="<?php echo $this->get_field_name( 'functions' ); ?>" type="text" value="<?php echo esc_attr( $functions ); ?>" />
      </p>
			<p>
			  <label for="<?php echo $this->get_field_id( 'contact' ); ?>"><?php _e( 'Contact:' ); ?></label> 
			  <input class="widefat" id="<?php echo $this->get_field_id( 'contact' ); ?>" name="<?php echo $this->get_field_name( 'contact' ); ?>" type="text" value="<?php echo esc_attr( $contact ); ?>" />
			</p>
      <p>
        <label for=""
          <?php echo $this->get_field_id( 'contactemail' ); ?>"><?php _e( 'Contact Email:' ); ?>
        </label>
        <input class="widefat" id=""<?php echo $this->get_field_id( 'contactemail' ); ?>" name="<?php echo $this->get_field_name( 'contactemail' ); ?>" type="text" value="<?php echo esc_attr( $contactemail ); ?>" />
      </p>
			<?php 
		}
	
		// Updating widget replacing old instances with new
		public function update( $new_instance, $old_instance ) {
			$instance = array();
			$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
			$instance['renumeration'] = ( ! empty( $new_instance['renumeration'] ) ) ? strip_tags( $new_instance['renumeration'] ) : '';
			$instance['location'] = ( ! empty( $new_instance['location'] ) ) ? strip_tags( $new_instance['location'] ) : '';
			$instance['education'] = ( ! empty( $new_instance['education'] ) ) ? strip_tags( $new_instance['education'] ) : '';
			$instance['joblevel'] = ( ! empty( $new_instance['joblevel'] ) ) ? strip_tags( $new_instance['joblevel'] ) : '';
			$instance['jobpolicy'] = ( ! empty( $new_instance['jobpolicy'] ) ) ? strip_tags( $new_instance['jobpolicy'] ) : '';
			$instance['type'] = ( ! empty( $new_instance['type'] ) ) ? strip_tags( $new_instance['type'] ) : '';
			$instance['reference'] = ( ! empty( $new_instance['reference'] ) ) ? strip_tags( $new_instance['reference'] ) : '';
			$instance['description'] = ( ! empty( $new_instance['description'] ) ) ? strip_tags( $new_instance['description'] ) : '';
			$instance['functions'] = ( ! empty( $new_instance['functions'] ) ) ? strip_tags( $new_instance['functions'] ) : '';
			$instance['contact'] = ( ! empty( $new_instance['contact'] ) ) ? strip_tags( $new_instance['contact'] ) : '';
			$instance['contactemail'] = ( ! empty( $new_instance['contactemail'] ) ) ? strip_tags( $new_instance['contactemail'] ) : '';
			return $instance;
		}
	} // Class job_widget ends here

	// Register and load the widget
	function job_load_widget() {
		register_widget( 'job_widget' );
	}

	add_action( 'widgets_init', 'job_load_widget' );

/* Stop Adding Functions Below this Line */
?>
