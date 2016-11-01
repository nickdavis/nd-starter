<?php
/**
 * Post functions
 *
 * @package     NickDavis\Starter
 * @since       1.0.0
 * @author      Nick Davis
 * @link        https://designtowebsite.com
 * @license     GNU General Public License 2.0+
 */
namespace NickDavis\Starter;

add_filter( 'genesis_author_box_gravatar_size', __NAMESPACE__ . '\setup_author_box_gravatar_size' );
/**
 * Modify size of the Gravatar in the author box.
 *
 * @since 1.0.0
 *
 * @param $size
 *
 * @return int
 */
function setup_author_box_gravatar_size( $size ) {

	return 90;
}
