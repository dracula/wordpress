<?php
/**
Plugin Name: Dracula Custom theme Wordpress
Description: Custom color schemes for the admin area.
Version: 1.0
Author: Dave Warfel, Gustavo Pereira
Text Domain: admin_schemes
Domain Path: /languages
*/

class Custom_Color_Schemes {


	private $colors = array( 
		'smackdown'
	);

	function __construct() {
		add_action( 'admin_enqueue_scripts', array( $this, 'load_default_css' ) );
		add_action( 'admin_init' , array( $this, 'add_colors' ) );
	}

	/**
	 * Register color schemes.
	 */
	function add_colors() {
		$suffix = is_rtl() ? '-rtl' : '';

		wp_admin_css_color( 
			'smackdown', __( 'Dracula', 'admin_schemes' ), 
			plugins_url( "smackdown/colors$suffix.css", __FILE__ ),
			array( '#282a36', '#44475a', '#8be9fd', '#f8f8f2' ),
			array( 'base' => '#3299bb', 'focus' => '#452b72', 'current' => '#f5f5f5' )
		);

	}

	/**
	 * Make sure core's default `colors.css` gets enqueued, since we can't
	 * @import it from a plugin stylesheet. Also force-load the default colors 
	 * on the profile screens, so the JS preview isn't broken-looking.
	 */ 
	function load_default_css() {

		global $wp_styles, $_wp_admin_css_colors;

		$color_scheme = get_user_option( 'admin_color' );

		$scheme_screens = apply_filters( 'acs_picker_allowed_pages', array( 'profile', 'profile-network' ) );
		if ( in_array( $color_scheme, $this->colors ) || in_array( get_current_screen()->base, $scheme_screens ) ){
			$wp_styles->registered[ 'colors' ]->deps[] = 'colors-fresh';
		}

	}

}
global $acs_colors;
$acs_colors = new Custom_Color_Schemes;