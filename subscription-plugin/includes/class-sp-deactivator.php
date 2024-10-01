<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

class SP_Deactivator {

    public static function deactivate() {
        global $wpdb;

        // Delete plugin options
        delete_option( 'sp_subscription_options' );

        // Optionally, drop custom tables (if your plugin created any)
        $subscription_plans_table = $wpdb->prefix . 'subscription_plans';
        $user_subscriptions_table = $wpdb->prefix . 'user_subscriptions';

        $wpdb->query( "DROP TABLE IF EXISTS $subscription_plans_table" );
        $wpdb->query( "DROP TABLE IF EXISTS $user_subscriptions_table" );

        // Remove any scheduled events
        wp_clear_scheduled_hook( 'sp_subscription_reminder_event' );

        // Optionally, perform other cleanup tasks specific to your plugin

        // Flush rewrite rules to remove custom endpoints or flush caches
        flush_rewrite_rules();
    }
}
