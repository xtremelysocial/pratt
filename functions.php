<?php
/**
 * Theme: Pratt
 * 
 * Functions file to make changes to the parent theme's functions. 
 *
 * @package pratt
 */
 
/**
 * SET THEME OPTIONS HERE
 *
 * Theme options can be overriden here. These are all set the same defaults as in the 
 * parent theme except for the navbar_classes. You can change whatever you want.
 * 
 * Parameters:
 * background_color - Hex code for default background color without the #. eg) ffffff
 *
 * content_width - Only for determining "full width" image. Actual width in Bootstrap.css.
 * 		1170 for screens over 1200px resolution, otherwise 970.
 *
 * embed_video_width - Sets the width of videos that use the <embed> tag. This defaults
 * 		to the smallest width of content with a sidebar before the sidebar collapses.
 *		The height is automatically set at a 16:9 ratio unless overridden.
 *
 * embed_video_height - Leave empty to automatically set at a 16:9 ratio to the width
 * post_formats - WordPress extra post formats. i.e. 'aside', 'image', 'video', 'quote',
 * 		'link'
 *
 * touch_support - Whether to load touch support for carousels (sliders)
 * fontawesome - Whether to load font-awesome font set or not
 *
 * bootstrap_gradients - Whether to load Bootstrap "theme" CSS for gradients
 *
 * navbar_classes - One or more of navbar-default, navbar-inverse, navbar-fixed-top, etc.
 *
 * custom_header_location - If 'header', displays the custom header above the navbar. If
 * 		'content-header', displays it below the navbar in place of the colored content-
 *		header section.
 *
 * image_keyboard_nav - Whether to load javascript for using the keyboard to navigate
 		image attachment pages
 *
 * sample_widgets - Whether to display sample widgets in the footer and page-bottom widet
 		areas.
 *
 * sample_footer_menu - Whether to display sample footer menu with Top and Home links
 * 
 * testimonials - Whether to activate testimonials custom post type if Jetpack plugin is 
 * 		active
 *
 * NOTE: THIS VARIABLE HAS BEEN RENAMED FROM $THEME_OPTIONS. PLEASE UPDATE YOUR CHILD THEMES.
 */
$xsbf_theme_options = array(
	//'background_color' 		=> 'f2f2f2',
	//'content_width' 			=> 1170,
	//'embed_video_width' 		=> 1170,
	//'embed_video_height' 		=> null, // i.e. calculate it automatically
	//'post_formats' 			=> '',
	//'touch_support' 			=> true,
	//'fontawesome' 			=> true,
	//'bootstrap_gradients' 	=> false,
	'navbar_classes'			=> 'navbar-default navbar-fixed-top',
	'custom_header_location' 	=> 'content-header',
	//'image_keyboard_nav' 		=> true,
	//'sample_widgets' 			=> true,
	//'sample_footer_menu'		=> true
	//'testimonials'				=> true // requires Jetpack 
);

/**
 * Force the site title to display in the navbar and add our custom header images
 */
