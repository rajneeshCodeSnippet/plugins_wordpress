<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
class SP_Reports {

    public static function init() {
        add_action( 'admin_menu', array( __CLASS__, 'add_admin_menu' ) );
    }

    public static function add_admin_menu() {
        add_submenu_page(
            'sp_subscription_plans',
            __( 'Subscription Reports', 'subscription-plugin' ),
            __( 'Reports', 'subscription-plugin' ),
            'manage_options',
            'sp_subscription_reports',
            array( __CLASS__, 'reports_page' )
        );
    }

    public static function reports_page() {
        ?>
        <div class="wrap">
            <h1><?php _e( 'Subscription Reports', 'subscription-plugin' ); ?></h1>
            <p><?php _e( 'Here you can view subscription metrics and export reports.', 'subscription-plugin' ); ?></p>
            <!-- Add reporting UI here -->
        </div>
        <?php
    }

    // Add functions for generating reports
}

SP_Reports::init();
