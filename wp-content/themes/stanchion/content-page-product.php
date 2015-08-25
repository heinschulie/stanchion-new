<?php

/**

 * The template used for displaying page content in page.php

 *

 * @package stanchion!

 */

?>



<?php

			echo '<section class="stanchion-jobdetail" id="productdetail">';

				echo '<div class="container">';
            
          
					echo '<div class="row" data-scrollreveal="enter left after 0s over 0.8s">';
						dynamic_sidebar( 'sidebar-productdetail' );
					echo '</div> ';        

				echo '</div>';

			echo '</section>';

?>
