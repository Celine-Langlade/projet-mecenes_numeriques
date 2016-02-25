<?php
/**
 * The template for displaying the footer.
 * Contains the closing of the #content div and all content after
 */

?>

</div><!-- .site-content -->

<footer id="footer" role="contentinfo">

<div class="container">

	<?php
		$footer_sections = 0;
		// $zerif_address = get_theme_mod('zerif_address',__('Company address','zerif-lite'));
		// $zerif_address_icon = get_theme_mod('zerif_address_icon',get_template_directory_uri().'/images/map25-redish.png');
		
		$zerif_email = get_theme_mod('zerif_email','<a href="mailto:contact@site.com">contact@site.com</a>');
		$zerif_email_icon = get_theme_mod('zerif_email_icon',get_template_directory_uri().'/images/envelope4-green.png');
		
		// $zerif_phone = get_theme_mod('zerif_phone','<a href="tel:0 332 548 954">0 332 548 954</a>');
		// $zerif_phone_icon = get_theme_mod('zerif_phone_icon',get_template_directory_uri().'/images/telephone65-blue.png');

		$zerif_socials_facebook = get_theme_mod('zerif_socials_facebook','#');
		
		$zerif_accessibility = get_theme_mod('zerif_accessibility');
		$zerif_copyright = get_theme_mod('zerif_copyright');
		
		global $wp_customize;
		
		
		if( !empty($footer_class) ) {
			
			// /* COMPANY ADDRESS */
			// if( !empty($zerif_address_icon) || !empty($zerif_address) ) { 
			// 	echo '<div class="'.$footer_class.' company-details">';
					
			// 		if( !empty($zerif_address_icon) ) { 
			// 			echo '<div class="icon-top red-text">';
			// 				 echo '<img src="'.esc_url($zerif_address_icon).'" alt="" />';
			// 			echo '</div>';
			// 		}
					
			// 		if( !empty($zerif_address) ) {
			// 			echo '<div class="zerif-footer-address">';
			// 				echo wp_kses_post( $zerif_address );
			// 			echo '</div>';
			// 		} else if( isset( $wp_customize ) ) {
			// 			echo '<div class="zerif-footer-address zerif_hidden_if_not_customizer"></div>';
			// 		}
					
			// 	echo '</div>';
			// }
			
			// /* COMPANY PHONE NUMBER */
			// if( !empty($zerif_phone_icon) || !empty($zerif_phone) ) {
			// 	echo '<div class="'.$footer_class.' company-details">';
			// 		if( !empty($zerif_phone_icon) ) {
			// 			echo '<div class="icon-top blue-text">';
			// 				echo '<img src="'.esc_url($zerif_phone_icon).'" alt="" />';
			// 			echo '</div>';
			// 		}
			// 		if( !empty($zerif_phone) ) {
			// 			echo '<div class="zerif-footer-phone">';
			// 				echo wp_kses_post( $zerif_phone );
			// 			echo '</div>';	
			// 		} else if( isset( $wp_customize ) ) {
			// 			echo '<div class="zerif-footer-phone zerif_hidden_if_not_customizer"></div>';
			// 		}		
			// 	echo '</div>';
			// }
		}
		
		// open link in a new tab when checkbox "accessibility" is not ticked
		$attribut_new_tab = (isset($zerif_accessibility) && ($zerif_accessibility != 1) ? ' target="_blank"' : '' );
		
		echo '<div class="copyright">';

			echo '<div class="row">';

				echo '<div class="col-md-4 col-ld-4">';
					if(!empty($zerif_socials_facebook)):
						echo '<ul class="social go-up-facebook">';
						
						/* facebook */
						if( !empty($zerif_socials_facebook) ):
							echo '<li><a'.$attribut_new_tab.' href="'.esc_url($zerif_socials_facebook).'" target="_blank"><i class="fa fa-facebook"></i>  Facebook</a></li>';
						endif;
						echo '</ul>';
					endif;	
				echo '</div>';
		
				echo '<div class="col-md-4 col-ld-4">';
					/* COMPANY EMAIL */
					if( !empty($zerif_email_icon) || !empty($zerif_email) ) {
						echo '<div class="text-center">';
						
							if( !empty($zerif_email_icon) ) {
								echo '<div class="icon-top green-text">';
									echo '<a href="mailto:'.wp_kses_post($zerif_email).'"><img src="'.esc_url($zerif_email_icon).'" alt="" /></a>';
								echo '</div>';
							}
							if( !empty($zerif_email) ) {
								echo '<div class="zerif-footer-email">';	
									echo '<a href="mailto:'.wp_kses_post($zerif_email).'">'.wp_kses_post( $zerif_email ).'</a>';
								echo '</div>';
							} else if( isset( $wp_customize ) ) {
								echo '<div class="zerif-footer-email zerif_hidden_if_not_customizer"></div>';
							}	
						
						echo '</div>';
					}
				echo '</div>';

				echo '<div class="col-md-4 col-ld-4">';
					if( !empty($zerif_copyright) ):
						echo '<p id="zerif-copyright" class="go-up-wcs"><a href="http://www.wildcodeschool.fr" target="_blank">'.wp_kses_post($zerif_copyright).'</a></p>';
					elseif( isset( $wp_customize ) ):
						echo '<p id="zerif-copyright" class="zerif_hidden_if_not_customizer"></p>';
					endif;
					echo '<div class="zerif-copyright-box"><a href="http://www.wildcodeschool.fr" target="_blank"><img src="img/WCS-logo.png" alt="Wild Code School logo" /></a></div>';
				echo '</div>';

			echo '</div>';

			echo '<div class="mentions-legales">';

				echo '<div class="row">';

					echo '<a href="http://www.wildcodeschool.fr">Mentions légales</a>';

				echo '</div>';

			echo '</div>';

		echo '</div>';
			
	?>

			</div> <!-- / END CONTAINER -->

		</footer> <!-- / END FOOOTER  -->


	</div><!-- mobile-bg-fix-whole-site -->

</div><!-- .mobile-bg-fix-wrap -->


<?php wp_footer(); ?>

</body>

</html>