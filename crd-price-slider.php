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
 * Form button element
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

/**
 * Form slider element
 *
 * @param array $a The array that sets the information
 * @param string $n The name of the slider pattern
 * @param string $v The default value of the slider
 *
 * @since 1.0.0
 */
function crd_form_slider($a, $n, $va) {
    $id = str_replace(' ', '-', strtolower($n));
    $html = '<div class="option">';
    $html.= '<label class="option_label">' . __($n, 'crd_framework') . ':</label>';
    $html.= '<span id="' . $id . '-product" class="product-name">' . $a[$va - 1] . '</span>';
    $html.= '<input type="range" class="flat-slider" id="' . $id . '-slider" min="1" max="' . count($a) . '" value="' . $va . '" />';
    $html.= '</div>'; //option
    echo $html;
}

function crd_price_slider_page() {
    echo '<form name="product_form" id="form_product_builder">';

        $country = array(
            'NL' => __('The Netherlands', 'crd_framework'),
            'DE' => __('Germany', 'crd_framework')
        );
        crd_form_buttons($country, 'country');

        $dataOptions = ['500GB', '1TB', '2TB', __('We will contact you', 'crd_framework')];
        crd_form_slider($dataOptions, 'CPU Cores', '2');

        $memoryOptions = ['1GB', '2GB', '4GB', '8GB', '16GB', '32GB'];
        crd_form_slider($memoryOptions, 'RAM', '3');

        $answers = array(
            'Yes' => __('Yes', 'crd_framework'),
            'No'  => __('No', 'crd_framework')
        );
        crd_form_buttons($answers, 'labeling');

    echo '</form>';
}
add_shortcode('crd_price_slider','crd_price_slider_page');



// create custom plugin settings menu
add_action('admin_menu', 'crd_create_menu');
function crd_create_menu() {
    //create new top-level menu
    add_menu_page(
        'My Cool Plugin Settings',
        'Cool Settings',
        'administrator',
        __FILE__,
        'crd_settings_page',
        plugins_url('/images/icon.png', __FILE__)
    );
}

function crd_settings_page() {
?>
<div class="wrap">
    <h1>Options for the product slider</h1>
    <form id="product-edit" class="crd-product-form" method="post" action="">
        <fieldset>
            <legend><?php _e('CPU and RAM options', 'crd_framework'); ?></legend>
            <ul>
                <li class="">
                    <label for="cpu-options"><?php _e('CPU', 'crd_framework'); ?></label>
                    <input type="number" min="1" id="cpu-options-field-1" name="cpu-options-field-1" value="<?php echo $args['cpu-options-field-1']; ?>" />
                    <input type="number" min="1" id="cpu-options-field-2" name="cpu-options-field-2" value="<?php echo $args['cpu-options-field-2']; ?>" />
                    <input type="number" min="1" id="cpu-options-field-3" name="cpu-options-field-3" value="<?php echo $args['cpu-options-field-3']; ?>" />
                </li>
                <li class="">
                    <label for="ram-options"><?php _e('RAM', 'crd_framework'); ?></label>
                    <input type="number" id="ram-options-field-1" name="ram-options-field-1" value="<?php echo $args['ram-options-field-1']; ?>" />
                    <input type="number" id="ram-options-field-2" name="ram-options-field-2" value="<?php echo $args['ram-options-field-2']; ?>" />
                    <input type="number" id="ram-options-field-3" name="ram-options-field-3" value="<?php echo $args['ram-options-field-3']; ?>" />
                    <input type="number" id="ram-options-field-4" name="ram-options-field-4" value="<?php echo $args['ram-options-field-4']; ?>" />
                    <input type="number" id="ram-options-field-5" name="ram-options-field-5" value="<?php echo $args['ram-options-field-5']; ?>" />
                    <input type="number" id="ram-options-field-6" name="ram-options-field-6" value="<?php echo $args['ram-options-field-6']; ?>" />
                </li>
            </ul>
        </fieldset>
        <div>
            <input type="submit" name="submitted" value="<?php _e('Save', 'crd_framework'); ?>" />
        </div>
    </form>

    </form>
</div>
<?php }



global $crd_db_version;
$crd_db_version = '1.0';

function crd_options_install() {
    global $wpdb;
    global $crd_db_version;

    $table_name = $wpdb->prefix . 'price_slider';

    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE $table_name (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        time datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
        name tinytext NOT NULL,
        text text NOT NULL,
        url varchar(55) DEFAULT '' NOT NULL,
        PRIMARY KEY (id)
    ) $charset_collate;";

    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta( $sql );

    add_option( 'crd_db_version', $crd_db_version );
}
register_activation_hook( __FILE__, 'crd_options_install' );

function crd_options_install_data() {
    global $wpdb;

    $welcome_name = 'Mr. WordPress';
    $welcome_text = 'Congratulations, you just completed the installation!';

    $table_name = $wpdb->prefix . 'price_slider';

    $wpdb->insert(
        $table_name,
        array(
            'time' => current_time('mysql'),
            'name' => $welcome_name,
            'text' => $welcome_text,
        )
    );
}
register_activation_hook( __FILE__, 'crd_options_install_data' );
