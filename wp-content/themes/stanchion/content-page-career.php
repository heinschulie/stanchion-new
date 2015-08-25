

<?php

/**

 * The template used for displaying page content in page.php

 *

 * @package stanchion!

 */

?>



<?php

			echo '<section class="our-job stanchion-team" id="job">';


				echo '<div class="container">';


					echo '<div class="section-header">';


						$zerif_ourjobs_title = get_theme_mod('zerif_ourjobs_title',__('OUR CAREERS','zerif-lite'));
					
						if( !empty($zerif_ourjob_title) ):
							echo '<h2 class="dark-text stanchion-team-title">'.__($zerif_ourjob_title,'zerif-lite').'</h2>';
						endif;

					echo '</div>';

					echo '<div class="row" data-scrollreveal="enter left after 0s over 1s">';
						the_widget( 'zerif_job_widget','position=Project Manager&description=Hello I love you wont you tell me your NAMMMMMME', array('before_widget' => '', 'after_widget' => '') );
						the_widget( 'zerif_job_widget','name=TIMOTHY SPRAY&position=Art Director&description=Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc dapibus, eros at accumsan auctor, felis eros condimentum quam, non porttitor est urna vel neque', array('before_widget' => '', 'after_widget' => '') );
						the_widget( 'zerif_job_widget','name=TONYA GARCIA&position=Account Manager&description=Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc dapibus, eros at accumsan auctor, felis eros condimentum quam, non porttitor est urna vel neque', array('before_widget' => '', 'after_widget' => '') );
						the_widget( 'zerif_job_widget','name=JASON LANE&position=Business Development&description=Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc dapibus, eros at accumsan auctor, felis eros condimentum quam, non porttitor est urna vel neque', array('before_widget' => '', 'after_widget' => '') );
					echo '</div>';

				echo '</div>';


			echo '</section>';

?>