add_action( 'after_setup_theme', 'xsbf_pratt_after_setup_theme' ); 
function xsbf_pratt_after_setup_theme() {

	// These args will override the ones in the parent theme
	$args = array(
		'header-text' => true, // allow user to set the header text color
		'default-text-color' => '16a085', // should match css link color
		'default-image' => get_stylesheet_directory_uri() . '/images/headers/city.jpg',
		'width' => 1600,
		'height' => 900
	);
	add_theme_support( 'custom-header', $args );

	//The %2$s references the child theme directory (ie the stylesheet directory), use 
	// %s to reference the parent directory.
	register_default_headers( array(
		'abstract' => array(
			'url'           => '%2$s/images/headers/abstract.jpg',
			'thumbnail_url' => '%2$s/images/headers/abstract-thumbnail.jpg',
			'description'   => __( 'Abstract', 'flat-bootstrap' )
		),
		'book' => array(
			'url'           => '%2$s/images/headers/book.jpg',
			'thumbnail_url' => '%2$s/images/headers/book-thumbnail.jpg',
			'description'   => __( 'Book', 'flat-bootstrap' )
		),
		'briefcase' => array(
			'url'           => '%2$s/images/headers/briefcase.jpg',
			'thumbnail_url' => '%2$s/images/headers/briefcase-thumbnail.jpg',
			'description'   => __( 'Briefcase', 'flat-bootstrap' )
		),
		'camera' => array(
			'url'           => '%2$s/images/headers/camera.jpg',
			'thumbnail_url' => '%2$s/images/headers/camera-thumbnail.jpg',
			'description'   => __( 'Camera', 'flat-bootstrap' )
		),
		'city' => array(
			'url'           => '%2$s/images/headers/city.jpg',
			'thumbnail_url' => '%2$s/images/headers/city-thumbnail.jpg',
			'description'   => __( 'City', 'flat-bootstrap' )
		),
		'desk' => array(
			'url'           => '%2$s/images/headers/desk.jpg',
			'thumbnail_url' => '%2$s/images/headers/desk-thumbnail.jpg',
			'description'   => __( 'Desk', 'flat-bootstrap' )
		),
		'guitar' => array(
			'url'           => '%2$s/images/headers/guitar.jpg',
			'thumbnail_url' => '%2$s/images/headers/guitar-thumbnail.jpg',
			'description'   => __( 'Guitar', 'flat-bootstrap' )
		),
		'notepad' => array(
			'url'           => '%2$s/images/headers/notepad.jpg',
			'thumbnail_url' => '%2$s/images/headers/notepad-thumbnail.jpg',
			'description'   => __( 'Notepad', 'flat-bootstrap' )
		),
		'skyline' => array(
			'url'           => '%2$s/images/headers/skyline.jpg',
			'thumbnail_url' => '%2$s/images/headers/skyline-thumbnail.jpg',
			'description'   => __( 'Skyline', 'flat-bootstrap' )
		),
	) );

/*	
	// Override parent theme's theme.js with our own. We've added javascript to toggle
	// displaying the search field in the top nav bar.
	wp_dequeue_script( 'theme' );
	wp_enqueue_script( 'theme', get_stylesheet_directory_uri() . '/js/theme.js', array('jquery'), '20140913', true );
*/
}

/**
 * Styles the header image and text displayed on the blog
 *
 * This function handles BOTH previewing in the customizer as well as the actual display
 * of the header in the front-end. This function ONLY needs to handle hiding or displaying
 * the site title and custom header text color. All other styles are from the front-end 
 * CSS.
 *
 * Since Pratt doesn't have a header above the top navbar, we need to reverse the behavoir
 * of displaying the site title or not. i.e. Put it back to the "normal" way it was
 * intended to work.
 *
 * @see xsbf_custom_header_setup().
 */
function xsbf_header_style() {

	// get_header_textcolor() returns 'blank' if hiding site title and tagline or returns
	// any hex color value. HEADER_TEXTCOLOR is always the default color.
	$header_text_color = get_header_textcolor();

	// If no custom options for text are set, let's bail
	if ( HEADER_TEXTCOLOR == $header_text_color AND ! display_header_text() ) {
	//if ( HEADER_TEXTCOLOR == $header_text_color ) {
		return;
	}

	// If we get this far, we have custom styles. Let's do this.
	?>
	<style type="text/css" id="custom-header-css">
	<?php
		// Has the text been hidden?
		if ( 'blank' == $header_text_color ) :
	?>
		.navbar-brand {
			position: absolute;
			clip: rect(1px, 1px, 1px, 1px);
		}
	<?php
		// If the user has set a custom color for the text use that
		elseif ( HEADER_TEXTCOLOR != $header_text_color ) :
	?>
		.navbar-default .navbar-brand {
			color: #<?php echo $header_text_color; ?>;
		}
		.navbar-default .navbar-brand:hover,
		.navbar-default .navbar-brand:active,
		.navbar-default .navbar-brand:focus {
			color: #<?php echo $header_text_color; ?>;
			opacity: 0.75;
		}
		/* This isn't ready to go into "production" yet. Still testing. */
		/*
		a,
		i {
			color: #<?php echo $header_text_color; ?>;
		}
		a:hover,
		a:active,
		a:focus {
			color: #<?php echo $header_text_color; ?>;
			opacity: 0.75;
		}
		*/
		/* End testing. */
	<?php endif; ?>

	<?php if ( display_header_text() ) : ?>
		.navbar-brand {
			position: relative;
			clip: auto;
		}
	<?php endif; ?>
	</style>
	<?php
}

