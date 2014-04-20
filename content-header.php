<?php
/**
 * Theme: Flat Bootstrap Pratt
 * 
 * This template is called from other page and archive templates to display the header.
 * This template pulls a featured post, the title, and custom field description and
 * displays it full-width just below the header.
 *
 * @package flat-bootstrap-pratt
 */
?>

<?php if ( have_posts() ) : ?>

	<?php 
	// Check page or post for a featured image
	global $content_width;
	$image_width = null;
	if ( is_singular() AND has_post_thumbnail() ) {
		$featured_image = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full');
		$image_width = $featured_image[1];
	}

	// If that featured image is full-width (>1170px wide), then use it
	$image_url = null;
	$use_featured = false;
	if ( $content_width AND $image_width >= $content_width ) {
		$image_url = $featured_image[0];
		$use_featured = true;

	// If not, then for pages check for the default or custom header image. i.e. Don't
	// do this for posts
	} elseif ( ( is_front_page() OR is_page() ) AND get_header_image() ) {
		$image_url = get_header_image();
	}		

	// If we have an image, then display it	
	if ( $image_url ) :

		// For the front page, use the site title (name) and tagline (description)
		if ( is_front_page() ) {
			$title = get_bloginfo('name');
			$caption = get_bloginfo('description');
			$description = null;
			$image_class = 'cover-image';
			$overlay_class = 'cover-image-overlay';

		// If not front_page, get the info from the image or the page / post
		} else {

			$title = null; $caption = null; $description = null;

			// If featured image, first try to use image title, caption and description
			if ( $use_featured ) {
				$attachment_post = get_post( get_post_thumbnail_id() );
				if ( $attachment_post ) {
					//print_r ( $attachment_post ); //TEST
					$title = $attachment_post->post_title; // Title
					$caption = $attachment_post->post_excerpt; // Caption
					$description = $attachment_post->post_content;
				}
			}
		
			// If no title or description, get them from the page or post and custom field
			if ( ! $title ) $title = get_the_title();
			if ( ! $caption ) $caption = get_post_meta( get_the_ID(), '_subtitle', $single = true );			
			$image_class = 'section-image';
			$overlay_class = 'section-image-overlay';
		} //endif is_frontpage()
		
		// Now we display the image and text
		?>
		<header class="content-header-image">
			<div class="<?php echo $image_class; ?>" style="background-image: url('<?php echo $image_url; ?>')">
				<div class="<?php echo $overlay_class; ?>">
				<h1 class="header-image-title"><?php echo $title; ?></h1>
				<?php if ( $caption ) echo '<h2 class="header-image-caption">' . $caption . '</h2>'; ?>
				<?php if ( $description ) echo '<p class="header-image-description">' . $description . '</p>'; ?> 
				</div><!-- .cover-image-overlay or .section-image-overlay -->
			</div><!-- .cover-image or .section-image -->
		</header><!-- content-image-header -->

	<?php
	// If no image, then handle the home and blog page(s)
	elseif ( is_front_page() OR is_home() ) :
		$title = null; $subtitle = null;
		
		// When the front page is the blog (i.e. not a static page)
		if ( is_front_page() AND ! is_page() ) :
			$title = get_bloginfo('name'); 
			$subtitle = get_bloginfo('description');

		// When the front page is static, but we are on the blog page
		elseif ( is_home() ) :

			$home_page = get_option ( 'page_for_posts' );
			if ( $home_page ) $post = get_post( $home_page );
			if ( $post ) :
				$title = $post->post_title;
			else :
				$title = _x( 'Blog', null, 'flat-bootstrap' );
			endif;
			$subtitle = get_post_meta( $home_page, '_subtitle', $single = true );

		endif; //endif is_front_page()

		// Now go ahead and print them
		if ( $title ) :
		?>
			<header class="content-header">
			<div class="container">
			<h1 class="page-title"><?php echo $title; ?></h1>
			<?php if ( $subtitle ) printf( '<h3 class="page-subtitle taxonomy-description">%s</h3>', $subtitle ); ?>
			</div>
			</header>
		<?php 
		endif; //endif $title

	// If no header or featured image and we aren't on the home page, display the page or post title and optional subtitle	
	else :
	?> 
		<header class="content-header">
		<div class="container">

		<h1 class="page-title">		
		<?php
		if ( is_page() OR is_single() ) :
			the_title();
						
		elseif ( is_category() ) :
			single_cat_title();

		elseif ( is_tag() ) :
			single_tag_title();

		elseif ( is_author() ) :
			// Queue the first post, that way we know what author we're dealing with
			the_post();
			printf( __( 'Author: %s', 'flat-bootstrap' ), '<span class="vcard">' . get_the_author() . '</span>' );
			/* Since we called the_post() above, we need to
			* rewind the loop back to the beginning that way
			* we can run the loop properly, in full.
			*/
			rewind_posts();

		elseif ( is_search() ) :
			printf( __( 'Search Results for: %s', 'flat-bootstrap' ), '<span>' . get_search_query() . '</span>' );

		elseif ( is_day() ) :
			printf( __( 'Day: %s', 'flat-bootstrap' ), '<span>' . get_the_date() . '</span>' );

		elseif ( is_month() ) :
			printf( __( 'Month: %s', 'flat-bootstrap' ), '<span>' . get_the_date( 'F Y' ) . '</span>' );

		elseif ( is_year() ) :
			printf( __( 'Year: %s', 'flat-bootstrap' ), '<span>' . get_the_date( 'Y' ) . '</span>' );
		/*
		elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
			_e( 'Asides', 'flat-bootstrap' );

		elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
			_e( 'Images', 'flat-bootstrap');

		elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
			_e( 'Videos', 'flat-bootstrap' );

		elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
			_e( 'Quotes', 'flat-bootstrap' );

		elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
			_e( 'Links', 'flat-bootstrap' );

		else :
			_e( 'Archives', 'flat-bootstrap' );
		*/
		
/*
		else :
			//_e( 'Oops, we need to update content-header to catch this page type', 'flat-bootstrap' );
			the_title();
*/
		endif; //title
		?>
		</h1>
		
		<?php
		/* Display the subtitle, if there is one */
		
		// Show an optional taxonomy (category, tag, etc.)
		$term_description = term_description();
		if ( ! empty( $term_description ) ) {
			printf( '<h3 class="page-subtitle taxonomy-description">%s</h3>', $term_description );

		// Show an optional custom page field named "subtitle"
		} else {
			$subtitle = get_post_meta( get_the_ID(), '_subtitle', $single = true );
			if ( $subtitle ) printf( '<h3 class="page-subtitle taxonomy-description">%s</h3>', $subtitle );
		} // term_description
		?>

		</div><!-- .container -->

	<?php endif; // has_post_thumbnail() ?>

	</header><!-- .content-header -->

<?php endif; // have_posts() ?>

<?php // Page Top (after header) widget area 
get_sidebar( 'pagetop' ); 
?>