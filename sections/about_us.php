<section class="about-us" id="aboutus">
	<div class="container">

		<!-- SECTION HEADER -->

		<div class="section-header">

			<!-- SECTION TITLE -->

			<?php 
			
			global $wp_customize;
			
			$zerif_aboutus_title = get_theme_mod('zerif_aboutus_title',__('About','zerif-lite'));
			
			if( !empty($zerif_aboutus_title) ):
				echo '<h2 class="white-text">'. wp_kses_post( $zerif_aboutus_title ) .'</h2>';
			elseif ( isset( $wp_customize ) ):	
				echo '<h2 class="white-text zerif_hidden_if_not_customizer"></h2>';
			endif;
			?>

		</div><!-- / END SECTION HEADER -->

		<!-- 3 COLUMNS OF ABOUT US-->

		<div class="row">

			<!-- COLUMN 1 - BIG MESSAGE ABOUT THE COMPANY-->

		<?php

			$zerif_aboutus_biglefttitle 	= get_theme_mod('zerif_aboutus_biglefttitle',__('Everything you see here is responsive and mobile-friendly.','zerif-lite'));
			$zerif_aboutus_text 			= get_theme_mod('zerif_aboutus_text','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla nec massa enim. Aliquam viverra at est ullamcorper sollicitudin. Proin a leo sit amet nunc malesuada imperdiet pharetra ut eros.<br><br> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla nec massa enim. Aliquam viverra at est ullamcorper sollicitudin. Proin a leo sit amet nunc malesuada imperdiet pharetra ut eros. <br><br>Mauris vel nunc at ipsum fermentum pellentesque quis ut massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Maecenas non adipiscing massa. Sed ut fringilla sapien. Cras sollicitudin, lectus sed tincidunt cursus, magna lectus vehicula augue, a lobortis dui orci et est.');
			$zerif_aboutus_text_2 			= get_theme_mod('zerif_aboutus_text_2','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla nec massa enim. Aliquam viverra at est ullamcorper sollicitudin. Proin a leo sit amet nunc malesuada imperdiet pharetra ut eros.<br><br> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla nec massa enim. Aliquam viverra at est ullamcorper sollicitudin. Proin a leo sit amet nunc malesuada imperdiet pharetra ut eros. <br><br>Mauris vel nunc at ipsum fermentum pellentesque quis ut massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Maecenas non adipiscing massa. Sed ut fringilla sapien. Cras sollicitudin, lectus sed tincidunt cursus, magna lectus vehicula augue, a lobortis dui orci et est.');
			$zerif_aboutus_text_3 			= get_theme_mod('zerif_aboutus_text_3','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla nec massa enim. Aliquam viverra at est ullamcorper sollicitudin. Proin a leo sit amet nunc malesuada imperdiet pharetra ut eros.<br><br> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla nec massa enim. Aliquam viverra at est ullamcorper sollicitudin. Proin a leo sit amet nunc malesuada imperdiet pharetra ut eros. <br><br>Mauris vel nunc at ipsum fermentum pellentesque quis ut massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Maecenas non adipiscing massa. Sed ut fringilla sapien. Cras sollicitudin, lectus sed tincidunt cursus, magna lectus vehicula augue, a lobortis dui orci et est.');
			$colCount = 4;

			if( !empty($zerif_aboutus_biglefttitle) ):

				echo '<div class="col-lg-12 col-md-12 column zerif-rtl-big-title">';

					echo '<div class="big-intro" data-scrollreveal="enter left after 0s over 1s">';

						echo wp_kses_post( $zerif_aboutus_biglefttitle );

					echo '</div>';

				echo '</div>';

			endif;

			if( !empty($zerif_aboutus_text) ):

				echo '<div class="col-lg-' . $colCount . ' col-md-' . $colCount . ' column zerif_about_us_center " data-scrollreveal="enter bottom after 0s over 1s">';
					
					echo '<div class="icone text-center">';
					
						echo '<img src="./img/icon/icon-bourse.png" />';
					
					echo '</div>';

					echo '<p class="text-big">';

						echo wp_kses_post( $zerif_aboutus_text );

					echo '</p>';

				echo '</div>';

			endif;

			if( !empty($zerif_aboutus_text_2) ):

				echo '<div class="col-lg-' . $colCount . ' col-md-' . $colCount . ' column zerif_about_us_center " data-scrollreveal="enter bottom after 0s over 1s">';
					
					echo '<div class="icone text-center">';
					
						echo '<img src="./img/icon/icon-equality.png" />';
					
					echo '</div>';

					echo '<p class="text-big">';

						echo wp_kses_post( $zerif_aboutus_text_2 );

					echo '</p>';

				echo '</div>';

			endif;

			if( !empty($zerif_aboutus_text_3) ):

				echo '<div class="col-lg-' . $colCount . ' col-md-' . $colCount . ' column zerif_about_us_center " data-scrollreveal="enter bottom after 0s over 1s">';
					
					echo '<div class="icone text-center">';
					
						echo '<img src="./img/icon/icon-education.png" />';
					
					echo '</div>';

					echo '<p class="text-big">';

						echo wp_kses_post( $zerif_aboutus_text_3 );

					echo '</p>';

				echo '</div>';

			endif; ?>

	</div> <!-- / END 3 COLUMNS OF ABOUT US-->

	<!-- CLIENTS -->

</div> <!-- / END CONTAINER -->




</section> <!-- END ABOUT US SECTION -->