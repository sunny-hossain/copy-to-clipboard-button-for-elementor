<?php
/**
 * Plugin Name: Copy to Clipboard Button for Elementor
 * Plugin URI:  https://github.com/sunny-hossain/copy-to-clipboard-button-for-elementor
 * Author:      Sunny Hossain
 * Author URI:  https://sunnyhossain.com
 * Description: Elementor widget to add a copy to clipboard button.
 * Version:     1.0.0
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain: copy-to-clipboard-button-for-elementor
 * Domain Path: /languages
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

// Register and load the widget. Only run if Elementor is active.
function ctce_register_clipboard_button_widget( $widgets_manager ) {
    if ( ! defined( 'ELEMENTOR_VERSION' ) ) {
        return; // Elementor not active.
    }

    require_once __DIR__ . '/includes/class-clipboard.php';
    $widgets_manager->register( new \Elementor_Clipboard_Button_Widget() );
}
add_action( 'elementor/widgets/register', 'ctce_register_clipboard_button_widget' );

// Enqueue front-end assets.
function ctce_enqueue_clipboard_assets() {
    wp_enqueue_script( 'clipboard' );
    wp_enqueue_script( 
        'ctce-main',
        plugins_url( 'includes/main.js', __FILE__ ),
        [ 'jquery', 'clipboard' ],
        '1.0.0',
        true
    );
}
add_action( 'wp_enqueue_scripts', 'ctce_enqueue_clipboard_assets' );