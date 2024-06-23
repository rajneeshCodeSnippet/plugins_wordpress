<?php

if ( ! defined( 'ABSPATH' ) ) {
    echo "in loader";
    exit; // Exit if accessed directly.
}

class SP_Loader {

    public static function init() {
        // Load text domain for translations
        load_plugin_textdomain( 'subscription-plugin', false, basename( dirname( __FILE__ ) ) . '/languages' );

        // Include required files
        self::includes();

        // Initialize hooks
        self::hooks();
    }

    private static function includes() {
        require_once SP_PLUGIN_DIR . 'includes/class-sp-activator.php';
        require_once SP_PLUGIN_DIR . 'includes/class-sp-deactivator.php';
        require_once SP_PLUGIN_DIR . 'includes/class-sp-subscription.php';
        require_once SP_PLUGIN_DIR . 'includes/class-sp-payment.php';
        // Add more includes as necessary
    }

    private static function hooks() {
        register_activation_hook( __FILE__, array( 'SP_Activator', 'activate' ) );
        register_deactivation_hook( __FILE__, array( 'SP_Deactivator', 'deactivate' ) );

        add_action( 'plugins_loaded', array( 'SP_Subscription', 'init' ) );
        add_action( 'plugins_loaded', array( 'SP_Payment', 'init' ) );
        // Add more hooks as necessary
    }
}
