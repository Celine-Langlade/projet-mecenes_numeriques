<section class="devenir_mecene" id="devenir_mecene">

	<div class="container">

		<div class="section-header">

			<!-- SECTION TITLE -->

			<?php 
			
			global $wp_customize;
			
			$zerif_devenir_mecene_title = get_theme_mod('zerif_devenir_mecene_title',__('Devenir Mécène','zerif-lite'));
			$zerif_devenir_mecene_text 	= get_theme_mod('zerif_devenir_mecene_text',"So you came back to die with your city! Master Wayne, you've been gone a long time. You look very fashionable. Apart from the mud. Peace has cost you your strength. Victory has defeated you. Criminals thrive on the indulgence of society's understanding. We have purged your fear. You are ready to Iead these men. You are ready to become a member of the League of Shadows. But first, you must demonstrate your commitment to justice. There is a prison in a more ancient part of the world. A pit where men are thrown to suffer and die. But sometimes a man rises from the darkness. Sometimes, the pit sends something back. It means you're hatred, and it also means losing someone, who I've cared for since I first heard his cries echoing through this house. But it might also mean saving your life. And that is more important. I speak for the rest of the board and Mr Wayne, in expressing our own excitement. Dr. Crane isn't here right now. But if you'd like to make an appointment.
My name is Merely Ducard but I speak for Ra's al Ghul... a man greatly feared by the criminal underworld. A mon who can offer you a path. Someone like you is only here by choice. You have been exploring the criminal fraternity but whatever your original intentions you have to become truly lost. The path of a man who shares his hatred of evil and wishes to serve true justice. The path of the League of Shadows. Yes. The fire rises. Bane was a member of the League of Shadows. And then he was excommunicated. And any man who is too extreme for Ra's Al Ghul, is not to be trifled with. Does it come in black? Let me get this straight. You think that your client, one of the wealthiest, most powerful men in the world is secretly a vigilante who spends his nights beating criminals to a pulp with his bare hands and your plan is to blackmail this person? Good luck.");
			$zerif_devenir_mecene_entreprise_title = get_theme_mod('zerif_devenir_mecene_entreprise_title',__('Entreprise','zerif-lite'));
			$zerif_devenir_mecene_particulier_title = get_theme_mod('zerif_devenir_mecene_particulier_title',__('Particulier','zerif-lite'));
			$zerif_devenir_mecene_entreprise_text = get_theme_mod('zerif_devenir_mecene_entreprise_text',__('Entreprise','zerif-lite'));
			$zerif_devenir_mecene_particulier_text = get_theme_mod('zerif_devenir_mecene_particulier_text',__('Particulier','zerif-lite'));

			switch (
				(empty($zerif_devenir_mecene_entreprise_title) ? 0 : 1)
				+ (empty($zerif_devenir_mecene_particulier_title) ? 0 : 1)
				) {
				case 2:
					$colCount = 6;
					break;
				default:
					$colCount = 12;
			}



			?>

			<div class="row">

			<?php

			if( !empty($zerif_devenir_mecene_title) ):
				echo '<h2 class="white-text">'. wp_kses_post( $zerif_devenir_mecene_title ) .'</h2>';
			elseif ( isset( $wp_customize ) ):	
				echo '<h2 class="white-text zerif_hidden_if_not_customizer"></h2>';
			endif;

			if( !empty($zerif_devenir_mecene_text) ):

				echo '<div class="col-lg-12 col-md-12" data-scrollreveal="enter bottom after 0s over 1s">';

					echo '<p>';

						echo wp_kses_post( $zerif_devenir_mecene_text );

					echo '</p>';

				echo '</div>';

			endif;

			?>

			</div>

			<div class="row">

				<?php if( !empty( $zerif_devenir_mecene_entreprise_title ) ):

				echo '<div class="col-lg-' . $colCount . ' col-md-' . $colCount . '" data-scrollreveal="enter bottom after 0s over 1s">'; ?>

					<h3><?php echo wp_kses_post( $zerif_devenir_mecene_entreprise_title ); ?></h3>

					<?php if( !empty($zerif_devenir_mecene_entreprise_text) ): ?>

					<div class="text-center">

						<p>
							<?php echo wp_kses_post( $zerif_devenir_mecene_entreprise_text ); ?>
						</p>

					</div>
					<p>
						<button type="button" class="btn btn-default btn-lg" data-toggle="modal" data-target=".bs-example-modal-lg">Faire un don!</button>
					</p>
			        <!-- Modal -->	
			        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
			        	<div class="modal-dialog">
			            	<div class="modal-content">
			              		<div class="modal-header">
			                		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			                		<h4 class="modal-title rainbow" id="gridSystemModalLabel"><b><i>Formulaire de Contact</i></b></h4>
			              		</div>
				              	<div class="modal-body">
					                <form class="form-horizontal" role="form">
										<div class="form-group">
									    	<label class="control-label col-md-4" for="nom">Nom:</label>
									    	<div class="col-md-6">
									    		<input type="text" class="form-control" id="nom" required>
									    	</div>
									  	</div>
									  	<div class="form-group">
									    	<label class="control-label col-md-4" for="email">Adresse Email:</label>
									    	<div class="col-md-6">
									    		<input type="email" class="form-control" id="email" required>
									    	</div>
									  	</div>
									  	<div class="form-group">
									    	<label class="control-label col-md-4" for="phone">T&eacute;l&eacute;phone:</label>
									    	<div class="col-md-6">
									    		<input type="tel" class="form-control" id="phone" required>
									    	</div>
									  	</div>
									  	<div class="form-group">
									    	<label class="control-label col-md-4" for="objet">Objet:</label>
									    	<div class="col-md-6">
									    		<input type="text" class="form-control" id="objet" required>
									    	</div>
									  	</div>
									  	<div class="form-group">
									    	<label class="control-label col-md-4" for="comment">Votre message:</label>
									    	<div class="col-md-6">
									    		<textarea class="form-control" rows="10" id="comment"></textarea>
									    	</div>
									  	</div>
									  	<div class="form-group">
										  	<div class="col-md-6 col-md-offset-4">
										  		<button type="submit" class="btn btn-info btn-lg">Envoyer</button>
										  	</div>
										</div>
									</form>
			            		</div>
			        		</div><!-- /.modal-content -->
			    		</div><!-- /.modal-dialog -->
					</div>  <!-- Fin Modal -->
					<?php endif; ?>
				</div>

				<?php endif;

				if( !empty($zerif_devenir_mecene_particulier_title) ):

				echo '<div class="col-lg-' . $colCount . ' col-md-' . $colCount . '" data-scrollreveal="enter bottom after 0s over 1s">'; ?>

					<h3><?php echo wp_kses_post( $zerif_devenir_mecene_particulier_title ); ?></h3>

					<?php if( !empty($zerif_devenir_mecene_particulier_text) ): ?>

					<div class="text-center">

						<p>
							<?php echo wp_kses_post( $zerif_devenir_mecene_particulier_text ); ?>
						</p>

					</div>

					<?php endif; ?>

					<button class="btn btn-default btn-lg">Faire un don!</button>

				</div>

				<?php endif; ?>

			</div>

		</div>

	</div> <!-- / END CONTAINER -->

</section> <!-- END ABOUT US Devenir Mecene -->