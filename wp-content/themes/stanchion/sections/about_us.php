
<section class="about-us" >
  <h1 id="aboutus" style="position: relative; height: 100px; width: 100%;"></h1>
	<div class="container">

		<!-- SECTION HEADER -->

		<div class="section-header">

			<!-- SECTION TITLE -->

			<?php 
			$zerif_aboutus_title = get_theme_mod('zerif_aboutus_title',__('ABOUT US','zerif-lite'));
			
			if( !empty($zerif_aboutus_title) ):
				echo '<h5 class="stanchion-header" >'.__($zerif_aboutus_title,'zerif-lite').'</h5>';
			endif;
			?>

			<!-- SHORT DESCRIPTION ABOUT THE SECTION -->

			<?php


				$zerif_aboutus_subtitle = get_theme_mod('zerif_aboutus_subtitle',__('Stanchion. Payments. Solutions.','zerif-lite'));


				if( !empty($zerif_aboutus_subtitle) ):


					echo '<h2 class="stanchion-slogan">';


						echo __($zerif_aboutus_subtitle,'zerif-lite');


					echo '</h2>';


				endif;


			?>
      
		</div><!-- / END SECTION HEADER -->


		<!-- 3 COLUMNS OF ABOUT US-->


		<div class="row">


			<!-- COLUMN 1 - BIG MESSAGE ABOUT THE COMPANY-->


			<?php


			$zerif_aboutus_text = get_theme_mod('zerif_aboutus_text','Since 2001, Stanchion has supported the implementation and management of payment environments and card applications for retailers, banks, credit unions, card schemes, payment processors and payment systems around the world. <br><br>Stanchion gives clients the foresight they need, not only to implement and manage new and existing payments systems, but to predict what is happening next. It provides clients with the technology, expertise and support needed to ensure high performance, availability and total system integrity. <br><br>Stanchion has a team of more than 70 specialists, who support clients on six continents from offices in the UK, Middle East and Africa.');
			$zerif_aboutus_feature1_text = get_theme_mod('zerif_aboutus_feature1_text');

			switch (
				(empty($zerif_aboutus_biglefttitle) ? 0 : 1)
				+ (empty($zerif_aboutus_text) ? 0 : 1)
				+ (empty($zerif_aboutus_feature1_title) && empty($zerif_aboutus_feature1_text) ? 0 : 1)
			) {
				case 3:
					$colCount = 4;
					break;
				case 2:
					$colCount = 6;
					break;
				default:
					$colCount = 12;
			}


				if( !empty($zerif_aboutus_biglefttitle) ):


					echo '<div class="col-lg-' . $colCount . ' col-md-' . $colCount . ' column">';


						echo '<div class="big-intro" data-scrollreveal="enter left after 0s over 1s">';


							echo __($zerif_aboutus_biglefttitle,'zerif-lite');


						echo '</div>';


					echo '</div>';


				endif;


			if( !empty($zerif_aboutus_text) ):

				echo '<div class="col-lg-' . $colCount . ' col-md-' . $colCount . ' column" data-scrollreveal="enter bottom after 0s over 1s">';


						echo '<p class="stanchion-bodycopy">';


							echo __($zerif_aboutus_text,'zerif-lite');


						echo '</p>';


					echo '</div>';


				endif;


			?>


	</div> <!-- / END 3 COLUMNS OF ABOUT US-->


</div> <!-- / END CONTAINER -->


</section> <!-- END ABOUT US SECTION -->
