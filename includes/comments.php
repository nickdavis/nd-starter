<?php
/**
 * Comments functions
 *
 * @package     NickDavis\Starter
 * @since       1.0.0
 * @author      Nick Davis
 * @link        https://designtowebsite.com
 * @license     GNU General Public License 2.0+
 */

add_filter( 'genesis_comment_list_args', 'nd_setup_comments_gravatar' );
/**
 * Modify size of the Gravatar in the entry comments.
 *
 * @since 1.0.0
 *
 * @param $args
 *
 * @return mixed
 */
function nd_setup_comments_gravatar( $args ) {
	$args['avatar_size'] = 60;

	return $args;
}