/**
 * Styles the header image displayed on the Appearance > Header admin panel.
 *
 * This function is NOT used by the Customizer, just the stand-alone header upload screen.
 * Since the front-end CSS is not loaded in Admin, all the heading styles need to be 
 * inlined here to match the front-end CSS, including the image, h1, and h2 styles. This
 * function does NOT need to handle hiding or displaying text as that is handled by core
 * WordPress.
 *
 * @see xsbf_custom_header_setup().
 */ 
function xsbf_admin_header_style() {
	$header_image = get_header_image();
?>
	<style type="text/css" id="xsbf-admin-header-css">

	.appearance_page_custom-header #headimg {
		border: none;
		-webkit-box-sizing: border-box;
		-moz-box-sizing:    border-box;
		box-sizing:         border-box;
		<?php
		if ( ! empty( $header_image ) ) {
			echo 'background: url(' . esc_url( $header_image ) . ') no-repeat scroll center center; background-size: 1600px auto; background-position: center center;';
			echo 'height: 480px;';
		} else {
			echo 'height: 200px;';
		}
		?>
		padding: 0 40px;
	}
	#headimg .home-link {
		-webkit-box-sizing: border-box;
		-moz-box-sizing:    border-box;
		box-sizing:         border-box;
		margin: 0 auto;
		max-width: 1040px;
		<?php
		if ( ! empty( $header_image ) ) {
			echo 'height: 480px;';
		} else {
			echo 'height: 200px;';
		}
		?>
		width: 100%;
	}

	#headimg h1 {
		font: 700 41px/45px Raleway, Arial, 'Helvetica Neue', sans-serif;
		<?php
		if ( ! empty( $header_image ) ) {
			echo 'margin: 200px 0 11px;';
		} else {
			echo 'margin: 50px 0 11px;';
		}
		?>
		text-align: center;
	}
	#headimg h2 {
		font: 300 24px/26px Raleway, Arial, 'Helvetica Neue', sans-serif;
		margin: 10px 0 25px;
		text-align: center;
	}

	<?php // If text color not overriden, use white (assume dark background) ?>
	<?php if ( HEADER_TEXTCOLOR == get_header_textcolor() ) : ?>
	#headimg h1, #headimg h2 {
		color: white !important;
	}

	<?php // Otherwise, set the text color to what the user selected ?>
	<?php else : ?>
	#headimg h1, #headimg h2 {
		color: <?php get_header_textcolor(); ?> !important;
	}	
	<?php endif; ?>

	</style>
<?php
}

/**
 * Output markup to be displayed on the Appearance > Header admin panel.
 *
 * This callback overrides the default markup displayed there.
 *
 * This needs to output the HTML that ties to the inline CSS above to style the custom
 * header image, site title, and tagline.
 *
 * @return void
 */ 
function xsbf_admin_header_image() {
	?>
	<!-- <div id="headimg" style="background: #34495e url(<?php header_image(); ?>) no-repeat scroll top; background-size: 1600px auto; background-position: center center;"> -->
	<div id="headimg" style="background: url(<?php header_image(); ?>) no-repeat scroll top; background-size: 1600px auto; background-position: center center;">
	<div class="section-image-overlay">
		<?php $style = ' style="color:#' . get_header_textcolor() . ';"'; ?>
		<div class="home-link">
			<h1 class="displaying-header-text" <?php echo $style; ?>><?php bloginfo('name'); ?></h1>
			<h2 id="desc" class="displaying-header-text"<?php echo $style; ?>><?php bloginfo('description'); ?></h2>
		</div>
	<div>
	</div>
<?php 
}