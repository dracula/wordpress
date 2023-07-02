<?php
/**
 * Dracula Custom theme WordPress
 *
 * @package           Dracula WordPress Color Scheme
 * @author            Dave Warfel, Gustavo Pereira, Rodrigo Del Bem
 * @copyright         Dracula
 * @license           MIT License
 *
 * @wordpress-plugin
 * Plugin Name:       Dracula Custom theme WordPress
 * Plugin URI:        https://github.com/dracula/wordpress
 * Description:       Custom color schemes for the admin area.
 * Version:           1.0.1
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Dave Warfel, Gustavo Pereira, Rodrigo Del Bem
 * Author URI:        https://github.com/dracula/wordpress
 * Text Domain:       dracula-wordpress-textdomain
 * License:           MIT License
 * License URI:       https://github.com/dracula/wordpress/blob/master/LICENSE
 * Update URI:        https://github.com/dracula/wordpress/releases
 */

if ( ! class_exists( 'Dracula_WordPress_Custom_Color_Schemes' ) ) {
	require_once __DIR__ . '/dracula-custom-admin-color-schemes/class-dracula-wordpress-custom-color-schemes.php';
	global $acs_colors;
	$acs_colors = new Dracula_WordPress_Custom_Color_Schemes();
}
