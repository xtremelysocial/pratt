<?php
/**
 * Theme: Flat Bootstrap
 * 
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package flat-bootstrap
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">

	<?php do_action( 'before' ); ?>
	
	<header id="masthead" class="site-header" role="banner">

		<?php
		/**
		  * CUSTOM HEADER IMAGE DISPLAYS HERE FOR THIS THEME, BUT CHILD THEMES MAY DISPLAY
		  * IT BELOW THE NAV BAR (VIA CONTENT-HEADER.PHP)
		  */
		global $xsbf_theme_options;
		$custom_header_location = isset ( $xsbf_theme_options['custom_header_location'] ) ? $xsbf_theme_options['custom_header_location'] : 'content-header';
		if ( $custom_header_location == 'header' ) :
		?>
			<div id="site-branding" class="site-branding">
			
			<?php
			// Get custom header image and determine its size
			if ( get_header_image() ) {
			?>
				<div class="custom-header-image" style="background-image: url('<?php echo header_image() ?>'); width: <?php echo get_custom_header()->width; ?>px; height: <?php echo get_custom_header()->height ?>px;">
				<div class="container">
                <?php if ( function_exists( 'jetpack_the_site_logo' ) ) jetpack_the_site_logo(); ?>
                <div class="site-branding-text">
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' )?></a></h1>
				<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
				</div>
				</div></div>
			<?php

			// If no custom header, then just display the site title and tagline
			} else {
			?>
				<div class="container">
                <?php if ( function_exists( 'jetpack_the_site_logo' ) ) jetpack_the_site_logo(); ?>
                <div class="site-branding-text">
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' )?></a></h1>
				<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
				</div>
				</div>
			<?php
			} //endif get_header_image()
			?>
			</div><!-- .site-branding -->

		<?php			
		endif; // $custom_header_location
		?>			

		<?php
		/**
		  * ALWAYS DISPLAY THE NAV BAR
		  */
 		?>	
		<nav id="site-navigation" class="main-navigation" role="navigation">

			<h1 class="menu-toggle sr-only screen-reader-text"><?php _e( 'Primary Menu', 'flat-bootstrap' ); ?></h1>
			<div class="skip-link"><a class="screen-reader-text sr-only" href="#content"><?php _e( 'Skip to content', 'flat-bootstrap' ); ?></a></div>

		<?php
		// Set up the navbar. This can be overriden by child themes or a plugin.
		global $xsbf_theme_options;
		$navbar = '<div class="navbar ' . $xsbf_theme_options['navbar_classes'] . '">'
			.'<div class="container">';

		// Navbar header (branding and mobile menu toggle)
		$navbar .= '<div class="navbar-header">'
          	//.'<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-search-collapse">'
            //.'<span class="glyphicon glyphicon-search"></span>'
          	//.'</button>'
          	.'<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">'
            .'<span class="icon-bar"></span>'
            .'<span class="icon-bar"></span>'
            .'<span class="icon-bar"></span>'
          	.'</button>';

		// Site title (Bootstrap "brand") in navbar. Hidden by default. Customizer will
		// display it if user turns off the main site title and tagline.
		$navbar .= '<a class="navbar-brand" href="'
			.esc_url( home_url( '/' ) )
			.'" rel="home">'
			.get_bloginfo( 'name' )
			.'</a>';
/*
		// Add search to navbar
		$navbar .= '
		<form class="navbar-form navbar-right" role="search" method="get" action="'
		.get_bloginfo('url') . '">
        <button id="search-icon" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
        <div id="search-form" class="form-group">
			<div class="input-group">
				<input type="search" class="form-control" placeholder="Search" name="s">
				<!-- <span id="search-button" class="input-group-addon"><span class="glyphicon glyphicon-search"></span></span> -->
			</div>
			<div class="input-group">
				<button type="submit" id="search-button" class=""><span class="glyphicon glyphicon-search"></span></button>
			</div>
		</div>
		</form>
		';
*/
        $navbar .= '</div><!-- navbar-header -->';

		// Display the desktop (collapsible) navbar
		$navbar .= '<div class="navbar-collapse collapse">';
		$navbar .= wp_nav_menu( 
			array(  'theme_location' => 'primary',
			//'container_class' => 'navbar-collapse collapse', //<nav> or <div> class
			'menu_class' => 'nav navbar-nav', //<ul> class
			'walker' => new wp_bootstrap_navwalker(),
			'fallback_cb' => 'wp_bootstrap_navwalker::fallback',
			'echo'	=> false
			) 
		);
		
/* from: http://jsbin.com/futeyo/1/edit?html,css,js,output
<!-- Define your search form -->
      <form class="navbar-form navbar-left" role="search">
        <!-- Define a button to toggle the search area -->
        <button id='search-button' class='btn btn-default '><span class='glyphicon glyphicon-search'></span></button>
        <!-- Create your entire search form -->
        <div id='search-form' class="form-group">
          <div class="input-group">
            <span id='search-icon' class="input-group-addon"><span class='glyphicon glyphicon-search'></span></span>
            <input type="text" class="form-control" placeholder="Search">
          </div>
        </div>
      </form>
*/
		
		$navbar .= '</div><!-- navbar-collapse -->';
/*
		// Add search to navbar
		//$navbar .= '<div class="navbar-search-collapse collapse">';
		$navbar .= '
		<!-- <div style="margin-top: -40px;"> -->
		<form class="navbar-form pull-right" role="search" method="get" action="'
		.get_bloginfo('url') . '">
        <button id="search-icon" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
        <div id="search-form" class="form-group">
			<div class="input-group">
				<input type="search" class="form-control" placeholder="Search" name="s">
				<!-- <span id="search-button" class="input-group-addon"><span class="glyphicon glyphicon-search"></span></span> -->
			</div>
			<div class="input-group">
				<button type="submit" id="search-button" class=""><span class="glyphicon glyphicon-search"></span></button>
			</div>
		</div>
		</form>
		<!-- </div> -->
		'; 
		//$navbar .= '</div>';
*/
		$navbar .= '</div><!-- .container -->';
		$navbar .= '</div><!-- .navbar -->';
		
		echo apply_filters( 'xsbf_navbar', $navbar );
		?>

		</nav><!-- #site-navigation -->

	</header><!-- #masthead -->

	<?php // Set up the content area (but don't put it in a container) ?>	
	<div id="content" class="site-content">
