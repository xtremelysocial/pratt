<?php
/**
 * Theme: Pratt
 * 
 * The "sidebar" for the bottom of the page (before the widgetized footer area). If no 
 * widgets added AND preivewing the theme, then display some widgets as samples. Once the
 * theme is actually in use, it will be empty until the user adds some actual widgets.
 *
 * @package pratt
 */
?>

<?php 
/* If page bottom "sidebar" has widgets, then retrieve them */
//$sidebar_pagebottom = get_dynamic_sidebar( 'Page Bottom' );
$sidebar_pagebottom = get_dynamic_sidebar( 'sidebar-4' );

/* If not, then display sample widgets unless turned off in theme options */
global $theme_options;
if ( $theme_options['sample_widgets'] != false AND ! $sidebar_pagebottom ) {
	$sidebar_pagebottom = '<aside id="sample-text" class="widget widget_text section bg-midnightblue centered clearfix">'
		.'<div class="container">'
		.'<h2 class="widget-title">' . _x( 'THIS IS A CALL TO ACTION AREA', null, 'flat-bootstrap' ) . '</h2>'
		.'<div class="textwidget">'
		.'<div class="row">'
		.'<div class="col-lg-8 col-lg-offset-2">'
		.'<p>' . _x( "This is just an example text widget. You can add text widgets here to put whatever you'd like.", null, 'flat-bootstrap' ) . '</p>'
		.'<p><button type="button" class="btn btn-primary btn-lg">' . _x( 'Call To Action Button', null, 'flat-bootstrap' ) . '</button></p>'
		.'</div><!-- col-lg-8 -->'
		.'</div><!-- row -->'
		.'</div><!-- textwidget -->'
		.'</div><!-- container -->'
		.'</aside>';
}

/* Apply filters and display the footer widgets */
if ( $sidebar_pagebottom ) :
?>
	<div id="sidebar-pagebottom" class="sidebar-pagebottom">
		<?php echo apply_filters( 'xsbf_pagebottom', $sidebar_pagebottom ); ?>
	</div><!-- .sidebar-pagebottom -->
<?php endif;?>
