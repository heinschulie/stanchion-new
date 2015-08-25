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


						$zerif_ourteam_title = get_theme_mod('zerif_ourteam_title',__('OUR DIRECTORS','stanchion'));
					
						if( !empty($zerif_ourteam_title) ):
							echo '<h2 class="dark-text stanchion-team-title">'.__($zerif_ourteam_title,'stanchion').'</h2>';
						endif;

					echo '</div>';

					echo '<div class="row" data-scrollreveal="enter left after 0s over 0.8s">';
						dynamic_sidebar( 'sidebar-ourteam' );
					echo '</div> ';

				echo '</div>';

			echo '</section>';

?>

