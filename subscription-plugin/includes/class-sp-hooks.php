<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

class SP_Hooks {

    public static function init() {
        add_action( 'init', array( __CLASS__, 'register_hooks' ) );
    }

    public static function register_hooks() {
        do_action( 'sp_before_plugin_init' );
        // Add more custom hooks here
        do_action( 'sp_after_plugin_init' );
    }
}

SP_Hooks::init();
