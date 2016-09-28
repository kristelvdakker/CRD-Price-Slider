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
Text Domain: crd_framework
*/

/**
 * Define Variables
 *
 * @since 1.0.0
 */
global $reporter;
if( ! defined('CRD_PS_VER'))
    define('CRD_PS_VER', '1.2.0');
if( ! defined('CRD_PS_BASE'))
    define('CRD_PS_BASE', dirname(__FILE__) );
if( ! defined('CRD_PS_DIRECTORY'))
    define('CRD_PS_DIRECTORY', get_option('siteurl') . '/wp-content/plugins/crd-price-slider');
if( ! defined('CRD_PS_INC'))
    define('CRD_PS_INC', CRD_PS_DIRECTORY . '/includes');
if( ! defined('CRD_PS_BASE_INC'))
    define('CRD_PS_BASE_INC', CRD_PS_BASE . '/includes');

/**
 * Load Scripts
 *
 * @since 1.0.0
 */
function crd_slider_scripts() {
    // Deregister the included library
    wp_deregister_script('jquery');
    wp_deregister_script('jquery-ui-core');

    // Register the library again from Google's CDN
    wp_register_script('jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js', array(), null, false);
    wp_register_script('jquery-ui-core', 'https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js', array(), null, false);

    // Register the script like this for a plugin:
    wp_register_script('slider-script', plugins_url('/build/js/scripts.min.js',__FILE__), array('jquery'), false, false);

    // For either a plugin or a theme, you can then enqueue the script:
    wp_enqueue_script('jquery');
    wp_enqueue_script('jquery-ui-core');
    wp_enqueue_script('slider-script');
}
add_action('wp_enqueue_scripts','crd_slider_scripts');

/**
 * Load Styles
 *
 * @since 1.0.0
 */
function crd_slider_styles() {
    // Register the style like this for a plugin:
    wp_register_style('slider-style', plugins_url('/build/css/styles.min.css', __FILE__ ), array(), '20120208', 'all');
    wp_register_style('font-oswald', 'https://fonts.googleapis.com/css?family=Oswald:400,700', array(), '20120208', 'all');

    // For either a plugin or a theme, you can then enqueue the style:
    wp_enqueue_style('slider-style');
    wp_enqueue_style('font-oswald');
}
add_action('wp_enqueue_scripts','crd_slider_styles');

/**
 * Load plugin textdomain.
 *
 * @since 1.0.0
 */
function crd_load_textdomain() {
    load_plugin_textdomain('crd_framework', false, dirname(plugin_basename(__FILE__)) . '/languages');
}
add_action('init', 'crd_load_textdomain');

/**
 * Form button
 *
 * @param array $a The array that sets the information
 * @param string $n The name of the button pattern
 *
 * @since 1.0.0
 */
function crd_form_buttons($a, $n) {
    $html = '<div class="option">';
    $html.= '<label class="option_label">' . __('What is your prefered location for the server?', 'crd_framework') . '</label>';
    $html.= '<p class="has_error error_country"></p>';
    $html.= '<div class="btn_container">';
    foreach ($a as $k => $v) {
        $label = str_replace(' ', '-', strtolower($unit));
        $html.= '<span class="btn_option ' . $k . '-wrap">';
        $html.= '<input type="radio" id="' . $k . '" name="' . $n . '" value="' . $v . '">';
        $html.= '<label for="' . $k . '">' . $v . '</label>';
        $html.= '</span>';
    }
    $html.= '</div>';
    $html.= '</div>';
    echo $html;
}

function crd_price_slider_page() {
?>
    <form name="product_form" id="form_product_builder">
        <?php
        $country = array(
            'NL' => __('The Netherlands', 'crd_framework'),
            'DE' => __('Germany', 'crd_framework')
        );

        crd_form_buttons($country, 'country');
        ?>
        <div class="option">
            <?php
                $html = '<label class="option_label">' . __('CPU Cores', 'crd_framework') . ':</label>';
                echo $html;
            ?>
            <input type="range" class="flat-slider" id="cpu-slider" min="1" max="4" value="1" />
            <span id="cpu-cores">500GB</span>
            <p id="cpu-price">Cost: $15</p>
        </div>
        <div class="option">
            <?php
                $html = '<label class="option_label">' . __('RAM', 'crd_framework') . ':</label>';
                echo $html;
            ?>
            <input type="range" class="flat-slider" id="ram-slider" min="1" max="16" value="8" />
            <span id="ram-amount">8GB</span>
            <p id="ram-price">Cost: $80</p>
        </div>
        <?php
            $answers = array(
                'Yes' => __('Yes', 'crd_framework'),
                'No' => __('No', 'crd_framework')
            );
            crd_form_buttons($answers, 'labeling');
        ?>
    </form>
    <?php
}
add_shortcode('crd_price_slider','crd_price_slider_page');

function price_slider_settings_page() {}
