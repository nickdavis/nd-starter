<?php
/**
 * Menu functions
 *
 * @package     NickDavis\Starter
 * @since       1.0.0
 * @author      Nick Davis
 * @link        https://designtowebsite.com
 * @license     GNU General Public License 2.0+
 */
namespace NickDavis\Starter;

add_filter( 'wp_nav_menu_args', __NAMESPACE__ . '\secondary_menu_args' );
/**
 * Reduce the secondary navigation menu to one level depth
 *
 * @since 1.0.0
 *
 * @param $args
 *
 * @return mixed
 */
function secondary_menu_args( $args ) {
	if ( 'secondary' != $args['theme_location'] ) {
		return $args;
	}

	$args['depth'] = 1;

	return $args;
}

/**
 * Reposition the secondary navigation menu
 *
 */
remove_action( 'genesis_after_header', 'genesis_do_subnav' );
add_action( 'genesis_footer', 'genesis_do_subnav', 5 );
