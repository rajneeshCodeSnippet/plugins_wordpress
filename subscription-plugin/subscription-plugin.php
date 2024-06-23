<?php
/**
 * Plugin Name: Subscription Plugin
 * Description: A full-featured subscription management plugin for WordPress.
 * Version: 1.0.0
 * Author: Rajneesh Yadav
 * Text Domain: subscription-plugin
 */

if ( ! defined( 'ABSPATH' ) ) {
    echo "raj yadav";
    exit; // Exit if accessed directly.
}

// Define constants
define( 'SP_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'SP_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

// Include core files
require_once SP_PLUGIN_DIR . 'includes/class-sp-loader.php';
SP_Loader::init();