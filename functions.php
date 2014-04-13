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
	'image_keyboard_nav' 	=> true
);

/*
 * Since this theme doesn't have a "header" for the site title and tagline, trigger 
 * display of the site title in the navbar.
 */
add_filter ( 'xsbf_custom_header_args', 'xsbf_pratt_custom_header_args' );
function xsbf_pratt_custom_header_args( $args ) {
	$args['header-text'] = false;
	return $args;
}

/*
 * This theme uses the custom "header" image for the content header, so update the
 * display in the Appearance > Header admin panel
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
			echo 'background: url(' . esc_url( $header_image ) . ') no-repeat scroll top; background-size: 1600px auto;';
		} ?>
		padding: 0 20px;
		height: 200px;
	}
	#headimg .home-link {
		-webkit-box-sizing: border-box;
		-moz-box-sizing:    border-box;
		box-sizing:         border-box;
		margin: 0 auto;
		max-width: 1040px;
		<?php
		if ( ! empty( $header_image ) || display_header_text() ) {
			echo 'min-height: 200px;';
		} ?>
		width: 100%;
	}

	#headimg h1 {
		font: 300 41px/45px Raleway, Arial, 'Helvetica Neue', sans-serif;
		margin: 25px 0 11px;
	}
	#headimg h2 {
		font: 300 24px/26px Raleway, Arial, 'Helvetica Neue', sans-serif;
		margin: 10px 0 25px;
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

function xsbf_admin_header_image() {
	?>
	<div id="headimg" style="background: #34495e url(<?php header_image(); ?>) no-repeat scroll top; background-size: 1600px auto;">
		<?php $style = ' style="color:#' . get_header_textcolor() . ';"'; ?>
		<div class="home-link">
			<h1 class="displaying-header-text" <?php echo $style; ?>><?php _e( 'Content Header', 'bootstrap-flat' ) ?></h1>
			<h2 id="desc" class="displaying-header-text"<?php echo $style; ?>><?php _e( 'Content Subtitle', 'bootstrap-flat' ); ?></h2>
		</div>
	</div>
<?php 
} 