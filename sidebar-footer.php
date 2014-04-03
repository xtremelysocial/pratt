<?php
/**
 * Theme: Flat Bootstrap Pratt
 * 
 * The "sidebar" for the widgetized footer area. If no widgets added AND just preivewing
 * the theme, then display some widgets as samples. Once the theme is actually in use,
 * it will be empty until the user adds some actual widgets.
 *
 * @package flat-bootstrap-pratt
 */
?>

<?php 
/* If footer "sidebar" has widgets, then display them */
$sidebar_footer = get_dynamic_sidebar( 'Footer' );
if ( $sidebar_footer ) :
?>
	<div class="sidebar-footer clearfix">
	<div class="container">
		<div class="row">
		<?php echo apply_filters( 'xsbf_footer', $sidebar_footer ); ?>
		</div><!-- .row -->
	</div><!-- .container -->
	</div><!-- .sidebar-footer -->

<?php
/* Otherwise, if user is previewing this theme, then show some examples */
elseif ( xsbf_theme_preview() ) :
?>
	<div class="sidebar-footer clearfix">
	<div class="container">
		<div class="row">

			<aside id="sample-text" class="widget widget_text col-sm-4 clearfix">
				<h2 class="widget-title"><?php _e( 'Address', 'flat-bootstrap' ); ?></h2>
				<p><?php bloginfo( 'name' ); ?><br />
				<?php _e( "Av. Greenville 987<br />New York, New York 90873<br />United States", 'flat-bootstrap' ); ?></p>
				<p><?php _e( "Note: This is just a sample footer for the theme preview.", 'flat-bootstrap' ); ?></p>
			</aside>

			<aside id="sample-text-2" class="widget widget_text col-sm-8 clearfix">
				<h2 class="widget-title"><?php _e( 'Drop Us A Line', 'flat-bootstrap' ); ?></h2>
				<p><?php echo do_shortcode( "[contact-form][contact-field label='Name' type='name' required='1'/][contact-field label='Email' type='email' required='1'/][contact-field label='Website' type='url'/][contact-field label='Comment' type='textarea' required='1'/][/contact-form]" ) ?></p>
			</aside>

		</div><!-- .row -->
	</div><!-- .container -->
	</div><!-- .sidebar-footer -->

<?php endif;?>