<section class="devenir_mecene" id="devenir_mecene">

	<div class="container">


		<!-- SECTION TITLE -->

		<?php 
		
		global $wp_customize;
		
		$zerif_devenir_mecene_title 				= get_theme_mod('zerif_devenir_mecene_title',__('Devenir Mécène','zerif-lite'));
		$zerif_devenir_mecene_text 					= get_theme_mod('zerif_devenir_mecene_text',"So you came back to die with your city! Master Wayne, you've been gone a long time. You look very fashionable. Apart from the mud. Peace has cost you your strength. Victory has defeated you. Criminals thrive on the indulgence of society's understanding. We have purged your fear. You are ready to Iead these men. You are ready to become a member of the League of Shadows. But first, you must demonstrate your commitment to justice. There is a prison in a more ancient part of the world. A pit where men are thrown to suffer and die. But sometimes a man rises from the darkness. Sometimes, the pit sends something back. It means you're hatred, and it also means losing someone, who I've cared for since I first heard his cries echoing through this house. But it might also mean saving your life. And that is more important. I speak for the rest of the board and Mr Wayne, in expressing our own excitement. Dr. Crane isn't here right now. But if you'd like to make an appointment.
My name is Merely Ducard but I speak for Ra's al	 Ghul... a man greatly feared by the criminal underworld. A mon who can offer you a path. Someone like you is only here by choice. You have been exploring the criminal fraternity but whatever your original intentions you have to become truly lost. The path of a man who shares his hatred of evil and wishes to serve true justice. The path of the League of Shadows. Yes. The fire rises. Bane was a member of the League of Shadows. And then he was excommunicated. And any man who is too extreme for Ra's Al Ghul, is not to be trifled with. Does it come in black? Let me get this straight. You think that your client, one of the wealthiest, most powerful men in the world is secretly a vigilante who spends his nights beating criminals to a pulp with his bare hands and your plan is to blackmail this person? Good luck.");
		$zerif_devenir_mecene_entreprise_title 		= get_theme_mod('zerif_devenir_mecene_entreprise_title',__('Entreprise','zerif-lite'));
		$zerif_devenir_mecene_particulier_title 	= get_theme_mod('zerif_devenir_mecene_particulier_title',__('Particulier','zerif-lite'));
		$zerif_devenir_mecene_entreprise_text 		= get_theme_mod('zerif_devenir_mecene_entreprise_text',__('Entreprise','zerif-lite'));
		$zerif_devenir_mecene_particulier_text		= get_theme_mod('zerif_devenir_mecene_particulier_text',__('Particulier','zerif-lite'));
		$zerif_devenir_mecene_paypal_id 			= get_theme_mod('zerif_devenir_mecene_paypal_id',__('mecenesdunumerique@gmail.com','zerif-lite'));
		$zerif_devenir_mecene_paypal_boutton_text	= get_theme_mod('zerif_devenir_mecene_paypal_boutton_text',__('Donner avec Paypal','zerif-lite'));


		// Ajustement automatique des colonnes selon le contenu responsive

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

		<?php //Titre ?>

		<div class="row">

			<div class="section-header">

				<?php

				if( !empty($zerif_devenir_mecene_title) ):
					echo '<h2 class="white-text">'. wp_kses_post( $zerif_devenir_mecene_title ) .'</h2>';
				elseif ( isset( $wp_customize ) ):	
					echo '<h2 class="white-text zerif_hidden_if_not_customizer"></h2>';
				endif;

				?>

			</div>

		</div>

		<?php //Texte ?>

		<div class="row">	

			<?php

			if( !empty($zerif_devenir_mecene_text) ):

				echo '<div class="col-lg-12 col-md-12" data-scrollreveal="enter top after 0s over 1s">';

					echo '<p>';

						echo wp_kses_post( $zerif_devenir_mecene_text );

					echo '</p>';

				echo '</div>';

			endif;

			?>

		</div>

		<?php //Colonnes titre et texte dons ?>

		<div class="row">

			<?php

			//Colonne titre et texte entreprise

			if( !empty( $zerif_devenir_mecene_entreprise_title ) ):

				echo '<div class="col-lg-' . $colCount . ' col-md-' . $colCount . '" data-scrollreveal="enter left after 0s over 1.5s">'; ?>

					<h3><?php echo wp_kses_post( $zerif_devenir_mecene_entreprise_title ); ?></h3>

					<?php if( !empty($zerif_devenir_mecene_entreprise_text) ): ?>

					<div class="text-center">

						<p>
							<?php echo wp_kses_post( $zerif_devenir_mecene_entreprise_text ); ?>
						</p>

					</div>

					<?php endif; ?>

				</div>

			<?php endif;

			// Colonne titre et texte particulier

			if( !empty($zerif_devenir_mecene_particulier_title) ):

			echo '<div class="col-lg-' . $colCount . ' col-md-' . $colCount . '" data-scrollreveal="enter right after 0s over 1.5s">'; ?>

				<h3><?php echo wp_kses_post( $zerif_devenir_mecene_particulier_title ); ?></h3>

				<?php if( !empty($zerif_devenir_mecene_particulier_text) ): ?>

				<div class="text-center">

					<p>
						<?php echo wp_kses_post( $zerif_devenir_mecene_particulier_text ); ?>
					</p>

				</div>

				<?php endif; ?>

			</div>

			<?php endif; ?>

		</div>

		<?php //Boutons dons ?>

		<div class="row">

			<?php

			if( !empty( $zerif_devenir_mecene_entreprise_title ) ):

			//Bouton entreprise

			echo '<div class="col-lg-' . $colCount . ' col-md-' . $colCount . '" data-scrollreveal="enter left after 0s over 2s">'; ?>

				<p>
					<button type="button" class="btn btn-default btn-lg" data-toggle="modal" data-target=".bs-example-modal-lg">Faire un don!</button>
				</p>

		       <!-- Modal -->	
		        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
		        	<div class="modal-dialog modal-lg">
		            	<div class="modal-content">
		              		<div class="modal-header">
		                		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		                		<h4 class="modal-title rainbow" id="gridSystemModalLabel"><i>Formulaire de Contact</i></h4>
		              		</div>
			              	<div class="modal-body">
				                <form role="form">
									<div class="form-group">
								    	<label for="nom">Nom:</label>
								    	<input type="text" class="form-control" id="nom">
								  	</div>
								  	<div class="form-group">
								    	<label for="email">Adresse Email:</label>
								    	<input type="email" class="form-control" id="email">
								  	</div>
								  	<div class="form-group">
								    	<label for="phone">T&eacute;l&eacute;phone:</label>
								    	<input type="tel" class="form-control" id="phone">
								  	</div>
								  	<div class="form-group">
								    	<label for="objet">Objet:</label>
								    	<input type="text" class="form-control" id="objet">
								  	</div>
								  	<div class="form-group">
								    	<label for="comment">Votre message:</label>
								    	<textarea class="form-control" rows="10" id="comment"></textarea>
								  	</div>
								  	<button type="submit" class="btn btn-success btn-lg">Envoyer</button>
								</form>
		            		</div>
		        		</div><!-- /.modal-content -->
		    		</div><!-- /.modal-dialog -->
				</div>  <!-- Fin Modal -->
			</div>

			<?php endif;

			if( !empty( $zerif_devenir_mecene_particulier_title ) ):

			//Bouton particulier

			echo '<div class="col-lg-' . $colCount . ' col-md-' . $colCount . '" data-scrollreveal="enter right after 0s over 2s">'; ?>

				<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
					<input type="hidden" name="cmd" value="_donations">
					<input type="hidden" name="business" value="<?php echo $zerif_devenir_mecene_paypal_id; ?>">
					<input type="hidden" name="lc" value="FR">
					<input type="hidden" name="item_name" value="Les mecenes du numerique">
					<input type="hidden" name="no_note" value="0">
					<input type="hidden" name="currency_code" value="EUR">
					<input type="hidden" name="bn" value="PP-DonationsBF:btn_donate_LG.gif:NonHostedGuest">
					<button type="submit" type="submit" class="btn btn-success btn-lg" name="submit" title="donner"><?php echo $zerif_devenir_mecene_paypal_boutton_text; ?></button>
				</form>

			</div>

			<?php endif; ?>

		</div>
		
	</div> <!-- / END CONTAINER -->

</section> <!-- END ABOUT US Devenir Mecene -->