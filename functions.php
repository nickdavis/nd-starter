<?php
/**
 * ND Starter
 *
 * @package     NickDavis\Starter
 * @since       1.0.0
 * @author      Nick Davis
 * @link        https://designtowebsite.com
 * @license     GNU General Public License 2.0+
 */
namespace NickDavis\Starter;

// Setup Genesis
include_once( get_template_directory() . '/lib/init.php' );

/**
 * Initialise the theme's constants.
 *
 * @since 1.0.0
 *
 * @return void
 */
function init_constants() {
	$child_theme = wp_get_theme();

	define( 'CHILD_THEME_NAME', $child_theme->get( 'Name' ) );
	define( 'CHILD_THEME_URL', $child_theme->get( 'ThemeURI' ) );
	define( 'CHILD_THEME_VERSION', $child_theme->get( 'Version' ) );
	define( 'CHILD_TEXT_DOMAIN', $child_theme->get( 'TextDomain' ) );
	define( 'CHILD_THEME_DIR', get_stylesheet_directory() );
	define( 'CHILD_CONFIG_DIR', CHILD_THEME_DIR . '/config/' );
}

init_constants();

// Setup theme
include_once( CHILD_THEME_DIR . '/includes/setup.php' );

// Load other functions
include( CHILD_THEME_DIR . '/includes/customizer/css-handler.php' );
include( CHILD_THEME_DIR . '/includes/customizer/helpers.php' );
include( CHILD_THEME_DIR . '/includes/archive.php' );
include( CHILD_THEME_DIR . '/includes/assets.php' );
include( CHILD_THEME_DIR . '/includes/comments.php' );
include( CHILD_THEME_DIR . '/includes/footer.php' );
include( CHILD_THEME_DIR . '/includes/markup.php' );
include( CHILD_THEME_DIR . '/includes/menu.php' );
include( CHILD_THEME_DIR . '/includes/post.php' );
include( CHILD_THEME_DIR . '/includes/sidebar.php' );
include( CHILD_THEME_DIR . '/includes/customizer/customizer.php' );
