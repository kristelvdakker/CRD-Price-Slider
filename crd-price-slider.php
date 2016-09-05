<?php
/**
 * @package    CRDPriceSlider
 * @copyright  Copyright (C) 2016 Kristel van den Akker. All rights reserved.
 * @license    https://www.gnu.org/licenses/gpl-3.0.html GNU/GPL
 */
defined('ABSPATH') or die('Restricted access.');

/**
Plugin Name: CRD Price Slider
Plugin URI:
Description: An easy price slider
Version: 1.0.0
Author: Kristel van den Akker
Author URI:
License: GPL v3
Text Domain:
*/

/* Define Variables */
global $reporter;
if( ! defined( 'CRD_PS_VER' ))
	define( 'CRD_PS_VER', '1.2.0' );
if( ! defined( 'CRD_PS_BASE' ))
	define( 'CRD_PS_BASE' , dirname(__FILE__) );
if( ! defined( 'CRD_PS_DIRECTORY' ))
	define( 'CRD_PS_DIRECTORY' , get_option('siteurl') . '/wp-content/plugins/crd-price-slider' );
if( ! defined( 'CRD_PS_INC' ))
	define( 'CRD_PS_INC' , CRD_PS_DIRECTORY . '/includes' );
if( ! defined( 'CRD_PS_BASE_INC' ))
	define( 'CRD_PS_BASE_INC', CRD_PS_BASE . '/includes' );

/**
 * Load Scripts
 */
function crd_slider_scripts() {
	// Deregister the included library
	wp_deregister_script('jquery');

	// Register the library again from Google's CDN
	wp_register_script('jquery','http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js',array(),null,false);

	// Register the script like this for a plugin:
	wp_register_script('slider-script',plugins_url('/assets/js/scripts.js',__FILE__),array('jquery'),false,false);

	// For either a plugin or a theme, you can then enqueue the script:
	wp_enqueue_script('jquery');
	wp_enqueue_script('slider-script');
}
add_action('wp_enqueue_scripts','crd_slider_scripts');

/**
 * Load Styles
 */
function crd_slider_styles() {
	// Register the style like this for a plugin:
	wp_register_style('slider-style',plugins_url('/assets/css/styles.css',__FILE__ ),array(),'20120208','all');
	wp_register_style('font-oswald','https://fonts.googleapis.com/css?family=Oswald:400,700',array(),'20120208','all');

	// For either a plugin or a theme, you can then enqueue the style:
	wp_enqueue_style('slider-style');
	wp_enqueue_style('font-oswald');
}
add_action('wp_enqueue_scripts','crd_slider_styles');

function crd_price_slider_page() {
?>
	<div class="option">
		<p>CPU Cores:</p>
		<input type="range" class="flat-slider" id="cpu-slider" min="1" max="8" value="4"/>
		<p id="cpu-cores">4</p>
		<p id="cpu-price">Cost: $60</p>
	</div>
	<div class="option">
	<p>RAM:</p>
		<input type="range" class="flat-slider" id="ram-slider" min="1" max="16" value="8"/>
		<p id="ram-amount">8GB</p>
		<p id="ram-price">Cost: $80</p>
	</div>
<?php
}
add_shortcode('crd_price_slider','crd_price_slider_page');

function price_slider_settings_page() {}
