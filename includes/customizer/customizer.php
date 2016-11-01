<?php
/**
 * Customizer handler.
 *
 * @package     NickDavis\Starter
 * @since       1.0.0
 * @author      Nick Davis
 * @link        https://designtowebsite.com
 * @license     GNU General Public License 2.0+
 */

add_action( 'customize_register', 'nd_register_with_customizer' );
/**
 * Register settings and controls with the Customizer.
 *
 * @since 1.0.0
 *
 * @param WP_Customize_Manager $wp_customize Customizer object.
 */
function nd_register_with_customizer() {
	$prefix = nd_get_settings_prefix();

	global $wp_customize;

	$wp_customize->add_setting(
		$prefix . '_link_color',
		array(
			'default'           => nd_get_default_link_color(),
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			$prefix . '_link_color',
			array(
				'description' => __( 'Change the default color for linked titles, menu links, post info links and more.', 'nd-starter' ),
				'label'       => __( 'Link Color', 'nd-starter' ),
				'section'     => 'colors',
				'settings'    => $prefix . '_link_color',
			)
		)
	);

	$wp_customize->add_setting(
		$prefix . '_accent_color',
		array(
			'default'           => nd_get_default_accent_color(),
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			$prefix . '_accent_color',
			array(
				'description' => __( 'Change the default color for button hovers.', 'nd-starter' ),
				'label'       => __( 'Accent Color', 'nd-starter' ),
				'section'     => 'colors',
				'settings'    => $prefix . '_accent_color',
			)
		)
	);

}
