<?php
/**
 * This withholds the core class of the Dracula plugin.
 *
 * @file
 * @package dracula-wordpress
 */

/**
 * Class that adds the styles to the admin area
 * it also does some basic checks
 */
class Dracula_WordPress_Custom_Color_Schemes
{




	/**
	 * Our color scheme reference name
	 *
	 * @var array
	 */
	private $colors = array(
		'smackdown',
	);

	/**
	 * Constructor function that calls add actions
	 */
	public function __construct()
	{
		add_action('admin_enqueue_scripts', array($this, 'load_default_css'));

		add_action('admin_init', array($this, 'add_colors'));
	}

	/**
	 * Register color schemes.
	 */
	public function add_colors()
	{
		$suffix = is_rtl() ? '-rtl' : '';

		wp_admin_css_color(
			'smackdown',
			__('Dracula', 'admin_schemes'),
			plugins_url('smackdown/colors' . $suffix . '.css', __FILE__),
			array('#282a36', '#44475a', '#8be9fd', '#f8f8f2'),
			array(
				'base' => '#3299bb',
				'focus' => '#452b72',
				'current' => '#f5f5f5',
			)
		);

	}

	/**
	 * Make sure core's default `colors.css` gets enqueued, since we can't
	 *
	 * @import it from a plugin stylesheet. Also force-load the default colors
	 * on the profile screens, so the JS preview isn't broken-looking.
	 */
	public function load_default_css()
	{
		global $wp_styles;

		$color_scheme = get_user_option('admin_color');

		$scheme_screens = apply_filters('acs_picker_allowed_pages', array('profile', 'profile-network'));
		if (in_array($color_scheme, $this->colors, true) || in_array(get_current_screen()->base, $scheme_screens, true)) {
			$wp_styles->registered['colors']->deps[] = 'colors-fresh';
		}

	}

}