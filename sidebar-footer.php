<?php
/**
 * Theme: Pratt
 * 
 * The "sidebar" for the widgetized footer area. If no widgets added AND just preivewing
 * the theme, then display some widgets as samples. Once the theme is actually in use,
 * it will be empty until the user adds some actual widgets.
 *
 * @package pratt
 */
?>

<?php 
/* If footer "sidebar" has widgets, then retreive them */
$sidebar_footer = get_dynamic_sidebar( 'Footer' );

/* If not, then display sample widgets, unless turned off in theme options */
global $theme_options;
if ( $theme_options['sample_widgets'] != false AND ! $sidebar_footer ) {
	$sidebar_footer = '<aside id="sample-text" class="widget widget_text col-sm-4 clearfix">'
		.'<h2 class="widget-title">' . _x( 'Address', null, 'flat-bootstrap' ) . '</h2>'
		.'<p>' . get_bloginfo( 'name' ) . '<br />'
		._x( "Av. Greenville 987<br />New York, New York 90873<br />United States", null, 'flat-bootstrap' ) . '</p>'
		.'<p>' . _x( "Note: This is just a sample footer. Add widgets to change what appears here.", null, 'flat-bootstrap' ) . '</p>'
		.'</aside>';
		
	$sidebar_footer .= '<aside id="sample-text-2" class="widget widget_text col-sm-8 clearfix">'
		.'<h2 class="widget-title">' . _x( 'Drop Us A Line', null, 'flat-bootstrap' ) . '</h2>'
		.'<p>' . do_shortcode( "[contact-form][contact-field label='Name' type='name' required='1'/][contact-field label='Email' type='email' required='1'/][contact-field label='Website' type='url'/][contact-field label='Comment' type='textarea' required='1'/][/contact-form]" ) . '</p>'
		.'</aside>';
}

/* Apply filters and display the footer widgets */
if ( $sidebar_footer ) :
?>
	<div class="sidebar-footer clearfix">
	<div class="container">
		<div class="row">
		<?php echo apply_filters( 'xsbf_footer', $sidebar_footer ); ?>
		</div><!-- .row -->
	</div><!-- .container -->
	</div><!-- .sidebar-footer -->

<?php endif;?>
