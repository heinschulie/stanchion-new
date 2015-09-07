<?php
/*
Plugin Name: Job Detail Widget
Description: Plugin for Stanchion 
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

<div class="col-lg-12 col-sm-12 job-box">
  <div class="job-detail">
    <div class="member-details">
      <?php if( !empty($instance['title']) ): ?>
      <h2 class="title">
        <?php echo htmlspecialchars_decode(apply_filters('widget_title', $instance['title'])); ?>
      </h2>
      <?php endif; ?>
    </div>
    <h4>Job Description</h4>
    <br />
    <div class="member-details">
      <?php if( !empty($instance['description']) ): ?>
      <p class="details">
        <?php echo htmlspecialchars_decode(apply_filters('widget_description', $instance['description'])); ?>
      </p>
      <?php endif; ?>
    </div>
    <h4>Responsibilities</h4>
    <div class="member-details">
      <br />
      <?php if( !empty($instance['responsibilities']) ): ?>
      <ul>
        <?php       
              $myResponsibilities = explode('|', $instance['responsibilities']);
              foreach($myResponsibilities as $key => $item) {
                  echo '<li>', $item, '</li>'; 
              }           
            ?>
      </ul>
      <!--<p class="details">
              <?php echo htmlspecialchars_decode(apply_filters('widget_functions', $instance['functions'])); ?>
            </p>-->
      <?php endif; ?>
    </div>
    <h4>Qualifications and Experience Needed</h4>
    <div class="member-details">
      <br />
      <?php if( !empty($instance['qualifications']) ): ?>
      <ul>
        <?php       
              $myQualifications = explode('|', $instance['qualifications']);
              foreach($myQualifications as $key => $item) {
                  echo '<li>', $item, '</li>'; 
              }           
            ?>
      </ul>
      <!--<p class="details">
              <?php echo htmlspecialchars_decode(apply_filters('widget_functions', $instance['functions'])); ?>
            </p>-->
      <?php endif; ?>
    </div>
    <h4>Skills</h4>
    <div class="member-details">
      <br />
      <?php if( !empty($instance['skills']) ): ?>
      <ul>
        <?php       
              $mySkills = explode('|', $instance['skills']);
              foreach($mySkills as $key => $item) {
                  echo '<li>', $item, '</li>'; 
              }           
            ?>
      </ul>
      <?php endif; ?>
    </div>
    <h6 class="application-message">To apply please send your CV to and cover letter to:</h6>
    <div class="member-details">
      <br />     
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
			if ( isset( $instance[ 'description' ] ) ) {
				$description = $instance[ 'description' ];
			}
			else {
				$description = __( 'New description', 'job_widget_domain' );
			}
			if ( isset( $instance[ 'responsibilities' ] ) ) {
				$responsibilities = $instance[ 'responsibilities' ];
			}
			else {
				$responsibilities = __( 'New responsibilities', 'job_widget_domain' );
			}
			if ( isset( $instance[ 'qualifications' ] ) ) {
				$qualifications = $instance[ 'qualifications' ];
			}
			else {
				$qualifications = __( 'New qualifications', 'job_widget_domain' );
			}
			if ( isset( $instance[ 'skills' ] ) ) {
				$skills = $instance[ 'skills' ];
			}
			else {
				$skills = __( 'New skills', 'job_widget_domain' );
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
  <label for=""
    <?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?>
  </label>
  <input class="widefat" id=""<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>
<p>
  <label for=""
    <?php echo $this->get_field_id( 'description' ); ?>"><?php _e( 'Description:' ); ?>
  </label>
  <input class="widefat" id=""<?php echo $this->get_field_id( 'description' ); ?>" name="<?php echo $this->get_field_name( 'description' ); ?>" type="text" value="<?php echo esc_attr( $description ); ?>" />
</p>
<p>
  <label for=""
    <?php echo $this->get_field_id( 'responsibilities' ); ?>"><?php _e( 'Responsibilities:' ); ?>
  </label>
  <input class="widefat" id=""<?php echo $this->get_field_id( 'responsibilities' ); ?>" name="<?php echo $this->get_field_name( 'responsibilities' ); ?>" type="text" value="<?php echo esc_attr( $responsibilities ); ?>" />
</p>
<p>
  <label for=""
    <?php echo $this->get_field_id( 'qualifications' ); ?>"><?php _e( 'Qualifications:' ); ?>
  </label>
  <input class="widefat" id=""<?php echo $this->get_field_id( 'qualifications' ); ?>" name="<?php echo $this->get_field_name( 'qualifications' ); ?>" type="text" value="<?php echo esc_attr( $qualifications ); ?>" />
</p>
<p>
  <label for=""
    <?php echo $this->get_field_id( 'skills' ); ?>"><?php _e( 'Skills:' ); ?>
  </label>
  <input class="widefat" id=""<?php echo $this->get_field_id( 'skills' ); ?>" name="<?php echo $this->get_field_name( 'skills' ); ?>" type="text" value="<?php echo esc_attr( $skills ); ?>" />
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
			$instance['description'] = ( ! empty( $new_instance['description'] ) ) ? strip_tags( $new_instance['description'] ) : '';
			$instance['responsibilities'] = ( ! empty( $new_instance['responsibilities'] ) ) ? strip_tags( $new_instance['responsibilities'] ) : '';
			$instance['qualifications'] = ( ! empty( $new_instance['qualifications'] ) ) ? strip_tags( $new_instance['qualifications'] ) : '';
			$instance['skills'] = ( ! empty( $new_instance['skills'] ) ) ? strip_tags( $new_instance['skills'] ) : '';
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
