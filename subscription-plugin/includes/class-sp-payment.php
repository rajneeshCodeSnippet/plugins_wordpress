<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
class SP_Payment {

    public static function init() {
        add_action( 'wp_enqueue_scripts', array( __CLASS__, 'enqueue_scripts' ) );
        // Add more payment-related hooks and actions
    }

    public static function enqueue_scripts() {
        wp_enqueue_script( 'sp-payment-js', SP_PLUGIN_URL . 'assets/js/payment.js', array( 'jquery' ), '1.0.0', true );
        wp_enqueue_style( 'sp-payment-css', SP_PLUGIN_URL . 'assets/css/payment.css', array(), '1.0.0' );
    }

    // Add more payment-related functions
}

SP_Payment::init();
