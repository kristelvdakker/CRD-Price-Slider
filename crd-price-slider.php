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
  load_plugin_textdomain('crd_framework', false, dirname(plugin_basename(__FILE__)) . '/lang');
}
add_action('init', 'crd_load_textdomain');

function crd_price_slider_page() {
?>
    <form name="myForm">
        <div class="option">
            <label class="option_label">
                <?php _e('What is your prefered location for the server?','crd_framework') ?>
            </label>
            <a class="NLbtn pricingbtn active">
                <?php _e('The Netherlands','crd_framework') ?>
            </a>
            <a class="DEbtn pricingbtn">
                <?php _e('Germany','crd_framework') ?>
            </a>
            <input type="radio" name="rdo" id="yes" checked />
            <input type="radio" name="rdo" id="no" />
            <div class="switch">
                <label for="yes">yes</label>
                <label for="no">no</label>
            </div>
        </div>
        <div class="option">
            <p>CPU Cores:</p>
            <input type="range" class="flat-slider" id="cpu-slider" min="1" max="4" value="1" />
            <p id="cpu-cores">500GB</p>
            <p id="cpu-price">Cost: $15</p>
        </div>
        <div class="option">
            <p>RAM:</p>
            <input type="range" class="flat-slider" id="ram-slider" min="1" max="16" value="8" />
            <p id="ram-amount">8GB</p>
            <p id="ram-price">Cost: $80</p>
        </div>
        <div class="option">
            <label class="option_label">
                <?php _e('Do you prefer whitelabeling?','crd_framework') ?>
            </label>
            <a class="Yesbtn pricingbtn active">
                <?php _e('Yes','crd_framework') ?>
            </a>
            <a class="Nobtn pricingbtn">
                <?php _e('No','crd_framework') ?>
            </a>
        </div>
        <div class="priceslider"></div>
        <div class="enterprisepricing">Check out our enterprise pricing</div>

        <input type="radio" name="myRadios" value="3">3%
        <input type="radio" name="myRadios" value="5">5%
        <input type="radio" name="myRadios" value="7">7%
    </form>
    Amount: <span id="amount"></span>

    <script>
        var amountField = document.getElementById('amount');
        var rad = document.myForm.myRadios;
        var prev = null;
        for (var i = 0; i < rad.length; i++) {
            rad[i].onclick = function () {
                console.log(this.value);
                if (this !== prev) {
                    prev = this;
                    amountField.textContent = 1000 + 1000 * this.value / 100;
                }
            };
        }
    </script>
    <?php
}
add_shortcode('crd_price_slider','crd_price_slider_page');

function price_slider_settings_page() {}
