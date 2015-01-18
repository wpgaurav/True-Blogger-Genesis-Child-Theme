<?php
//* Start the engine
include_once( get_template_directory() . '/lib/init.php' );

//* Set Localization (do not remove)
load_child_theme_textdomain( 'trueblogger', apply_filters( 'child_theme_textdomain', get_stylesheet_directory() . '/languages', 'trueblogger' ) );

//* Child theme (do not remove)
define( 'CHILD_THEME_NAME', __( 'True Blogger', 'trueblogger' ) );
define( 'CHILD_THEME_URL', 'http://gauravtiwari.org/shop/true-blogger/' );
define( 'CHILD_THEME_VERSION', '2.2' );

//* Add HTML5 markup structure
add_theme_support( 'html5' );

//* Add viewport meta tag for mobile browsers
add_theme_support( 'genesis-responsive-viewport' );

//* Adding Karla Google font
add_action( 'wp_enqueue_scripts', 'trueblogger_google_fonts' );
function trueblogger_google_fonts() {
	wp_enqueue_style( 'google-font', '//fonts.googleapis.com/css?family=Karla:400,700,400italic,700italic', array(), PARENT_THEME_VERSION );
}

//* Add new featured image size
add_image_size( 'grid-featured', 270, 100, TRUE );
add_image_size( 'blog-widget-thumbnail', 80,80, TRUE );


//* Add support for structural wraps
add_theme_support( 'genesis-structural-wraps', array(
	'header',
	'nav',
	'subnav',
	'site-inner',
	'footer-widgets',
	'footer'
) );


//* Reposition the site description
remove_action( 'genesis_site_description', 'genesis_seo_site_description' );
add_action( 'genesis_before_content_sidebar_wrap', 'genesis_seo_site_description' );

//* Reposition the primary navigation menu
remove_action( 'genesis_after_header', 'genesis_do_nav' );
add_action( 'genesis_before_content_sidebar_wrap', 'genesis_do_nav' );

//* Reposition the secondary navigation menu
remove_action( 'genesis_after_header', 'genesis_do_subnav' );
// add_action( 'genesis_before_content_sidebar_wrap', 'genesis_do_subnav' );

//* Add support for 3-column footer widgets
add_theme_support( 'genesis-footer-widgets', 3 );

//* Setting Up Sidebars
function remove_default_widgets(){

	// Unregister some of the sidebar
	unregister_sidebar( 'header-right' );
}
add_action( 'widgets_init', 'remove_default_widgets', 11 );


add_action( 'init', 'true_add_editor_styles' );

function true_add_editor_styles() {

    add_editor_style( 'editor-style.css' );

}