<?php

/**
* Dracula Custom theme Wordpress
*
* @package           Dracula WordPress Color Scheme
* @author            Dave Warfel, Gustavo Pereira, Rodrigo Del Bem
* @copyright         Dracula
* @license           MIT License
*
* @wordpress-plugin
* Plugin Name:       Dracula Custom theme Wordpress
* Plugin URI:        https://github.com/dracula/wordpress
* Description:       Custom color schemes for the admin area.
* Version:           1.0.1
* Requires at least: 5.2
* Requires PHP:      7.2
* Author:            Dave Warfel, Gustavo Pereira, Rodrigo Del Bem
* Author URI:        https://github.com/dracula/wordpress
* Text Domain:       admin_schemes
* License:           MIT License
* License URI:       https://github.com/dracula/wordpress/blob/master/LICENSE
* Update URI:        https://github.com/dracula/wordpress/releases
*/

if(!class_exists('Custom_Color_Schemes')){
    require_once __DIR__ . '/custom-admin-color-schemes.php';
    global $acs_colors;
    $acs_colors = new Custom_Color_Schemes();
}
