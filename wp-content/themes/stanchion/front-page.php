<?php get_header(); ?>


<?php
if ( get_option( 'show_on_front' ) == 'page' ) {
    ?>
	<div class="clear"></div>

	</header> <!-- / END HOME SECTION  -->

	<div id="content" class="site-content">

	<div class="container">

	<div class="content-left-wrap col-md-9">

		<div id="primary" class="content-area">

			<main id="main" class="site-main" role="main">

			<?php if ( have_posts() ) : ?>

				<?php /* Start the Loop */ ?>

				<?php while ( have_posts() ) : the_post(); ?>

					<?php

						/* Include the Post-Format-specific template for the content.

						 * If you want to override this in a child theme, then include a file

						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.

						 */

						get_template_part( 'content', get_post_format() );

					?>

				<?php endwhile; ?>

				<?php zerif_paging_nav(); ?>

			<?php else : ?>

				<?php get_template_part( 'content', 'none' ); ?>

			<?php endif; ?>

			</main><!-- #main -->

		</div><!-- #primary -->

	</div><!-- .content-left-wrap -->

	<div class="sidebar-wrap col-md-3 content-left-wrap">

		<?php get_sidebar(); ?>

	</div><!-- .sidebar-wrap -->

	</div><!-- .container -->
	<?php
}else {

	if(isset($_POST['submitted'])) :

			/* recaptcha */
			
			$zerif_contactus_sitekey = get_theme_mod('zerif_contactus_sitekey');

			$zerif_contactus_secretkey = get_theme_mod('zerif_contactus_secretkey');
			
			$zerif_contactus_recaptcha_show = get_theme_mod('zerif_contactus_recaptcha_show');

			if( isset($zerif_contactus_recaptcha_show) && $zerif_contactus_recaptcha_show != 1 && !empty($zerif_contactus_sitekey) && !empty($zerif_contactus_secretkey) ) :

		        $captcha;

		        if( isset($_POST['g-recaptcha-response']) ){

		          $captcha=$_POST['g-recaptcha-response'];

		        }

		        if( !$captcha ){

		          $hasError = true;    
		          
		        }

		        $response = wp_remote_get( "https://www.google.com/recaptcha/api/siteverify?secret=".$zerif_contactus_secretkey."&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR'] );

		        if($response['body'].success==false) {

		        	$hasError = true;

		        }

	        endif;



			/* name */


			if(trim($_POST['myname']) === ''):


				$nameError = __('* Please enter your name.','zerif-lite');


				$hasError = true;


			else:


				$name = trim($_POST['myname']);


			endif;


			/* email */


			if(trim($_POST['myemail']) === ''):


				$emailError = __('* Please enter your email address.','zerif-lite');


				$hasError = true;


			elseif (!preg_match("/^[[:alnum:]][a-z0-9_.-]*@[a-z0-9.-]+\.[a-z]{2,4}$/i", trim($_POST['myemail']))) :


				$emailError = __('* You entered an invalid email address.','zerif-lite');


				$hasError = true;


			else:


				$email = trim($_POST['myemail']);


			endif;


			/* subject */


			if(trim($_POST['mysubject']) === ''):


				$subjectError = __('* Please enter a subject.','zerif-lite');


				$hasError = true;


			else:


				$subject = trim($_POST['mysubject']);


			endif;


			/* message */


			if(trim($_POST['mymessage']) === ''):


				$messageError = __('* Please enter a message.','zerif-lite');


				$hasError = true;


			else:


				$message = stripslashes(trim($_POST['mymessage']));


			endif;





			/* send the email */


			if(!isset($hasError)):


				$zerif_contactus_email = get_theme_mod('zerif_contactus_email');
				
				if( empty($zerif_contactus_email) ):
				
					$emailTo = get_theme_mod('zerif_email');
				
				else:
					
					$emailTo = $zerif_contactus_email;
				
				endif;


				if(isset($emailTo) && $emailTo != ""):

					if( empty($subject) ):
						$subject = 'From '.$name;
					endif;

					$body = "Name: $name \n\nEmail: $email \n\n Subject: $subject \n\n Message: $message";


					$headers = 'From: '.$name.' <'.$emailTo.'>' . "\r\n" . 'Reply-To: ' . $email;


					wp_mail($emailTo, $subject, $body, $headers);


					$emailSent = true;


				else:


					$emailSent = false;


				endif;


			endif;


		endif;


	$zerif_bigtitle_show = get_theme_mod('zerif_bigtitle_show');

	if( isset($zerif_bigtitle_show) && $zerif_bigtitle_show != 1 ):

		include get_template_directory() . "/sections/big_title.php";
	endif;


?>

</header> <!-- / END HOME SECTION  -->


<div id="content" class="site-content">

  <!--A RIBBON!-->
  <section class="howwethink" id="latestnews">
    <div class="section-header separator-one" >
      <?php		    $zerif_ourfocus_title = get_theme_mod('zerif_ourfocus_title',__('LATEST NEWS','zerif-lite'));
		
		    if( !empty($zerif_ourfocus_title) ):
			    echo '<h5 class="stanchion-header white-text">'.__($zerif_ourfocus_title,'zerif-lite').'</h5>';
		    endif;	
		  ?>

      <?php 
      
      /* HOW WE THINK */
        $zerif_latestnews_show = get_theme_mod('zerif_latestnews_show');

        if( isset($zerif_latestnews_show) && $zerif_latestnews_show != 1 ):

        include get_template_directory() . "/sections/latest_news.php";

        endif;
      
      ?>

    </div>
  </section>
  
<?php

  

	/* WHAT WE DO SECTION */

	$zerif_ourfocus_show = get_theme_mod('zerif_ourfocus_show');

	if( isset($zerif_ourfocus_show) && $zerif_ourfocus_show != 1 ):
		include get_template_directory() . "/sections/our_focus.php";
	endif;


	/* RIBBON WITH BOTTOM BUTTON */


	include get_template_directory() . "/sections/ribbon_with_bottom_button.php";


  /* RESULTS SECTION */

	include get_template_directory() . "/sections/our_results.php";
  
  
  
	/* CLIENTS */

	$zerif_aboutus_show = get_theme_mod('zerif_aboutus_show');

	if( isset($zerif_aboutus_show) && $zerif_aboutus_show != 1 ):

		include get_template_directory() . "/sections/our_clients.php";
	endif;
  
  ?>
  
  <!--A RIBBON!-->
  <section class="howwethink" id="howwethink">
    <div class="section-header separator-one" >
      
      <?php		    $zerif_ourfocus_title = get_theme_mod('zerif_ourfocus_title',__('HOW WE THINK','zerif-lite'));
		
		    if( !empty($zerif_ourfocus_title) ):
			    echo '<h5 class="stanchion-header white-text">'.__($zerif_ourfocus_title,'zerif-lite').'</h5>';
		    endif;	
		  ?>

      <?php		    $zerif_ourfocus_subtitle = get_theme_mod('zerif_ourfocus_subtitle',__('Speed. Security. Measurability. Foresight.','zerif-lite'));

		    if( !empty($zerif_ourfocus_subtitle) ):

			    echo '<h2 class="stanchion-slogan white-text">'.__($zerif_ourfocus_subtitle,'zerif-lite').'</h2>';

		    endif;

		  ?>

      <!--<?php

		    $zerif_ourfocus_subtitle = get_theme_mod('zerif_ourfocus_subtitle',__('By giving clients the correct data, and access to Stanchion\'s decades of experience, they can make the right decisions - transforming information into action.','zerif-lite'));

		    if( !empty($zerif_ourfocus_subtitle) ):
    
			    echo '<h4 class="stanchion-description white-text" id="stanchion-padding-bottom">'.__($zerif_ourfocus_subtitle,'zerif-lite').'</h4>';

		    endif;
	    ?>-->
      
      <?php 
      
      /* HOW WE THINK */
        $zerif_latestnews_show = get_theme_mod('zerif_latestnews_show');

        if( isset($zerif_latestnews_show) && $zerif_latestnews_show != 1 ):

        include get_template_directory() . "/sections/how_we_think.php";

        endif;
      
      ?>
      
    </div>
  </section>

  <?php
    /* ABOUT US */

    $zerif_aboutus_show = get_theme_mod('zerif_aboutus_show');

    if( isset($zerif_aboutus_show) && $zerif_aboutus_show != 1 ):

    include get_template_directory() . "/sections/about_us.php";
    endif;


    /* CONTACT US */
    $zerif_contactus_show = get_theme_mod('zerif_contactus_show');

    if( isset($zerif_contactus_show) && $zerif_contactus_show != 1 ):
    
  ?>
  
  <section class="contact-us" id="contact">
			<div class="container">
				<!-- SECTION HEADER -->
				<div class="section-header">
					
					<?php
					
						$zerif_contactus_title = get_theme_mod('zerif_contactus_title','GET IN TOUCH');
						if ( !empty($zerif_contactus_title) ):
							echo '<h5 class="stanchion-header">'.$zerif_contactus_title.'</h5>';
						endif;
					
						$zerif_contactus_subtitle = get_theme_mod('zerif_contactus_subtitle');
						if(isset($zerif_contactus_subtitle) && $zerif_contactus_subtitle != ""):
							echo '<h6 class="white-text">'.$zerif_contactus_subtitle.'</h6>';
						endif;
					?>
				</div>
				<!-- / END SECTION HEADER -->

				<!-- CONTACT FORM-->
				<div class="row">

					<?php

						if(isset($emailSent) && $emailSent == true) :

							echo '<div class="notification success"><p>'.__('Thanks, your email was sent successfully!','zerif-lite').'</p></div>';

						elseif(isset($_POST['submitted'])):

							echo '<div class="notification error"><p>'.__('Sorry, an error occured.','zerif-lite').'</p></div>';

						endif;

						if(isset($nameError) && $nameError != '') :

							echo '<div class="notification error"><p>'.esc_html($nameError).'</p></div>';

						endif;

						if(isset($emailError) && $emailError != '') :

							echo '<div class="notification error"><p>'.esc_html($emailError).'</p></div>';

						endif;

						if(isset($subjectError) && $subjectError != '') :

							echo '<div class="notification error"><p>'.esc_html($subjectError).'</p></div>';

						endif;

						if(isset($messageError) && $messageError != '') :

							echo '<div class="notification error"><p>'.esc_html($messageError).'</p></div>';

						endif;

					?>

					<form role="form" method="POST" action="" onSubmit="this.scrollPosition.value=(document.body.scrollTop || document.documentElement.scrollTop)" class="contact-form">

						<input type="hidden" name="scrollPosition">

						<input type="hidden" name="submitted" id="submitted" value="true" />

						<div class="col-lg-4 col-sm-4" data-scrollreveal="enter left after 0s over 1s">

							<input required="required" type="text" name="myname" placeholder="Your Name" class="form-control input-box" value="<?php if(isset($_POST['myname'])) echo esc_attr($_POST['myname']);?>">

						</div>

						<div class="col-lg-4 col-sm-4" data-scrollreveal="enter left after 0s over 1s">

							<input required="required" type="email" name="myemail" placeholder="Your Email" class="form-control input-box" value="<?php if(isset($_POST['myemail'])) echo is_email($_POST['myemail']) ? $_POST['myemail'] : ""; ?>">

						</div>

						<div class="col-lg-4 col-sm-4" data-scrollreveal="enter left after 0s over 1s">

							<input required="required" type="text" name="mysubject" placeholder="Subject" class="form-control input-box" value="<?php if(isset($_POST['mysubject'])) echo esc_attr($_POST['mysubject']);?>">

						</div>

						<div class="col-lg-12 col-sm-12" data-scrollreveal="enter right after 0s over 1s">

							<textarea name="mymessage" class="form-control textarea-box" placeholder="Your Message"><?php if(isset($_POST['mymessage'])) { echo esc_html($_POST['mymessage']); } ?></textarea>

						</div>
	
						<?php
							$zerif_contactus_button_label = get_theme_mod('zerif_contactus_button_label','SUBMIT');
							if( !empty($zerif_contactus_button_label) ):
								echo '<button class="btn btn-primary custom-button orange-btn" type="submit" data-scrollreveal="enter left after 0s over 1s">'.$zerif_contactus_button_label.'</button>';
							endif;
						?>
						
						<?php 

							$zerif_contactus_sitekey = get_theme_mod('zerif_contactus_sitekey');
							$zerif_contactus_secretkey = get_theme_mod('zerif_contactus_secretkey');
							$zerif_contactus_recaptcha_show = get_theme_mod('zerif_contactus_recaptcha_show');

							if( isset($zerif_contactus_recaptcha_show) && $zerif_contactus_recaptcha_show != 1 && !empty($zerif_contactus_sitekey) && !empty($zerif_contactus_secretkey) ) :

								echo '<div class="g-recaptcha" data-sitekey="' . $zerif_contactus_sitekey . '"></div>';

							endif;

						?>

					</form>

				</div>

				<!-- / END CONTACT FORM-->


        <!-- MAPS AND CONTACT DETAILS -->
        
        <div class="col-md-6 stanchion-address-block" data-scrollreveal="enter left after 0s over 1s" >
          <div class="col-md-6">
            <p class="address-header">STANCHION PAYMENT SOLUTIONS AFRICA (PTY) LTD</p>
            <p>REG.NO. 2011/142194/07</p>
            <br />
            <p class="registered-address">REGISTERED ADDRESS</p>
            <p>South Block, 1st Floor Avanti office Towers</p>
            <p>35 Carl Cronje Drive, Tyger Falls Belville, 7530</p>
            <br />
            <p>T: +27 21 461 6464 F: +27 86 619 0879</p>
          </div>
          <div class="col-md-6">
            <iframe class="zerif_google_map lazyloaded" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?&amp;q=Belville%2C+35+Carl+Cronje+Drive&amp;output=embed&amp;iwloc" data-lazy-src="https://maps.google.com/maps?&amp;q=Belville%2C+Carl+Cronje+Drive&amp;output=embed&amp;iwloc"></iframe>
          </div>
        </div>
        <div class="col-md-6 stanchion-address-block" data-scrollreveal="enter left after 0s over 1s" >
          <div class="col-md-6">
            <p class="address-header">STANCHION PAYMENT SOLUTIONS AFRICA (PTY) LTD</p>
            <p>REG.NO. 2011/142194/07</p>
            <br />
            <p class="registered-address">REGISTERED ADDRESS</p>
            <p>Building 1 Unit G3, Greenstone Hill Office Park</p>
            <p>Greenstone Hill</p>
            <br />
            <p>T: +27 11 452 0116 F: +27 11 452 3679</p>
          </div>
          <div class="col-md-6">
            <iframe class="zerif_google_map lazyloaded" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?&amp;q=Johannesburg%2C+Greenstone+Hill+Office+Park&amp;output=embed&amp;iwloc" data-lazy-src="https://maps.google.com/maps?&amp;q=Johannesburg%2C+Greenstone+Hill+Office+Park&amp;output=embed&amp;iwloc"></iframe>
          </div>
        </div>
        <div class="col-md-6 stanchion-address-block" data-scrollreveal="enter left after 0s over 1s" >
          <div class="col-md-6">
            <p class="address-header">STANCHION PAYMENT SOLUTIONS AFRICA (PTY) LTD</p>
            <p>REG.NO. 2011/142194/07</p>
            <br />
            <p class="registered-address">REGISTERED ADDRESS</p>
            <p>
              Office 30-23,
              Reef Tower
            </p>
            <p>Jumeirah Lake Towers</p>
            <br />
            <p>T: +971 4 4487172 F: +971 4 4487108</p>
          </div>
          <div class="col-md-6">
            <iframe class="zerif_google_map lazyloaded" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?&amp;q=Reef+Tower+-+Dubai+-+United+Arab+Emirates&amp;output=embed&amp;iwloc" data-lazy-src="https://maps.google.com/maps?&amp;q=Reef+Tower+-+Dubai+-+United+Arab+Emirates&amp;output=embed&amp;iwloc"></iframe>
          </div>
        </div>
        <div class="col-md-6 stanchion-address-block" data-scrollreveal="enter left after 0s over 1s" >
          <div class="col-md-6">
            <p class="address-header">STANCHION PAYMENT SOLUTIONS AFRICA (PTY) LTD</p>
            <p>REG.NO. 2011/142194/07</p>
            <br />
            <p class="registered-address">REGISTERED ADDRESS</p>
            <p>
              Unit 6A,
              The Quadrant Courtyard
            </p>
            <p>
              Quadrant Way, Weybridge,
              KT13 8DR
            </p>
            <br />
            <p>T: +44 203 743 9096 F: +44 203 743 9306</p>
          </div>
          <div class="col-md-6">
            <iframe class="zerif_google_map lazyloaded" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?&amp;q=The+Quadrant+Courtyard,+Quadrant+Way,+Weybridge,+Surrey+KT13+8DR,+UK&amp;output=embed&amp;iwloc" data-lazy-src="https://maps.google.com/maps?&amp;q=The+Quadrant+Courtyard,+Quadrant+Way,+Weybridge,+Surrey+KT13+8DR,+UK&amp;output=embed&amp;iwloc"></iframe>
          </div>
        </div>

        <!-- / END MAPS AND CONTACT DETAILS -->
        
			</div> <!-- / END CONTAINER -->

		</section> <!-- / END CONTACT US SECTION-->
		<?php
	endif;

}
get_footer(); ?>




  <!--<section id="map">
    <iframe class="zerif_google_map lazyloaded" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?&amp;q=New+York%2C+Leroy+Street&amp;output=embed&amp;iwloc" data-lazy-src="https://maps.google.com/maps?&amp;q=New+York%2C+Leroy+Street&amp;output=embed&amp;iwloc"></iframe>
  </section>-->
