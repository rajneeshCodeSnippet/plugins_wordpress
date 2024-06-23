<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit("Rajneesh yadav 1233"); // Exit if accessed directly.
}

class SP_Admin {

    public static function init() {
        add_action( 'admin_menu', array( __CLASS__, 'add_admin_menu' ) );
        add_action( 'admin_init', array( __CLASS__, 'register_settings' ) );
    }

    public static function add_admin_menu() {
        add_menu_page(
            __( 'Subscription Plans', 'subscription-plugin' ),
            __( 'Subscription Plans', 'subscription-plugin' ),
            'manage_options',
            'sp_subscription_plans',
            array( __CLASS__, 'subscription_plans_page' ),
            'dashicons-admin-generic'
        );
    }

    public static function subscription_plans_page() {
        ?>
        <div class="wrap">
            <h1><?php _e( 'Subscription Plans', 'subscription-plugin' ); ?></h1>
            <form method="post" action="options.php">
                <?php
                settings_fields( 'sp_subscription_plans_group' );
                do_settings_sections( 'sp_subscription_plans' );
                submit_button();
                ?>
            </form>
        </div>
        <?php
    }

    public static function register_settings() {
        register_setting( 'sp_subscription_plans_group', 'sp_subscription_plans' );

        add_settings_section(
            'sp_subscription_plans_section',
            __( 'Manage your subscription plans', 'subscription-plugin' ),
            null,
            'sp_subscription_plans'
        );

        add_settings_field(
            'sp_subscription_plans_field',
            __( 'Subscription Plans', 'subscription-plugin' ),
            array( __CLASS__, 'subscription_plans_field_callback' ),
            'sp_subscription_plans',
            'sp_subscription_plans_section'
        );
    }

    public static function subscription_plans_field_callback() {
        $plans = get_option( 'sp_subscription_plans', array() );
        ?>
        <textarea name="sp_subscription_plans" rows="10" cols="50"><?php echo esc_textarea( json_encode( $plans ) ); ?></textarea>
        <p class="description"><?php _e( 'Enter your subscription plans as a JSON array.', 'subscription-plugin' ); ?></p>
        <?php
    }
}

SP_Admin::init();
