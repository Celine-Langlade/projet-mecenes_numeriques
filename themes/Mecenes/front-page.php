<?php get_header(); 

if ( get_option( 'show_on_front' ) == 'page' ) {
	
    include( get_page_template() );
	
}else {

	if(isset($_POST['submitted']) && !defined('PIRATE_FORMS_VERSION') && !shortcode_exists( 'pirate_forms' ) ) :

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

			/* name */

			if(trim($_POST['myname']) === ''):

				$nameError = __('* Please enter your name.','zerif-lite');

				$hasError = true;

			else:

				$name = trim($_POST['myname']);

			endif;

			/* email */

			if(trim($_POST['myemail']) === ''):

				$emailError = __('* Please enter your email address.','zerif-lite');

				$hasError = true;

			elseif (!preg_match("/^[[:alnum:]][a-z0-9_.-]*@[a-z0-9.-]+\.[a-z]{2,4}$/i", trim($_POST['myemail']))) :

				$emailError = __('* You entered an invalid email address.','zerif-lite');

				$hasError = true;

			else:

				$email = trim($_POST['myemail']);

			endif;

			/* subject */

			if(trim($_POST['mysubject']) === ''):

				$subjectError = __('* Please enter a subject.','zerif-lite');

				$hasError = true;

			else:

				$subject = trim($_POST['mysubject']);

			endif;

			/* message */

			if(trim($_POST['mymessage']) === ''):

				$messageError = __('* Please enter a message.','zerif-lite');

				$hasError = true;

			else:

				$message = stripslashes(trim($_POST['mymessage']));

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
						$subject = 'From '.$name;
					endif;

					$body = "Nom: $name \n\nEmail: $email \n\n Sujet: $subject \n\n Message: $message";

					/* FIXED HEADERS FOR EMAIL NOT GOING TO SPAM */
					$zerif_admin_email = get_option( 'admin_email' );
					$zerif_sitename = strtolower( $_SERVER['SERVER_NAME'] );

					function zerif_is_localhost() {
						$zerif_server_name = strtolower( $_SERVER['SERVER_NAME'] );
						return in_array( $zerif_server_name, array( 'localhost', '127.0.0.1' ) );
					}
					
					if ( zerif_is_localhost() ) {
					
						$headers = 'From: '.$name.' <'.$zerif_admin_email.'>' . "\r\n" . 'Reply-To: ' . $email;
						
					} else {
					
						if ( substr( $zerif_sitename, 0, 4 ) == 'www.' ) {
							$zerif_sitename = substr( $zerif_sitename, 4 );
						}
						
						$headers = 'From: '.$name.' <wordpress@'.$zerif_sitename.'>' . "\r\n" . 'Reply-To: ' . $email;
						
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


	/* ABOUT US */

	$zerif_aboutus_show = get_theme_mod('zerif_aboutus_show');

	if( isset($zerif_aboutus_show) && $zerif_aboutus_show != 1 ):

		get_template_part( 'sections/about_us' );

	endif;

	/* OUR FOCUS SECTION */

	$zerif_ourfocus_show = get_theme_mod('zerif_ourfocus_show');

	if( isset($zerif_ourfocus_show) && $zerif_ourfocus_show != 1 ):

		get_template_part( 'sections/our_focus' );

	endif;

	/* SLIDER PROJETS FINI */

	if(is_active_sidebar('slider')){ dynamic_sidebar( 'slider' ) ;} ?>
	<section id="slider">
		<?php echo do_shortcode('[smartslider3 slider=2]'); ?>
	</section>
	<?php

	/* TESTIMONIALS */

	$zerif_testimonials_show = get_theme_mod('zerif_testimonials_show');

	if( isset($zerif_testimonials_show) && $zerif_testimonials_show != 1 ):

		get_template_part( 'sections/testimonials' );

	endif;

	/* Devenir Mécène */

	$zerif_devenir_mecene_show = get_theme_mod('zerif_devenir_mecene_show');
	if( isset($zerif_devenir_mecene_show) && $zerif_devenir_mecene_show != 1 ):
	 	get_template_part( 'sections/devenirmecene' );
	endif;

}
get_footer(); ?>
