<?php
/**
 * zerif Theme Customizer
 *
 * @package zerif
 */
/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function zerif_customize_register( $wp_customize ) {
	class Zerif_Customize_Textarea_Control extends WP_Customize_Control {
		public $type = 'textarea';
	 
		public function render_content() {
			?>
			<label>
			<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			<textarea rows="5" style="width:100%;" <?php $this->link(); ?>><?php echo esc_textarea( $this->value() ); ?></textarea>
			</label>
			<?php
		}
	}
	class Zerif_Customizer_Number_Control extends WP_Customize_Control {
		public $type = 'number';
		public function render_content() {
		?>
			<label>
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<input type="number" <?php $this->link(); ?> value="<?php echo intval( $this->value() ); ?>" />
			</label>
		<?php
		}
	}
	class Zerif_Theme_Support extends WP_Customize_Control
	{
		public function render_content()
		{
			echo __('Check out the <a href="http://themeisle.com/themes/zerif-pro-one-page-wordpress-theme/">PRO version</a> for full control over the frontpage SECTIONS ORDER and the COLOR SCHEME!','zerif-lite');
		}
	}
	
	class Zerif_Theme_Support_Googlemap extends WP_Customize_Control
	{
		public function render_content()
		{
			echo __('Check out the <a href="http://themeisle.com/themes/zerif-pro-one-page-wordpress-theme/">PRO version</a> to add a google maps section !','zerif-lite');
		}
	} 
	
	class Zerif_Theme_Support_Pricing extends WP_Customize_Control
	{
		public function render_content()
		{
			echo __('Check out the <a href="http://themeisle.com/themes/zerif-pro-one-page-wordpress-theme/">PRO version</a> to add a pricing section !','zerif-lite');
		}
	} 
	
	class Zerif_Clients_Widgets extends WP_Customize_Control
	{
		public function render_content()
		{
			echo __('To add clients here please go to:<br> Customize -> Widgets -> About us section.<br> There you must add the "Zerif - Clients widget"','zerif-lite');
		}
	}
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	$wp_customize->remove_section('colors');
	
	/***********************************************/
	/************** GENERAL OPTIONS  ***************/
	/***********************************************/
	if ( class_exists( 'WP_Customize_Panel' ) ):
	
		$wp_customize->add_panel( 'panel_general', array(
			'priority' => 30,
			'capability' => 'edit_theme_options',
			'theme_supports' => '',
			'title' => __( 'General options', 'zerif-lite' )
		) );
		
		/* Disable preloader */
		$wp_customize->add_setting( 'zerif_disable_preloader', array('sanitize_callback' => 'zerif_sanitize_text'));
		$wp_customize->add_control(
				'zerif_disable_preloader',
				array(
					'type' => 'checkbox',
					'label' => __('Disable preloader?','zerif-lite'),
					'section' => 'zerif_general_section',
					'priority'    => 2,
				)
		);

		/* Disable smooth scroll */
		$wp_customize->add_setting( 'zerif_disable_smooth_scroll', array('sanitize_callback' => 'zerif_sanitize_text'));
		$wp_customize->add_control(
				'zerif_disable_smooth_scroll',
				array(
					'type' 		=> 'checkbox',
					'label' 	=> __('Disable smooth scroll?','zerif-lite'),
					'section' 	=> 'zerif_general_section',
					'priority'	=> 3,
				)
		);
	
	else: /* Old versions of WordPress */
		
		/* Disable preloader */
		$wp_customize->add_setting( 'zerif_disable_preloader', array('sanitize_callback' => 'zerif_sanitize_text'));
		$wp_customize->add_control(
				'zerif_disable_preloader',
				array(
					'type' => 'checkbox',
					'label' => __('Disable preloader?','zerif-lite'),
					'section' => 'zerif_general_section',
					'priority'    => 2,
				)
		);

		/* Disable smooth scroll */
		$wp_customize->add_setting( 'zerif_disable_smooth_scroll', array('sanitize_callback' => 'zerif_sanitize_text'));
		$wp_customize->add_control(
				'zerif_disable_smooth_scroll',
				array(
					'type' 		=> 'checkbox',
					'label' 	=> __('Disable smooth scroll?','zerif-lite'),
					'section' 	=> 'zerif_general_section',
					'priority'	=> 3,
				)
		);
	
	endif;
	
	
	/*******************************************************/
    /************	CONTACT US SECTION *********************/
	/*******************************************************/
	$wp_customize->add_section( 'zerif_contactus_section' , array(
			'title'       => __( 'Contact us section', 'zerif-lite' ),
    	  	'priority'    => 39
	));
	/* contact us show/hide */
	$wp_customize->add_setting( 'zerif_contactus_show', array('sanitize_callback' => 'zerif_sanitize_text'));
    $wp_customize->add_control(
		'zerif_contactus_show',
		array(
			'type' => 'checkbox',
			'label' => __('Hide contact us section?','zerif-lite'),
			'section' => 'zerif_contactus_section',
			'priority'    => 1,
		)
	);
	/* contactus title */
	$wp_customize->add_setting( 'zerif_contactus_title', array('sanitize_callback' => 'zerif_sanitize_text','default' => __('Get in touch','zerif-lite')));
	$wp_customize->add_control( 'zerif_contactus_title', array(
				'label'    => __( 'Contact us section title', 'zerif-lite' ),
				'section'  => 'zerif_contactus_section',
				'settings' => 'zerif_contactus_title',
				'priority'    => 2,
	));
	/* contactus subtitle */
	$wp_customize->add_setting( 'zerif_contactus_subtitle', array('sanitize_callback' => 'zerif_sanitize_text'));
	$wp_customize->add_control( 'zerif_contactus_subtitle', array(
			'label'    => __( 'Contact us section subtitle', 'zerif-lite' ),
	      	'section'  => 'zerif_contactus_section',
	      	'settings' => 'zerif_contactus_subtitle',
			'priority'    => 3,
	));
	
	/* contactus email */
	$wp_customize->add_setting( 'zerif_contactus_email', array('sanitize_callback' => 'zerif_sanitize_text'));
			
	$wp_customize->add_control( 'zerif_contactus_email', array(
				'label'    => __( 'Email address', 'zerif-lite' ),
				'section'  => 'zerif_contactus_section',
				'settings' => 'zerif_contactus_email',
				'priority'    => 4,
	));
		
	/* contactus button label */
	$wp_customize->add_setting( 'zerif_contactus_button_label', array('sanitize_callback' => 'zerif_sanitize_text','default' => __('Send Message','zerif-lite')));
			
	$wp_customize->add_control( 'zerif_contactus_button_label', array(
				'label'    => __( 'Button label', 'zerif-lite' ),
				'section'  => 'zerif_contactus_section',
				'settings' => 'zerif_contactus_button_label',
				'priority'    => 5,
	));
	/* recaptcha */
	$wp_customize->add_setting( 'zerif_contactus_recaptcha_show', array('sanitize_callback' => 'zerif_sanitize_text'));
	$wp_customize->add_control(
		'zerif_contactus_recaptcha_show',
		array(
			'type' => 'checkbox',
			'label' => __('Hide reCaptcha?','zerif-lite'),
			'section' => 'zerif_contactus_section',
			'priority'    => 6,
		)
	);
	/* site key */
	$wp_customize->add_setting( 'zerif_contactus_sitekey', array('sanitize_callback' => 'zerif_sanitize_text'));	
	$wp_customize->add_control( 'zerif_contactus_sitekey', array(
				'label'    => __( 'Site key', 'zerif-lite' ),
				'description' => '<a href="https://www.google.com/recaptcha/admin#list" target="_blank">'.__('Create an account here','zerif').'</a> to get the Site key and the Secret key for the reCaptcha.',
				'section'  => 'zerif_contactus_section',
				'settings' => 'zerif_contactus_sitekey',
				'priority'    => 7,
	));
	/* secret key */
	$wp_customize->add_setting( 'zerif_contactus_secretkey', array('sanitize_callback' => 'zerif_sanitize_text'));	
	$wp_customize->add_control( 'zerif_contactus_secretkey', array(
				'label'    => __( 'Secret key', 'zerif-lite' ),
				'section'  => 'zerif_contactus_section',
				'settings' => 'zerif_contactus_secretkey',
				'priority'    => 8,
	));
}
add_action( 'customize_register', 'zerif_customize_register' );
/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function zerif_customize_preview_js() {
	wp_enqueue_script( 'zerif_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'zerif_customize_preview_js' );
function zerif_sanitize_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}
function zerif_sanitize_pro_version( $input ) {
    return $input;
}
function zerif_sanitize_number( $input ) {
    return force_balance_tags( $input );
}
function zerif_registers() {
    wp_register_script( 'zerif_jquery_ui', '//code.jquery.com/ui/1.10.4/jquery-ui.js', array("jquery"), '20120206', true  );
	wp_enqueue_script( 'zerif_jquery_ui' );
	wp_register_style( 'zerif_jquery_ui_css', '//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css');
	wp_enqueue_style( 'zerif_jquery_ui_css' );
	wp_register_script( 'zerif_customizer_script', get_template_directory_uri() . '/js/zerif_customizer.js', array("jquery","zerif_jquery_ui"), '20120206', true  );
	wp_enqueue_script( 'zerif_customizer_script' );
	
	wp_localize_script( 'zerif_customizer_script', 'objectL10n', array(
		
		'documentation' => __( 'Documentation', 'zerif-lite' ),
		'pro' => __('View PRO version','zerif-lite'),
		'review' => __('Leave a review (it will help us)','zerif-lite'),
		'support' => __('Support Forum','zerif-lite')
		
	) );
}
add_action( 'customize_controls_enqueue_scripts', 'zerif_registers' );
