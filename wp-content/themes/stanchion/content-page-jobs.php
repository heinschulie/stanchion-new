<?php

/**

 * The template used for displaying page content in page.php

 *

 * @package stanchion!

 */

?>



<?php

			echo '<section class="our-team stanchion-team" id="team">';

				echo '<div class="container">';

					echo '<div class="section-header">';

						$zerif_ourjobs_title = get_theme_mod('zerif_ourjobs_title',__('Explore. Integrate. Deliver. ','stanchion'));
					
						if( !empty($zerif_ourjobs_title) ):
							echo '<h2 class="stanchion-slogan stanchion-sidepage-title">'.__($zerif_ourjobs_title,'stanchion').'</h2>';
						endif;

					echo '</div>';

          echo '<div class="section-description">';

						$zerif_ourjobs_description = get_theme_mod('zerif_ourjobs_description',__('Stanchion employs talented people looking to explore and innovate. We are looking for people who want to challenge and stretch themselves to find and implement radical improvements to the payments space. <br/><br/> Sound good? Then join us. Below are the roles we are currently looking to fill but if you don’t find something immediately please send a two page CV to us at careers@stanchionpayments.com with a paragraph on what you would like to do with us.','stanchion'));
					
						if( !empty($zerif_ourjobs_description) ):
							echo '<p class="stanchion-bodycopy">'.__($zerif_ourjobs_description,'stanchion').'</p>';
						endif;

					echo '</div>';

					echo '<div class="row" data-scrollreveal="enter left after 0s over 0.8s">';
						theme_dynamic_sidebar( 'sidebar-ourjobs' );
					echo '</div> ';

				echo '</div>';

			echo '</section>';

?>

