<?php get_header(); 

if ( get_option( 'show_on_front' ) == 'page' ) {
	
    include( get_page_template() );
	
}else {

		// $error = '';
		// if (!empty($_POST['submit'])) {
			
		// 	if(!empty($siret) && strlen($siret) == 14) {
				
		// 		if(is_numeric($siret)) {
					
		// 	        if (mail ($email, $subject, $message, $headers)) { 
			        	
		// 	        	$error = 'Votre message a bien été envoyé!';
			        	
		// 	        } else {
			        	
		// 	        	$error = 'Il y a eu un problème lors de l\'envoye du message!';
			        	
		// 	        }
				
		// 		} else {
					
		// 			$error = 'Le numéro de siret est uniquement composé de chiffre';
					
		// 		}
				
		// 	} else {
				
		// 		$error = 'Un numéro de siret est composé de 14 chiffres';
				
		// 	}
			
		// }


		if(isset($_POST['formEntreprise'])) :
		
			$entreprise = $_POST['entreprise'];
			$siret = $_POST['siret'];
			$nom = $_POST['nom'];
			$prenom = $_POST['prenom'];
			$adresse = $_POST['adresse'];
			$email = $_POST['email'];
			$phone = $_POST['phone'];
			$don = $_POST['don'];
			$comment = $_POST['comment'];
			$subject = 'Don de: ' . $_POST['entreprise'] . '-' . $_POST['siret'];


			/* recaptcha */
			
			$zerif_contactus_sitekey = get_theme_mod('zerif_contactus_sitekey');

			$zerif_contactus_secretkey = get_theme_mod('zerif_contactus_secretkey');
			
			$zerif_contactus_recaptcha_show = get_theme_mod('zerif_contactus_recaptcha_show');

			if( isset($zerif_contactus_recaptcha_show) && $zerif_contactus_recaptcha_show != 1 && !empty($zerif_contactus_sitekey) && !empty($zerif_contactus_secretkey) ) :

		        $captcha;

		        if( isset($_POST['g-recaptcha-response']) ){

		          $captcha=$_POST['g-recaptcha-response'];

		        }

		        if( !$captcha ){

		          $hasError = true;    
		          
		        }

		        $response = wp_remote_get( "https://www.google.com/recaptcha/api/siteverify?secret=".$zerif_contactus_secretkey."&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR'] );

		        if($response['body'].success==false) {

		        	$hasError = true;

		        }

	        endif;

			/* Nom entreprise */

			if(trim($_POST['entreprise']) === ''):

				$entrepriseError = __('* Entrez le nom de votre entreprise.','zerif-lite');

				$hasError = true;

			else:

				$entreprise = trim($_POST['entreprise']);

			endif;

			/* Siret */

			if(empty($_POST['siret']) && strlen($_POST['siret']) != 14):

				$siretError = __('* Un numéro de siret est composé de 14 chiffres.','zerif-lite');

				$hasError = true;

			else:

				if(!is_numeric($_POST['siret'])) {

					$siretError = __('* Le numéro de siret est uniquement composé de chiffre.','zerif-lite');

					$hasError = true;

				} else {

					$siret = trim($_POST['siret']);

				}

			endif;

			/* Nom */

			if(trim($_POST['nom']) === ''):

				$nameError = __('* Entrez votre nom.','zerif-lite');

				$hasError = true;

			else:

				$name = trim($_POST['nom']);

			endif;

			/* Prénom */

			if(trim($_POST['prenom']) === ''):

				$nameError = __('* Entrez votre prénom.','zerif-lite');

				$hasError = true;

			else:

				$prenom = trim($_POST['prenom']);

			endif;

			/* email */

			if(trim($_POST['email']) === ''):

				$emailError = __('* Entrez votre e-mail.','zerif-lite');

				$hasError = true;

			elseif (!preg_match("/^[[:alnum:]][a-z0-9_.-]*@[a-z0-9.-]+\.[a-z]{2,4}$/i", trim($_POST['email']))) :

				$emailError = __('* Vous avez entré un e-mail invalide.','zerif-lite');

				$hasError = true;

			else:

				$email = trim($_POST['email']);

			endif;
			
			/* phone */

			if(empty($_POST['phone']) or strlen($_POST['siret']) != 14 or !is_numeric($_POST['phone'])):

				$messageError = __('* Un numéro de téléphone est composé de 10 chiffres.','zerif-lite');

				$hasError = true;

			else:

				$message = trim($_POST['comment']);

			endif;
			
			/* don */

			if(trim($_POST['don']) === '' or !is_numeric($_POST['phone'])):

				$donError = __('* Entrez le montant de votre promesse de don.','zerif-lite');

				$hasError = true;

			else:

				$don = trim($_POST['don']);

			endif;
			
			/* message */

			if(trim($_POST['comment']) === ''):

				$commentError = __('* Entrez votre message.','zerif-lite');

				$hasError = true;

			else:

				$comment = stripslashes(trim($_POST['comment']));

			endif;

			/* send the email */

			if(!isset($hasError)):

				$zerif_contactus_email = get_theme_mod('zerif_contactus_email');
				
				if( empty($zerif_contactus_email) ):
				
					$emailTo = get_theme_mod('zerif_email');
				
				else:
					
					$emailTo = $zerif_contactus_email;
				
				endif;

				if(isset($emailTo) && $emailTo != ""):

					if( empty($subject) ):
						$subject = 'From '.$nom;
					endif;

					$body = 'Nom entreprise : '.$entreprise."\r\n".
							'Siret : '.$siret."\r\n".
							'Nom : '.$nom."\r\n".
							'Prénom : '.$prenom."\r\n".
							'Adresse : '.$adresse."\r\n".
							'Email : '.$email."\r\n".
							'Téléphone : '.$phone."\r\n".
							'Don : '.$don."\r\n".
							'Message : '.$comment."\r\n";

					/* FIXED HEADERS FOR EMAIL NOT GOING TO SPAM */
					$zerif_admin_email = get_option( 'admin_email' );
					$zerif_sitename = strtolower( $_SERVER['SERVER_NAME'] );

					function zerif_is_localhost() {
						$zerif_server_name = strtolower( $_SERVER['SERVER_NAME'] );
						return in_array( $zerif_server_name, array( 'localhost', '127.0.0.1' ) );
					}
					
					if ( zerif_is_localhost() ) {
					
						$headers = 'From: '.$nom.' <'.$zerif_admin_email.'>' . "\r\n" . 'Reply-To: ' . $email;
						
					} else {
					
						if ( substr( $zerif_sitename, 0, 4 ) == 'www.' ) {
							$zerif_sitename = substr( $zerif_sitename, 4 );
						}
						
						$headers = 'From: '.$nom.' <wordpress@'.$zerif_sitename.'>' . "\r\n" . 'Reply-To: ' . $email;
						
					}

					wp_mail($emailTo, $subject, $body, $headers);

					$emailSent = true;

				else:

					$emailSent = false;

				endif;

			endif;

		endif;


	$zerif_bigtitle_show = get_theme_mod('zerif_bigtitle_show');

	if( isset($zerif_bigtitle_show) && $zerif_bigtitle_show != 1 ):

		get_template_part( 'sections/big_title' );

	endif;

	?>

</header> <!-- / END HOME SECTION  -->

<div id="content" class="site-content">

	<?php


	/* Qui sommes-nous */

	$zerif_aboutus_show = get_theme_mod('zerif_aboutus_show');

	if( isset($zerif_aboutus_show) && $zerif_aboutus_show != 1 ):

		get_template_part( 'sections/about_us' );

	endif;

	/* Nos mécènes */

	$zerif_ourfocus_show = get_theme_mod('zerif_ourfocus_show');

	if( isset($zerif_ourfocus_show) && $zerif_ourfocus_show != 1 ):

		get_template_part( 'sections/our_focus' );

	endif;

	/* Slider projets finits */

	?>

	<section class="slider" id="slider">

			<div class="section-header">

				<h2>Nos réalisations</h2>

			</div>

	</section>

	<?php echo do_shortcode('[smartslider3 slider=2]'); 
	/* Témoignage */

	$zerif_testimonials_show = get_theme_mod('zerif_testimonials_show');

	if( isset($zerif_testimonials_show) && $zerif_testimonials_show != 1 ):

		get_template_part( 'sections/testimonials' );

	endif;

	/* Devenir Mécène */

	$zerif_devenir_mecene_show = get_theme_mod('zerif_devenir_mecene_show');

	if( isset($zerif_devenir_mecene_show) && $zerif_devenir_mecene_show != 1 ):

	 	get_template_part( 'sections/devenirmecene' );

	endif;

	
	?>

   <!-- Modal entreprise -->	
    <div class="modal fade bs-entreprise-modal-lg" tabindex="-1" role="dialog" aria-labelledby="Entreprise">
    	<div class="modal-dialog">
        	<div class="modal-content">
          		<div class="modal-header">
            		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            		<h2 class="modal-title rainbow" id="gridSystemModalLabel"><?php
            			echo $zerif_devenir_mecene_formulaire_don_entreprise_title;
            		 ?>
            		 </h2>
          		</div>
              	<div class="modal-body">
	                <form role="form" method="POST" action="" class="form-horizontal">
						<input type="hidden" name="submitted" id="submitted" value="true" />
						<div class="form-group">
					    	<label class="control-label col-md-4" for="entreprise">Nom de l'entreprise:</label>
					    	<div class="col-md-6">
					    		<input type="text" class="form-control" name="entreprise" id="entreprise" placeholder="Nom de l'entreprise" required>
					    	</div>
					  	</div>
						<div class="form-group">
					    	<label class="control-label col-md-4" for="siret">N° SIRET:</label>
					    	<div class="col-md-6">
					    		<input type="text" class="form-control" name="siret" id="siret" placeholder="12345678912345" required>
					    	</div>
					  	</div>
						<div class="form-group">
					    	<label class="control-label col-md-4" for="nom">Nom:</label>
					    	<div class="col-md-6">
					    		<input type="text" class="form-control" name="nom" id="nom" placeholder="votre nom" required>
					    	</div>
					  	</div>
						<div class="form-group">
					    	<label class="control-label col-md-4" for="prenom">Prénom:</label>
					    	<div class="col-md-6">
					    		<input type="text" class="form-control" name="prenom" id="prenom" placeholder="votre pr&eacute;nom" required>
					    	</div>
					  	</div>
					  	<div class="form-group">
					    	<label class="control-label col-md-4" for="adresse">Adresse:</label>
					    	<div class="col-md-6">
					    		<input type="text" class="form-control" name="adresse" id="adresse" placeholder="votre adresse" required>
					    	</div>
					  	</div>
					  	<div class="form-group">
					    	<label class="control-label col-md-4" for="email">Adresse Email:</label>
					    	<div class="col-md-6">
					    		<input type="email" class="form-control" name="email" id="email" placeholder="jhondoe@example.com" required>
					    	</div>
					  	</div>
					  	<div class="form-group">
					    	<label class="control-label col-md-4" for="phone">T&eacute;l&eacute;phone:</label>
					    	<div class="col-md-6">
					    		<input type="tel" class="form-control" name="phone" id="phone" placeholder="0450699887" required>
					    	</div>
					  	</div>
					  	<div class="form-group">
					    	<label class="control-label col-md-4" for="don">Montant du don:</label>
					    	<div class="col-md-6">
					    		<input type="text" class="form-control" name="don" id="don" placeholder="300" required>
					    	</div>
					  	</div>
					  	<div class="form-group">
					    	<label class="control-label col-md-4" for="comment">Votre message:</label>
					    	<div class="col-md-6">
					    		<textarea class="form-control" rows="10" name="comment" id="comment" placeholder="" required></textarea>
					    	</div>
					  	</div>
					  	<div class="form-group">
						  	<div class="col-md-6 col-md-push-4">
						  		<button type="submit" name="formEntreprise" class="btn btn-info btn-lg">Envoyer</button>
						  	</div>
						</div>

						<?php

						$zerif_contactus_sitekey = get_theme_mod('zerif_contactus_sitekey');
						$zerif_contactus_secretkey = get_theme_mod('zerif_contactus_secretkey');
						$zerif_contactus_recaptcha_show = get_theme_mod('zerif_contactus_recaptcha_show');

						if( isset($zerif_contactus_recaptcha_show) && $zerif_contactus_recaptcha_show != 1 && !empty($zerif_contactus_sitekey) && !empty($zerif_contactus_secretkey) ) :

							echo '<div class="g-recaptcha zerif-g-recaptcha" data-sitekey="' . esc_attr( $zerif_contactus_sitekey ) . '"></div>';

						endif;

						?>
					</form>
        		</div>
    		</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div>  <!-- Fin Modal -->


   <!-- Modal particulier-->	
    <div class="modal fade bs-particulier-modal-lg" tabindex="-1" role="dialog" aria-labelledby="Particulier">
    	<div class="modal-dialog">
        	<div class="modal-content">
          		<div class="modal-header">
            		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            		<h2 class="modal-title rainbow" id="gridSystemModalLabel"><i>Je suis un particulier</i></h2>
          		</div>
              	<div class="modal-body">
              		<h3>Donner par ch&egrave;que:</h3>
              		<p>Chèque a envoyer a l'adresse 4 résidence fernand chevallier, 28240 Loupe à l'ordre de Les Mécènes du Numérique.</p>
        			<hr>
              		<h3>Faire une promesse de don par e-mail:</h3>
	                <form class="form-horizontal" role="form">
						<div class="form-group">
					    	<label class="control-label col-md-4" for="nom">Nom:</label>
					    	<div class="col-md-6">
					    		<input type="text" class="form-control" id="nom" placeholder="votre nom" required>
					    	</div>
					  	</div>
						<div class="form-group">
					    	<label class="control-label col-md-4" for="prenom">Prénom:</label>
					    	<div class="col-md-6">
					    		<input type="text" class="form-control" id="prenom" placeholder="votre pr&eacute;nom" required>
					    	</div>
					  	</div>
					  	<div class="form-group">
					    	<label class="control-label col-md-4" for="adresse">Adresse:</label>
					    	<div class="col-md-6">
					    		<input type="text" class="form-control" id="adresse" placeholder="votre adresse" required>
					    	</div>
					  	</div>
					  	<div class="form-group">
					    	<label class="control-label col-md-4" for="email">Adresse Email:</label>
					    	<div class="col-md-6">
					    		<input type="email" class="form-control" id="email" placeholder="jhondoe@example.com" required>
					    	</div>
					  	</div>
					  	<div class="form-group">
					    	<label class="control-label col-md-4" for="phone">T&eacute;l&eacute;phone:</label>
					    	<div class="col-md-6">
					    		<input type="tel" class="form-control" id="phone" placeholder="0450699887" required>
					    	</div>
					  	</div>
					  	<div class="form-group">
					    	<label class="control-label col-md-4" for="don">Montant du don:</label>
					    	<div class="col-md-6">
					    		<input type="text" class="form-control" id="don" placeholder="300" required>
					    	</div>
					  	</div>
					  	<div class="form-group">
					    	<label class="control-label col-md-4" for="comment">Votre message:</label>
					    	<div class="col-md-6">
					    		<textarea class="form-control" rows="10" id="comment" placeholder="" required></textarea>
					    	</div>
					  	</div>
					  	<div class="form-group">
						  	<div class="col-md-6 col-md-push-4">
						  		<button type="submit" name="particulier" class="btn btn-info btn-lg">Envoyer</button>
						  	</div>
						</div>
					</form>
				</div>
    		</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div>  <!-- Fin Modal -->

<?php

}
get_footer(); ?>
