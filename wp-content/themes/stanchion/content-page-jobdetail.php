<?php

/**

 * The template used for displaying page content in page.php

 *

 * @package stanchion!

 */

?>



<?php

			echo '<section class="stanchion-jobdetail" id="jobdetail">';


				echo '<div class="container">';


					echo '<div class="section-header">';


						$zerif_jobdetail_title = get_theme_mod('zerif_jobdetail_title',__('Careers','stanchion'));
					
						if( !empty($zerif_jobdetail_title) ):
							echo '<h2 class="stanchion-slogan stanchion-sidepage-title">'.__($zerif_jobdetail_title,'stanchion').'</h2>';
						endif;

					echo '</div>';

					echo '<div class="row" data-scrollreveal="enter left after 0s over 0.8s">';
				  the_content(); 
					echo '</div> ';
          


				echo '</div>';

			echo '</section>';

?>

