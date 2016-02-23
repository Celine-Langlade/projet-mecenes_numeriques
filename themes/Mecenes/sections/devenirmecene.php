<section class="devenir_mecene" id="devenir_mecene">

	<div class="container">

		<div class="section-header">

			<!-- SECTION TITLE -->

			<?php 
			
			global $wp_customize;
			
			$zerif_devenir_mecene_title = get_theme_mod('zerif_devenir_mecene_title',__('Devenir Mécène','zerif-lite'));
			
			if( !empty($zerif_devenir_mecene_title) ):
				echo '<h2 class="white-text">'. wp_kses_post( $zerif_devenir_mecene_title ) .'</h2>';
			elseif ( isset( $wp_customize ) ):	
				echo '<h2 class="white-text zerif_hidden_if_not_customizer"></h2>';
			endif;

			?>

			<div class="row">

			<?php
			$zerif_devenir_mecene_text 			= get_theme_mod('zerif_devenir_mecene_text',"So you came back to die with your city! Master Wayne, you've been gone a long time. You look very fashionable. Apart from the mud. Peace has cost you your strength. Victory has defeated you. Criminals thrive on the indulgence of society's understanding. We have purged your fear. You are ready to Iead these men. You are ready to become a member of the League of Shadows. But first, you must demonstrate your commitment to justice. There is a prison in a more ancient part of the world. A pit where men are thrown to suffer and die. But sometimes a man rises from the darkness. Sometimes, the pit sends something back. It means you're hatred, and it also means losing someone, who I've cared for since I first heard his cries echoing through this house. But it might also mean saving your life. And that is more important. I speak for the rest of the board and Mr Wayne, in expressing our own excitement. Dr. Crane isn't here right now. But if you'd like to make an appointment.
My name is Merely Ducard but I speak for Ra's al Ghul... a man greatly feared by the criminal underworld. A mon who can offer you a path. Someone like you is only here by choice. You have been exploring the criminal fraternity but whatever your original intentions you have to become truly lost. The path of a man who shares his hatred of evil and wishes to serve true justice. The path of the League of Shadows. Yes. The fire rises. Bane was a member of the League of Shadows. And then he was excommunicated. And any man who is too extreme for Ra's Al Ghul, is not to be trifled with. Does it come in black? Let me get this straight. You think that your client, one of the wealthiest, most powerful men in the world is secretly a vigilante who spends his nights beating criminals to a pulp with his bare hands and your plan is to blackmail this person? Good luck.");
			$colCount = 12;


			if( !empty($zerif_devenir_mecene_text) ):

				echo '<div class="col-lg-' . $colCount . ' col-md-' . $colCount . '" data-scrollreveal="enter bottom after 0s over 1s">';

					echo '<p>';

						echo wp_kses_post( $zerif_devenir_mecene_text );

					echo '</p>';

				echo '</div>';

			endif;

			?>

			</div>

			<div class="row">

				<div class="col-ld-6 col-md-6">
					<button class="btn">Faire un don!</button>
				</div>

				<div class="col-ld-6 col-md-6">
					<button class="btn">Faire un don!</button>
				</div>
			</div>

		</div>

	</div> <!-- / END CONTAINER -->

</section> <!-- END ABOUT US Devenir Mecene -->