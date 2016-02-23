<section class="devenir_mecene" id="devenir_mecene">
	<div class="container">

		<div class="section-header">

			<?php 
			
			global $wp_customize;
			
			$zerif_devenirmecene_title = get_theme_mod('zerif_devenirmecene_title',__('DevenirMecene','zerif-lite'));
			
			if( !empty($zerif_devenirmecene_title) ):
				echo '<h2 class="white-text">'. wp_kses_post( $zerif_devenirmecene_title ) .'</h2>';
			elseif ( isset( $wp_customize ) ):	
				echo '<h2 class="white-text zerif_hidden_if_not_customizer"></h2>';
			endif;
			?>

		</div>

		<?php

	</div> <!-- / END 3 COLUMNS OF Devenir Mecene-->

</div> <!-- / END CONTAINER -->

</section> <!-- END ABOUT US Devenir Mecene -->