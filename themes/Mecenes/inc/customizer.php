<?php
/**
 * zerif Theme Customizer
 *
 * @package zerif
 */
/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function zerif_customize_register( $wp_customize ) {
	class Zerif_Customize_Textarea_Control extends WP_Customize_Control {
		public $type = 'textarea';
	 
		public function render_content() {
			?>
			<label>
			<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			<textarea rows="5" style="width:100%;" <?php $this->link(); ?>><?php echo esc_textarea( $this->value() ); ?></textarea>
			</label>
			<?php
		}
	}
	class Zerif_Customizer_Number_Control extends WP_Customize_Control {
		public $type = 'number';
		public function render_content() {
		?>
			<label>
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<input type="number" <?php $this->link(); ?> value="<?php echo intval( $this->value() ); ?>" />
			</label>
		<?php
		}
	}
	class Zerif_Theme_Support extends WP_Customize_Control {
		public function render_content() {
			echo __('Check out the <a href="http://themeisle.com/themes/zerif-pro-one-page-wordpress-theme/">PRO version</a> for full control over the frontpage SECTIONS ORDER and the COLOR SCHEME!','zerif-lite');
		}
	}

	class Zerif_Theme_Support_Videobackground extends WP_Customize_Control {
		public function render_content() {
			echo __('Check out the <a href="http://themeisle.com/themes/zerif-pro-one-page-wordpress-theme/">PRO version</a> to add a nice looking background video!','zerif-lite');
		}
	}
	
	class Zerif_Theme_Support_Googlemap extends WP_Customize_Control {
		public function render_content() {
			echo __('Check out the <a href="http://themeisle.com/themes/zerif-pro-one-page-wordpress-theme/">PRO version</a> to add a google maps section !','zerif-lite');
		}
	} 
	
	class Zerif_Theme_Support_Pricing extends WP_Customize_Control {
		public function render_content() {
			echo __('Check out the <a href="http://themeisle.com/themes/zerif-pro-one-page-wordpress-theme/">PRO version</a> to add a pricing section !','zerif-lite');
		}
	} 
	
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	$wp_customize->remove_section('colors');
	
	/***********************************************/
	/************** GENERAL OPTIONS  ***************/
	/***********************************************/
	
		$wp_customize->add_panel( 'panel_general', array(
			'priority' => 5,
			'capability' => 'edit_theme_options',
			'title' => __( 'General options', 'zerif-lite' )
		));
		
		$wp_customize->add_section( 'zerif_general_section' , array(
			'title' => __( 'General', 'zerif-lite' ),
			'priority' => 5,
			'panel' => 'panel_general'
		));
		
		/* LOGO	*/
		$wp_customize->add_setting( 'zerif_logo', array(
			'sanitize_callback' => 'esc_url_raw',
			'transport' => 'postMessage'
		));
		
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'themeslug_logo', array(
			'label' => __( 'Logo', 'zerif-lite' ),
			'section' => 'title_tagline',
			'settings' => 'zerif_logo',
			'priority' => 1,
		)));
		
		/* Disable preloader */
		$wp_customize->add_setting( 'zerif_disable_preloader', array(
			'sanitize_callback' => 'zerif_sanitize_text'
		));
		
		$wp_customize->add_control( 'zerif_disable_preloader', array(
			'type' => 'checkbox',
			'label' => __('Disable preloader?','zerif-lite'),
			'section' => 'zerif_general_section',
			'priority' => 2,
		));

		/* Disable smooth scroll */
		$wp_customize->add_setting( 'zerif_disable_smooth_scroll', array(
			'sanitize_callback' => 'zerif_sanitize_text'
		));
		
		$wp_customize->add_control( 'zerif_disable_smooth_scroll', array(
			'type' 		=> 'checkbox',
			'label' 	=> __('Disable smooth scroll?','zerif-lite'),
			'section' 	=> 'zerif_general_section',
			'priority'	=> 3,
		));

		/* Enable accessibility */
		$wp_customize->add_setting( 'zerif_accessibility', array(
			'sanitize_callback' => 'zerif_sanitize_text'
		));
		
		$wp_customize->add_control( 'zerif_accessibility', array(
			'type' 		=> 'checkbox',
			'label' 	=> __('Enable accessibility?','zerif-lite'),
			'section' 	=> 'zerif_general_section',
			'priority'	=> 3,
		));

		/* COPYRIGHT */
		$wp_customize->add_setting( 'zerif_copyright', array(
			'sanitize_callback' => 'zerif_sanitize_text',
			'transport' => 'postMessage'
		));
		
		$wp_customize->add_control( 'zerif_copyright', array(
			'label'    => __( 'Footer Copyright', 'zerif-lite' ),
			'section'  => 'zerif_general_section',
			'priority'    => 3,
		));
		
		$wp_customize->add_section( 'zerif_general_socials_section' , array(
			'title' => __( 'Footer Social Icons', 'zerif-lite' ),
			'priority' => 31,
			'panel' => 'panel_general'
		));
		
		/* facebook */
		$wp_customize->add_setting( 'zerif_socials_facebook', array(
			'sanitize_callback' => 'esc_url_raw',
			'default' => '#'
		));
		
		$wp_customize->add_control( 'zerif_socials_facebook', array(
			'label'    => __( 'Facebook link', 'zerif-lite' ),
			'section'  => 'zerif_general_socials_section',
			'priority' => 4,
		));
		
		$wp_customize->add_section( 'zerif_general_footer_section' , array(
			'title' => __( 'Footer Content', 'zerif-lite' ),
			'priority' => 32,
			'panel' => 'panel_general'
		));
		
		/* email - ICON */
		$wp_customize->add_setting( 'zerif_email_icon', array(
			'sanitize_callback' => 'esc_url_raw',
			'default' => get_template_directory_uri().'/images/envelope4-green.png'
		));
		
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'zerif_email_icon', array(
			'label'    => __( 'Email section - icon', 'zerif-lite' ),
			'section'  => 'zerif_general_footer_section',
			'priority'    => 11,
		)));
			
		/* email */   
		$wp_customize->add_setting( 'zerif_email', array( 
			'sanitize_callback' => 'zerif_sanitize_text',
			'default' => '<a href="mailto:contact@site.com">contact@site.com</a>',
		));
		
		$wp_customize->add_control( new Zerif_Customize_Textarea_Control( $wp_customize, 'zerif_email', array(
			'label'   => __( 'Email', 'zerif-lite' ),
			'section' => 'zerif_general_footer_section',
			'priority' => 12
		)));

	/*****************************************************/
    /**************	BIG TITLE SECTION *******************/
	/****************************************************/

		$wp_customize->add_panel( 'panel_big_title', array(
			'priority' => 101,
			'capability' => 'edit_theme_options',
			'title' => __( 'Section titre', 'zerif-lite' )
		));

		$wp_customize->add_section( 'zerif_bigtitle_section' , array(
			'title'       => __( 'Main content', 'zerif-lite' ),
			'priority'    => 1,
			'panel'       => 'panel_big_title'
		));

		/* show/hide */
		$wp_customize->add_setting( 'zerif_bigtitle_show', array(
			'sanitize_callback' => 'zerif_sanitize_text',
			'transport' => 'postMessage'
		));
		
		$wp_customize->add_control( 'zerif_bigtitle_show', array(
			'type' => 'checkbox',
			'label' => __('Hide big title section?','zerif-lite'),
			'section' => 'zerif_bigtitle_section',
			'priority'    => 1,
		));
		
		/* title */
		$wp_customize->add_setting( 'zerif_bigtitle_title', array(
			'sanitize_callback' => 'zerif_sanitize_text',
			'default' => __('ONE OF THE TOP 10 MOST POPULAR THEMES ON WORDPRESS.ORG','zerif-lite'),
			'transport' => 'postMessage'
		));
		
		$wp_customize->add_control( 'zerif_bigtitle_title', array(
			'label'    => __( 'Title', 'zerif-lite' ),
			'section'  => 'zerif_bigtitle_section',
			'priority'    => 2,
		));

		/****************************************************/
		/************	PARALLAX IMAGES *********************/
		/****************************************************/
		
		$wp_customize->add_section( 'zerif_parallax_section' , array(
			'title'       => __( 'Parallax effect', 'zerif-lite' ),
			'priority'    => 2,
			'panel'       => 'panel_big_title'
		));
		
		/* show/hide */
		$wp_customize->add_setting( 'zerif_parallax_show', array(
			'sanitize_callback' => 'zerif_sanitize_text'
		));
		
		$wp_customize->add_control( 'zerif_parallax_show', array(
			'type' 		=> 'checkbox',
			'label' 	=> __('Use parallax effect?','zerif-lite'),
			'section' 	=> 'zerif_parallax_section',
			'priority'	=> 1,
		));
		
		/* IMAGE 1*/
		$wp_customize->add_setting( 'zerif_parallax_img1', array(
			'sanitize_callback' => 'esc_url_raw', 
			'default' => get_template_directory_uri() . '/images/background1.jpg'
		));
		
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'themeslug_parallax_img1', array(
			'label'    	=> __( 'Image 1', 'zerif-lite' ),
			'section'  	=> 'zerif_parallax_section',
			'settings' 	=> 'zerif_parallax_img1',
			'priority'	=> 1,
		)));
		
		/* IMAGE 2 */
		$wp_customize->add_setting( 'zerif_parallax_img2', array(
			'sanitize_callback' => 'esc_url_raw', 
			'default' => get_template_directory_uri() . '/images/background2.png'
		));
		
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'themeslug_parallax_img2', array(
			'label'    	=> __( 'Image 2', 'zerif-lite' ),
			'section'  	=> 'zerif_parallax_section',
			'settings' 	=> 'zerif_parallax_img2',
			'priority'	=> 2,
		)));

	/************************************/
	/**** SECTION QUI SOMMES-NOUS *******/
	/************************************/
	
		$wp_customize->add_panel( 'panel_about', array(
			'priority' => 102,
			'capability' => 'edit_theme_options',
			'title' => __( 'Section qui sommes-nous?', 'zerif-lite' )
		));
		
		$wp_customize->add_section( 'zerif_aboutus_settings_section' , array(
			'title'       => __( 'Settings', 'zerif-lite' ),
			'priority'    => 1,
			'panel' => 'panel_about'
		));
		
		/* about us show/hide */
		$wp_customize->add_setting( 'zerif_aboutus_show', array(
			'sanitize_callback' => 'zerif_sanitize_text',
			'transport' => 'postMessage'
		));
		
		$wp_customize->add_control( 'zerif_aboutus_show', array(
			'type' => 'checkbox',
			'label' => __('Hide about us section?','zerif-lite'),
			'section' => 'zerif_aboutus_settings_section',
			'priority'    => 1,
		));
		
		$wp_customize->add_section( 'zerif_aboutus_main_section' , array(
			'title'       => __( 'Main content', 'zerif-lite' ),
			'priority'    => 2,
			'panel' => 'panel_about'
		));
		
		/* title */
		$wp_customize->add_setting( 'zerif_aboutus_title', array(
			'sanitize_callback' => 'zerif_sanitize_text',
			'default' => __('About','zerif-lite'),
			'transport' => 'postMessage'
		));
		
		$wp_customize->add_control( 'zerif_aboutus_title', array(
			'label'    => __( 'Title', 'zerif-lite' ),
			'section'  => 'zerif_aboutus_main_section',
			'priority'    => 2,
		));
		
		/* big left title */
		$wp_customize->add_setting( 'zerif_aboutus_biglefttitle', array(
			'sanitize_callback' => 'zerif_sanitize_text',
			'default' => __('Everything you see here is responsive and mobile-friendly.','zerif-lite'),
		));
		
		$wp_customize->add_control( 'zerif_aboutus_biglefttitle', array(
			'label'    => __( 'Big left side title', 'zerif-lite' ),
			'section'  => 'zerif_aboutus_main_section',
			'priority'    => 4,
		));
		
		/* text */
		$wp_customize->add_setting( 'zerif_aboutus_text', array(
			'sanitize_callback' => 'zerif_sanitize_text',
			'default' => __('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla nec massa enim. Aliquam viverra at est ullamcorper sollicitudin. Proin a leo sit amet nunc malesuada imperdiet pharetra ut eros.<br><br> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla nec massa enim. Aliquam viverra at est ullamcorper sollicitudin. Proin a leo sit amet nunc malesuada imperdiet pharetra ut eros. <br><br>Mauris vel nunc at ipsum fermentum pellentesque quis ut massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Maecenas non adipiscing massa. Sed ut fringilla sapien. Cras sollicitudin, lectus sed tincidunt cursus, magna lectus vehicula augue, a lobortis dui orci et est.','zerif-lite'),
		));
		
		$wp_customize->add_control( 'zerif_aboutus_text', array(
			'label'    => __( 'Text', 'zerif-lite' ),
			'section'  => 'zerif_aboutus_main_section',
			'priority'    => 5,
		));
		
		/* text 2 */
		$wp_customize->add_setting( 'zerif_aboutus_text_2', array(
			'sanitize_callback' => 'zerif_sanitize_text',
			'default' => __('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla nec massa enim. Aliquam viverra at est ullamcorper sollicitudin. Proin a leo sit amet nunc malesuada imperdiet pharetra ut eros.<br><br> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla nec massa enim. Aliquam viverra at est ullamcorper sollicitudin. Proin a leo sit amet nunc malesuada imperdiet pharetra ut eros. <br><br>Mauris vel nunc at ipsum fermentum pellentesque quis ut massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Maecenas non adipiscing massa. Sed ut fringilla sapien. Cras sollicitudin, lectus sed tincidunt cursus, magna lectus vehicula augue, a lobortis dui orci et est.','zerif-lite'),
		));
		
		$wp_customize->add_control( 'zerif_aboutus_text_2', array(
			'label'    => __( 'Text', 'zerif-lite' ),
			'section'  => 'zerif_aboutus_main_section',
			'priority'    => 5,
		));
		
		/* text 3 */
		$wp_customize->add_setting( 'zerif_aboutus_text_3', array(
			'sanitize_callback' => 'zerif_sanitize_text',
			'default' => __('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla nec massa enim. Aliquam viverra at est ullamcorper sollicitudin. Proin a leo sit amet nunc malesuada imperdiet pharetra ut eros.<br><br> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla nec massa enim. Aliquam viverra at est ullamcorper sollicitudin. Proin a leo sit amet nunc malesuada imperdiet pharetra ut eros. <br><br>Mauris vel nunc at ipsum fermentum pellentesque quis ut massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Maecenas non adipiscing massa. Sed ut fringilla sapien. Cras sollicitudin, lectus sed tincidunt cursus, magna lectus vehicula augue, a lobortis dui orci et est.','zerif-lite'),
		));
		
		$wp_customize->add_control( 'zerif_aboutus_text_3', array(
			'label'    => __( 'Text', 'zerif-lite' ),
			'section'  => 'zerif_aboutus_main_section',
			'priority'    => 5,
		));

	/********************************************************************/
	/********************  NOS MECENES **********************************/
	/********************************************************************/
	
		$wp_customize->add_panel( 'panel_ourfocus', array(
			'priority' => 103,
			'capability' => 'edit_theme_options',
			'title' => __( 'Section nos mécènes', 'zerif-lite' )
		));
		
		$wp_customize->add_section( 'zerif_ourfocus_section' , array(
			'title'       => __( 'Content', 'zerif-lite' ),
			'priority'    => 1,
			'panel'       => 'panel_ourfocus'
		));
		
		/* show/hide */
		$wp_customize->add_setting( 'zerif_ourfocus_show', array(
			'sanitize_callback' => 'zerif_sanitize_text',
			'transport' => 'postMessage'
		));
		
		$wp_customize->add_control( 'zerif_ourfocus_show', array(
			'type' => 'checkbox',
			'label' => __('Hide our focus section?','zerif-lite'),
			'section' => 'zerif_ourfocus_section',
			'priority'    => 1,
		));
		
		/* our focus title */
		$wp_customize->add_setting( 'zerif_ourfocus_title', array(
			'sanitize_callback' => 'zerif_sanitize_text',
			'default' => __('Nos mécènes','zerif-lite'),
			'transport' => 'postMessage'
		));
				
		$wp_customize->add_control( 'zerif_ourfocus_title', array(
			'label'    => __( 'Title', 'zerif-lite' ),
			'section'  => 'zerif_ourfocus_section',
			'priority'    => 2,
		));
		
		/* our focus subtitle */
		$wp_customize->add_setting( 'zerif_ourfocus_subtitle', array(
			'sanitize_callback' => 'zerif_sanitize_text',
			'default' => __('What makes this single-page WordPress theme unique.','zerif-lite'),
			'transport' => 'postMessage'
		));
		
		$wp_customize->add_control( 'zerif_ourfocus_subtitle', array(
			'label'    => __( 'Our focus subtitle', 'zerif-lite' ),
			'section'  => 'zerif_ourfocus_section',
			'priority'    => 3,
		));

	/**********************************************/
    /**********	   Devenir Mecene    **************/
	/**********************************************/
	
		$wp_customize->add_panel( 'panel_devenir_mecene', array(
			'priority' => 104,
			'capability' => 'edit_theme_options',
			'title' => __( 'Section devenir mécène', 'zerif-lite' )
		) );
		
		$wp_customize->add_section( 'zerif_devenir_mecene_settings_section' , array(
			'title'       => __( 'Options', 'zerif-lite' ),
			'priority'    => 1,
			'panel'       => 'panel_devenir_mecene'
		));
		
		/* Devenir Mecene show/hide */
		$wp_customize->add_setting( 'zerif_devenir_mecene_show', array(
			'sanitize_callback' => 'zerif_sanitize_text',
			'transport' => 'postMessage'
		));
		
		$wp_customize->add_control( 'zerif_devenir_mecene_show', array(
			'type' => 'checkbox',
			'label' => __('Cacher la séction devenir mécène?','zerif-lite'),
			'section' => 'zerif_devenir_mecene_settings_section',
			'priority'    => 1,
		));
		
		$wp_customize->add_section( 'zerif_devenir_mecene_main_section' , array(
			'title'       => __( 'Contenu principal', 'zerif-lite' ),
			'priority'    => 2,
			'panel' => 'panel_devenir_mecene'
		));
		
		/* Devenir mécène title */
		$wp_customize->add_setting( 'zerif_devenir_mecene_title', array(
			'sanitize_callback' => 'zerif_sanitize_text',
			'default' => __('Devenir Mécènes','zerif-lite'),
			'transport' => 'postMessage'
		));
				
		$wp_customize->add_control( 'zerif_devenir_mecene_title', array(
			'label'    => __( 'Title', 'zerif-lite' ),
			'section'  => 'zerif_devenir_mecene_main_section',
			'priority'    => 1,
		));
		
		/* Text of mécène */
		$wp_customize->add_setting( 'zerif_devenir_mecene_text', array(
			'sanitize_callback' => 'zerif_sanitize_text',
			'default' => __('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla nec massa enim. Aliquam viverra at est ullamcorper sollicitudin. Proin a leo sit amet nunc malesuada imperdiet pharetra ut eros.<br><br> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla nec massa enim. Aliquam viverra at est ullamcorper sollicitudin. Proin a leo sit amet nunc malesuada imperdiet pharetra ut eros. <br><br>Mauris vel nunc at ipsum fermentum pellentesque quis ut massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Maecenas non adipiscing massa. Sed ut fringilla sapien. Cras sollicitudin, lectus sed tincidunt cursus, magna lectus vehicula augue, a lobortis dui orci et est.','zerif-lite'),
		));
		
		$wp_customize->add_control( 'zerif_devenir_mecene_text', array(
			'label'    => __( 'Text', 'zerif-lite' ),
			'section'  => 'zerif_devenir_mecene_main_section',
			'priority'    => 5,
		));

	
	/**********************************************/
    /***********	SECTION TEMOIGNAGES ************/
	/**********************************************/
	
		$wp_customize->add_panel( 'panel_testimonials', array(
			'priority' => 105,
			'capability' => 'edit_theme_options',
			'title' => __( 'Section Témoignage', 'zerif-lite' )
		) );
		
		$wp_customize->add_section( 'zerif_testimonials_section' , array(
			'title'       => __( 'Section Témoignage', 'zerif-lite' ),
			'priority'    => 1,
			'panel'       => 'panel_testimonials'
		));
		
		/* testimonials show/hide */
		$wp_customize->add_setting( 'zerif_testimonials_show', array(
			'sanitize_callback' => 'zerif_sanitize_text',
			'transport' => 'postMessage'
		));
		
		$wp_customize->add_control( 'zerif_testimonials_show', array(
			'type' => 'checkbox',
			'label' => __('Cacher la section témoignage?','zerif-lite'),
			'section' => 'zerif_testimonials_section',
			'priority'    => 1,
		));
		
		/* testimonial pinterest layout */
		$wp_customize->add_setting( 'zerif_testimonials_pinterest_style', array(
			'sanitize_callback' => 'zerif_sanitize_text'
		));
		
		$wp_customize->add_control( 'zerif_testimonials_pinterest_style', array(
			'type' 			=> 'checkbox',
			'label' 		=> __('Utiliser le layout pinterest?','zerif-lite'),
			'section' 		=> 'zerif_testimonials_section',
			'priority'    	=> 2,
		));
		
		/* testimonials title */
		$wp_customize->add_setting( 'zerif_testimonials_title', array(
			'sanitize_callback' => 'zerif_sanitize_text',
			'default' => __('Témoignages','zerif-lite'),
			'transport' => 'postMessage'
		));
		
		$wp_customize->add_control( 'zerif_testimonials_title', array(
			'label'    => __( 'Titre', 'zerif-lite' ),
			'section'  => 'zerif_testimonials_section',
			'priority'    => 2,
		));
		
		/* testimonials subtitle */
		$wp_customize->add_setting( 'zerif_testimonials_subtitle', array(
			'sanitize_callback' => 'zerif_sanitize_text',
			'transport' => 'postMessage'
		));
		
		$wp_customize->add_control( 'zerif_testimonials_subtitle', array(
			'label'    => __( 'Sous-titre témoignage', 'zerif-lite' ),
			'section'  => 'zerif_testimonials_section',
			'priority'    => 3,
		));	
	
}
add_action( 'customize_register', 'zerif_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function zerif_customize_preview_js() {
	wp_enqueue_script( 'zerif_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'zerif_customize_preview_js' );

function zerif_sanitize_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}

function zerif_sanitize_pro_version( $input ) {
    return $input;
}

function zerif_sanitize_number( $input ) {
    return force_balance_tags( $input );
}

function zerif_registers() {

	wp_enqueue_script( 'zerif_customizer_script', get_template_directory_uri() . '/js/zerif_customizer.js', array("jquery"), '20120206', true  );
	
	wp_localize_script( 'zerif_customizer_script', 'zerifLiteCustomizerObject', array(
		
		'documentation' => __( 'View Documentation', 'zerif-lite' ),
		'pro' => __('View PRO version','zerif-lite')

	) );
}
add_action( 'customize_controls_enqueue_scripts', 'zerif_registers' );