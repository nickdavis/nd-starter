<?php
/**
 * Theme setup and defaults functions
 *
 * @package     NickDavis\Starter
 * @since       1.0.0
 * @author      Nick Davis
 * @link        https://designtowebsite.com
 * @license     GNU General Public License 2.0+
 */

add_action( 'genesis_setup', 'nd_setup_child_theme' );
/**
 * Setup child theme.
 *
 * @since 1.0.0
 *
 * @return void
 */
function nd_setup_child_theme() {
	load_child_theme_textdomain( 'nd-starter', apply_filters( 'child_theme_textdomain', CHILD_THEME_DIR . '/languages', 'nd-starter' ) );

	nd_adds_theme_supports();
	nd_adds_new_image_sizes();
}

/**
 * Adds theme supports to the site.
 *
 * @since 1.0.0
 *
 * @return void
 */
function nd_adds_theme_supports() {
	$config = array(
		'html5'                           => array(
			'caption',
			'comment-form',
			'comment-list',
			'gallery',
			'search-form'
		),
		'genesis-accessibility'           => array(
			'404-page',
			'drop-down-menu',
			'headings',
			'rems',
			'search-form',
			'skip-links'
		),
		'genesis-responsive-viewport'     => null,
		'custom-header'                   => array(
			'width'           => 600,
			'height'          => 160,
			'header-selector' => '.site-title a',
			'header-text'     => false,
			'flex-height'     => true,
		),
		'custom-background'               => null,
		'genesis-after-entry-widget-area' => null,
		'genesis-footer-widgets'          => 3,
		'genesis-menus'                   => array(
			'primary'   => __( 'Header Menu', 'nd-starter' ),
			'secondary' => __( 'Footer Menu', 'nd-starter' )
		),
	);

	foreach ( $config as $feature => $args ) {
		add_theme_support( $feature, $args );
	}
}

/**
 * Adds new image sizes.
 *
 * @since 1.0.0
 *
 * @return void
 */
function nd_adds_new_image_sizes() {
	$config = array(
		'featured-image' => array(
			'width'  => 720,
			'height' => 400,
			'crop'   => true,
		),
	);

	foreach( $config as $name => $args ) {
		$crop = array_key_exists( 'crop', $args ) ? $args['crop'] : false;

		add_image_size( $name, $args['width'], $args['height'], $crop );
	}
}

add_filter( 'genesis_theme_settings_defaults', 'nd_set_theme_settings_defaults' );
/**
 * Set theme settings defaults.
 *
 * @since 1.0.0
 *
 * @param array $defaults
 *
 * @return array
 */
function nd_set_theme_settings_defaults( array $defaults ) {
	$config = nd_get_theme_settings_defaults();

	$defaults = wp_parse_args( $config, $defaults );

	return $defaults;
}

add_action( 'after_switch_theme', 'nd_update_theme_settings_defaults' );
/**
 * Sets the theme setting defaults.
 *
 * @since 1.0.0
 *
 * @return void
 */
function nd_update_theme_settings_defaults() {
	$config = nd_get_theme_settings_defaults();

	if ( function_exists( 'genesis_update_settings' ) ) {
		genesis_update_settings( $config );
	}

	update_option( 'posts_per_page', $config['blog_cat_num'] );
}

/**
 * Get the theme settings defaults.
 *
 * @since 1.0.0
 *
 * @return array
 */
function nd_get_theme_settings_defaults() {
	return array(
		'blog_cat_num'              => 12,
		'content_archive'           => 'full',
		'content_archive_limit'     => 0,
		'content_archive_thumbnail' => 0,
		'posts_nav'                 => 'numeric',
		'site_layout'               => 'content-sidebar',
	);
}
