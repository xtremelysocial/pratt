=== Flat Bootstrap Pratt by XtremelySocial ===

Contributors: timnicholson
Tags: one-column, right-sidebar, left-sidebar, fluid-layout, responsive-layout, custom-header, custom-menu, featured-images, featured-image-header, full-width-template, flexible-header, theme-options, sticky-post, threaded-comments, light, translation-ready, rtl-language-support, custom-background
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=JGJUJVK99KHRE
Requires at least: 3.6.0
Tested up to: 3.8.1
Stable tag: 1.0
License: GPLv3
License URI: http://www.opensource.org/licenses/GPL-3.0

Flat Bootstrap Pratt by XtremelySocial is an adaptation of the "Pratt" theme by Blacktie.co. It is a modern, fully responsive, "flat" style theme with a nice color palette, big full-width images, and full-width colored sections. The navbar is fixed at the top of the page for easy navigation. For more information go to http://xtremelysocial.com/wordpress/pratt/.


== DESCRIPTION ==

The Flat Bootstrap Pratt theme is a child theme for Flat Bootstrap that removes the header and fixes the navbar to the top of the page. The site title is displayed in the navbar, so you still retain your site branding.

Features include a mobile navigation bar, multiple columns (grid), buttons, icons, labels, badges, tabbed content areas, collapsible content areas, progress bars, alert boxes, carousels (sliders) and much, much more. This is a theme for both users and theme developers with lots of features but without the bloat. 

This theme is designed to have a "static" home page and so when previewing the theme and when you first install it, a sample page is displayed. The theme is perfect for showcasing products or photos with a midnight blue page header.

For more information go to [http://xtremelysocial.com/wordpress/pratt/].


== LICENSE ==

Flat Bootstrap Pratt WordPress theme, Copyright (C) 2014 XtremelySocial
Flat Bootstrap Pratt WordPress theme is licensed under the GPL.


== INSTALLATION ==

1. Download and install the parent theme, Flat Bootstrap, into your main /wp-content/themes/ directory
2. Download this theme into your main /wp-content/themes/ directory
3. Activate this theme through the 'Appearance' menu in WordPress
4. Read the notes below about how to use this theme


== HOW TO USE THIS THEME ==

= Setting up the Home Page =

We think this theme looks great with the home page as a full-width page with midnight blue "section header" that has a screenshot or picture of your product, service, or latest work at the top and a few recent posts at the bottom. So we have provided a sample home page and that sample is displayed when you preview the theme and when you first install it.

If you like the sample page, you can start with that to build the home page or any other page on your site. First, create or edit your existing page and select the page template "Full with Recent Posts". Put the WordPress editor into "Text" (HTML) mode. Then go into the /samples directory and copy-and-paste the entire contents of the home.html page into your page.

If you want this page to be your home page, create or edit an existing page to be used for your blog. You don't need any content or special settings on that page as its just a placeholder URL for WordPress to display your blog. Then go into WordPress Appearance -> Customize and set the option for Static Home Page to one of your pages. Assign this page as your blog page.

= Optionally, Set up the Theme as a Single Page Site =

The original Pratt HTML theme by Blacktie.com is a "single page" theme, meaning the home page is a long series of sections that covers what normally would be broken into several pages. For example, sections for about us, our products, our services, our team, how to contact us, etc. To aid navigation the main menu contains links to the various sections and when clicked a "smooth scroll" effect is used to move the user to the top of the selected section.

This theme can absolutely be used that way, but you don't have to. Most WordPress sites have multiple pages, so the theme defaults to working that way, but here is how to set that up.

Follow the directions above about setting up the home page and be sure to include an ID on each section you want to link to.

Then set up the primary navigation menu with a set of custom links. In the Appearance -> Menus screen, select "Links" instead of the default "Pages". The URL's should point to the home page with a "#" sign and the ID of the section, such as "#about". Key in the title, such as "About", then add the menu item. Then click on the menu item to edit it. Place the word "smoothscroll" (without the quotes) in the Title Attribute field. That will trigger a cool scrolling effect on the link when its clicked.

Note that once you set up the menu this way, you are truly limited to linking to a single page. If you add regular page or category links, once a user goes to that page, clicking the main navbar items above won't work because they are no longer on the home page. If there is enough demand for a hybrid approach, let me know and I'll see if I can figure out a good way to handle that.

= Set up the Footer =

The original Pratt HTML theme by Blacktie.co has a two-column footer with your organization's address on the left and a contact form on the right. So we've set up the theme preview to display that.

If you would like to use that for your site, add a normal WordPress text widget to the Footer sidebar and key in your company name and address or whatever you like.

To duplicate the contact form, add a second text widget to the Footer sidebar and paste in the following. This is a standard WordPress contact form that will send the email contents to the "Feedback" section in Admin and also email it to you.

`[contact-form][contact-field label='Name' type='name' required='1'/][contact-field label='Email' type='email' required='1'/][contact-field label='Website' type='url'/][contact-field label='Comment' type='textarea' required='1'/][/contact-form]`

You can change up the fields and labels and even add new ones. To customize the form, just go to any page on your site and click the "Add Contact Form" button. After you insert the form into your page, just cut-and-paste that contact-form shortcode into your text widget.

= About WordPress Child Themes =

This theme is a standard WordPress "child theme". It comes with only the files that modify the styling, templates, and functions of the parent theme, Flat Bootstrap, that are needed for this theme.

If you just want to change some of the styling (CSS), we recommend using the WordPress Jetpack plugin for this. It will store your styles in the WordPress database and apply them automatically after the theme's default styles.

If you want to modify the theme further than that, such as to modify page templates, then COPY this theme into your /themes directory with a new directory name. Perhaps pratt-modified or my-pratt or something like that. You'll also need to change the very first line of the style.css file to change the "Theme Name:" so that you can tell the difference between the original Pratt theme and your customized one when you are viewing the themes on your site.

By using either of these methods described above (the Jetpack plugin or copying the theme files to a new name), you'll be able to upgrade this theme from WordPress.org to receive bug fixes and new features.

You can read more information about how to use child themes on WordPress.org [http://codex.wordpress.org/Child_Themes]

= Optionally, Set your Home Page Back to Displaying your Blog =

If you want to have your blog as your home page instead of a custom page, copy over this theme and give it a new name per the instructions above. Then simply delete (or rename) the home.php file. Then activate your new child theme. This will revert your home page back to your blog.

If you later change your mind and want a custom home page, you don't even need to restore that home.php file. Just set WordPress to use a page on your site as the home page and it will do it. The only reason the home.php file is included in this theme is to display the sample home page when you preview or first install the theme.

= Additional Theme Features and Usage =

All of the features of the parent theme, Flat Bootstrap, are included in this theme. You can have full-width images at the top of your pages, full-width blog posts (no sidebar), colored sections, buttons, carousels (sliders), and much, much more. 

For more information, see the "How to use our themes" [http://xtremelysocial.com/wordpress/usergide/] and "Theme Shortcodes" [http://xtremelysocial.com/wordpress/shortcodes/] pages on our website. 


== CHANGELOG ==

= 1.0 =
* Initial version

