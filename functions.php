<?php
/**
 * Theme: Flat Bootstrap Pratt
 * 
 * Functions file to make changes to the parent theme's functions. 
 *
 * @package flat-bootstrap-pratt
 */
 
/**
 * SET THEME OPTIONS HERE
 *
 * Theme options can be overriden here. These are all set the same defaults as in the 
 * parent theme except for the navbar_classes. You can change whatever you want.
 * 
 * Parameters:
 * background_color - Hex code for default background color without the #. eg) ffffff
 * content_width - Only for determining "full width" image. Actual width in Bootstrap.css.
 * 		1170 for screens over 1200px resolution, otherwise 970.
 * embed_video_width - Sets the width of videos that use the <embed> tag. This defaults
 * 		to the smallest width of content with a sidebar before the sidebar collapses.
 *		The height is automatically set at a 16:9 ratio unless overridden.
 * embed_video_height - Leave empty to automatically set at a 16:9 ratio to the width
 * post_formats - WordPress extra post formats. i.e. 'aside', 'image', 'video', 'quote',
 * 		'link'
 * touch_support - Whether to load touch support for carousels (sliders)
 * fontawesome - Whether to load font-awesome font set or not
 * bootstrap_gradients - Whether to load Bootstrap "theme" CSS for gradients
 * navbar_classes - One or more of navbar-default, navbar-inverse, navbar-fixed-top, etc.
 * image_keyboard_nav - Whether to load javascript for using the keyboard to navigate
 		image attachment pages
 * sample_widgets - Whether to display sample widgets in the footer and page-bottom widet
 		areas.
 * sample_footer_menu - Whether to display sample footer menu with Top and Home links
 */
$theme_options = array(
	'background_color' 		=> 'f2f2f2',
	'content_width' 		=> 1170,
	'embed_video_width' 	=> 600,
	'embed_video_height' 	=> null, // i.e. calculate it automatically
	'post_formats' 			=> '',
	'touch_support' 		=> true,
	'fontawesome' 			=> true,
	'bootstrap_gradients' 	=> false,
	'navbar_classes'		=> 'navbar-default navbar-fixed-top', // Different than parent
	'image_keyboard_nav' 	=> true,
	'sample_widgets' 		=> true,
	'sample_footer_menu'	=> true
);

/**
 * Force the site title to display in the navbar and add our custom header images
 */
add_action( 'after_setup_theme', 'xsbf_pratt_after_setup_theme' ); 
function xsbf_pratt_after_setup_theme() {

	// These args will override the ones in the parent theme
	$args = array(
		'header-text' => false,
		'default-image' => get_stylesheet_directory_uri() . '/images/headers/desk.jpg',
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
	) );
}

/*
 * Set the CSS for the Appearance > Header admin panel 
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
		/*text-shadow: none;*/
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

/* 
 * Display the header image in the Appearance > Header and Appearance > Customize
 */
function xsbf_admin_header_image() {
	?>
	<div id="headimg" style="background: #34495e url(<?php header_image(); ?>) no-repeat scroll top; background-size: 1600px auto; background-position: center center;">
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

/**
 * Filter the image caption shortcode for full-width images, so we can float the caption
 * over the image. Code largely stolen from core WordPress wp-includes/media.php.
 *
 * NOTE: REMOVE THIS FUNCTION OVERRIDE AFTER PARENT FLAT-BOOTSTRAP V1.2 IS RELEASED.
 */
add_filter('img_caption_shortcode', 'xsbf_img_caption', 10, 3 );
function xsbf_img_caption ( $null, $attr, $content ) {

	global $content_width;

	// Extract the passed-in arguments to individual variables
	extract(shortcode_atts(array(
		'id'	=> '',
		'align'	=> 'alignnone',
		'width'	=> '',
		'caption' => ''
	), $attr));

	// If image is not full-width, then don't mess with it.
	//if ( 1 > (int) $width OR empty ( $caption ) OR $content_width > $width )
	if ( 1 > (int) $width OR $content_width > $width ) return null;
	
	// If we aren't on a full-width page or post, then don't mess with it either
	if( ! xsbf_is_fullwidth() ) return null;

	// Strip off all but the <img> tag and parse it
	$content_img = strip_tags ( $content, '<img>' );
	$image_tag = simplexml_load_string ( $content_img );

	// If tag malformed, then bail
	if ( ! $image_tag OR ! $image_tag['src'] ) return null;

	// Ok, let's build the HTML to match our "cover" or "section" images
	if ( $id ) $id = 'id="' . esc_attr($id) . '" ';

	// If image height over 600px, then set the div to "cover"
	//if ( $image_tag['height'] >= 600 ) $div_class = "cover-image";
	//else $div_class = "section-image";
	$div_class = 'section-image';
	
	// Since using absolute positioning, need a <p> tag if no other tags.
	$caption = str_ireplace ( array ( '<br />', '<br>' ), '', $caption ); 
	if ( $caption == strip_tags ( $caption, '<h1><h2><p>' ) ) {
		$caption = '<p>' . $caption . '</p>';
	}

	return '<div ' . $id . 'class="' . $div_class . ' ' . $image_tag['class'] . '"'
		. ' style="background-image: url(\'' . $image_tag['src'] . '\');'
		. $image_tag['style'] . ' ">'
		. '<div class="' . $div_class . '-overlay">'
		. $caption
		. '</div></div>';	
}
